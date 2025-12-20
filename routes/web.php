<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\PesertaPublicController;
use Illuminate\Support\Facades\Route;

//AUTH
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



//PESERTA / PUBLIC (TIDAK PERLU LOGIN)
Route::get('/', function () {
    return view('peserta.home');
})->name('peserta.home');

Route::get('/daftar', [PesertaPublicController::class, 'create'])
    ->name('peserta.daftar');

Route::post('/daftar', [PesertaPublicController::class, 'store'])
    ->name('peserta.store');

Route::get('/sukses', function () {
    return view('peserta.sukses');
})->name('peserta.sukses');



//ADMIN & STAFF (WAJIB LOGIN)
Route::middleware(['auth'])->group(function () {

    // DASHBOARD UMUM (ADMIN / STAFF)
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // ADMIN FULL ACCESS
    Route::resource('/peserta', PesertaController::class);

    // STAFF (READ ONLY)
    Route::get('/staff/dashboard', function () {return view('staff.dashboard');})->name('staff.dashboard');
    Route::get('/staff/peserta', [PesertaController::class, 'index'])->name('staff.peserta.index');
});
