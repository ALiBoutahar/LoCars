<?php

namespace App\Http\Controllers;

use App\Models\Voiture;
use App\Models\Assurance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssuranceController extends Controller
{
    public function index()
    {
        $assurances = Assurance::where('delete', 0)->where('user_id', Auth::user()->id)->get();
        return view("pages.assurances.index", ["assurances" => $assurances]);
    } 

    public function create()
    {
        $voitures = Voiture::where('delete', 0)->where('user_id', Auth::user()->id)->get();
        return view("pages.assurances.create", ["voitures" => $voitures]);
    }

    public function store(Request $request)
    {
        $assuranceData = $request->all();
        $assuranceData['user_id'] = Auth::user()->id;

        Assurance::create($assuranceData);
        return redirect()->back()->with('success', 'Assurance ajoutée avec succès');
    }

    public function show($id)
    {
        $assurance = Assurance::where('id', $id)->firstOrFail();
        return view("pages.assurances.show", ["assurance" => $assurance]);
    }

    public function edit($id)
    {
        $assurance = Assurance::where('id', $id)->firstOrFail();
        $voitures = Voiture::where('delete', 0)->where('user_id', Auth::user()->id)->get();
        return view("pages.assurances.edit", ["assurance" => $assurance, "voitures" => $voitures]);
    }

    public function update(Request $request, $id)
    {
        $assurance = Assurance::where('id', $id)->firstOrFail();
        $assurance->update($request->all());
        return redirect()->back()->with('warning', 'Assurance modifiée avec succès');
    }

    public function delete($id)
    {
        $assurance = Assurance::where('id', $id)->firstOrFail();

        if ($assurance) {
            $assurance->update(['delete' => Auth::user()->id]);
            return redirect()->back()->with('danger', 'Assurance supprimée avec succès');
        }
        return redirect()->back()->with('error', 'Erreur lors de la suppression de l\'assurance');
    }
}
