<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // Pastikan user sudah login
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $role = Auth::user()->role;

        // Arahkan ke file blade masing-masing berdasarkan role
        switch ($role) {
            case 'tu':
            case 'admin':
                return view('dashboard.tu');
            case 'guru':
                return view('dashboard.guru');
            case 'siswa':
                return view('dashboard.siswa');
            case 'walikelas':
                return view('dashboard.walikelas');
            case 'kepsek':
                return view('dashboard.kepsek');
            case 'orangtua':
                return view('dashboard.orangtua');
            default:
                abort(403, 'HAK AKSES TIDAK DIKENALI OLEH SISTEM.');
        }
    }
}
