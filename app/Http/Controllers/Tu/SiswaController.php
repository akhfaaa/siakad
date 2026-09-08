<?php

namespace App\Http\Controllers\Tu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class SiswaController extends Controller
{
    public function index(Request $request)
    {
        $query = Siswa::query();

        if ($request->has('cari') && $request->cari != '') {
            $cari = $request->cari;
            $query->where('nama_lengkap', 'like', "%{$cari}%")
                ->orWhere('nis', 'like', "%{$cari}%");
        }

        $daftarSiswa = $query->orderBy('nama_lengkap', 'asc')->paginate(10);
        $daftarSiswa->appends($request->all());

        return view('tu.siswa.index', compact('daftarSiswa'));
    }

    public function create()
    {
        return view('tu.siswa.create');
    }

    public function store(Request $request)
    {
        // 1. Validasi Input
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nis' => 'required|string|unique:siswas,nis',
            'nisn' => 'required|string|unique:siswas,nisn',
            'jenis_kelamin' => 'required|in:L,P',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        // 2. Mulai Transaksi Database
        DB::beginTransaction();

        try {
            // Buat akun User
            $user = User::create([
                'name' => $request->nama_lengkap,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'siswa',
            ]);

            // Buat profil Siswa
            Siswa::create([
                'user_id' => $user->id,
                'nama_lengkap' => $request->nama_lengkap,
                'nis' => $request->nis,
                'nisn' => $request->nisn,
                'jenis_kelamin' => $request->jenis_kelamin,
            ]);

            // Jika semua aman, permanenkan data (Commit)
            DB::commit();
            return redirect()->route('tu.siswa')->with('success', 'Data siswa dan akun akses berhasil dibuat.');
        } catch (\Exception $e) {
            // Jika ada yang gagal, batalkan SEMUA penyimpanan (Rollback)
            DB::rollBack();

            // Kembalikan user ke form beserta pesan error sistem
            return back()->withInput()->with('error_system', 'Terjadi kesalahan sistem: ' . $e->getMessage());
        }
    }
}
