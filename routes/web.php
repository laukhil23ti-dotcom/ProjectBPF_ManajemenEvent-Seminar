<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\PesertaPublicController;
use App\Http\Controllers\EventController;

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| PESERTA PUBLIC (TIDAK PERLU LOGIN)
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('peserta.home');
})->name('peserta.home');

Route::get('/daftar', [PesertaPublicController::class, 'create'])->name('peserta.daftar');
Route::post('/daftar', [PesertaPublicController::class, 'store'])->name('peserta.store');

Route::get('/sukses', function () {
    return view('peserta.sukses');
})->name('peserta.sukses');

/*
|--------------------------------------------------------------------------
| ADMIN & STAFF (WAJIB LOGIN)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {


    /*
    |--------------------------------------------------------------------------
    | ADMIN ONLY
    |--------------------------------------------------------------------------
    */
    Route::middleware(['role:admin'])->group(function () {
        Route::resource('event', EventController::class);
        Route::resource('peserta', PesertaController::class);
    });

    /*
    |--------------------------------------------------------------------------
    | STAFF ONLY (READ ONLY)
    |--------------------------------------------------------------------------
    */
    Route::middleware(['role:staff'])->group(function () {

        Route::get('/staff/dashboard', function () {
            return view('staff.dashboard');
        })->name('staff.dashboard');

        Route::get('/staff/peserta', [PesertaController::class, 'index'])
            ->name('staff.peserta.index');
    });

    // DASHBOARD
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Event & Peserta (admin only) – cek role di controller
Route::resource('event', EventController::class);
Route::resource('peserta', PesertaController::class);

});
