<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JadwalTanam extends Model
{
   protected $table = 'jadwal_tanam';
    protected $primaryKey = 'id_tanam';
    public $timestamps = false;

    protected $fillable = [
        'anggota_id', 'komoditas_id', 'luas_lahan_ha',
        'tgl_mulai_tanam', 'tgl_selesai_tanam', 'rencana_panen', 'is_finish'
    ];

    // Relasi
    public function anggota()
    {
        return $this->belongsTo(Anggota::class, 'anggota_id');
    }

    public function komoditas()
    {
        return $this->belongsTo(Komoditas::class, 'komoditas_id');
    }
    
    public function pelatihan()
    {
        return $this->hasOne(JadwalPelatihan::class, 'tanam_id');
    }

}
