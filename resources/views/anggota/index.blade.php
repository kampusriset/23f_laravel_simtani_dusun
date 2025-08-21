@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Anggota Kelompok Tani</h2>
    <a href="{{ route('anggota.create') }}" class="btn btn-success mb-3">+ Tambah Anggota</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Gender</th>
                <th>Jabatan</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($anggota as $a)
            <tr>
                <td>{{ $a->id_anggota }}</td>
                <td>{{ $a->nama_lengkap }}</td>
                <td>{{ $a->username }}</td>
                <td>{{ $a->gender }}</td>
                <td>{{ $a->jabatan }}</td>
                <td>{{ $a->is_active == '1' ? 'Aktif' : 'Nonaktif' }}</td>
                <td>
                    <a href="{{ route('anggota.edit', $a->id_anggota) }}" class="btn btn-sm btn-primary">Edit</a>
                    <form action="{{ route('anggota.destroy', $a->id_anggota) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Yakin ingin hapus?')" class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
