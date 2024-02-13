<?php

namespace App\Http\Controllers;

use App\Models\client;
use App\Models\voiture;
use App\Models\reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function index()
    {
        return view("pages.reservations.index",["reservations"=>reservation::where('delete', 0)->where('user_id', Auth::user()->id)->get()]);
    } 
// ********************************************************************************

    public function create()
    {
        $voitures = voiture::where('delete', 0)->where('user_id', Auth::user()->id)->get();
        $clients = client::where('delete', 0)->where('user_id', Auth::user()->id)->get();
        return view("pages.reservations.create",["voitures"=>$voitures, "clients"=>$clients]);
    }
// ********************************************************************************

    public function store(Request $request)
    {
        reservation::create($request->all());
        return redirect()->back()->with('success', 'reservation ajouter avec succès');
    }
// ********************************************************************************

    public function show($id)
    {
        return view("pages.reservations.show",["reservation"=>reservation::findOrFail($id)]);
    }
// ********************************************************************************

    public function edit($id)
    {
        $voitures = voiture::where('delete', 0)->where('user_id', Auth::user()->id)->get();
        $clients = client::where('delete', 0)->where('user_id', Auth::user()->id)->get();
        return view("pages.reservations.edit",["reservation"=>reservation::findOrFail($id),"voitures"=>$voitures, "clients"=>$clients]);
    }

    public function update(Request $request,$id)
    {
        $updateData = reservation::find($id);
        $updateData->update($request->all());
        return redirect()->back()->with('warning', 'reservation modifié avec succès');
    }
// ********************************************************************************
    // public function destroy($id)
    // {
    //     $post = reservation::find($id);
    //     $post->delete();
    //     return redirect("reservation")->with('success', 'reservation supprimer avec succès');
    // }

    public function delete($id)
    {
        $reservation = reservation::find($id);
        if ($reservation) {
            $reservation->update(['delete' => Auth::user()->id]);
        }
        return redirect()->back()->with('danger', 'reservation supprimer avec succès');
    }
}
