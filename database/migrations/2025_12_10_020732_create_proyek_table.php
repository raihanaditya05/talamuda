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
   Schema::create('proyek', function (Blueprint $table) {
    $table->id('id_proyek');
    $table->string('nama_proyek');
    $table->string('klien');
    $table->string('lokasi');
    $table->date('tanggal_mulai');
    $table->date('tanggal_selesai')->nullable();
    $table->string('status');
    $table->bigInteger('anggaran');
    $table->timestamps();
});

    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proyek');
    }
};
