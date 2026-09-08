<?php

namespace App\Http\Controllers\WaliKelas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Nilai;

class RaportController extends Controller
{
    public function index()
    {
        $daftarSiswa = Siswa::orderBy('nis')->get();
        return view('walikelas.raport.index', compact('daftarSiswa'));
    }

    public function cetak($id)
    {
        $siswa = Siswa::findOrFail($id);

        // Ambil nilai siswa beserta mapel dan gurunya
        $daftarNilai = Nilai::with(['mataPelajaran', 'guru'])
            ->where('siswa_id', $siswa->id)
            ->get();

        $rataRata = $daftarNilai->avg('nilai_akhir');

        return view('walikelas.raport.print', compact('siswa', 'daftarNilai', 'rataRata'));
    }
}
