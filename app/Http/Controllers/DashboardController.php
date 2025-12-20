<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::user()->role === 'admin') {
            $peserta = Peserta::latest()->take(5)->get();
            return view('admin.dashboard', compact('peserta'));
        }

        if (Auth::user()->role === 'staff') {
            return view('staff.dashboard');
        }
    }
}