<?php

namespace App\Http\Controllers;

use App\Models\home;
use App\Models\voiture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function charts()
    {
        return view("home.charts");
    } 

    public function index()
    {
        return view("home.index");
    } 


    public function searchVoitures(Request $request)
    {
        if ($request->ajax()) {
            $dated = $request->dated;
            $datef = $request->datef;

            $voitures_exist = DB::table('voitures')
            ->whereNotExists(function ($query) use ($dated, $datef) {
                $query->select(DB::raw(1))
                    ->from('reservations')
                    ->whereRaw('voitures.id = reservations.voiture_id')
                    ->where(function ($query) use ($dated, $datef) {
                        $query->whereBetween('date_d', [$dated, $datef])
                            ->orWhereBetween('date_f', [$dated, $datef])
                            ->orWhere(function ($query) use ($dated, $datef) {
                                $query->where('date_d', '<=', $dated)
                                        ->where('date_f', '>=', $datef);
                            });
                    });
            })->get();                    

            return view('partials.voiture_exist_table', compact('voitures_exist'));
        }



        // $voituresDisponibles = DB::table('voitures')
        //     ->whereNotExists(function ($query) use ($dateDebut, $dateFin) {
        //         $query->select(DB::raw(1))
        //             ->from('reservations')
        //             ->whereRaw('voitures.id = reservations.voiture_id')
        //             ->where(function ($query) use ($dateDebut, $dateFin) {
        //                 $query->whereBetween('date_d', [$dateDebut, $dateFin])
        //                     ->orWhereBetween('date_fin', [$dateDebut, $dateFin])
        //                     ->orWhere(function ($query) use ($dateDebut, $dateFin) {
        //                         $query->where('date_d', '<=', $dateDebut)
        //                                 ->where('date_fin', '>=', $dateFin);
        //                     });
        //             });
        //     })
        //  ->get();

    }
}
