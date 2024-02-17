<?php

namespace App\Http\Controllers;

use App\Models\Voiture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


class VoitureController extends Controller
{
    public function index()
    {
        $voitures = Voiture::where('delete', 0)->where('user_id', Auth::user()->id)->get();
        return view("pages.voitures.index", ["voitures" => $voitures]);
    } 

    public function create()
    {
        return view("pages.voitures.create");
    }

    public function store(Request $request)
{
    $path_image = null;
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $path = $image->store('Images', 'public');
        $path_image = $path;
    }
    $voitureData = $request->all();
    $voitureData['user_id'] = Auth::user()->id;
    $voitureData['image'] = $path_image;
    Voiture::create($voitureData);
    return redirect()->back()->with('success', 'Voiture ajoutée avec succès');
}

    public function show($id)
    {
        $voiture = Voiture::where('id', $id)->where('user_id', Auth::user()->id)->firstOrFail();
        return view("pages.voitures.show", ["voiture" => $voiture]);
    }

    public function edit($id)
    {
        $voiture = Voiture::where('id', $id)->where('user_id', Auth::user()->id)->firstOrFail();
        return view("pages.voitures.edit", ["voiture" => $voiture]);
    }

    public function update(Request $request, $id)
    {
        $voiture = Voiture::where('id', $id)->where('user_id', Auth::user()->id)->firstOrFail();
        
        $voiture->matricule = $request->matricule;
        $voiture->marque = $request->marque;
        $voiture->color = $request->color;
        $voiture->model = $request->model;
        $voiture->km = $request->km;
        $voiture->nbrplace = $request->nbrplace;
        $voiture->status = $request->status;

             
        if($request->hasfile('image')){
            if (File::exists(storage_path('app/public/' . $voiture->image))) {
                File::delete(storage_path('app/public/' . $voiture->image));
            }   
            $image = $request->file('image');
            $path = $image->store('Images','public');
            $voiture->image = $path;
        }
        $voiture->update();
        return redirect()->back()->with('warning', 'Voiture modifiée avec succès');
    }
    public function delete($id)
    {
        $voiture = Voiture::where('id', $id)->where('user_id', Auth::user()->id)->firstOrFail();

        if ($voiture) {
            $voiture->update(['delete' => Auth::user()->id]);
            return redirect('/voitures')->with('danger', 'Voiture supprimée avec succès');
        }
        return redirect()->back()->with('error', 'Erreur lors de la suppression de la voiture');
    }
}
