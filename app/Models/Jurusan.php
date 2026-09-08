<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    protected $fillable = ['kode_jurusan', 'nama_jurusan', 'kaprodi_id'];

    public function kaprodi()
    {
        return $this->belongsTo(Guru::class, 'kaprodi_id');
    }
    public function rombel()
    {
        return $this->hasMany(Rombel::class);
    }
}
