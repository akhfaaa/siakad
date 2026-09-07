<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JurnalPkl extends Model
{
    protected $fillable = [
        'siswa_id',
        'mitra_dudi_id',
        'guru_pembimbing_id',
        'tanggal',
        'waktu_mulai',
        'waktu_selesai',
        'deskripsi_kegiatan',
        'foto_dokumentasi',
        'status_validasi',
        'catatan_guru'
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
    public function mitraDudi()
    {
        return $this->belongsTo(MitraDudi::class);
    }
    public function guruPembimbing()
    {
        return $this->belongsTo(Pegawai::class, 'guru_pembimbing_id');
    }
}
