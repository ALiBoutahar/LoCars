<?php

namespace App\Http\Controllers;
use App\Models\Voiture;
use App\Models\Client;
use App\Models\Accident;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
 
class AccidentController extends Controller
{
    public function index()
    {
        return view("pages.accidents.index", ["accidents" => Accident::where('delete', 0)->where('user_id', Auth::user()->id)->get()]);
    } 

    public function create()
    {
        $voitures = Voiture::where('delete', 0)->where('user_id', Auth::user()->id)->get();
        $clients = Client::where('delete', 0)->where('user_id', Auth::user()->id)->get();
        return view("pages.accidents.create", ["voitures" => $voitures, "clients" => $clients]);
    }

    public function store(Request $request)
    {

        $accidentData = $request->all();
        $accidentData['user_id'] = Auth::user()->id;

        Accident::create($accidentData);

        return redirect()->back()->with('success', 'Accident ajouté avec succès');
    }

    public function show($id)
    {
        $accident = Accident::where('id', $id)->where('user_id', Auth::user()->id)->firstOrFail();
        return view("pages.accidents.show", ["accident" => $accident]);
    }

    public function edit($id)
    {
        $voitures = Voiture::where('delete', 0)->where('user_id', Auth::user()->id)->get();
        $clients = Client::where('delete', 0)->where('user_id', Auth::user()->id)->get();
        $accident = Accident::where('id', $id)->where('user_id', Auth::user()->id)->firstOrFail();
        return view("pages.accidents.edit", ["accident" => $accident, "voitures" => $voitures, "clients" => $clients]);
    }

    public function update(Request $request, $id)
    {
        $accident = Accident::where('id', $id)->where('user_id', Auth::user()->id)->firstOrFail();
        $accident->update($request->all());
        return redirect()->back()->with('warning', 'Accident modifié avec succès');
    }

    public function delete($id)
    {
        $accident = Accident::where('id', $id)->where('user_id', Auth::user()->id)->firstOrFail();

        if ($accident) {
            $accident->update(['delete' => Auth::user()->id]);
            return redirect()->back()->with('danger', 'Accident supprimé avec succès');
        }
        return redirect()->back()->with('error', 'Erreur lors de la suppression de laccident');
    }
}  
