<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\VoitureController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\AssuranceController;
use App\Http\Controllers\AccidentController;
use App\Http\Controllers\ControleController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\HistoryController;

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
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // **************************************************
    Route::controller(HomeController::class)->group(function () {
        Route::get('/home', 'index');
        Route::get('/statistiques', 'charts');
    });

    Route::controller(HistoryController::class)->group(function () {
        Route::get('/history', 'index');

        Route::get('/history/clients', 'clients');
        Route::patch('/h_clients/{id}/recovery', 'recovery_client');
        Route::delete('/h_clients/{id}/destroy', 'destroy_client');

        Route::get('/history/voitures', 'voitures');
        Route::patch('/h_voitures/{id}/recovery', 'recovery_voiture');
        Route::delete('/h_voitures/{id}/destroy', 'destroy_voiture');

        Route::get('/history/reservations', 'reservations');
        Route::patch('/h_reservations/{id}/recovery', 'recovery_reservation');
        Route::delete('/h_reservations/{id}/destroy', 'destroy_reservation');

        Route::get('/history/accidents', 'accidents');
        Route::patch('/h_accidents/{id}/recovery', 'recovery_accident');
        Route::delete('/h_accidents/{id}/destroy', 'destroy_accident');

        Route::get('/history/controles', 'controles');
        Route::patch('/h_controles/{id}/recovery', 'recovery_controle');
        Route::delete('/h_controles/{id}/destroy', 'destroy_controle');

        Route::get('/history/assurances', 'assurances');
        Route::patch('/h_assurances/{id}/recovery', 'recovery_assurance');
        Route::delete('/h_assurances/{id}/destroy', 'destroy_assurance');

    });

    // **************************************************
    Route::controller(ClientController::class)->group(function () {
        Route::get('/clients', 'index');
        Route::get('/client/create', 'create');
        Route::get('/client/{id}', 'show');
        Route::get('/client/{id}/edit', 'edit');
        Route::post('/client', 'store');
        Route::patch('/client/{id}', 'update');
        // Route::delete('/client/{id}', 'destroy');
        Route::patch('/client/{id}/delete', 'delete');
    });
   
    // **************************************************
    Route::controller(VoitureController::class)->group(function () {
        Route::get('/voitures', 'index');
        Route::get('/voiture/create', 'create');
        Route::get('/voiture/{id}', 'show');
        Route::get('/voiture/{id}/edit', 'edit');
        Route::post('/voiture', 'store');
        Route::patch('/voiture/{id}', 'update');
        // Route::delete('/voiture/{id}', 'destroy');
        Route::patch('/voiture/{id}/delete', 'delete');
    });
   
    // **************************************************
    Route::controller(ReservationController::class)->group(function () {
        Route::get('/reservations', 'index');
        Route::get('/reservation/create', 'create');
        Route::get('/reservation/{id}', 'show');
        Route::get('/reservation/{id}/edit', 'edit');
        Route::post('/reservation', 'store');
        Route::patch('/reservation/{id}', 'update');
        // Route::delete('/reservation/{id}', 'destroy');
        Route::patch('/reservation/{id}/delete', 'delete');
    });
   
    // **************************************************
    Route::controller(AccidentController::class)->group(function () {
        Route::get('/accidents', 'index');
        Route::get('/accident/create', 'create');
        Route::get('/accident/{id}', 'show');
        Route::get('/accident/{id}/edit', 'edit');
        Route::post('/accident', 'store');
        Route::patch('/accident/{id}', 'update');
        // Route::delete('/accident/{id}', 'destroy');
        Route::patch('/accident/{id}/delete', 'delete');
    });
   
    // **************************************************
    Route::controller(AssuranceController::class)->group(function () {
        Route::get('/assurances', 'index');
        Route::get('/assurance/create', 'create');
        Route::get('/assurance/{id}', 'show');
        Route::get('/assurance/{id}/edit', 'edit');
        Route::post('/assurance', 'store');
        Route::patch('/assurance/{id}', 'update');
        // Route::delete('/assurance/{id}', 'destroy');
        Route::patch('/assurance/{id}/delete', 'delete');
    });
   
    // **************************************************
    Route::controller(ControleController::class)->group(function () {
        Route::get('/controles', 'index');
        Route::get('/controle/create', 'create');
        Route::get('/controle/{id}', 'show');
        Route::get('/controle/{id}/edit', 'edit');
        Route::post('/controle', 'store');
        Route::patch('/controle/{id}', 'update');
        // Route::delete('/controle/{id}', 'destroy');
        Route::patch('/controle/{id}/delete', 'delete');
    });
   
    // **************************************************
    
   
});

require __DIR__.'/auth.php';
