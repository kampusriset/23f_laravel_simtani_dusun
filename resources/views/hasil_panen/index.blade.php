@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Data Hasil Panen</h2>
    <a href="{{ route('hasil-panen.create') }}" class="btn btn-success mb-3">+ Tambah Data</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Petani</th>
                <th>Komoditas</th>
                <th>Panen (kg)</th>
                <th>Produktivitas (kg/ha)</th>
                <th>Periode</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($panen as $p)
            <tr>
                <td>{{ $p->jadwalTanam->anggota->nama_lengkap }}</td>
                <td>{{ $p->jadwalTanam->komoditas->nama_komoditas }}</td>
                <td>{{ $p->hasil_panen_kg }}</td>
                <td>{{ $p->produktivitas_kg_per_ha }}</td>
                <td>{{ $p->tgl_mulai_panen }} s/d {{ $p->tgl_selesai_panen }}</td>
                <td>
                    <a href="{{ route('hasil-panen.edit', $p->id_panen) }}" class="btn btn-sm btn-primary">Edit</a>
                    <form action="{{ route('hasil-panen.destroy', $p->id_panen) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus data ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
