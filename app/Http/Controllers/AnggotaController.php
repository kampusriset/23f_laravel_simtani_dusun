<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $anggota = Anggota::all();
    return view('anggota.index', compact('anggota'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('anggota.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    $request->validate([
        'username' => 'required|unique:anggota',
        'password' => 'required|min:4',
        'nama_lengkap' => 'required',
        'gender' => 'required',
    ]);

    Anggota::create([
        'username' => $request->username,
        'password' => Hash::make($request->password),
        'nama_lengkap' => $request->nama_lengkap,
        'gender' => $request->gender,
        'jabatan' => $request->jabatan,
        'is_active' => $request->is_active,
    ]);

    return redirect()->route('anggota.index')->with('success', 'Anggota berhasil ditambahkan.');
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
        $anggota = Anggota::findOrFail($id);
    return view('anggota.edit', compact('anggota'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
   {
    $anggota = Anggota::findOrFail($id);

    $request->validate([
        'username' => 'required|unique:anggota,username,' . $id . ',id_anggota',
        'nama_lengkap' => 'required',
        'gender' => 'required',
    ]);

    $anggota->update($request->except('password'));
    
    return redirect()->route('anggota.index')->with('success', 'Data berhasil diupdate.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    $anggota = Anggota::findOrFail($id);
    $anggota->delete();

    return redirect()->route('anggota.index')->with('success', 'Anggota dihapus.');
}
}
