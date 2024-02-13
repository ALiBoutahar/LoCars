<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\voiture;
use App\Models\client;
use App\Models\accident;
use App\Models\reservation;
use App\Models\assurance;
use App\Models\controle;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    public function index()
    {
        return view("history.index");
    }


    public function clients()
    {
        return view("history.clients", ["clients" => client::where('delete', '<>', 0)->where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get()]);
    }
    public function recovery_client($id)
    {
        $objet = client::find($id);
        $objet->update(['delete' => 0]);        
        return redirect()->back()->with('success', "Employe Récupère Avec Succès");
    }
    public function destroy_client(Request $request, $id)
    {
        $updateData = client::find($id);
        $updateData->delete($request->all());
        return redirect()->back()->with('success','Employe supprimer avec succès');
    }
    // ********************************************************************

    public function voitures()
    {
        return view("history.voitures", ["voitures" => voiture::where('delete', '<>', 0)->where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get()]);
    }
    public function recovery_voiture($id)
    {
        $objet = voiture::find($id);
        $objet->update(['delete' => 0]);        
        return redirect()->back()->with('success', "Employe Récupère Avec Succès");
    }
    public function destroy_voiture(Request $request, $id)
    {
        $updateData = voiture::find($id);
        $updateData->delete($request->all());
        return redirect()->back()->with('success','Employe supprimer avec succès');
    }
    // ********************************************************************

    public function reservations()
    {
        return view("history.reservations", ["reservations" => reservation::where('delete', '<>', 0)->where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get()]);
    }
    public function recovery_reservation($id)
    {
        $objet = reservation::find($id);
        $objet->update(['delete' => 0]);        
        return redirect()->back()->with('success', "Employe Récupère Avec Succès");
    }
    public function destroy_reservation(Request $request, $id)
    {
        $updateData = reservation::find($id);
        $updateData->delete($request->all());
        return redirect()->back()->with('success','Employe supprimer avec succès');
    }
    // ********************************************************************


    public function accidents()
    {
        return view("history.accidents", ["accidents" => accident::where('delete', '<>', 0)->where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get()]);
    }
    public function recovery_accident($id)
    {
        $objet = accident::find($id);
        $objet->update(['delete' => 0]);        
        return redirect()->back()->with('success', "Employe Récupère Avec Succès");
    }
    public function destroy_accident(Request $request, $id)
    {
        $updateData = accident::find($id);
        $updateData->delete($request->all());
        return redirect()->back()->with('success','Employe supprimer avec succès');
    }
    // ********************************************************************

    public function assurances()
    {
        return view("history.assurances", ["assurances" => assurance::where('delete', '<>', 0)->where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get()]);
    }
    public function recovery_assurance($id)
    {
        $objet = assurance::find($id);
        $objet->update(['delete' => 0]);        
        return redirect()->back()->with('success', "Employe Récupère Avec Succès");
    }
    public function destroy_assurance(Request $request, $id)
    {
        $updateData = assurance::find($id);
        $updateData->delete($request->all());
        return redirect()->back()->with('success','Employe supprimer avec succès');
    }
    // ********************************************************************

    public function controles()
    {
        return view("history.controles", ["controles" => controle::where('delete', '<>', 0)->where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get()]);
    }
    public function recovery_controle($id)
    {
        $objet = controle::find($id);
        $objet->update(['delete' => 0]);        
        return redirect()->back()->with('success', "Employe Récupère Avec Succès");
    }
    public function destroy_controle(Request $request, $id)
    {
        $updateData = controle::find($id);
        $updateData->delete($request->all());
        return redirect()->back()->with('success','Employe supprimer avec succès');
    }
    // ********************************************************************
}
