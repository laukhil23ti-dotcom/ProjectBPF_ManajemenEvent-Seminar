<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PesertaController;

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('peserta', PesertaController::class);
