@csrf

<!-- Jadwal Tanam -->
<div class="mb-3">
    <label>Anggota</label>
    <select name="anggota_id" class="form-control" required>
        @foreach($anggota as $a)
            <option value="{{ $a->id_anggota }}" {{ old('anggota_id', $tanam->anggota_id ?? '') == $a->id_anggota ? 'selected' : '' }}>
                {{ $a->nama_lengkap }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label>Komoditas</label>
    <select name="komoditas_id" class="form-control" required>
        @foreach($komoditas as $k)
            <option value="{{ $k->id_komoditas }}" {{ old('komoditas_id', $tanam->komoditas_id ?? '') == $k->id_komoditas ? 'selected' : '' }}>
                {{ $k->nama_komoditas }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label>Luas Lahan (ha)</label>
    <input type="number" step="0.01" name="luas_lahan_ha" class="form-control"
        value="{{ old('luas_lahan_ha', $tanam->luas_lahan_ha ?? '') }}" required>
</div>

<div class="row">
    <div class="col-md-4 mb-3">
        <label>Mulai Tanam</label>
        <input type="date" name="tgl_mulai_tanam" class="form-control"
            value="{{ old('tgl_mulai_tanam', $tanam->tgl_mulai_tanam ?? '') }}" required>
    </div>
    <div class="col-md-4 mb-3">
        <label>Selesai Tanam</label>
        <input type="date" name="tgl_selesai_tanam" class="form-control"
            value="{{ old('tgl_selesai_tanam', $tanam->tgl_selesai_tanam ?? '') }}" required>
    </div>
    <div class="col-md-4 mb-3">
        <label>Rencana Panen</label>
        <input type="date" name="rencana_panen" class="form-control"
            value="{{ old('rencana_panen', $tanam->rencana_panen ?? '') }}" required>
    </div>
</div>

<hr>
<h5>📚 Jadwal Pelatihan Petani</h5>

<div class="mb-3">
    <label>Tema Pelatihan</label>
    <input type="text" name="tema" class="form-control"
        value="{{ old('tema', $tanam->pelatihan->tema ?? '') }}">
</div>

<div class="mb-3">
    <label>Lokasi</label>
    <input type="text" name="lokasi" class="form-control"
        value="{{ old('lokasi', $tanam->pelatihan->lokasi ?? '') }}">
</div>

<div class="mb-3">
    <label>Tanggal Pelatihan</label>
    <input type="date" name="tanggal" class="form-control"
        value="{{ old('tanggal', $tanam->pelatihan->tanggal ?? '') }}">
</div>

<button type="submit" class="btn btn-primary">Simpan</button>
<a href="{{ route('jadwal-tanam.index') }}" class="btn btn-secondary">Kembali</a>
