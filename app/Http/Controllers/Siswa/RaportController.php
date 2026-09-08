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
        $siswa = Siswa::where('user_id', Auth::id())->firstOrFail();

        // Mengambil semua nilai siswa beserta relasi mata pelajaran dan guru
        $daftarNilai = Nilai::with(['mataPelajaran', 'guru'])
            ->where('siswa_id', $siswa->id)
            ->orderBy('tahun_ajaran', 'desc')
            ->orderBy('semester', 'desc')
            ->get();

        // Hitung rata-rata nilai akhir (jika ada data nilai)
        $rataRata = $daftarNilai->avg('nilai_akhir');

        return view('siswa.raport.index', compact('siswa', 'daftarNilai', 'rataRata'));
    }
}
