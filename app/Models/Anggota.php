<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    protected $table = 'anggota';  // karena default Laravel pakai 'anggotas'
    protected $primaryKey = 'id_anggota';
    public $timestamps = false; // karena kita hanya pakai 'created_at'

    protected $fillable = [
        'username', 'password', 'is_active', 'nama_lengkap', 'gender', 'jabatan'
    ];
}
