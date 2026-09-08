<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('rombels', function (Blueprint $table) {
            $table->id();
            $table->string('nama_rombel'); // Contoh: X TKJ 1
            $table->integer('tingkat'); // Contoh: 10, 11, 12

            // Relasi ke Jurusan
            $table->foreignId('jurusan_id')->constrained('jurusans')->cascadeOnDelete();

            // Relasi ke Guru untuk jabatan Wali Kelas
            $table->foreignId('wali_kelas_id')->nullable()->constrained('gurus')->nullOnDelete();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rombels');
    }
};
