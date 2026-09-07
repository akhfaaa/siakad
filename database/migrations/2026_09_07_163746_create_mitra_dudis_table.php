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
        Schema::create('mitra_dudis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_perusahaan'); // Contoh: PT Jhonlin Baratama
            $table->string('bidang_usaha')->nullable();
            $table->text('alamat')->nullable();
            $table->string('nama_pembimbing_industri')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mitra_dudis');
    }
};
