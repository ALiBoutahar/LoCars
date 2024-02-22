<?php

namespace App\Http\Controllers;
use App\Models\Clientt;
use Illuminate\Http\Request;

class AliController extends Controller
{
    public function index(){
        return view('clients');
    }

    public function get(){
        $clients =  Clientt::get();
        return response()->json(["success" => true, "clients" => $clients]);  
    }


    public function create(Request $request){
        $clt = $request->all();
        info($clt);
        Clientt::create($request->all());
        $clients = Clientt::get();
        return response()->json(["success" => true, "clients" => $clients]);  
    }


    public function show($id){
        $client = Clientt::findOrFail($id);
        return response()->json($client); 
    }

    
    public function edit($id){
        $client = Clientt::findOrFail($id);
        return response()->json($client); 
    }


    public function update(Request $request)
    {
        try {
            $client = Clientt::findOrFail($request->id);
            $client->update($request->all());
            return response()->json(['success' => true, 'message' => 'Client updated successfully']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Failed to update client']);
        }
    }


    public function delete(Request $request)
    {
        try {
            $clientId = $request->id;
            $client = Clientt::findOrFail($clientId);
            $client->delete();
            return response()->json(['success' => true, 'message' => 'Client deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Failed to delete client']);
        }
    }
}
