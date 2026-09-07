<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MitraDudi;

class MitraDudiSeeder extends Seeder
{
    public function run(): void
    {
        MitraDudi::create([
            'nama_perusahaan' => 'PT Jhonlin Baratama',
            'bidang_usaha' => 'Pertambangan & Infrastruktur',
            'alamat' => 'Kabupaten Tanah Bumbu, Kalimantan Selatan',
            'nama_pembimbing_industri' => 'Bpk. Hendra Saputra',
        ]);

        MitraDudi::create([
            'nama_perusahaan' => 'PT Arutmin Indonesia Site Batulicin',
            'bidang_usaha' => 'Pertambangan Batubara',
            'alamat' => 'Batulicin, Kabupaten Tanah Bumbu',
            'nama_pembimbing_industri' => 'Ibu Rina Melati',
        ]);

        MitraDudi::create([
            'nama_perusahaan' => 'Balai Pengembangan Kompetensi PU Wilayah VII',
            'bidang_usaha' => 'Instansi Pemerintah / IT Support',
            'alamat' => 'Banjarmasin, Kalimantan Selatan',
            'nama_pembimbing_industri' => 'Bpk. Akhmad',
        ]);
    }
}
