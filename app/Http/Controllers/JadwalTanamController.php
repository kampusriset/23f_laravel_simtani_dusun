<?php

namespace App\Http\Controllers;

use App\Models\JadwalTanam;
use App\Models\Anggota;
use App\Models\Komoditas;
use Illuminate\Http\Request;

class JadwalTanamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $jadwal = JadwalTanam::with('anggota', 'komoditas')->get();
        return view('jadwal_tanam.index', compact('jadwal'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $anggota = Anggota::all();
        $komoditas = Komoditas::all();
        return view('jadwal_tanam.create', compact('anggota', 'komoditas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'anggota_id' => 'required',
            'komoditas_id' => 'required',
            'luas_lahan_ha' => 'required|numeric',
            'tgl_mulai_tanam' => 'required|date',
            'tgl_selesai_tanam' => 'required|date',
            'rencana_panen' => 'required|date',
            // pelatihan opsional
        ]);

        $tanam = JadwalTanam::create($validated + ['is_finish' => '0']);

        // jika ada pelatihan
        if ($request->tema && $request->tanggal) {
            $tanam->pelatihan()->create([
                'tema' => $request->tema,
                'lokasi' => $request->lokasi,
                'tanggal' => $request->tanggal,
            ]);
        }

        return redirect()->route('jadwal-tanam.index')->with('success', 'Data berhasil disimpan.');
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
         $jadwal = JadwalTanam::findOrFail($id);
        $anggota = Anggota::all();
        $komoditas = Komoditas::all();
        return view('jadwal_tanam.edit', compact('jadwal', 'anggota', 'komoditas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $tanam = JadwalTanam::findOrFail($id);

        $validated = $request->validate([
            'anggota_id' => 'required',
            'komoditas_id' => 'required',
            'luas_lahan_ha' => 'required|numeric',
            'tgl_mulai_tanam' => 'required|date',
            'tgl_selesai_tanam' => 'required|date',
            'rencana_panen' => 'required|date',
        ]);

        $tanam->update($validated);

        // update atau buat pelatihan
        if ($request->tema && $request->tanggal) {
            $tanam->pelatihan()->updateOrCreate(
                ['tanam_id' => $tanam->id_tanam],
                ['tema' => $request->tema, 'lokasi' => $request->lokasi, 'tanggal' => $request->tanggal]
            );
        }

        return redirect()->route('jadwal-tanam.index')->with('success', 'Data berhasil diperbarui.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $jadwal = JadwalTanam::findOrFail($id);
        $jadwal->delete();
        return redirect()->route('jadwal-tanam.index')->with('success', 'Jadwal berhasil dihapus.');
    }
}
