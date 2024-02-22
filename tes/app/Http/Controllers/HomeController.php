<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::all();

        return view('home', ['users' => $users]);
    }

    public function getUser(Request $request)
    {
        $user = User::find($request->user_id);

        return response()->json(['success'=>true , 'user'=>$user]);
    }

    public function updateUser(Request $request)
    {
        try
        {
            $user = User::find($request->user_id);
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            ($request->status == 'true') ? $user->status = 1 : $user->status = 0;

            $user->save();

            return response()->json(['success'=>true, 'msg'=>'User updated successfully.']);
        }
        catch(\Exception $e)
        {
            return response()->json(['success'=>false, 'msg'=>$e->getMessage()]);
        }
    }

    public function verifyAccount(Request $request)
    {
        try
        {
            $user = User::find($request->user_id);
            ($request->verify == 'true') ? $user->email_verified_at = Carbon::now() : $user->email_verified_at = null;

            $user->save();

            return response()->json(['success'=>true, 'msg'=>'User verified successfully.']);
        }
        catch(\Exception $e)
        {
            return response()->json(['success'=>false, 'msg'=>$e->getMessage()]);
        }
    }
}
