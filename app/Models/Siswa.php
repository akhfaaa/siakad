<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'rombel_id',
        'nama_lengkap',
        'nis',
        'nisn',
        'jenis_kelamin',
    ];

    // Relasi ke tabel users
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke tabel rombels
    public function rombel()
    {
        return $this->belongsTo(Rombel::class);
    }

    // Relasi ke tabel nilais (Satu siswa memiliki banyak rekap nilai)
    public function nilais()
    {
        return $this->hasMany(Nilai::class);
    }
}
