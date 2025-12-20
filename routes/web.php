<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\PesertaPublicController;

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/* ADMIN & STAFF */
Route::middleware(['auth'])->group(function () {
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::resource('peserta', PesertaController::class);
});

/* PESERTA / PUBLIC */
Route::get('/', function () {return view('peserta.home');
});

Route::get('/daftar', function () {return view('peserta.daftar');
});

// HALAMAN UTAMA PESERTA
Route::get('/', function () {return view('peserta.home');
});

// FORM PENDAFTARAN
Route::get('/daftar', [PesertaPublicController::class, 'create']);
Route::post('/daftar', [PesertaPublicController::class, 'store']);

//HALAMAN SUKSES 
Route::get('/sukses', function () {return view('peserta.sukses');
});

// STAFF
Route::middleware(['auth'])->group(function () {
Route::get('/staff/dashboard', function () {return view('staff.dashboard');})->name('staff.dashboard');
Route::get('/staff/peserta', [PesertaController::class, 'index'])->name('staff.peserta.index');
});