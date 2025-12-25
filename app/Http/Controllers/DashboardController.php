<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Peserta;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'admin') {
            $peserta = Peserta::with('event')->latest()->take(5)->get();
            return view('dashboard', compact('peserta'));
        }

        if ($user->role === 'staff') {
            $events = Event::withCount('peserta')->get();
            return view('staff.dashboard', compact('events'));
        }

        $peserta = Peserta::latest()->take(5)->get();
        return view('dashboard', compact('peserta'));
    }
}
