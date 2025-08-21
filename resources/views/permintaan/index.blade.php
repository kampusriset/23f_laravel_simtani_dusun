@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Permintaan Bantuan Petani</h3>
    <a href="{{ route('permintaan.create') }}" class="btn btn-success mb-3">+ Ajukan Permintaan</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Petani</th>
                <th>Judul</th>
                <th>Kategori</th>
                <th>Status</th> <!-- Ini jadi dropdown -->
                <th>Dibuat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($permintaan as $p)
                <tr>
                    <td>{{ $p->anggota->nama_lengkap ?? '-' }}</td>
                    <td>{{ $p->judul }}</td>
                    <td>{{ ucfirst($p->kategori) }}</td>
                    <td>
                        <form action="{{ route('permintaan.updateStatus', $p->id) }}" method="POST">
                            @csrf
                            <select name="status" onchange="this.form.submit()" class="form-select form-select-sm">
                                @foreach(['diajukan', 'diproses', 'disetujui', 'ditolak'] as $status)
                                    <option value="{{ $status }}" {{ $p->status == $status ? 'selected' : '' }}>
                                        {{ ucfirst($status) }}
                                    </option>
                                @endforeach
                            </select>
                        </form>
                    </td>
                    <td>{{ $p->created_at->format('d/m/Y') }}</td>
                    <td>
                        <a href="{{ route('permintaan.edit', $p->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('permintaan.destroy', $p->id) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button onclick="return confirm('Hapus permintaan ini?')" class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
