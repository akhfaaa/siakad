<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    // Tambahkan baris ini untuk mengizinkan mass assignment
    protected $fillable = [
        'user_id',
        'nama_lengkap',
        'nis',
        'nisn',
        'jenis_kelamin'
    ];

    // Relasi ke User (jika belum ada)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
