<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use App\Models\Event;
use Illuminate\Http\Request;

class PesertaController extends Controller
{

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

    public function create()
    {
        $this->onlyAdmin();

        $events = Event::all();
        return view('peserta.daftar', compact('events'));
    }

    public function store(Request $request)
    {
        $this->onlyAdmin();

        $request->validate([
            'nama'     => 'required',
            'email'    => 'required|email',
            'no_hp'    => 'required',
            'alamat'   => 'nullable',
            'event_id' => 'required|exists:events,id',
        ]);

        Peserta::create($request->all());

        return redirect()
            ->route('peserta.index')
            ->with('success', 'Peserta berhasil ditambahkan');
    }

    public function edit($id)
    {
        $this->onlyAdmin();

        $peserta = Peserta::findOrFail($id);
        $events = Event::all();

        return view('admin.peserta.edit', compact('peserta', 'events'));
    }

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
        $peserta->update($request->all());

        return redirect()
            ->route('peserta.index')
            ->with('success', 'Data peserta berhasil diperbarui');
    }

    public function destroy($id)
    {
        $this->onlyAdmin();

        $peserta = Peserta::findOrFail($id);
        $peserta->delete();

        return redirect()
            ->route('peserta.index')
            ->with('success', 'Peserta berhasil dihapus');
    }

    private function onlyAdmin()
    {
        if (!auth()->check() || auth()->user()->role !== 'admin') {
            abort(403, 'Akses ditolak');
        }
    }
}
