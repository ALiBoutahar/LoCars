<?php

namespace App\Http\Controllers;

use App\Models\AppSetting;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SpamhausListingController extends Controller
{
    public function indexIP()
    {
        return view('spamhaus');
    }

    public function indexDomain()
    {
        if(auth()->user()->cannot('super_admin')) abort(403);

        return view('spamhaus.spamhaus_domain');
    }

    public function setAccount(Request $request)
    {
        if($request->username === null) return response()->json(["success" => false, "message" => "No username provided."]);
        if($request->password === null) return response()->json(["success" => false, "message" => "No password provided."]);

        $url = "https://api.spamhaus.org/api/v1/login";
        
        $response = Http::post($url, [
            'username' => $request->username, 
            'password' => $request->password,
            'realm' => 'intel',
        ],["Content-Type" => "application/json"]);
        
        if($response->json()["code"] === 200) 
        {
            $spamhaus = [
                "username" => $request->username,
                "password" => $request->password,
                "token" => $response->json()["token"],
                "expires" => date("Y-m-d H:i:s", $response->json()["expires"]),
            ];

            $app = AppSetting::first();
            
            $app->spamhaus = json_encode($spamhaus);
            $app->save();

            return response()->json(["success" => true, "message" => "Spamhaus account has been set successfully."]);
        }
        else
        {
            return response()->json(["success" => false, "message" => $response->json()["message"]]);
        }
    }

    public function spamhausIpTest(Request $request)
    {
        if($request->ip == null) return response()->json(["success" => false, "message" => "No IP provided."]);
        if($request->number == null) return response()->json(["success" => false, "message" => "No number of records provided."]);
        if($request->type == null) return response()->json(["success" => false, "message" => "No type provided."]);

        $user = auth()->user();
        if($user->cannot('super_admin'))
        {
            $user_requests = UserRequest::where('user_id', $user->id)
                ->whereDate('created_at', '>=', Carbon::now()->startOfDay()->toDateString())
                ->whereDate('created_at', '<=', Carbon::now()->endOfDay()->toDateString())
                ->count();
    
            if($user_requests < 5)
            {
                $user_req = new UserRequest();
                $user_req->user_id = $user->id;
                $user_req->ip = $request->ip;
                $user_req->save();
            }
            else return response()->json(["success" => false, "message" => "You have reqched the limit of 5 requests per day. Please try again later, or upgrade your plan."]);
        }

        $spamhaus = json_decode(AppSetting::first()->spamhaus);
        
        $records = Http::withHeaders([
            'Authorization' => 'Bearer ' . $spamhaus->token
        ])->get('https://api.spamhaus.org/api/intel/v1/byobject/cidr/' . $request->type . '/listed/history/' . $request->ip . "?limit=" . $request->number)->json();
            
        if($records["code"] == "200") return response()->json(["success" => true, "message" => "Records found !", "records" => $records["results"]]);
        
        if($records["code"] == "404") return response()->json(["success" => true, "message" => "No records found"]);
        
        if($records["code"] == "400") return response()->json(["success" => false, "message" => "Your request is malformed."]);
        
        if($records["code"] == "401")
        {
            $token = $this->refreshToken($spamhaus);

            if($token == true)
            {
                return $this->spamhausIpTest($request);
            }
            else
            {
                return response()->json(["success" => false, "message" => "Something went wrong. Please try again later."]);
            }
        }
    }

    // public function spamhausDomainGeneralTest(Request $request)
    // {
    //     if($request->domain == null) return response()->json(["success" => false, "message" => "No domain provided."]);

    //     $spamhaus = json_decode(AppSetting::first()->spamhaus);

    //     $records = Http::withHeaders([
    //         'Authorization' => 'Bearer ' . $spamhaus->token
    //     ])
    //     ->get("https://api.spamhaus.org/api/intel/v2/byobject/domain/" . $request->domain)->json();

    //     $dimensions = Http::withHeaders([
    //         'Authorization' => 'Bearer ' . $spamhaus->token
    //     ])
    //     ->get("https://api.spamhaus.org/api/intel/v2/byobject/domain/" . $request->domain . "/dimensions")->json();
        
    //     if(!array_key_exists("code", $records)) return response()->json(["success" => true, "message" => "Records found !", "records" => $records, "dimensions" => $dimensions]);
        
    //     if(array_key_exists("code", $records) && $records["code"] == "404") return response()->json(["success" => true, "message" => "No records found"]);
        
    //     if(array_key_exists("code", $records) && $records["code"] == "400") return response()->json(["success" => false, "message" => "Your request is malformed."]);
        
    //     if(array_key_exists("code", $records) && $records["code"] == "401")
    //     {
    //         $token = $this->refreshToken($spamhaus);

    //         if($token == true)
    //         {
    //             return $this->spamhausDomainGeneralTest($request);
    //         }
    //         else
    //         {
    //             return response()->json(["success" => false, "message" => "Something went wrong. Please try again later."]);
    //         }
    //     }
    // }

    public function refreshToken($spamhaus)
    {
        try
        {
            $response = Http::post("https://api.spamhaus.org/api/v1/login", [
            'username' => $spamhaus->username, 
            'password' => $spamhaus->password,
            'realm' => 'intel',
            ],["Content-Type" => "application/json"]);

            $spamhaus->token = $response->json()["token"];
            
            $app = AppSetting::first();
            $app->spamhaus = json_encode($spamhaus);
            $spamhaus->expires = date("Y-m-d H:i:s", $response->json()["expires"]);
            $app->save();
        }
        catch(Exception $e)
        {
            return false;
        }

        return true;
    }
}
