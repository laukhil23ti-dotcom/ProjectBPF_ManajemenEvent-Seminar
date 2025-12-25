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
| PESERTA PUBLIC (TIDAK PERLU LOGIN)
|--------------------------------------------------------------------------
*/
Route::get('/', [PesertaPublicController::class, 'home'])->name('peserta.home');


Route::get('/peserta/create', [PesertaPublicController::class, 'create'])
    ->name('peserta.create');

Route::post('/daftar', [PesertaPublicController::class, 'store'])
    ->name('peserta.public.store');

Route::get('/sukses', function () {
    return view('peserta.sukses');
})->name('peserta.sukses');

Route::resource('peserta', PesertaController::class);


/*
|--------------------------------------------------------------------------
| ADMIN & STAFF (WAJIB LOGIN)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

    // DASHBOARD
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    /*
    |--------------------------------------------------------------------------
    | EVENT & PESERTA (ADMIN)
    |--------------------------------------------------------------------------
    */
    Route::resource('event', EventController::class);

    Route::resource('peserta', PesertaController::class)
        ->except(['create', 'store']); // biar gak tabrakan dengan public

    /*
    |--------------------------------------------------------------------------
    | STAFF (READ ONLY)
    |--------------------------------------------------------------------------
    */
    Route::get('/staff/dashboard', function () {
        return view('staff.dashboard');
    })->name('staff.dashboard');

    Route::get('/staff/peserta', [PesertaController::class, 'index'])
        ->name('staff.peserta.index');

});

//UNTUK PROFILE
Route::middleware('auth')->group(function() {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
});