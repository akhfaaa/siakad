<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Guru;
use App\Models\Jurusan;
use App\Models\Rombel;
use App\Models\Siswa;
use App\Models\MataPelajaran;
use App\Models\Nilai;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // 1. Akun Tata Usaha
        User::create([
            'name' => 'Staf Tata Usaha',
            'email' => 'tu@smkn1.com',
            'password' => Hash::make('111111'),
            'role' => 'tu',
        ]);

        // 2. Akun & Profil Guru
        $userGuru = User::create([
            'name' => 'apt. Dini Azizah, S.Farm',
            'email' => 'dini@smkn1.com',
            'password' => Hash::make('111111'),
            'role' => 'guru',
        ]);
        $guru = Guru::create([
            'user_id' => $userGuru->id,
            'nama_lengkap' => 'apt. Dini Azizah, S.Farm',
            'nip' => '199010102020112001',
            'jenis_kelamin' => 'P',
        ]);

        // 3. Data Master Jurusan (Kaprodi: apt. Dini Azizah, S.Farm)
        $jurusan = Jurusan::create([
            'kode_jurusan' => 'TKI',
            'nama_jurusan' => 'Teknik Kimia Industri',
            'kaprodi_id' => $guru->id,
        ]);

        // 4. Data Master Rombel (Wali Kelas: apt. Dini Azizah, S.Farm)
        $rombel = Rombel::create([
            'nama_rombel' => 'X TKI 1',
            'tingkat' => 10,
            'jurusan_id' => $jurusan->id,
            'wali_kelas_id' => $guru->id,
        ]);

        // 5. Akun & Profil Siswa
        $userSiswa = User::create([
            'name' => 'Akhmad Daffa Hambali',
            'email' => 'daffa@smkn1.com',
            'password' => Hash::make('111111'),
            'role' => 'siswa',
        ]);
        $siswa = Siswa::create([
            'user_id' => $userSiswa->id,
            'rombel_id' => $rombel->id,
            'nama_lengkap' => 'Akhmad Daffa Hambali',
            'nis' => '2310010443',
            'nisn' => '0051234567',
            'jenis_kelamin' => 'L',
        ]);

        // 6. Data Master Mata Pelajaran
        $mapels = [
            ['kode_mapel' => 'U-PAIBP', 'nama_mapel' => 'Pendidikan Agama dan Budi Pekerti', 'kategori' => 'Umum', 'guru_id' => $guru->id],
            ['kode_mapel' => 'U-PPKN', 'nama_mapel' => 'Pendidikan Pancasila dan Kewarganegaraan', 'kategori' => 'Umum', 'guru_id' => $guru->id],
            ['kode_mapel' => 'U-BIND', 'nama_mapel' => 'Bahasa Indonesia', 'kategori' => 'Umum', 'guru_id' => $guru->id],
            ['kode_mapel' => 'U-MTK', 'nama_mapel' => 'Matematika', 'kategori' => 'Umum', 'guru_id' => $guru->id],
            ['kode_mapel' => 'U-BING', 'nama_mapel' => 'Bahasa Inggris', 'kategori' => 'Umum', 'guru_id' => $guru->id],

            ['kode_mapel' => 'K-TKI-KMD', 'nama_mapel' => 'Kimia Dasar', 'kategori' => 'Kejuruan', 'guru_id' => $guru->id],
            ['kode_mapel' => 'K-TKI-AKD', 'nama_mapel' => 'Analisis Kimia Dasar', 'kategori' => 'Kejuruan', 'guru_id' => $guru->id],
            ['kode_mapel' => 'K-TKI-MBD', 'nama_mapel' => 'Mikrobiologi Dasar', 'kategori' => 'Kejuruan', 'guru_id' => $guru->id],
            ['kode_mapel' => 'K-TKI-OTK', 'nama_mapel' => 'Operasi Teknik Kimia', 'kategori' => 'Kejuruan', 'guru_id' => $guru->id],
            ['kode_mapel' => 'K-TKI-PIK', 'nama_mapel' => 'Proses Industri Kimia', 'kategori' => 'Kejuruan', 'guru_id' => $guru->id],
            ['kode_mapel' => 'K-TKI-ATK', 'nama_mapel' => 'Asas Teknik Kimia', 'kategori' => 'Kejuruan', 'guru_id' => $guru->id],
            ['kode_mapel' => 'K-TKI-PKK', 'nama_mapel' => 'Produk Kreatif dan Kewirausahaan', 'kategori' => 'Kejuruan', 'guru_id' => $guru->id],
        ];

        // 7. Generate Nilai Penuh (Tugas 1-16, UTS, UAS, Praktik)
        foreach ($mapels as $mapelData) {
            $mapel = MataPelajaran::create($mapelData);

            $dataNilai = [
                'siswa_id' => $siswa->id,
                'mata_pelajaran_id' => $mapel->id,
                'guru_id' => $guru->id,
                'tahun_ajaran' => '2026/2027',
                'semester' => 'Ganjil',
                'uts' => rand(80, 95),
                'uas' => rand(82, 98),
                'praktik' => rand(85, 98),
            ];

            // Looping untuk mengisi Tugas 1 sampai 16 secara otomatis
            for ($i = 1; $i <= 16; $i++) {
                $dataNilai['tugas_' . $i] = rand(78, 95);
            }

            Nilai::create($dataNilai);
        }
    }
}
