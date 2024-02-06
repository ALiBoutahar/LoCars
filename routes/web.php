<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('login.signin');
});

Route::get('/home', function () {
    return view('home.index');
});

Route::get('/charts', function () {
    return view('home.charts');
});

Route::get('/signup', function () {
    return view('login.signup');
});

// **************************************************
Route::get('/ajouter_client', function () {
    return view('pages.clients.create');
});
Route::get('/show_client', function () {
    return view('pages.clients.show');
});
Route::get('/edit_client', function () {
    return view('pages.clients.edit');
});
Route::get('/clients', function () {
    return view('pages.clients.index');
});
// **************************************************
Route::get('/ajouter_car', function () {
    return view('pages.cars.create');
});
Route::get('/show_car', function () {
    return view('pages.cars.show');
});
Route::get('/edit_car', function () {
    return view('pages.cars.edit');
});
Route::get('/cars', function () {
    return view('pages.cars.index');
});
// **************************************************
Route::get('/ajouter_reservation', function () {
    return view('pages.reservations.create');
});
Route::get('/show_reservation', function () {
    return view('pages.reservations.show');
});
Route::get('/edit_reservation', function () {
    return view('pages.reservations.edit');
});
Route::get('/reservations', function () {
    return view('pages.reservations.index');
});
// **************************************************
Route::get('/ajouter_assurance', function () {
    return view('pages.assurances.create');
});
Route::get('/show_assurance', function () {
    return view('pages.assurances.show');
});
Route::get('/edit_assurance', function () {
    return view('pages.assurances.edit');
});
Route::get('/assurances', function () {
    return view('pages.assurances.index');
});
// **************************************************
Route::get('/ajouter_controle', function () {
    return view('pages.controles.create');
});
Route::get('/show_controle', function () {
    return view('pages.controles.show');
});
Route::get('/edit_controle', function () {
    return view('pages.controles.edit');
});
Route::get('/controles', function () {
    return view('pages.controles.index');
});
// **************************************************
Route::get('/ajouter_accident', function () {
    return view('pages.accidents.create');
});
Route::get('/show_accident', function () {
    return view('pages.accidents.show');
});
Route::get('/edit_accident', function () {
    return view('pages.accidents.edit');
});
Route::get('/accidents', function () {
    return view('pages.accidents.index');
});
// **************************************************
Route::get('/history', function () {
    return view('history.index');
});
Route::get('/history/clients', function () {
    return view('history.clients');
});
Route::get('/history/cars', function () {
    return view('history.cars');
});
Route::get('/history/reservations', function () {
    return view('history.reservations');
});
Route::get('/history/accidents', function () {
    return view('history.accidents');
});
Route::get('/history/controles', function () {
    return view('history.controles');
});
Route::get('/history/assurances', function () {
    return view('history.assurances');
});
