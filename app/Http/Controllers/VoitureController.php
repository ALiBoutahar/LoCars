<?php

namespace App\Http\Controllers;

use App\Models\voiture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VoitureController extends Controller
{
    public function index()
    {
        return view("pages.voitures.index",["voitures"=>voiture::where('delete', 0)->get()]);
    } 
// ********************************************************************************

    public function create()
    {
        return view("pages.voitures.create");
    }
// ********************************************************************************

    public function store(Request $request)
    {
        voiture::create($request->all());
        return redirect()->back()->with('success', 'voiture ajouter avec succès');
    }
// ********************************************************************************

    public function show($id)
    {
        return view("pages.voitures.show",["voiture"=>voiture::findOrFail($id)]);
    }
// ********************************************************************************

    public function edit($id)
    {
        return view("pages.voitures.edit",["voiture"=>voiture::findOrFail($id)]);
    }

    public function update(Request $request,$id)
    {
        $updateData = voiture::find($id);
        $updateData->update($request->all());
        return redirect()->back()->with('warning', 'voiture modifié avec succès');
    }
// ********************************************************************************
    // public function destroy($id)
    // {
    //     $post = voiture::find($id);
    //     $post->delete();
    //     return redirect("voiture")->with('success', 'voiture supprimer avec succès');
    // }

    public function delete($id)
    {
        $voiture = voiture::find($id);
        if ($voiture) {
            $voiture->update(['delete' => Auth::user()->id]);
        }
        return redirect()->back()->with('danger', 'voiture supprimer avec succès');
    }
}
