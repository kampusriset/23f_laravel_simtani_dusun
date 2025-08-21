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
        Schema::create('permintaan_bantuan', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('anggota_id');
            $table->string('judul');
            $table->enum('kategori', ['pupuk', 'alat', 'bibit', 'pelatihan', 'lainnya']);
            $table->text('deskripsi');
            $table->enum('status', ['diajukan', 'diproses', 'disetujui', 'ditolak'])->default('diajukan');
            $table->timestamps();

            $table->foreign('anggota_id')->references('id_anggota')->on('anggota')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permintaan_bantuan');
    }
};
