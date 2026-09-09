<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;

    // Mengizinkan semua kolom diisi kecuali ID utama (Solusi praktis untuk tabel dengan banyak kolom nilai)
    protected $guarded = ['id'];

    // Relasi ke tabel siswas
    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    // Relasi ke tabel mata_pelajarans
    public function mataPelajaran()
    {
        return $this->belongsTo(MataPelajaran::class);
    }

    // Relasi ke tabel gurus (Agar nama guru pengampu bisa tampil di raport)
    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }
}
