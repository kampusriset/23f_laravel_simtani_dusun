<?php

namespace App\Http\Controllers;

use App\Models\JadwalTanam;
use App\Models\Anggota;
use App\Models\Komoditas;
use Illuminate\Http\Request;


class KomoditasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $komoditas = Komoditas::all();
        return view('komoditas.index', compact('komoditas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('komoditas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_komoditas' => 'required',
            'varietas' => 'required',
        ]);

        Komoditas::create($request->all());

        return redirect()->route('komoditas.index')->with('success', 'Data berhasil disimpan.');
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
        $komoditas = Komoditas::findOrFail($id);
        return view('komoditas.edit', compact('komoditas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_komoditas' => 'required',
            'varietas' => 'required',
        ]);

        $komoditas = Komoditas::findOrFail($id);
        $komoditas->update($request->all());

        return redirect()->route('komoditas.index')->with('success', 'Data berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $komoditas = Komoditas::findOrFail($id);
        $komoditas->delete();

        return redirect()->route('komoditas.index')->with('success', 'Data dihapus.');
    }
}
