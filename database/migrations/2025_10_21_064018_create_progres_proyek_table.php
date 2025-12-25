<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('progres_proyek', function (Blueprint $table) {

            // PRIMARY KEY SENDIRI
            $table->bigIncrements('id_progresproyek');

            // RELASI LOGIS KE PROYEK (TANPA FK DATABASE)
            $table->unsignedBigInteger('id_proyek');

            $table->text('deskripsi')->nullable();
            $table->integer('persentase')->default(0);
            $table->string('foto')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('progres_proyek');
    }
};
