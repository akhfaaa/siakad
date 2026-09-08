<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MataPelajaran extends Model
{
    protected $fillable = ['kode_mapel', 'nama_mapel', 'kategori', 'guru_id'];

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'guru_id');
    }
}
