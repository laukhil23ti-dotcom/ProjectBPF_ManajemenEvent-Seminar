<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Peserta;
use Illuminate\Http\Request;

class PesertaPublicController extends Controller
{
    //HOME (HALAMAN DEPAN PESERTA)
    public function home()
    {
        $events = Event::all();
        return view('peserta.home', compact('events'));
    }

    //FORM DAFTAR PESERTA
    public function create()
    {
        $events = Event::all();
        return view('peserta.daftar', compact('events'));
    }

    // ✅ SIMPAN DATA PESERTA
    public function store(Request $request)
    {
        $request->validate([
            'nama'     => 'required',
            'email'    => 'required|email',
            'no_hp'    => 'required',
            'alamat'   => 'nullable',
            'event_id' => 'required|exists:events,id',
        ]);

        Peserta::create([
            'nama'     => $request->nama,
            'email'    => $request->email,
            'no_hp'    => $request->no_hp,
            'alamat'   => $request->alamat,
            'event_id' => $request->event_id,
        ]);

        return redirect()->route('peserta.sukses');
    }
}
