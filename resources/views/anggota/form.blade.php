@csrf

<div class="mb-3">
    <label>Nama Lengkap</label>
    <input type="text" name="nama_lengkap" class="form-control" value="{{ old('nama_lengkap', $anggota->nama_lengkap ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Username</label>
    <input type="text" name="username" class="form-control" value="{{ old('username', $anggota->username ?? '') }}" required>
</div>

@if(!isset($anggota))
<div class="mb-3">
    <label>Password</label>
    <input type="password" name="password" class="form-control" required>
</div>
@endif

<div class="mb-3">
    <label>Jenis Kelamin</label>
    <select name="gender" class="form-control" required>
        <option value="M" {{ (old('gender', $anggota->gender ?? '') == 'M') ? 'selected' : '' }}>Laki-laki</option>
        <option value="F" {{ (old('gender', $anggota->gender ?? '') == 'F') ? 'selected' : '' }}>Perempuan</option>
    </select>
</div>

<div class="mb-3">
    <label>Jabatan</label>
    <input type="text" name="jabatan" class="form-control" value="{{ old('jabatan', $anggota->jabatan ?? '') }}">
</div>

<div class="mb-3">
    <label>Status</label>
    <select name="is_active" class="form-control" required>
        <option value="1" {{ (old('is_active', $anggota->is_active ?? '') == '1') ? 'selected' : '' }}>Aktif</option>
        <option value="0" {{ (old('is_active', $anggota->is_active ?? '') == '0') ? 'selected' : '' }}>Nonaktif</option>
    </select>
</div>

<button type="submit" class="btn btn-primary">Simpan</button>
<a href="{{ route('anggota.index') }}" class="btn btn-secondary">Kembali</a>
