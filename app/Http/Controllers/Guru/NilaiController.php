<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MataPelajaran;
use App\Models\Rombel;
use App\Models\Siswa;
use App\Models\Guru;
use App\Models\Nilai; // Pastikan Model Nilai diimpor
use Illuminate\Support\Facades\Auth;

class NilaiController extends Controller
{
    public function index(Request $request)
    {
        $guru = Guru::where('user_id', Auth::id())->firstOrFail();
        $mapels = MataPelajaran::where('guru_id', $guru->id)->get();
        $rombels = Rombel::orderBy('tingkat', 'asc')->orderBy('nama_rombel', 'asc')->get();

        $siswas = collect();
        if ($request->has('rombel_id') && $request->has('mapel_id')) {
            // Ambil data siswa sekaligus memuat relasi nilainya (hanya untuk mapel yang sedang dipilih)
            $siswas = Siswa::with(['nilais' => function ($query) use ($request) {
                $query->where('mata_pelajaran_id', $request->mapel_id);
            }])
                ->where('rombel_id', $request->rombel_id)
                ->orderBy('nama_lengkap', 'asc')
                ->get();
        }

        return view('guru.nilai.index', compact('mapels', 'rombels', 'siswas', 'guru'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'mapel_id' => 'required|exists:mata_pelajarans,id',
            'rombel_id' => 'required|exists:rombels,id',
            'nilai' => 'required|array',
        ]);

        $guru = Guru::where('user_id', Auth::id())->firstOrFail();

        // Tentukan Tahun Ajaran dan Semester aktif (bisa diotomatisasi dari tabel setting nanti)
        $tahunAjaranAktif = '2026/2027';
        $semesterAktif = 'Ganjil';

        // Looping semua data siswa yang dikirim dari form
        foreach ($request->nilai as $siswa_id => $dataNilai) {

            // Susun data yang akan diisi/diperbarui
            $kolomNilai = [
                'guru_id' => $guru->id,
                'uts' => $dataNilai['uts'] ?? null,
                'uas' => $dataNilai['uas'] ?? null,
                'praktik' => $dataNilai['praktik'] ?? null,
            ];

            // Masukkan 16 tugas ke dalam array
            for ($i = 1; $i <= 16; $i++) {
                $kolomNilai['tugas_' . $i] = $dataNilai['tugas_' . $i] ?? null;
            }

            // Simpan atau Perbarui nilai berdasarkan Siswa, Mapel, Tahun Ajaran, dan Semester
            Nilai::updateOrCreate(
                [
                    'siswa_id' => $siswa_id,
                    'mata_pelajaran_id' => $request->mapel_id,
                    'tahun_ajaran' => $tahunAjaranAktif,
                    'semester' => $semesterAktif,
                ],
                $kolomNilai
            );
        }

        return redirect()->back()->with('success', 'Seluruh nilai siswa berhasil disimpan!');
    }
}
