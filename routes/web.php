<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\AcaraController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\PresensiController;

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
    Route::resource('presensi', PresensiController::class);
    Route::get('acara/get', [AcaraController::class, 'get'])->name('acara.get');
    Route::get('sesi/get/{id}', [SesiController::class, 'get'])->name('sesi.get');
    Route::get('presensi/get/{acara}/{sesi}', [PresensiController::class, 'get'])->name('presensi.get');
});
