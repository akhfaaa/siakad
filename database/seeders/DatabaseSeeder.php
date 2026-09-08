<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Siswa;
use App\Models\Guru;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // 1. Buat Akun Tata Usaha (TU)
        User::create([
            'name' => 'Staf Tata Usaha',
            'email' => 'tu@smkn1.com',
            'password' => Hash::make('123456'),
            'role' => 'tu', // Sesuaikan jika Anda menggunakan 'admin'
        ]);

        // 2. Buat Akun Guru 
        $userGuru = User::create([
            'name' => 'Apt. Dini Azizah, S.Farm',
            'email' => 'dini@smkn1.com',
            'password' => Hash::make('123456'),
            'role' => 'guru',
        ]);
        Guru::create([
            'user_id' => $userGuru->id,
            'nama_lengkap' => 'Apt. Dini Azizah, S.Farm',
            'nip' => '199010102020112001',
            'jenis_kelamin' => 'P',
        ]);

        // 3. Buat Akun Siswa 
        $userSiswa = User::create([
            'name' => 'Akhmad Daffa Hambali',
            'email' => 'daffa@smkn1.com',
            'password' => Hash::make('123456'),
            'role' => 'siswa',
        ]);
        Siswa::create([
            'user_id' => $userSiswa->id,
            'nama_lengkap' => 'Akhmad Daffa Hambali',
            'nis' => '0000000001',
            'nisn' => '0000000001',
            'jenis_kelamin' => 'L',
            // rombel_id dibiarkan kosong (null) dulu karena rombelnya belum kita buat di web
        ]);
    }
}