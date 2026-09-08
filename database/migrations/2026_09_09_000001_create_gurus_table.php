<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('gurus', function (Blueprint $table) {
            $table->id();
            // Relasi ke tabel users untuk login
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

            $table->string('nama_lengkap');
            $table->string('nip', 30)->nullable()->unique();
            $table->enum('jenis_kelamin', ['L', 'P']);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('gurus');
    }
};
