<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PermintaanBantuan;
use App\Models\Anggota;

class PermintaanBantuanController extends Controller
{
    public function index()
    {
        $permintaan = PermintaanBantuan::with('anggota')->latest()->get();
        return view('permintaan.index', compact('permintaan'));
    }

    public function create()
    {
        $anggota = Anggota::all();
        return view('permintaan.create', compact('anggota'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'anggota_id' => 'required',
            'judul' => 'required',
            'kategori' => 'required',
            'deskripsi' => 'required'
        ]);

        PermintaanBantuan::create($request->all());
        return redirect()->route('permintaan.index')->with('success', 'Permintaan berhasil diajukan');
    }

    public function edit($id)
    {
        $permintaan = PermintaanBantuan::findOrFail($id);
        $anggota = Anggota::all();
        return view('permintaan.edit', compact('permintaan', 'anggota'));
    }

    public function update(Request $request, $id)
    {
        $permintaan = PermintaanBantuan::findOrFail($id);
        $permintaan->update($request->all());
        return redirect()->route('permintaan.index')->with('success', 'Permintaan berhasil diperbarui');
    }

    public function destroy($id)
    {
        PermintaanBantuan::destroy($id);
        return redirect()->route('permintaan.index')->with('success', 'Permintaan berhasil dihapus');
    }
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:diajukan,diproses,disetujui,ditolak',
        ]);

        $permintaan = PermintaanBantuan::findOrFail($id);
        $permintaan->status = $request->status;
        $permintaan->save();

        return redirect()->route('permintaan.index')->with('success', 'Status permintaan berhasil diubah');
    }

}
