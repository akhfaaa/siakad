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
        Schema::create('rombels', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kelas'); // Contoh: X RPL 1, XII TKRO 2
            $table->enum('tingkat', ['X', 'XI', 'XII', 'XIII']); // SMK ada yang 4 tahun (XIII)
            $table->string('tahun_ajaran', 10); // Contoh: 2026/2027

            $table->foreignId('jurusan_id')->constrained('jurusans')->cascadeOnDelete();
            // Relasi ke tabel pegawais sebagai Wali Kelas
            $table->foreignId('wali_kelas_id')->nullable()->constrained('pegawais')->nullOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rombels');
    }
};
