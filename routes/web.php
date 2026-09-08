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

    // Rute Tata Usaha (TU) / Admin
    Route::get('/tu/siswa', [\App\Http\Controllers\Tu\SiswaController::class, 'index'])->name('tu.siswa');
    Route::get('/tu/siswa/create', [\App\Http\Controllers\Tu\SiswaController::class, 'create'])->name('tu.siswa.create');
    Route::post('/tu/siswa', [\App\Http\Controllers\Tu\SiswaController::class, 'store'])->name('tu.siswa.store');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
