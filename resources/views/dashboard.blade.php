@extends('layouts.app')

@section('content')
<h2>Selamat datang di SimTaniDusun 🤙😛</h2>
<p>Berikut adalah ringkasan informasi aplikasi:</p>

<div class="row mt-4">
    <div class="col-md-3">
        <div class="card border-success mb-3">
            <div class="card-header bg-success text-white">Anggota</div>
            <div class="card-body">
                <h4 class="card-title">{{ $totalAnggota }}</h4>
                <p class="card-text">Total anggota kelompok tani</p>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card border-info mb-3">
            <div class="card-header bg-info text-white">Komoditas</div>
            <div class="card-body">
                <h4 class="card-title">{{ $totalKomoditas }}</h4>
                <p class="card-text">Jenis komoditas terdaftar</p>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card border-warning mb-3">
            <div class="card-header bg-warning text-white">Jadwal Aktif</div>
            <div class="card-body">
                <h4 class="card-title">{{ $totalJadwalAktif }}</h4>
                <p class="card-text">Sedang berlangsung</p>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card border-danger mb-3">
            <div class="card-header bg-danger text-white">Total Panen</div>
            <div class="card-body">
                <h4 class="card-title">{{ number_format($totalPanen, 2) }} kg</h4>
                <p class="card-text">Semua panen terdata</p>
            </div>
        </div>
    </div>
</div>
@endsection
