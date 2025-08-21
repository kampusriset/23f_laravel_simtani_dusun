@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Jadwal Tanam</h2>
    <a href="{{ route('jadwal-tanam.create') }}" class="btn btn-success mb-3">+ Tambah Jadwal</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Petani</th>
                <th>Komoditas</th>
                <th>Luas (Ha)</th>
                <th>Mulai</th>
                <th>Selesai</th>
                <th>Panen</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($jadwal as $j)
            <tr>
                <td>{{ $j->anggota->nama_lengkap }}</td>
                <td>{{ $j->komoditas->nama_komoditas }}</td>
                <td>{{ $j->luas_lahan_ha }}</td>
                <td>{{ $j->tgl_mulai_tanam }}</td>
                <td>{{ $j->tgl_selesai_tanam }}</td>
                <td>{{ $j->rencana_panen }}</td>
                <td>
                    @if($j->pelatihan)
                        <strong>{{ $j->pelatihan->tema }}</strong><br>
                        {{ $j->pelatihan->tanggal }} - {{ $j->pelatihan->lokasi }}
                    @else
                        <em>Belum dijadwalkan</em>
                    @endif
                </td>
                <td>{{ $j->is_finish == '1' ? 'Selesai' : 'Berjalan' }}</td>
                <td>
                    <a href="{{ route('jadwal-tanam.edit', $j->id_tanam) }}" class="btn btn-sm btn-primary">Edit</a>
                    <form action="{{ route('jadwal-tanam.destroy', $j->id_tanam) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
