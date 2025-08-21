<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jadwal_tanam', function (Blueprint $table) {
        $table->bigIncrements('id_tanam');
        $table->unsignedInteger('anggota_id');
        $table->unsignedInteger('komoditas_id');
        $table->float('luas_lahan_ha');
        $table->date('tgl_mulai_tanam');
        $table->date('tgl_selesai_tanam');
        $table->date('rencana_panen');
        $table->enum('is_finish', ['0', '1'])->default('0');
        $table->timestamp('created_at')->useCurrent();

        // foreign keys
        $table->foreign('anggota_id')->references('id_anggota')->on('anggota')->onDelete('cascade');
        $table->foreign('komoditas_id')->references('id_komoditas')->on('komoditas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_tanams');
    }
};
