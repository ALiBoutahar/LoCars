<?php

namespace App\Http\Controllers;

use App\Models\reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function index()
    {
        return view("pages.reservations.index",["reservations"=>reservation::where('delete', 0)->get()]);
    } 
// ********************************************************************************

    public function create()
    {
        return view("pages.reservations.create");
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
        return view("pages.reservations.edit",["reservation"=>reservation::findOrFail($id)]);
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
