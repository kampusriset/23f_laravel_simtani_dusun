<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HasilPanen extends Model
{
   protected $table = 'hasil_panen';
    protected $primaryKey = 'id_panen';
    public $timestamps = false;

    protected $fillable = [
        'tanam_id', 'tgl_mulai_panen', 'tgl_selesai_panen',
        'hasil_panen_kg', 'produktivitas_kg_per_ha'
    ];

    public function jadwalTanam()
    {
        return $this->belongsTo(JadwalTanam::class, 'tanam_id');
    }
}
