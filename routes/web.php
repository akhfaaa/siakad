<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Siswa\AbsensiController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    // Rute utama dashboard yang mendistribusikan tampilan
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Rute Presensi Siswa
    Route::get('/siswa/absensi', [AbsensiController::class, 'index'])->name('siswa.absensi');
    Route::post('/siswa/absensi/masuk', [AbsensiController::class, 'absenMasuk'])->name('siswa.absensi.masuk');
    Route::post('/siswa/absensi/pulang', [AbsensiController::class, 'absenPulang'])->name('siswa.absensi.pulang');

    // Rute Jurnal PKL Siswa
    Route::get('/siswa/jurnal', [\App\Http\Controllers\Siswa\JurnalController::class, 'index'])->name('siswa.jurnal');
    Route::get('/siswa/jurnal/tulis', [\App\Http\Controllers\Siswa\JurnalController::class, 'create'])->name('siswa.jurnal.create');
    Route::post('/siswa/jurnal', [\App\Http\Controllers\Siswa\JurnalController::class, 'store'])->name('siswa.jurnal.store');

    // Rute Jurnal PKL Guru
    Route::get('/guru/jurnal', [\App\Http\Controllers\Guru\JurnalController::class, 'index'])->name('guru.jurnal');
    Route::post('/guru/jurnal/{id}/validasi', [\App\Http\Controllers\Guru\JurnalController::class, 'validasi'])->name('guru.jurnal.validasi');

    // Rute Nilai Akademik Guru
    Route::get('/guru/nilai', [\App\Http\Controllers\Guru\NilaiController::class, 'index'])->name('guru.nilai');
    Route::post('/guru/nilai', [\App\Http\Controllers\Guru\NilaiController::class, 'store'])->name('guru.nilai.store');

    // Rute E-Raport Siswa
    Route::get('/siswa/raport', [\App\Http\Controllers\Siswa\RaportController::class, 'index'])->name('siswa.raport');

    // Rute Wali Kelas
    Route::get('/walikelas/raport', [\App\Http\Controllers\WaliKelas\RaportController::class, 'index'])->name('walikelas.raport');
    Route::get('/walikelas/raport/{id}/cetak', [\App\Http\Controllers\WaliKelas\RaportController::class, 'cetak'])->name('walikelas.raport.cetak');

    // Rute Tata Usaha (TU) - Manajemen Siswa
    Route::get('/tu/siswa', [\App\Http\Controllers\Tu\SiswaController::class, 'index'])->name('tu.siswa');
    Route::get('/tu/siswa/create', [\App\Http\Controllers\Tu\SiswaController::class, 'create'])->name('tu.siswa.create');
    Route::post('/tu/siswa', [\App\Http\Controllers\Tu\SiswaController::class, 'store'])->name('tu.siswa.store');
    Route::get('/tu/siswa/{id}/edit', [\App\Http\Controllers\Tu\SiswaController::class, 'edit'])->name('tu.siswa.edit');
    Route::put('/tu/siswa/{id}', [\App\Http\Controllers\Tu\SiswaController::class, 'update'])->name('tu.siswa.update');
    Route::delete('/tu/siswa/{id}', [\App\Http\Controllers\Tu\SiswaController::class, 'destroy'])->name('tu.siswa.destroy');
    
    // Rute Tata Usaha (TU) - Manajemen Guru
    Route::get('/tu/guru', [\App\Http\Controllers\Tu\GuruController::class, 'index'])->name('tu.guru');
    Route::get('/tu/guru/create', [\App\Http\Controllers\Tu\GuruController::class, 'create'])->name('tu.guru.create');
    Route::post('/tu/guru', [\App\Http\Controllers\Tu\GuruController::class, 'store'])->name('tu.guru.store');
    Route::get('/tu/guru/{id}/edit', [\App\Http\Controllers\Tu\GuruController::class, 'edit'])->name('tu.guru.edit');
    Route::put('/tu/guru/{id}', [\App\Http\Controllers\Tu\GuruController::class, 'update'])->name('tu.guru.update');
    Route::delete('/tu/guru/{id}', [\App\Http\Controllers\Tu\GuruController::class, 'destroy'])->name('tu.guru.destroy');

    // Rute Tata Usaha (TU) - Manajemen Jurusan
    Route::get('/tu/jurusan', [\App\Http\Controllers\Tu\JurusanController::class, 'index'])->name('tu.jurusan');
    Route::get('/tu/jurusan/create', [\App\Http\Controllers\Tu\JurusanController::class, 'create'])->name('tu.jurusan.create');
    Route::post('/tu/jurusan', [\App\Http\Controllers\Tu\JurusanController::class, 'store'])->name('tu.jurusan.store');
    Route::get('/tu/jurusan/{id}/edit', [\App\Http\Controllers\Tu\JurusanController::class, 'edit'])->name('tu.jurusan.edit');
    Route::put('/tu/jurusan/{id}', [\App\Http\Controllers\Tu\JurusanController::class, 'update'])->name('tu.jurusan.update');
    Route::delete('/tu/jurusan/{id}', [\App\Http\Controllers\Tu\JurusanController::class, 'destroy'])->name('tu.jurusan.destroy');

    // Rute Tata Usaha (TU) - Manajemen Rombel
    Route::get('/tu/rombel', [\App\Http\Controllers\Tu\RombelController::class, 'index'])->name('tu.rombel');
    Route::get('/tu/rombel/create', [\App\Http\Controllers\Tu\RombelController::class, 'create'])->name('tu.rombel.create');
    Route::post('/tu/rombel', [\App\Http\Controllers\Tu\RombelController::class, 'store'])->name('tu.rombel.store');
    Route::get('/tu/rombel/{id}/edit', [\App\Http\Controllers\Tu\RombelController::class, 'edit'])->name('tu.rombel.edit');
    Route::put('/tu/rombel/{id}', [\App\Http\Controllers\Tu\RombelController::class, 'update'])->name('tu.rombel.update');
    Route::delete('/tu/rombel/{id}', [\App\Http\Controllers\Tu\RombelController::class, 'destroy'])->name('tu.rombel.destroy');

    // Rute Tata Usaha (TU) - Manajemen Mata Pelajaran
    Route::get('/tu/mapel', [\App\Http\Controllers\Tu\MapelController::class, 'index'])->name('tu.mapel');
    Route::get('/tu/mapel/create', [\App\Http\Controllers\Tu\MapelController::class, 'create'])->name('tu.mapel.create');
    Route::post('/tu/mapel', [\App\Http\Controllers\Tu\MapelController::class, 'store'])->name('tu.mapel.store');
    Route::get('/tu/mapel/{id}/edit', [\App\Http\Controllers\Tu\MapelController::class, 'edit'])->name('tu.mapel.edit');
    Route::put('/tu/mapel/{id}', [\App\Http\Controllers\Tu\MapelController::class, 'update'])->name('tu.mapel.update');
    Route::delete('/tu/mapel/{id}', [\App\Http\Controllers\Tu\MapelController::class, 'destroy'])->name('tu.mapel.destroy');

    // Rute Guru Pengampu
    Route::get('/guru/nilai', [\App\Http\Controllers\Guru\NilaiController::class, 'index'])->name('guru.nilai');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
