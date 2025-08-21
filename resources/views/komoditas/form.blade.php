@csrf

<div class="mb-3">
    <label>Nama Komoditas</label>
    <input type="text" name="nama_komoditas" class="form-control" value="{{ old('nama_komoditas', $komoditas->nama_komoditas ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Varietas</label>
    <input type="text" name="varietas" class="form-control" value="{{ old('varietas', $komoditas->varietas ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Status</label>
    <select name="is_active" class="form-control">
        <option value="1" {{ (old('is_active', $komoditas->is_active ?? '') == '1') ? 'selected' : '' }}>Aktif</option>
        <option value="0" {{ (old('is_active', $komoditas->is_active ?? '') == '0') ? 'selected' : '' }}>Nonaktif</option>
    </select>
</div>

<button type="submit" class="btn btn-primary">Simpan</button>
<a href="{{ route('komoditas.index') }}" class="btn btn-secondary">Kembali</a>
