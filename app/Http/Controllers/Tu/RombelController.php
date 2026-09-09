<?php

namespace App\Http\Controllers\Tu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rombel;
use App\Models\Jurusan;
use App\Models\Guru;

class RombelController extends Controller
{
    public function index()
    {
        // Mengambil data Rombel beserta relasi Jurusan dan Wali Kelas
        $daftarRombel = Rombel::with(['jurusan', 'waliKelas'])
            ->orderBy('tingkat', 'asc')
            ->orderBy('nama_rombel', 'asc')
            ->paginate(10);

        return view('tu.rombel.index', compact('daftarRombel'));
    }

    public function create()
    {
        // Ambil data jurusan dan guru untuk dropdown form
        $jurusans = Jurusan::orderBy('nama_jurusan', 'asc')->get();
        $gurus = Guru::orderBy('nama_lengkap', 'asc')->get();

        return view('tu.rombel.create', compact('jurusans', 'gurus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_rombel' => 'required|string|max:255',
            'tingkat' => 'required|integer|in:10,11,12', // Validasi tingkat SMK
            'jurusan_id' => 'required|exists:jurusans,id',
            'wali_kelas_id' => 'nullable|exists:gurus,id',
        ]);

        Rombel::create($request->all());

        return redirect()->route('tu.rombel')->with('success', 'Data Rombel (Kelas) berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $rombel = Rombel::findOrFail($id);
        $jurusans = Jurusan::orderBy('nama_jurusan', 'asc')->get();
        $gurus = Guru::orderBy('nama_lengkap', 'asc')->get();

        return view('tu.rombel.edit', compact('rombel', 'jurusans', 'gurus'));
    }

    public function update(Request $request, $id)
    {
        $rombel = Rombel::findOrFail($id);

        $request->validate([
            'nama_rombel' => 'required|string|max:255',
            'tingkat' => 'required|integer|in:10,11,12',
            'jurusan_id' => 'required|exists:jurusans,id',
            'wali_kelas_id' => 'nullable|exists:gurus,id',
        ]);

        $rombel->update($request->all());

        return redirect()->route('tu.rombel')->with('success', 'Data Rombel berhasil diperbarui.');
    }

    public function destroy($id)
    {
        Rombel::findOrFail($id)->delete();
        return redirect()->route('tu.rombel')->with('success', 'Data Rombel berhasil dihapus.');
    }
}
