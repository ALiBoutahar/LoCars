<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Voiture;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class ReservationController extends Controller
{
    
    public function downloadPDF()
    {
        $reservations = Reservation::where('delete', 0)->where('user_id', Auth::user()->id)->get();
        $pdf = PDF::loadView('pages.reservations.pdf', compact('reservations'));
        return $pdf->download('reservations.pdf');
    }

    public function index()
    {
        $reservations = Reservation::where('delete', 0)
            ->where('user_id', Auth::user()->id)
            ->get();
        
        return view("pages.reservations.index", ["reservations" => $reservations]);
    } 

    public function create()
    {
        $voitures = Voiture::where('delete', 0)
            ->where('user_id', Auth::user()->id)
            ->get();
        
        $clients = Client::where('delete', 0)
            ->where('user_id', Auth::user()->id)
            ->get();
        
        return view("pages.reservations.create", ["voitures" => $voitures, "clients" => $clients]);
    }

    public function store(Request $request)
    {
        $reservationData = $request->all();
        $reservationData['user_id'] = Auth::user()->id;

        Reservation::create($reservationData);
        return redirect()->back()->with('success', 'Réservation ajoutée avec succès');
    }

    public function show($id)
    {
        $reservation = Reservation::where('id', $id)
            ->where('user_id', Auth::user()->id)
            ->firstOrFail();
        
        return view("pages.reservations.show", ["reservation" => $reservation]);
    }

    public function edit($id)
    {
        $reservation = Reservation::where('id', $id)
            ->where('user_id', Auth::user()->id)
            ->firstOrFail();
        
        $voitures = Voiture::where('delete', 0)
            ->where('user_id', Auth::user()->id)
            ->get();
        
        $clients = Client::where('delete', 0)
            ->where('user_id', Auth::user()->id)
            ->get();
        
        return view("pages.reservations.edit", ["reservation" => $reservation, "voitures" => $voitures, "clients" => $clients]);
    }

    public function update(Request $request, $id)
    {
        $reservation = Reservation::where('id', $id)
            ->where('user_id', Auth::user()->id)
            ->firstOrFail();
        $reservation->update($request->all());
        return redirect()->back()->with('warning', 'Réservation modifiée avec succès');
    }

    public function delete($id)
    {
        $reservation = Reservation::where('id', $id)
            ->where('user_id', Auth::user()->id)
            ->firstOrFail();

        if ($reservation) {
            $reservation->update(['delete' => Auth::user()->id]);
            return redirect()->back()->with('danger', 'Réservation supprimée avec succès');
        }
        return redirect()->back()->with('error', 'Erreur lors de la suppression de la réservation');
    }
}
