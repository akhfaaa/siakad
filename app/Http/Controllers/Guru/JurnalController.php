<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\JurnalPkl;
use App\Models\Pegawai;

class JurnalController extends Controller
{
    public function index()
    {
        // Cari profil pegawai dari akun guru yang sedang login
        $guru = Pegawai::where('user_id', Auth::id())->firstOrFail();

        // Ambil semua jurnal siswa yang dibimbing oleh guru ini
        $daftarJurnal = JurnalPkl::with(['siswa', 'mitraDudi'])
            ->where('guru_pembimbing_id', $guru->id)
            ->orderBy('tanggal', 'desc')
            ->get();

        return view('guru.jurnal.index', compact('daftarJurnal'));
    }

    public function validasi(Request $request, $id)
    {
        $request->validate([
            'status_validasi' => 'required|in:Disetujui,Revisi',
            'catatan_guru' => 'nullable|string|max:500'
        ]);

        $jurnal = JurnalPkl::findOrFail($id);

        $jurnal->update([
            'status_validasi' => $request->status_validasi,
            'catatan_guru' => $request->catatan_guru
        ]);

        return back()->with('success', 'Status validasi jurnal berhasil diperbarui.');
    }
}
