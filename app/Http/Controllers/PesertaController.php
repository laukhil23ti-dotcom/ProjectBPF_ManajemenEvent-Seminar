<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use App\Models\Event;
use Illuminate\Http\Request;

class PesertaController extends Controller
{
    // ======================
    // ADMIN: LIST PESERTA
    // ======================
    public function index(Request $request)
    {
        $this->onlyAdmin();

        $query = Peserta::with('event');

        if ($request->search) {
            $query->where('nama', 'like', '%' . $request->search . '%')
                  ->orWhere('email', 'like', '%' . $request->search . '%');
        }

        $peserta = $query->paginate(10);

        return view('admin.peserta.index', compact('peserta'));
    }

    // =====================================================
    // PESERTA: FORM DAFTAR (AUTO EVENT, TANPA DROPDOWN)
    // =====================================================
    public function create($event_id)
    {
        // ❌ TIDAK PAKAI onlyAdmin
        // karena ini FORM PESERTA

        $event = Event::findOrFail($event_id);

        return view('peserta.daftar', compact('event'));
    }

    // ======================
    // SIMPAN DATA PESERTA
    // ======================
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
            ->route('peserta.home')
            ->with('success', 'Berhasil mendaftar seminar 🎉');
    }

    // ======================
    // ADMIN: EDIT PESERTA
    // ======================
    public function edit($id)
    {
        $this->onlyAdmin();

        $peserta = Peserta::findOrFail($id);
        $events = Event::all();

        return view('admin.peserta.edit', compact('peserta', 'events'));
    }

    // ======================
    // ADMIN: UPDATE PESERTA
    // ======================
    public function update(Request $request, $id)
    {
        $this->onlyAdmin();

        $request->validate([
            'nama'     => 'required',
            'email'    => 'required|email',
            'no_hp'    => 'required',
            'alamat'   => 'nullable',
            'event_id' => 'required|exists:events,id',
        ]);

        $peserta = Peserta::findOrFail($id);
        $peserta->update($request->only([
            'nama', 'email', 'no_hp', 'alamat', 'event_id'
        ]));

        return redirect()
            ->route('peserta.index')
            ->with('success', 'Data peserta berhasil diperbarui');
    }

    // ======================
    // ADMIN: HAPUS PESERTA
    // ======================
    public function destroy($id)
    {
        $this->onlyAdmin();

        Peserta::findOrFail($id)->delete();

        return redirect()
            ->route('peserta.index')
            ->with('success', 'Peserta berhasil dihapus');
    }

    // ======================
    // ADMIN GUARD
    // ======================
    private function onlyAdmin()
    {
        if (!auth()->check() || auth()->user()->role !== 'admin') {
            abort(403, 'Akses ditolak');
        }
    }
}
