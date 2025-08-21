@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Komoditas</h2>
    <a href="{{ route('komoditas.create') }}" class="btn btn-success mb-3">+ Tambah Komoditas</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Komoditas</th>
                <th>Varietas</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($komoditas as $k)
            <tr>
                <td>{{ $k->id_komoditas }}</td>
                <td>{{ $k->nama_komoditas }}</td>
                <td>{{ $k->varietas }}</td>
                <td>{{ $k->is_active == '1' ? 'Aktif' : 'Nonaktif' }}</td>
                <td>
                    <a href="{{ route('komoditas.edit', $k->id_komoditas) }}" class="btn btn-sm btn-primary">Edit</a>
                    <form action="{{ route('komoditas.destroy', $k->id_komoditas) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Hapus data ini?')" class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
