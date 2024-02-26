<?php

namespace App\Http\Controllers;

use App\Models\Voiture;
use App\Models\Controle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class ControleController extends Controller
{

    public function downloadPDF()
    {
        $controles = Controle::where('delete', 0)->where('user_id', Auth::user()->id)->get();
        $pdf = PDF::loadView('pages.controles.pdf', compact('controles'));
        return $pdf->download('controles.pdf');
    }

    public function index()
    { 
        $controles = Controle::where('delete', 0)->where('user_id', Auth::user()->id)->get();
        return view("pages.controles.index", ["controles" => $controles]);
    } 

    public function create()
    {
        $voitures = Voiture::where('delete', 0)->where('user_id', Auth::user()->id)->get();
        return view("pages.controles.create", ["voitures" => $voitures]);
    }

    public function store(Request $request)
    {
        $controleData = $request->all();
        $controleData['user_id'] = Auth::user()->id;

        Controle::create($controleData);
        return redirect()->back()->with('success', 'Contrôle ajouté avec succès');
    }

    public function show($id)
    {
        $controle = Controle::where('id', $id)->firstOrFail();
        return view("pages.controles.show", ["controle" => $controle]);
    }

    public function edit($id)
    {
        $controle = Controle::where('id', $id)->firstOrFail();
        $voitures = Voiture::where('delete', 0)->where('user_id', Auth::user()->id)->get();
        return view("pages.controles.edit", ["controle" => $controle, "voitures" => $voitures]);
    }

    public function update(Request $request, $id)
    {
        $controle = Controle::where('id', $id)->firstOrFail();
        $controle->update($request->all());
        return redirect()->back()->with('warning', 'Contrôle modifié avec succès');
    }

    public function delete($id)
    {
        $controle = Controle::where('id', $id)->firstOrFail();

        if ($controle) {
            $controle->update(['delete' => Auth::user()->id]);
            return redirect()->back()->with('danger', 'Contrôle supprimé avec succès');
        }
        return redirect()->back()->with('error', 'Erreur lors de la suppression du contrôle');
    }
}
