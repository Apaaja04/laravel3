<?php

use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\ReservasiController;
use App\Http\Controllers\MejaController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


// Home
Route::get('/', [HomeController ::class, 'index']);


//Route::get('/registrasi', [AuthenticatedSessionController ::class, 'tampilRegistrasi'])->name('registrasi.tampil');
//Route::post('/registrasi/submit', [AuthenticatedSessionController ::class, 'submitRegistrasi'])->name('registrasi.submit');

// Route::get('/login', [AuthenticatedSessionController ::class, 'tampillogin'])->name('login.tampil');
//Route::post('/login/submit', [AuthenticatedSessionController ::class, 'submitlogin'])->name('login.submit');

// Rute Logout untuk Authenticated User
//Route::middleware('auth')->group(function () {
    // Proses logout
  //  Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return redirect()->route('reservasi.form');
    })->name('dashboard');

    Route::get('/reservasi', [ReservasiController::class, 'tampilForm'])->name('reservasi.form');
    Route::post('/form/submit', [ReservasiController::class, 'submitForm'])->name('form.submit');

    Route::get('/meja/{id}', [MejaController::class, 'meja'])->name('reservasi.meja');
    // Rute untuk menyimpan pemilihan meja
    Route::post('/reservasi', [MejaController::class, 'store'])->name('meja.store');

    Route::get('/menu/{id}', [MenuController::class, 'menu'])->name('reservasi.menu');

    // Menyimpan pesanan menu
    Route::post('/menu', [MenuController::class, 'store'])->name('menu.store');


    Route::resource('pemesanans', PemesananController::class);
    Route::resource('transaksis', TransaksiController::class);

});
