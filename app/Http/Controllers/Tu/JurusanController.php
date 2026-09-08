<?php

namespace App\Http\Controllers\Tu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jurusan;
use App\Models\Guru;

class JurusanController extends Controller
{
    public function index(Request $request)
    {
        // Mengambil data jurusan beserta relasi nama kaprodi
        $daftarJurusan = Jurusan::with('kaprodi')->orderBy('nama_jurusan', 'asc')->paginate(10);
        return view('tu.jurusan.index', compact('daftarJurusan'));
    }

    public function create()
    {
        // Ambil semua data guru untuk dropdown pemilihan Kaprodi
        $gurus = Guru::orderBy('nama_lengkap', 'asc')->get();
        return view('tu.jurusan.create', compact('gurus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_jurusan' => 'required|string|max:10|unique:jurusans,kode_jurusan',
            'nama_jurusan' => 'required|string|max:255',
            'kaprodi_id' => 'nullable|exists:gurus,id',
        ]);

        Jurusan::create($request->all());

        return redirect()->route('tu.jurusan')->with('success', 'Data jurusan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $jurusan = Jurusan::findOrFail($id);
        $gurus = Guru::orderBy('nama_lengkap', 'asc')->get();
        return view('tu.jurusan.edit', compact('jurusan', 'gurus'));
    }

    public function update(Request $request, $id)
    {
        $jurusan = Jurusan::findOrFail($id);

        $request->validate([
            'kode_jurusan' => 'required|string|max:10|unique:jurusans,kode_jurusan,' . $jurusan->id,
            'nama_jurusan' => 'required|string|max:255',
            'kaprodi_id' => 'nullable|exists:gurus,id',
        ]);

        $jurusan->update($request->all());

        return redirect()->route('tu.jurusan')->with('success', 'Data jurusan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        Jurusan::findOrFail($id)->delete();
        return redirect()->route('tu.jurusan')->with('success', 'Data jurusan berhasil dihapus.');
    }
}
