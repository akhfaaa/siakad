<?php

namespace App\Http\Controllers\Tu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class GuruController extends Controller
{
    public function index(Request $request)
    {
        $query = Guru::query();

        if ($request->has('cari') && $request->cari != '') {
            $cari = $request->cari;
            $query->where('nama_lengkap', 'like', "%{$cari}%")
                ->orWhere('nip', 'like', "%{$cari}%");
        }

        $daftarGuru = $query->orderBy('nama_lengkap', 'asc')->paginate(10);
        $daftarGuru->appends($request->all());

        return view('tu.guru.index', compact('daftarGuru'));
    }

    public function create()
    {
        return view('tu.guru.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nip' => 'nullable|string|max:30|unique:gurus,nip',
            'jenis_kelamin' => 'required|in:L,P',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        DB::beginTransaction();
        try {
            $user = User::create([
                'name' => $request->nama_lengkap,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'guru', // Tetapkan peran sebagai guru
            ]);

            Guru::create([
                'user_id' => $user->id,
                'nama_lengkap' => $request->nama_lengkap,
                'nip' => $request->nip,
                'jenis_kelamin' => $request->jenis_kelamin,
            ]);

            DB::commit();
            return redirect()->route('tu.guru')->with('success', 'Data guru dan akun akses berhasil ditambahkan.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->with('error_system', 'Terjadi kesalahan sistem: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $guru = Guru::with('user')->findOrFail($id);
        return view('tu.guru.edit', compact('guru'));
    }

    public function update(Request $request, $id)
    {
        $guru = Guru::findOrFail($id);
        $user = User::findOrFail($guru->user_id);

        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nip' => 'nullable|string|max:30|unique:gurus,nip,' . $guru->id,
            'jenis_kelamin' => 'required|in:L,P',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6',
        ]);

        DB::beginTransaction();
        try {
            $userData = [
                'name' => $request->nama_lengkap,
                'email' => $request->email,
            ];

            if ($request->filled('password')) {
                $userData['password'] = Hash::make($request->password);
            }
            $user->update($userData);

            $guru->update([
                'nama_lengkap' => $request->nama_lengkap,
                'nip' => $request->nip,
                'jenis_kelamin' => $request->jenis_kelamin,
            ]);

            DB::commit();
            return redirect()->route('tu.guru')->with('success', 'Data guru berhasil diperbarui.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->with('error_system', 'Terjadi kesalahan sistem: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $guru = Guru::findOrFail($id);
        $user = User::findOrFail($guru->user_id);

        // Menghapus User otomatis menghapus Guru karena ada constraint onDelete('cascade') di migrasi
        $user->delete();

        return redirect()->route('tu.guru')->with('success', 'Data guru berhasil dihapus.');
    }
}
