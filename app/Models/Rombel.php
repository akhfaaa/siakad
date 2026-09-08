<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rombel extends Model
{
    protected $fillable = ['nama_rombel', 'tingkat', 'jurusan_id', 'wali_kelas_id'];

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }
    public function waliKelas()
    {
        return $this->belongsTo(Guru::class, 'wali_kelas_id');
    }
    public function siswa()
    {
        return $this->hasMany(Siswa::class);
    }
}
