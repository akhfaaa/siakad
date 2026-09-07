<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    protected $fillable = [
        'siswa_id',
        'tanggal',
        'waktu_masuk',
        'waktu_pulang',
        'status',
        'keterangan',
    ];

    // Relasi: Absensi ini milik satu orang Siswa
    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
}
