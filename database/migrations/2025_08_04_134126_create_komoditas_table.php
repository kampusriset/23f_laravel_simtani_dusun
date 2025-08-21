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
        Schema::create('komoditas', function (Blueprint $table) {
        $table->increments('id_komoditas');
        $table->string('nama_komoditas', 50);
        $table->string('varietas', 100);
        $table->enum('is_active', ['0', '1'])->default('1');
        $table->timestamp('created_at')->useCurrent();

    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('komoditas');
    }
};
