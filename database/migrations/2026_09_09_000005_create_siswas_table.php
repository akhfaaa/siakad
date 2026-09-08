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
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->string('nisn', 10)->unique();
            $table->string('nis', 10)->unique();
            $table->string('nama_lengkap');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->foreignId('rombel_id')->nullable()->constrained('rombels')->nullOnDelete();
            // Catatan: Kolom relasi ke tabel Kelas/Rombel akan kita tambahkan di tahap selanjutnya
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('siswas', function (Blueprint $table) {
            $table->dropForeign(['rombel_id']);
            $table->dropColumn('rombel_id');
        });
    }
};
