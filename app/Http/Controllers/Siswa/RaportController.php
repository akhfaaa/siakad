<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Siswa;
use App\Models\Nilai;

class RaportController extends Controller
{
    public function index()
    {
        // 1. Cari data profil siswa berdasarkan user yang sedang login
        $siswa = Siswa::where('user_id', Auth::id())->firstOrFail();

        // 2. Tarik semua nilai milik siswa tersebut
        $nilais = Nilai::with(['mataPelajaran', 'guru'])
            ->where('siswa_id', $siswa->id)
            ->get();

        $totalNilaiKeseluruhan = 0;
        $jumlahMapel = count($nilais);

        // 3. Kalkulasi rata-rata tugas dan nilai akhir per mapel
        foreach ($nilais as $nilai) {
            $totalTugas = 0;
            $jumlahTugas = 0;

            for ($i = 1; $i <= 16; $i++) {
                $kolom = 'tugas_' . $i;
                if (!is_null($nilai->$kolom)) {
                    $totalTugas += $nilai->$kolom;
                    $jumlahTugas++;
                }
            }

            $rataTugas = $jumlahTugas > 0 ? ($totalTugas / $jumlahTugas) : 0;
            $nilai->rata_tugas = $rataTugas;

            // Hitung Nilai Akhir: Tugas (20%), UTS (25%), UAS (25%), Praktik (30%)
            $nilaiAkhir = ($rataTugas * 0.20) +
                (($nilai->uts ?? 0) * 0.25) +
                (($nilai->uas ?? 0) * 0.25) +
                (($nilai->praktik ?? 0) * 0.30);

            $nilai->nilai_akhir = round($nilaiAkhir, 2);

            // Tambahkan ke total keseluruhan untuk dihitung rata-rata akhirnya
            $totalNilaiKeseluruhan += $nilaiAkhir;
        }

        // 4. Hitung rata-rata keseluruhan (IPK / Nilai Rata-rata Raport)
        $rataRata = $jumlahMapel > 0 ? round($totalNilaiKeseluruhan / $jumlahMapel, 2) : 0;

        // Pastikan variabel $rataRata ikut dikirim ke view
        return view('siswa.raport.index', compact('siswa', 'nilais', 'rataRata'));
    }
}
