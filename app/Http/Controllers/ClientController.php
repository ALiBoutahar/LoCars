<?php

namespace App\Http\Controllers;

use App\Models\client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function index()
    {
        return view("pages.clients.index",["clients"=>client::where('delete', 0)->get()]);
    } 
// ********************************************************************************

    public function create()
    {
        return view("pages.clients.create");
    }
// ********************************************************************************

    public function store(Request $request)
    {
        client::create($request->all());
        return redirect()->back()->with('success', 'client ajouter avec succès');
    }
// ********************************************************************************

    public function show($id)
    {
        return view("pages.clients.show",["client"=>client::findOrFail($id)]);
    }
// ********************************************************************************

    public function edit($id)
    {
        return view("pages.clients.edit",["client"=>client::findOrFail($id)]);
    }

    public function update(Request $request,$id)
    {
        $updateData = client::find($id);
        $updateData->update($request->all());
        return redirect()->back()->with('warning', 'client modifié avec succès');
    }
// ********************************************************************************
    // public function destroy($id)
    // {
    //     $post = client::find($id);
    //     $post->delete();
    //     return redirect("client")->with('success', 'client supprimer avec succès');
    // }

    public function delete($id)
    {
        $client = client::find($id);
        if ($client) {
            $client->update(['delete' => Auth::user()->id]);
        }
        return redirect()->back()->with('danger', 'client supprimer avec succès');
    }
}
