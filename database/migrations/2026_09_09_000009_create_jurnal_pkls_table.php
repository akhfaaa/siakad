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
        Schema::create('jurnal_pkls', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_id')->constrained('siswas')->cascadeOnDelete();
            $table->foreignId('mitra_dudi_id')->constrained('mitra_dudis')->cascadeOnDelete();

            // Guru yang memantau dan memvalidasi jurnal
            $table->foreignId('guru_pembimbing_id')->constrained('pegawais')->cascadeOnDelete();

            $table->date('tanggal');
            $table->string('waktu_mulai', 5)->nullable(); // cth: 08:00
            $table->string('waktu_selesai', 5)->nullable(); // cth: 16:00

            $table->text('deskripsi_kegiatan');
            $table->string('foto_dokumentasi')->nullable(); // Path gambar yang diupload

            // Alur validasi: Siswa mengisi (Menunggu) -> Guru menyetujui (Disetujui) atau menolak (Revisi)
            $table->enum('status_validasi', ['Menunggu', 'Disetujui', 'Revisi'])->default('Menunggu');
            $table->text('catatan_guru')->nullable(); // Pesan dari guru jika perlu revisi

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jurnal_pkls');
    }
};
