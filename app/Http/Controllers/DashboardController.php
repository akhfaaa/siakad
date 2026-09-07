<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $role = Auth::user()->role;

        // Arahkan ke file view masing-masing berdasarkan role
        return match ($role) {
            'siswa' => view('dashboard.siswa'),
            'orang_tua' => view('dashboard.orangtua'),
            'guru_mapel' => view('dashboard.guru'),
            'wali_kelas' => view('dashboard.walikelas'),
            'tu' => view('dashboard.tu'),
            'kepala_sekolah' => view('dashboard.kepsek'),
            default => abort(403, 'Hak akses tidak dikenali oleh sistem.'),
        };
    }
}
