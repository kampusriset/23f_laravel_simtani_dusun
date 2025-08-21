@csrf

<div class="mb-3">
    <label>Jadwal Tanam</label>
    <select name="tanam_id" class="form-control" required>
        @foreach($jadwal as $j)
            <option value="{{ $j->id_tanam }}"
                {{ old('tanam_id', $panen->tanam_id ?? '') == $j->id_tanam ? 'selected' : '' }}>
                {{ $j->anggota->nama_lengkap }} - {{ $j->komoditas->nama_komoditas }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label>Tanggal Mulai Panen</label>
    <input type="date" name="tgl_mulai_panen" class="form-control"
        value="{{ old('tgl_mulai_panen', $panen->tgl_mulai_panen ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Tanggal Selesai Panen</label>
    <input type="date" name="tgl_selesai_panen" class="form-control"
        value="{{ old('tgl_selesai_panen', $panen->tgl_selesai_panen ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Total Hasil Panen (kg)</label>
    <input type="number" step="0.01" name="hasil_panen_kg" class="form-control"
        value="{{ old('hasil_panen_kg', $panen->hasil_panen_kg ?? '') }}" required>
</div>

<button type="submit" class="btn btn-primary">Simpan</button>
<a href="{{ route('hasil-panen.index') }}" class="btn btn-secondary">Kembali</a>
