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
        Schema::create('nilais', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_id')->constrained('siswas')->cascadeOnDelete();
            $table->foreignId('mata_pelajaran_id')->constrained('mata_pelajarans')->cascadeOnDelete();

            // Menyimpan NIP/ID Guru yang menginput nilai
            $table->foreignId('guru_id')->constrained('pegawais')->cascadeOnDelete();

            $table->string('tahun_ajaran', 10); // Contoh: 2026/2027
            $table->enum('semester', ['Ganjil', 'Genap']);

            // Komponen Penilaian (Maksimal nilai 100.00)
            $table->decimal('nilai_tugas', 5, 2)->default(0);
            $table->decimal('nilai_uts', 5, 2)->default(0);
            $table->decimal('nilai_uas', 5, 2)->default(0);
            $table->decimal('nilai_praktik', 5, 2)->default(0); // Khusus kejuruan

            // Nilai Akhir (Akumulasi otomatis)
            $table->decimal('nilai_akhir', 5, 2)->default(0);

            $table->timestamps();

            // KUNCI DATABASE: 1 Siswa hanya memiliki 1 set nilai per Mata Pelajaran di 1 Semester
            // Mencegah guru memasukkan data ganda tanpa sengaja
            $table->unique(['siswa_id', 'mata_pelajaran_id', 'tahun_ajaran', 'semester'], 'nilai_unique_index');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilais');
    }
};
