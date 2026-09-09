<?php

namespace App\Http\Controllers\Tu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Rombel;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SiswaController extends Controller
{
    public function index()
    {
        // Mengambil data siswa beserta relasi kelas (rombel) dan jurusannya
        $daftarSiswa = Siswa::with('rombel.jurusan')
            ->orderBy('nama_lengkap', 'asc')
            ->paginate(15);

        return view('tu.siswa.index', compact('daftarSiswa'));
    }

    public function create()
    {
        // Ambil data rombel untuk form pemilihan kelas
        $rombels = Rombel::with('jurusan')->orderBy('tingkat', 'asc')->orderBy('nama_rombel', 'asc')->get();
        return view('tu.siswa.create', compact('rombels'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nis' => 'required|string|max:20|unique:siswas,nis',
            'nisn' => 'required|string|max:20|unique:siswas,nisn',
            'jenis_kelamin' => 'required|in:L,P',
            'rombel_id' => 'required|exists:rombels,id',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ]);

        // 1. Buat Akun Login (Tabel users)
        $user = User::create([
            'name' => $request->nama_lengkap,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'siswa',
        ]);

        // 2. Buat Profil Siswa (Tabel siswas)
        Siswa::create([
            'user_id' => $user->id,
            'rombel_id' => $request->rombel_id,
            'nama_lengkap' => $request->nama_lengkap,
            'nis' => $request->nis,
            'nisn' => $request->nisn,
            'jenis_kelamin' => $request->jenis_kelamin,
        ]);

        return redirect()->route('tu.siswa')->with('success', 'Data Siswa berhasil ditambahkan beserta akun loginnya.');
    }

    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);
        $rombels = Rombel::with('jurusan')->orderBy('tingkat', 'asc')->orderBy('nama_rombel', 'asc')->get();

        return view('tu.siswa.edit', compact('siswa', 'rombels'));
    }

    public function update(Request $request, $id)
    {
        $siswa = Siswa::findOrFail($id);

        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nis' => 'required|string|max:20|unique:siswas,nis,' . $siswa->id,
            'nisn' => 'required|string|max:20|unique:siswas,nisn,' . $siswa->id,
            'jenis_kelamin' => 'required|in:L,P',
            'rombel_id' => 'required|exists:rombels,id',
        ]);

        // Update profil siswa
        $siswa->update([
            'nama_lengkap' => $request->nama_lengkap,
            'nis' => $request->nis,
            'nisn' => $request->nisn,
            'jenis_kelamin' => $request->jenis_kelamin,
            'rombel_id' => $request->rombel_id,
        ]);

        // Update nama di tabel users agar tersinkronisasi
        $siswa->user->update([
            'name' => $request->nama_lengkap,
        ]);

        return redirect()->route('tu.siswa')->with('success', 'Data Siswa berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);

        // Hapus akun user-nya (akan otomatis menghapus data siswa jika foreign key diset cascade, 
        // tapi kita hapus manual untuk keamanan)
        $userId = $siswa->user_id;
        $siswa->delete();
        User::find($userId)->delete();

        return redirect()->route('tu.siswa')->with('success', 'Data Siswa dan akun loginnya berhasil dihapus.');
    }
}
