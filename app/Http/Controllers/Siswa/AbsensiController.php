<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Absensi;
use App\Models\Siswa;

class AbsensiController extends Controller
{
    public function index()
    {
        // Set zona waktu ke WITA sesuai lokasi (Tanah Bumbu)
        Carbon::setLocale('id');
        $waktuSekarang = Carbon::now('Asia/Makassar');

        $hariIniStr = $waktuSekarang->isoFormat('dddd, D MMMM Y');
        $jamSekarang = $waktuSekarang->format('H:i');
        $tanggalHariIni = $waktuSekarang->format('Y-m-d');

        // Ambil data siswa yang sedang login
        $siswa = Siswa::where('user_id', Auth::id())->firstOrFail();

        // Cek apakah siswa sudah absen hari ini
        $absensiHariIni = Absensi::where('siswa_id', $siswa->id)
            ->where('tanggal', $tanggalHariIni)
            ->first();

        // Ambil riwayat absen bulan ini (maksimal 30 hari terakhir)
        $riwayatAbsensi = Absensi::where('siswa_id', $siswa->id)
            ->orderBy('tanggal', 'desc')
            ->limit(30)
            ->get();

        return view('siswa.absensi.index', compact(
            'hariIniStr',
            'jamSekarang',
            'absensiHariIni',
            'riwayatAbsensi'
        ));
    }

    public function absenMasuk(Request $request)
    {
        $waktuSekarang = Carbon::now('Asia/Makassar');
        $siswa = Siswa::where('user_id', Auth::id())->firstOrFail();

        // Tentukan status kehadiran (Anggap batas masuk 07:30 WITA)
        $batasMasuk = Carbon::createFromTime(7, 30, 0, 'Asia/Makassar');
        $status = $waktuSekarang->greaterThan($batasMasuk) ? 'Sakit' : 'Hadir';
        // Catatan: 'Sakit/Izin/Alpha' biasanya diinput terpisah, tapi kita set Hadir/Terlambat(Sakit sbg placeholder sesuai enum)
        // Karena enum kita: ['Hadir', 'Sakit', 'Izin', 'Alpha'], jika lewat jam bisa ditandai Alpha/Hadir dengan catatan.
        // Untuk amannya, kita set 'Hadir' dulu.

        Absensi::create([
            'siswa_id' => $siswa->id,
            'tanggal' => $waktuSekarang->format('Y-m-d'),
            'waktu_masuk' => $waktuSekarang->format('H:i:s'),
            'status' => 'Hadir',
        ]);

        return redirect()->route('siswa.absensi')->with('success', 'Berhasil melakukan absen masuk.');
    }

    public function absenPulang(Request $request)
    {
        $waktuSekarang = Carbon::now('Asia/Makassar');
        $siswa = Siswa::where('user_id', Auth::id())->firstOrFail();

        $absensi = Absensi::where('siswa_id', $siswa->id)
            ->where('tanggal', $waktuSekarang->format('Y-m-d'))
            ->firstOrFail();

        $absensi->update([
            'waktu_pulang' => $waktuSekarang->format('H:i:s')
        ]);

        return redirect()->route('siswa.absensi')->with('success', 'Berhasil melakukan absen pulang.');
    }
}
