<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MataPelajaran;

class MataPelajaranSeeder extends Seeder
{
    public function run(): void
    {
        $mapels = [
            // Kategori Umum
            ['kode_mapel' => 'U-PAIBP', 'nama_mapel' => 'Pendidikan Agama dan Budi Pekerti', 'kategori' => 'Umum'],
            ['kode_mapel' => 'U-PPKN', 'nama_mapel' => 'Pendidikan Pancasila dan Kewarganegaraan', 'kategori' => 'Umum'],
            ['kode_mapel' => 'U-BIND', 'nama_mapel' => 'Bahasa Indonesia', 'kategori' => 'Umum'],
            ['kode_mapel' => 'U-MTK', 'nama_mapel' => 'Matematika', 'kategori' => 'Umum'],
            ['kode_mapel' => 'U-BING', 'nama_mapel' => 'Bahasa Inggris', 'kategori' => 'Umum'],

            // Kategori Kejuruan (Teknik Kimia Industri)
            ['kode_mapel' => 'K-TKI-KMD', 'nama_mapel' => 'Kimia Dasar', 'kategori' => 'Kejuruan'],
            ['kode_mapel' => 'K-TKI-AKD', 'nama_mapel' => 'Analisis Kimia Dasar', 'kategori' => 'Kejuruan'],
            ['kode_mapel' => 'K-TKI-MBD', 'nama_mapel' => 'Mikrobiologi Dasar', 'kategori' => 'Kejuruan'],
            ['kode_mapel' => 'K-TKI-OTK', 'nama_mapel' => 'Operasi Teknik Kimia', 'kategori' => 'Kejuruan'],
            ['kode_mapel' => 'K-TKI-PIK', 'nama_mapel' => 'Proses Industri Kimia', 'kategori' => 'Kejuruan'],
            ['kode_mapel' => 'K-TKI-ATK', 'nama_mapel' => 'Asas Teknik Kimia', 'kategori' => 'Kejuruan'],
            ['kode_mapel' => 'K-TKI-PKK', 'nama_mapel' => 'Produk Kreatif dan Kewirausahaan', 'kategori' => 'Kejuruan'],
        ];

        foreach ($mapels as $mapel) {
            MataPelajaran::create($mapel);
        }
    }
}
