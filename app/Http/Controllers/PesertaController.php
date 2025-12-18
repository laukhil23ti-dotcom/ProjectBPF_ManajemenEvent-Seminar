<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use Illuminate\Http\Request;

class PesertaController extends Controller
{
    // READ
    public function index(Request $request)
    {
        $query = Peserta::query();

        if ($request->search) {
            $query->where('nama', 'like', '%'.$request->search.'%')
                  ->orWhere('email', 'like', '%'.$request->search.'%');
        }

        $peserta = $query->paginate(10);

        return view('admin.peserta.index', compact('peserta'));
    }

    // CREATE FORM
    public function create()
    {
        return view('admin.peserta.create');
    }

    // STORE
    public function store(Request $request)
    {
        $request->validate([
            'nama'     => 'required',
            'email'    => 'required|email',
            'no_hp'    => 'required',
            'event_id' => 'required',
        ]);

        Peserta::create($request->all());

        return redirect()->route('peserta.index')
            ->with('success', 'Peserta berhasil ditambahkan');
    }

    // EDIT FORM
    public function edit($id)
    {
        $peserta = Peserta::findOrFail($id);
        return view('admin.peserta.edit', compact('peserta'));
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama'     => 'required',
            'email'    => 'required|email',
            'no_hp'    => 'required',
            'event_id' => 'required',
        ]);

        Peserta::findOrFail($id)->update($request->all());

        return redirect()->route('peserta.index')
            ->with('success', 'Data peserta berhasil diperbarui');
    }

    // DELETE
    public function destroy($id)
    {
        Peserta::destroy($id);

        return redirect()->route('peserta.index')
            ->with('success', 'Data peserta berhasil dihapus');
    }
}
