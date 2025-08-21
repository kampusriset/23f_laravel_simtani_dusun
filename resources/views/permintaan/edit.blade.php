@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Edit Permintaan Bantuan</h3>

    <form action="{{ route('permintaan.update', $permintaan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Petani</label>
            <select name="anggota_id" class="form-control" required>
                @foreach($anggota as $a)
                    <option value="{{ $a->id_anggota }}"
                        {{ old('anggota_id', $permintaan->anggota_id) == $a->id_anggota ? 'selected' : '' }}>
                        {{ $a->nama_lengkap }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Judul Permintaan</label>
            <input type="text" name="judul" class="form-control"
                value="{{ old('judul', $permintaan->judul) }}">
        </div>

        <div class="mb-3">
            <label>Kategori</label>
            <select name="kategori" class="form-control">
                @foreach(['pupuk', 'alat', 'bibit', 'pelatihan', 'lainnya'] as $kategori)
                    <option value="{{ $kategori }}"
                        {{ old('kategori', $permintaan->kategori) == $kategori ? 'selected' : '' }}>
                        {{ ucfirst($kategori) }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Deskripsi Permintaan</label>
            <textarea name="deskripsi" class="form-control" rows="4">{{ old('deskripsi', $permintaan->deskripsi) }}</textarea>
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('permintaan.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
