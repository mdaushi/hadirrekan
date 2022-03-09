<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\AcaraController;
use App\Http\Controllers\PesertaController;

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

Route::middleware('auth')->group(function(){
    Route::get('dashboard', function(){
        return view('pages.dashboard.index');
    })->name('dashboard');
    Route::resource('acara', AcaraController::class)->except('show');
    Route::resource('peserta', PesertaController::class);
    Route::resource('sesi', SesiController::class);
});
