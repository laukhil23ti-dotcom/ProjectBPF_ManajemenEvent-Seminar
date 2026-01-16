<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\PesertaPublicController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;

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
| PESERTA PUBLIC (TANPA LOGIN)
|--------------------------------------------------------------------------
*/
Route::get('/', [PesertaPublicController::class, 'home'])
    ->name('peserta.home');

/*
| 👉 AUTO EVENT (TANPA DROPDOWN)
| contoh: /peserta/daftar/3
*/
Route::get('/peserta/daftar/{event_id}', [PesertaController::class, 'create'])
    ->name('peserta.create');

Route::post('/peserta/store', [PesertaController::class, 'store'])
    ->name('peserta.store');

Route::get('/sukses', function () {
    return view('peserta.sukses');
})->name('peserta.sukses');

/*
|--------------------------------------------------------------------------
| ADMIN & STAFF (WAJIB LOGIN)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    // DASHBOARD
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    // EVENT (ADMIN)
    Route::resource('event', EventController::class);

    // PESERTA (ADMIN & STAFF - READ)
    Route::get('/peserta', [PesertaController::class, 'index'])
        ->name('peserta.index');

    // PESERTA (ADMIN ONLY - CRUD)
    Route::get('/peserta/{id}/edit', [PesertaController::class, 'edit'])
        ->name('peserta.edit');

    Route::put('/peserta/{id}', [PesertaController::class, 'update'])
        ->name('peserta.update');

    Route::delete('/peserta/{id}', [PesertaController::class, 'destroy'])
        ->name('peserta.destroy');

    // STAFF
    Route::get('/staff/dashboard', function () {
        return view('staff.dashboard');
    })->name('staff.dashboard');

    Route::get('/staff/peserta', [PesertaController::class, 'index'])
        ->name('staff.peserta.index');

    // PROFILE
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::post('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');
});
