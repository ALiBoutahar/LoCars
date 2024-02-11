<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\clientController;
use App\Http\Controllers\voitureController;
use App\Http\Controllers\reservationController;
use App\Http\Controllers\homeController;
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
    Route::controller(voitureController::class)->group(function () {
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
    Route::controller(HomeController::class)->group(function () {
        Route::get('/home', 'index');
        Route::get('/home/create', 'create');
        Route::get('/home/{id}', 'show');
        Route::get('/home/{id}/edit', 'edit');
        Route::post('/home', 'store');
        Route::patch('/home/{id}', 'update');
        // Route::delete('/home/{id}', 'destroy');
        Route::patch('/home/{id}/delete', 'delete');
    });
   
});

require __DIR__.'/auth.php';
