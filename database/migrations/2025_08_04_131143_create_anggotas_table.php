<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('anggota', function (Blueprint $table) {
        $table->increments('id_anggota');
        $table->string('username', 20)->unique();
        $table->string('password', 100);
        $table->enum('is_active', ['0', '1'])->default('1');
        $table->string('nama_lengkap', 50);
        $table->enum('gender', ['M', 'F']);
        $table->string('jabatan', 50)->nullable();
        $table->timestamp('created_at')->useCurrent();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anggotas');
    }
};
