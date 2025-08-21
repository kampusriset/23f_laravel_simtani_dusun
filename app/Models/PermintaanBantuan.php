<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PermintaanBantuan extends Model
{

    protected $table = 'permintaan_bantuan';

    protected $fillable = [
        'anggota_id', 'judul', 'kategori', 'deskripsi', 'status'
    ];

    public function anggota()
    {
        return $this->belongsTo(Anggota::class, 'anggota_id');
    }
}


