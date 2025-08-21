<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HasilPanen;
use App\Models\JadwalTanam;

class HasilPanenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $panen = HasilPanen::with('jadwalTanam.anggota', 'jadwalTanam.komoditas')->get();
        return view('hasil_panen.index', compact('panen'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         $jadwal = JadwalTanam::with('anggota', 'komoditas')->get();
        return view('hasil_panen.create', compact('jadwal'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'tanam_id' => 'required',
            'tgl_mulai_panen' => 'required|date',
            'tgl_selesai_panen' => 'required|date',
            'hasil_panen_kg' => 'required|numeric',
        ]);

        $jadwal = JadwalTanam::findOrFail($request->tanam_id);
        $luas = $jadwal->luas_lahan_ha;
        $produktivitas = $luas > 0 ? $request->hasil_panen_kg / $luas : 0;

        HasilPanen::create([
            'tanam_id' => $request->tanam_id,
            'tgl_mulai_panen' => $request->tgl_mulai_panen,
            'tgl_selesai_panen' => $request->tgl_selesai_panen,
            'hasil_panen_kg' => $request->hasil_panen_kg,
            'produktivitas_kg_per_ha' => $produktivitas,
        ]);

        return redirect()->route('hasil-panen.index')->with('success', 'Data hasil panen berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $panen = HasilPanen::findOrFail($id);
        $jadwal = JadwalTanam::with('anggota', 'komoditas')->get();
        return view('hasil_panen.edit', compact('panen', 'jadwal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
      $request->validate([
            'tanam_id' => 'required',
            'tgl_mulai_panen' => 'required|date',
            'tgl_selesai_panen' => 'required|date',
            'hasil_panen_kg' => 'required|numeric',
        ]);

        $jadwal = JadwalTanam::findOrFail($request->tanam_id);
        $luas = $jadwal->luas_lahan_ha;
        $produktivitas = $luas > 0 ? $request->hasil_panen_kg / $luas : 0;

        $panen = HasilPanen::findOrFail($id);
        $panen->update([
            'tanam_id' => $request->tanam_id,
            'tgl_mulai_panen' => $request->tgl_mulai_panen,
            'tgl_selesai_panen' => $request->tgl_selesai_panen,
            'hasil_panen_kg' => $request->hasil_panen_kg,
            'produktivitas_kg_per_ha' => $produktivitas,
        ]);

        return redirect()->route('hasil-panen.index')->with('success', 'Data berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $panen = HasilPanen::findOrFail($id);
        $panen->delete();
        return redirect()->route('hasil-panen.index')->with('success', 'Data berhasil dihapus.');
    }
}
