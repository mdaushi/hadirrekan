<?php

use App\Http\Controllers\AcaraController;
use App\Http\Controllers\PesertaController;
use Illuminate\Support\Facades\Route;

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
});
