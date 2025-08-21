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
        Schema::create('hasil_panen', function (Blueprint $table) {
        $table->bigIncrements('id_panen');
        $table->unsignedBigInteger('tanam_id');
        $table->date('tgl_mulai_panen');
        $table->date('tgl_selesai_panen');
        $table->float('hasil_panen_kg');
        $table->float('produktivitas_kg_per_ha');
        $table->timestamp('created_at')->useCurrent();

        $table->foreign('tanam_id')->references('id_tanam')->on('jadwal_tanam')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hasil_panens');
    }
};
