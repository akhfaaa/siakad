<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\JurnalPkl;
use App\Models\Siswa;
use App\Models\MitraDudi;
use App\Models\Pegawai;
use Carbon\Carbon;

class JurnalController extends Controller
{
    public function index()
    {
        $siswa = Siswa::where('user_id', Auth::id())->firstOrFail();

        $riwayatJurnal = JurnalPkl::with(['mitraDudi', 'guruPembimbing'])
            ->where('siswa_id', $siswa->id)
            ->orderBy('tanggal', 'desc')
            ->get();

        return view('siswa.jurnal.index', compact('riwayatJurnal'));
    }

    public function create()
    {
        // Mengambil data Perusahaan dan Guru untuk pilihan di dropdown
        $mitras = MitraDudi::all();
        $gurus = Pegawai::all();

        // Default tanggal hari ini
        $hariIni = Carbon::now('Asia/Makassar')->format('Y-m-d');

        return view('siswa.jurnal.create', compact('mitras', 'gurus', 'hariIni'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'mitra_dudi_id' => 'required',
            'guru_pembimbing_id' => 'required',
            'tanggal' => 'required|date',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required',
            'deskripsi_kegiatan' => 'required|string|max:1000',
            'foto_dokumentasi' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $siswa = Siswa::where('user_id', Auth::id())->firstOrFail();

        // Proses upload foto jika ada
        $fotoPath = null;
        if ($request->hasFile('foto_dokumentasi')) {
            $fotoPath = $request->file('foto_dokumentasi')->store('jurnal_pkl', 'public');
        }

        JurnalPkl::create([
            'siswa_id' => $siswa->id,
            'mitra_dudi_id' => $request->mitra_dudi_id,
            'guru_pembimbing_id' => $request->guru_pembimbing_id,
            'tanggal' => $request->tanggal,
            'waktu_mulai' => $request->waktu_mulai,
            'waktu_selesai' => $request->waktu_selesai,
            'deskripsi_kegiatan' => $request->deskripsi_kegiatan,
            'foto_dokumentasi' => $fotoPath,
            'status_validasi' => 'Menunggu',
        ]);

        return redirect()->route('siswa.jurnal')->with('success', 'Jurnal harian berhasil dikirim dan menunggu validasi guru.');
    }
}
