<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\reputationTrackerController;
use App\Http\Controllers\SpamhausListingController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DomainController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
        return view('welcome');
    });

Route::controller(DomainController::class)->middleware(['auth'])->group(function () {
    Route::get('/domain', 'index');
    Route::post('/add', 'add');
    Route::get('/get_domains', 'get_domains');
    Route::get('/check-ip', 'check_ip');
    Route::get('/ipranges', 'ipranges');
    Route::post('/check', 'check');
});

Route::post('/registerM', [RegisterController::class, 'registerM']); 
Route::post('/continueRegister', [RegisterController::class, 'continueRegister']);

Route::get('/reputationTracker',[reputationTrackerController::class, 'index']);
Route::get('/checkReputation',[reputationTrackerController::class, 'checkReputation']);
Route::post('/checkIps',[reputationTrackerController::class, 'checkIps']);
Route::post('/checkDomains',[reputationTrackerController::class, 'checkDomains']);

// Login Routes
Route::get('/login',[App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');


Route::group(['middleware' => ['permission:super_admin']], function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('home');
    Route::post('/getUser', [HomeController::class, 'getUser']);
    Route::post('/updateUser', [HomeController::class, 'updateUser']);
    Route::post('/verifyAccount', [HomeController::class, 'verifyAccount']);
});

Route::group(['middleware' => ['isVerfied']], function () {
    Route::get('/spamhaus_ip', [SpamhausListingController::class, 'indexIP']);

    Route::group(['middleware' => ['permission:super_admin']], function () {
        Route::post('/setAccount', [SpamhausListingController::class, 'setAccount']);
    });

    Route::post('/spamhausIpTest', [SpamhausListingController::class, 'spamhausIpTest']);
    Route::post('/spamhausDomainGeneralTest', [SpamhausListingController::class, 'spamhausDomainGeneralTest']);
});