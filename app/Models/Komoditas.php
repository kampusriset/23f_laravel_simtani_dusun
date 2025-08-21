<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Komoditas extends Model
{
     protected $table = 'komoditas';
    protected $primaryKey = 'id_komoditas';
    public $timestamps = false;

    protected $fillable = [
        'nama_komoditas', 'varietas', 'is_active'
    ];
}
