<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Absensi;
use App\Models\Siswa;
use Carbon\Carbon;

class AbsensiController extends Controller
{
    public function index()
    {
        $siswa = Siswa::where('user_id', Auth::id())->firstOrFail();

        // Ambil data absensi khusus hari ini
        $absensiHariIni = Absensi::where('siswa_id', $siswa->id)
            ->where('tanggal', Carbon::today()->format('Y-m-d'))
            ->first();

        return view('siswa.absensi.index', compact('absensiHariIni'));
    }

    // Nama fungsi disesuaikan menjadi absenMasuk
    public function absenMasuk(Request $request)
    {
        $siswa = Siswa::where('user_id', Auth::id())->firstOrFail();
        $tanggal = Carbon::today()->format('Y-m-d');

        // Pastikan belum ada data hari ini sebelum membuat baru
        $cekAbsensi = Absensi::where('siswa_id', $siswa->id)->where('tanggal', $tanggal)->first();

        if (!$cekAbsensi) {
            Absensi::create([
                'siswa_id' => $siswa->id,
                'tanggal' => $tanggal,
                'waktu_masuk' => Carbon::now()->format('H:i:s'),
                'status' => 'Hadir'
            ]);
            return back()->with('success', 'Kehadiran masuk berhasil dicatat.');
        }

        return back()->with('error', 'Anda sudah melakukan presensi masuk hari ini.');
    }

    // Nama fungsi disesuaikan menjadi absenPulang
    public function absenPulang(Request $request)
    {
        $siswa = Siswa::where('user_id', Auth::id())->firstOrFail();
        $tanggal = Carbon::today()->format('Y-m-d');

        // Cari data absen masuk hari ini
        $absensi = Absensi::where('siswa_id', $siswa->id)->where('tanggal', $tanggal)->first();

        if ($absensi) {
            // Lakukan UPDATE data yang sudah ada, BUKAN insert baru
            $absensi->update([
                'waktu_pulang' => Carbon::now()->format('H:i:s')
            ]);
            return back()->with('success', 'Presensi pulang berhasil dicatat. Hati-hati di jalan!');
        }

        return back()->with('error', 'Anda belum melakukan presensi masuk hari ini.');
    }
}
