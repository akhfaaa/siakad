<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Nilai extends Model
{
    use HasFactory;

    // Definisikan secara eksplisit kolom yang boleh diisi
    protected $fillable = [
        'siswa_id',
        'mata_pelajaran_id',
        'guru_id',
        'tahun_ajaran',
        'semester',
        'nilai_tugas',
        'nilai_uts',
        'nilai_uas',
        'nilai_praktik',
        'nilai_akhir'
    ];

    // Relasi untuk persiapan fitur E-Raport nanti
    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    public function mataPelajaran()
    {
        return $this->belongsTo(MataPelajaran::class, 'mata_pelajaran_id');
    }

    public function guru()
    {
        return $this->belongsTo(Pegawai::class, 'guru_id');
    }
}
