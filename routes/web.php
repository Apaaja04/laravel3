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


Route::middleware('auth')->group(function () {
    Route::get('/reservasi', [ReservasiController::class, 'tampilForm'])->name('reservasi.form');
    Route::post('/form/submit', [ReservasiController::class, 'submitForm'])->name('form.submit');
});

Route::get('/reservasi/meja', [MejaController::class, 'meja'])->name('reservasi.meja');

// Rute untuk menyimpan pemilihan meja
Route::post('/reservasi', [MejaController::class, 'store'])->name('meja.store');

// Resource Routes untuk Menu, Pemesanan, dan Transaksi
Route::resource('menus', MenuController::class);
Route::resource('pemesanans', PemesananController::class);
Route::resource('transaksis', TransaksiController::class);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
