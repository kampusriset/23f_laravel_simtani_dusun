<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnggotaController;
use App\Models\Anggota;
use App\Models\Komoditas;
use App\Models\JadwalTanam;
use App\Models\HasilPanen;
use App\Http\Controllers\PermintaanBantuanController;
use App\Http\Controllers\RegisterController;

Route::get('/', function () {
    return view('auth.login');
});



Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);


Route::get('/dashboard', function () {
    $totalAnggota = Anggota::count();
    $totalKomoditas = Komoditas::count();
    $totalJadwalAktif = JadwalTanam::where('is_finish', '0')->count();
    $totalPanen = HasilPanen::sum('hasil_panen_kg');

    return view('dashboard', compact(
        'totalAnggota',
        'totalKomoditas',
        'totalJadwalAktif',
        'totalPanen'
    ));
})->name('dashboard');


Route::resource('anggota', AnggotaController::class);

use App\Http\Controllers\KomoditasController;
Route::resource('komoditas', KomoditasController::class);

use App\Http\Controllers\JadwalTanamController;
Route::resource('jadwal-tanam', JadwalTanamController::class);

use App\Http\Controllers\HasilPanenController;
Route::resource('hasil-panen', HasilPanenController::class);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('permintaan', \App\Http\Controllers\PermintaanBantuanController::class)->middleware('auth');
Route::post('permintaan/{id}/update-status', [PermintaanBantuanController::class, 'updateStatus'])->name('permintaan.updateStatus')->middleware('auth');




require __DIR__.'/auth.php';
