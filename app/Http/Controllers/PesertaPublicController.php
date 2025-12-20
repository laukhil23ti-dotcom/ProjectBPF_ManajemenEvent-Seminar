<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peserta;

class PesertaPublicController extends Controller
{
    // form pendaftaran
    public function create(Request $request)
    {
        $event = $request->event; // animasi / ml / branding
        return view('peserta.daftar', compact('event'));
    }

    // simpan ke database
    public function store(Request $request)
    {
        $request->validate([
            'nama'   => 'required',
            'email'  => 'required|email',
            'no_hp'  => 'required',
            'alamat' => 'nullable',
            'event'  => 'required'
        ]);

        // mapping event ke ID
        $eventMap = [
            'animasi'  => 1,
            'ml'       => 2,
            'branding' => 3,
        ];

        Peserta::create([
            'nama'     => $request->nama,
            'email'    => $request->email,
            'no_hp'    => $request->no_hp,
            'alamat'   => $request->alamat,
            'event_id' => $eventMap[$request->event]
        ]);

        return redirect('/sukses');
    }
}
