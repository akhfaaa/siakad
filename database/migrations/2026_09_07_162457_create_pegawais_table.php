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
        Schema::create('pegawais', function (Blueprint $table) {
            $table->id();
            // Menghubungkan profil ini langsung ke akun login
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->string('nip', 18)->unique()->nullable();
            $table->string('nama_lengkap');
            $table->string('jabatan_struktural')->nullable(); // cth: Kepala Sekolah, Staf TU Administrasi
            $table->string('spesialisasi_ilmu')->nullable(); // cth: Teknik Komputer Jaringan, Matematika
            $table->string('no_telepon', 20)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawais');
    }
};
