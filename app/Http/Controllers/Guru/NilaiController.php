<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Nilai;
use App\Models\Siswa;
use App\Models\Pegawai;
use App\Models\MataPelajaran;

class NilaiController extends Controller
{
    public function index()
    {
        $guru = Pegawai::where('user_id', Auth::id())->firstOrFail();

        // Ambil semua data siswa untuk dinilai
        $daftarSiswa = Siswa::orderBy('nis')->get();

        // Ambil data nilai yang sudah pernah diinput oleh guru ini di semester berjalan
        $riwayatNilai = Nilai::where('guru_id', $guru->id)
            ->where('tahun_ajaran', '2026/2027')
            ->where('semester', 'Ganjil')
            ->get()
            ->keyBy('siswa_id'); // Jadikan ID siswa sebagai key array untuk pencarian cepat di view

        // Karena kita belum membuat seeder Mata Pelajaran khusus, kita buat data dummy instan di sini
        // Di aplikasi nyata, ini diambil dari relasi jadwal mengajar guru
        $mapel = MataPelajaran::firstOrCreate(
            ['nama_mapel' => 'Kejuruan ' . $guru->spesialisasi_ilmu],
            ['kode_mapel' => 'KJR-01', ]
        );

        return view('guru.nilai.index', compact('daftarSiswa', 'riwayatNilai', 'mapel', 'guru'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required|exists:siswas,id',
            'mata_pelajaran_id' => 'required|exists:mata_pelajarans,id',
            'nilai_tugas' => 'required|numeric|min:0|max:100',
            'nilai_uts' => 'required|numeric|min:0|max:100',
            'nilai_uas' => 'required|numeric|min:0|max:100',
            'nilai_praktik' => 'required|numeric|min:0|max:100',
        ]);

        $guru = Pegawai::where('user_id', Auth::id())->firstOrFail();

        // Hitung Nilai Akhir Otomatis
        $nilaiAkhir = ($request->nilai_tugas * 0.20) +
            ($request->nilai_uts * 0.25) +
            ($request->nilai_uas * 0.25) +
            ($request->nilai_praktik * 0.30);

        // Gunakan updateOrCreate agar guru bisa mengedit nilai yang sudah ada tanpa membuat data ganda
        Nilai::updateOrCreate(
            [
                'siswa_id' => $request->siswa_id,
                'mata_pelajaran_id' => $request->mata_pelajaran_id,
                'guru_id' => $guru->id,
                'tahun_ajaran' => '2026/2027',
                'semester' => 'Ganjil',
            ],
            [
                'nilai_tugas' => $request->nilai_tugas,
                'nilai_uts' => $request->nilai_uts,
                'nilai_uas' => $request->nilai_uas,
                'nilai_praktik' => $request->nilai_praktik,
                'nilai_akhir' => $nilaiAkhir,
            ]
        );

        return back()->with('success', 'Data nilai berhasil disimpan dan diperbarui.');
    }
}
