<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\Voiture;
use App\Models\Client;
use App\Models\Accident;
use App\Models\Reservation;
use App\Models\Assurance;
use App\Models\Controle;
use Illuminate\Support\Facades\File;


use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{ 
    public function index()
    {
        return view("history.index");
    }

    // Clients
    public function clients()
    {
        return view("history.clients", [
            "clients" => Client::where('delete', '<>', 0)
                ->where('user_id', Auth::user()->id)
                ->orderBy('id', 'desc')
                ->get()
        ]);
    }

    public function recovery_client($id)
    {
        $client = Client::find($id);
        $client->update(['delete' => 0]);
        return redirect()->back()->with('success', "Client récupéré avec succès");
    }

    public function destroy_client($id)
    {
        $client = Client::find($id);
        $client->delete();
        return redirect()->back()->with('success', 'Client supprimé avec succès');
    }

    // Voitures
    public function voitures()
    {
        return view("history.voitures", [
            "voitures" => Voiture::where('delete', '<>', 0)
                ->where('user_id', Auth::user()->id)
                ->orderBy('id', 'desc')
                ->get()
        ]);
    }

    public function recovery_voiture($id)
    {
        $voiture = Voiture::find($id);
        $voiture->update(['delete' => 0]);
        return redirect()->back()->with('success', "Voiture récupérée avec succès");
    }

    public function destroy_voiture($id)
    {
        $voiture = Voiture::find($id);
        if (File::exists(storage_path('app/public/' . $voiture->image))) {
            File::delete(storage_path('app/public/' . $voiture->image));
        } 
        $voiture->delete();
        return redirect()->back()->with('success', 'Voiture supprimée avec succès');
    }

    // Reservations
    public function reservations()
    {
        return view("history.reservations", [
            "reservations" => Reservation::where('delete', '<>', 0)
                ->where('user_id', Auth::user()->id)
                ->orderBy('id', 'desc')
                ->get()
        ]);
    }

    public function recovery_reservation($id)
    {
        $reservation = Reservation::find($id);
        $reservation->update(['delete' => 0]);
        return redirect()->back()->with('success', "Réservation récupérée avec succès");
    }

    public function destroy_reservation($id)
    {
        $reservation = Reservation::find($id);
        $reservation->delete();
        return redirect()->back()->with('success', 'Réservation supprimée avec succès');
    }

    // Accidents
    public function accidents()
    {
        return view("history.accidents", [
            "accidents" => Accident::where('delete', '<>', 0)
                ->where('user_id', Auth::user()->id)
                ->orderBy('id', 'desc')
                ->get()
        ]);
    }

    public function recovery_accident($id)
    {
        $accident = Accident::find($id);
        $accident->update(['delete' => 0]);
        return redirect()->back()->with('success', "Accident récupéré avec succès");
    }

    public function destroy_accident($id)
    {
        $accident = Accident::find($id);
        $accident->delete();
        return redirect()->back()->with('success', 'Accident supprimé avec succès');
    }

    // Assurances
    public function assurances()
    {
        return view("history.assurances", [
            "assurances" => Assurance::where('delete', '<>', 0)
                ->where('user_id', Auth::user()->id)
                ->orderBy('id', 'desc')
                ->get()
        ]);
    }

    public function recovery_assurance($id)
    {
        $assurance = Assurance::find($id);
        $assurance->update(['delete' => 0]);
        return redirect()->back()->with('success', "Assurance récupérée avec succès");
    }

    public function destroy_assurance($id)
    {
        $assurance = Assurance::find($id);
        $assurance->delete();
        return redirect()->back()->with('success', 'Assurance supprimée avec succès');
    }

    // Contrôles
    public function controles()
    {
        return view("history.controles", [
            "controles" => Controle::where('delete', '<>', 0)
                ->where('user_id', Auth::user()->id)
                ->orderBy('id', 'desc')
                ->get()
        ]);
    }

    public function recovery_controle($id)
    {
        $controle = Controle::find($id);
        $controle->update(['delete' => 0]);
        return redirect()->back()->with('success', "Contrôle récupéré avec succès");
    }

    public function destroy_controle($id)
    {
        $controle = Controle::find($id);
        $controle->delete();
        return redirect()->back()->with('success', 'Contrôle supprimé avec succès');
    }
}
