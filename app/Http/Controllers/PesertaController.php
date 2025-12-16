<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use Illuminate\Http\Request;

class PesertaController extends Controller
{
    /**
     * Menampilkan data peserta (Admin & Staff)
     */
    public function index()
    {
        $peserta = Peserta::paginate(10);
        return view('admin.peserta.index', compact('peserta'));
    }

    /**
     * Form pendaftaran peserta (Guest)
     */
    public function create()
    {
        return view('guest.peserta.create');
    }

    /**
     * Simpan data peserta (Guest)
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama'   => 'required',
            'email'  => 'required|email',
            'no_hp'  => 'required',
            'event'  => 'required',
        ]);

        Peserta::create($request->all());

        return redirect()->back()->with('success', 'Pendaftaran berhasil');
    }

    /**
     * Detail peserta (opsional)
     */
    public function show($id)
    {
        $peserta = Peserta::findOrFail($id);
        return view('admin.peserta.show', compact('peserta'));
    }

    /**
     * Form edit peserta (Admin & Staff)
     */
    public function edit($id)
    {
        $peserta = Peserta::findOrFail($id);
        return view('admin.peserta.edit', compact('peserta'));
    }

    /**
     * Update data peserta (Admin & Staff)
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama'  => 'required',
            'email' => 'required|email',
            'no_hp' => 'required',
            'event' => 'required',
        ]);

        Peserta::findOrFail($id)->update($request->all());

        return redirect()->route('peserta.index')
                         ->with('success', 'Data peserta berhasil diperbarui');
    }

    /**
     * Hapus data peserta (Admin only)
     */
    public function destroy($id)
    {
        Peserta::destroy($id);
        return redirect()->route('peserta.index')
                         ->with('success', 'Data peserta berhasil dihapus');
    }
}