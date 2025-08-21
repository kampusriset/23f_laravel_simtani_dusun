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
        Schema::create('jadwal_pelatihan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tanam_id'); // hubungan ke jadwal_tanam
            $table->string('tema');
            $table->string('lokasi');
            $table->date('tanggal');
            $table->timestamps();

            $table->foreign('tanam_id')->references('id_tanam')->on('jadwal_tanam')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_pelatihan');
    }
};
