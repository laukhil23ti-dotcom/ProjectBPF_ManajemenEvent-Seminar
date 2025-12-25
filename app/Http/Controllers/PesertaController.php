<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use App\Models\Event;
use Illuminate\Http\Request;

class PesertaController extends Controller
{
    /**
     * Tampilkan data peserta (ADMIN)
     */
    public function index(Request $request)
    {
        $query = Peserta::with('event');

        if ($request->search) {
            $query->where('nama', 'like', '%' . $request->search . '%')
                  ->orWhere('email', 'like', '%' . $request->search . '%');
        }

        $peserta = $query->paginate(10);

        return view('admin.peserta.index', compact('peserta'));
    }

    /**
     * Form tambah peserta (ADMIN)
     */
    public function create()
    {
        $events = Event::all();
        return view('peserta.daftar', compact('events'));
    }

    /**
     * Simpan peserta baru
     */
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

        return redirect()
            ->route('peserta.index')
            ->with('success', 'Peserta berhasil ditambahkan');
    }

    /**
     * Hapus peserta
     */
    public function destroy($id)
    {
        $peserta = Peserta::findOrFail($id);
        $peserta->delete();

        return redirect()
            ->route('peserta.index')
            ->with('success', 'Peserta berhasil dihapus');
    }
}
