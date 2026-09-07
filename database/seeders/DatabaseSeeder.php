<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Pegawai;
use App\Models\Siswa;
use App\Models\OrangTua;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Tetapkan password global untuk semua akun
        $password = Hash::make('pw1234');

        // 1. Akun Kepala Sekolah
        $kepsekUser = User::create([
            'name' => 'Drs. Amran Ali, MM',
            'email' => 'kepsek@smkn1.com',
            'password' => $password,
            'role' => 'kepala_sekolah'
        ]);
        Pegawai::create([
            'user_id' => $kepsekUser->id,
            'nip' => '196712211994121004',
            'nama_lengkap' => 'Drs. Amran Ali, MM',
            'jabatan_struktural' => 'Kepala Sekolah',
        ]);

        // 2. Akun Tata Usaha (TU)
        $tuUser = User::create([
            'name' => 'Dwi Purnomo, S.Pd',
            'email' => 'tu@smkn1.com',
            'password' => $password,
            'role' => 'tu'
        ]);
        Pegawai::create([
            'user_id' => $tuUser->id,
            'nip' => '198010072014031002',
            'nama_lengkap' => 'Dwi Purnomo, S.Pd',
            'jabatan_struktural' => 'Kepala Tenaga Administrasi (TU)',
        ]);

        // 3. Akun Guru Mata Pelajaran
        $guruUser = User::create([
            'name' => 'M. Jamaluddin, S. Kom',
            'email' => 'guru@smkn1.com',
            'password' => $password,
            'role' => 'guru_mapel'
        ]);
        Pegawai::create([
            'user_id' => $guruUser->id,
            'nip' => '199406052020121013',
            'nama_lengkap' => 'M. Jamaluddin, S. Kom',
            'jabatan_struktural' => 'Guru Produktif',
            'spesialisasi_ilmu' => 'Teknik Komputer Jaringan'
        ]);

        // 4. Akun Wali Kelas
        $waliUser = User::create([
            'name' => 'Rahmy Fatmawaty, ST',
            'email' => 'walikelas@smkn1.com',
            'password' => $password,
            'role' => 'wali_kelas'
        ]);
        Pegawai::create([
            'user_id' => $waliUser->id,
            'nip' => '198510112010012029',
            'nama_lengkap' => 'Rahmy Fatmawaty, ST',
            'jabatan_struktural' => 'Wali Kelas',
            'spesialisasi_ilmu' => 'Desain Komunikasi Visual'
        ]);

        // 5. Akun Siswa
        $siswaUser = User::create([
            'name' => 'Bagas Pratama',
            'email' => 'siswa@smkn1.com',
            'password' => $password,
            'role' => 'siswa'
        ]);
        $siswa = Siswa::create([
            'user_id' => $siswaUser->id,
            'nisn' => '0081234567',
            'nis' => '2026001',
            'nama_lengkap' => 'Bagas Pratama',
            'jenis_kelamin' => 'L'
        ]);

        // 6. Akun Orang Tua Siswa
        $ortuUser = User::create([
            'name' => 'Bpk. Supardi',
            'email' => 'orangtua@smkn1.com',
            'password' => $password,
            'role' => 'orang_tua'
        ]);
        OrangTua::create([
            'user_id' => $ortuUser->id,
            'siswa_id' => $siswa->id, // Mengaitkan orang tua langsung ke Bagas
            'nama_ayah' => 'Supardi',
            'no_telepon_wali' => '081234567890',
            'alamat_lengkap' => 'Jl. Kodeco Km. 2, Simpang Empat, Tanah Bumbu'
        ]);
    }
}
