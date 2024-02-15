<?php
namespace App\Http\Controllers;

use App\Models\client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function index()
    {
        $clients = client::where('user_id', Auth::user()->id)->where('delete', 0)->get();
        return view("pages.clients.index", ["clients" => $clients]);
    }

    // ********************************************************************************
    public function create()
    {
        return view("pages.clients.create");
    }

    public function store(Request $request)
    {
        $clientData = $request->all();
        $clientData['user_id'] = Auth::user()->id;
        client::create($clientData);
        return redirect()->back()->with('success', 'Client ajouté avec succès');
    }

    // ********************************************************************************
    public function show($id)
    {
        $client = client::where('id', $id)->where('user_id', Auth::user()->id)->firstOrFail();
        return view("pages.clients.show", ["client" => $client]);
    }

    // ********************************************************************************
    public function edit($id)
    {
        $client = client::where('id', $id)->where('user_id', Auth::user()->id)->firstOrFail();
        return view("pages.clients.edit", ["client" => $client]);
    }

    public function update(Request $request, $id)
    {
        $client = client::where('id', $id)->where('user_id', Auth::user()->id)->firstOrFail();
        $client->update($request->all());
        return redirect()->back()->with('warning', 'Client modifié avec succès');
    }



    // ********************************************************************************
    public function delete($id)
    {
        $client = client::where('id', $id)->where('user_id', Auth::user()->id)->firstOrFail();

        if ($client) {
            $client->update(['delete' => Auth::user()->id]);
            return redirect()->back()->with('danger', 'Client supprimé avec succès');
        }
        return redirect()->back()->with('error', 'Erreur lors de la suppression du client');
    }
}

