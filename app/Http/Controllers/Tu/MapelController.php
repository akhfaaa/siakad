<?php

namespace App\Http\Controllers\Tu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MataPelajaran; // Menggunakan nama model yang benar
use App\Models\Guru;

class MapelController extends Controller
{
    public function index()
    {
        // Mengambil data MataPelajaran beserta relasi Guru pengampunya
        $daftarMapel = MataPelajaran::with('guru')
            ->orderBy('kategori', 'asc')
            ->orderBy('nama_mapel', 'asc')
            ->paginate(10);

        return view('tu.mapel.index', compact('daftarMapel'));
    }

    public function create()
    {
        // Ambil data guru untuk dropdown pemilihan guru pengampu
        $gurus = Guru::orderBy('nama_lengkap', 'asc')->get();
        return view('tu.mapel.create', compact('gurus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            // Sesuaikan validasi unique dengan nama tabel yang benar
            'kode_mapel' => 'required|string|max:20|unique:mata_pelajarans,kode_mapel',
            'nama_mapel' => 'required|string|max:255',
            'kategori' => 'required|in:Umum,Kejuruan',
            'guru_id' => 'nullable|exists:gurus,id',
        ]);

        MataPelajaran::create($request->all());

        return redirect()->route('tu.mapel')->with('success', 'Data Mata Pelajaran berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $mapel = MataPelajaran::findOrFail($id);
        $gurus = Guru::orderBy('nama_lengkap', 'asc')->get();

        return view('tu.mapel.edit', compact('mapel', 'gurus'));
    }

    public function update(Request $request, $id)
    {
        $mapel = MataPelajaran::findOrFail($id);

        $request->validate([
            'kode_mapel' => 'required|string|max:20|unique:mata_pelajarans,kode_mapel,' . $mapel->id,
            'nama_mapel' => 'required|string|max:255',
            'kategori' => 'required|in:Umum,Kejuruan',
            'guru_id' => 'nullable|exists:gurus,id',
        ]);

        $mapel->update($request->all());

        return redirect()->route('tu.mapel')->with('success', 'Data Mata Pelajaran berhasil diperbarui.');
    }

    public function destroy($id)
    {
        MataPelajaran::findOrFail($id)->delete();
        return redirect()->route('tu.mapel')->with('success', 'Data Mata Pelajaran berhasil dihapus.');
    }
}
