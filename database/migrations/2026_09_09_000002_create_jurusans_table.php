<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('jurusans', function (Blueprint $table) {
            $table->id();
            $table->string('kode_jurusan', 10)->unique(); // Contoh: TKJ, RPL
            $table->string('nama_jurusan'); // Contoh: Teknik Komputer dan Jaringan

            // Relasi ke Guru untuk jabatan Kepala Program Studi (Kaprodi)
            $table->foreignId('kaprodi_id')->nullable()->constrained('gurus')->nullOnDelete();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('jurusans');
    }
};
