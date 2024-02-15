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

}
