<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JadwalPelatihan extends Model
{
        protected $table = 'jadwal_pelatihan';

        protected $fillable = ['tanam_id', 'tema', 'lokasi', 'tanggal'];

        public function jadwalTanam()
        {
            return $this->belongsTo(JadwalTanam::class, 'tanam_id');
        }
}
