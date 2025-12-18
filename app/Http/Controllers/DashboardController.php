<?php

namespace App\Http\Controllers;

use App\Models\Peserta;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil peserta terbaru 5 data
        $peserta = Peserta::latest()->take(5)->get();

        return view('admin.dashboard', compact('peserta'));
    }
}