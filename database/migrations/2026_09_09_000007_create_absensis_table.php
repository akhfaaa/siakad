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
        Schema::create('absensis', function (Blueprint $table) {
            $table->id();
            // Relasi ke siswa yang melakukan absen
            $table->foreignId('siswa_id')->constrained('siswas')->cascadeOnDelete();

            $table->date('tanggal');
            $table->time('waktu_masuk')->nullable();
            $table->time('waktu_pulang')->nullable();

            // Status standar presensi sekolah
            $table->enum('status', ['Hadir', 'Sakit', 'Izin', 'Alpha']);
            $table->string('keterangan')->nullable(); // Untuk link surat sakit/alasan izin

            $table->timestamps();

            // KUNCI DATABASE: Kombinasi siswa dan tanggal tidak boleh ada yang sama.
            // Ini memastikan siswa tidak bisa absen 2 kali di hari yang sama.
            $table->unique(['siswa_id', 'tanggal']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absensis');
    }
};
