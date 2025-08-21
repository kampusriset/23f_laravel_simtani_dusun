@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Ajukan Permintaan Bantuan</h3>

    <form action="{{ route('permintaan.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Petani</label>
            <select name="anggota_id" class="form-control" required>
                @foreach($anggota as $a)
                    <option value="{{ $a->id_anggota }}">{{ $a->nama_lengkap }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Judul Permintaan</label>
            <input type="text" name="judul" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Kategori</label>
            <select name="kategori" class="form-control" required>
                <option value="pupuk">Pupuk</option>
                <option value="alat">Alat Pertanian</option>
                <option value="bibit">Bibit</option>
                <option value="pelatihan">Pelatihan</option>
                <option value="lainnya">Lainnya</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Deskripsi Permintaan</label>
            <textarea name="deskripsi" class="form-control" rows="4" required></textarea>
        </div>

        <button class="btn btn-primary">Ajukan</button>
        <a href="{{ route('permintaan.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
