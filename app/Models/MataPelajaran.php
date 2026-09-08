<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MataPelajaran extends Model
{
    use HasFactory;

    // Matikan perlindungan Mass Assignment agar semua kolom bisa diisi
    protected $guarded = [];
}
