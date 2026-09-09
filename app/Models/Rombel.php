<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rombel extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_rombel',
        'tingkat',
        'jurusan_id',
        'wali_kelas_id',
    ];

    // Relasi ke tabel jurusans
    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }

    // Relasi ke tabel gurus (sebagai Wali Kelas)
    public function waliKelas()
    {
        return $this->belongsTo(Guru::class, 'wali_kelas_id');
    }

    // Relasi ke tabel siswas (Satu kelas memiliki banyak siswa)
    public function siswas()
    {
        return $this->hasMany(Siswa::class);
    }
}
