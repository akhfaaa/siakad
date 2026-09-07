<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIAKAD SMKN 1</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased text-gray-200 bg-slate-950 relative overflow-hidden h-screen flex">

    <!-- Pendaran Cahaya (Orbs) -->
    <div class="absolute top-[-10%] left-[-10%] w-[40rem] h-[40rem] bg-blue-900/30 rounded-full mix-blend-screen filter blur-[120px] opacity-80 pointer-events-none"></div>
    <div class="absolute bottom-[-20%] right-[-10%] w-[35rem] h-[35rem] bg-cyan-900/20 rounded-full mix-blend-screen filter blur-[100px] opacity-60 pointer-events-none"></div>

    <!-- Sidebar Glassmorphism -->
    <aside class="w-64 bg-slate-900/40 backdrop-blur-2xl border-r border-white/[0.08] flex-col justify-between hidden md:flex z-20 relative shadow-2xl shadow-black/50">
        <div>
            <!-- Logo Institusi -->
            <div class="h-20 flex items-center gap-3 px-6 border-b border-white/[0.08]">
                <img src="{{ asset('images/smk.png') }}" alt="Logo" class="w-10 h-10 drop-shadow-md">
                <div>
                    <h1 class="font-bold text-white tracking-wide text-sm leading-tight">SIAKAD</h1>
                    <p class="text-[10px] text-slate-400 font-medium">SMKN 1 Simpang Empat</p>
                </div>
            </div>

            <!-- Menu Navigasi -->
            <nav class="p-4 space-y-2">
                <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl bg-blue-600/20 text-blue-400 font-semibold border border-blue-500/20 shadow-inner">
                    <svg class="w-5 h-5 opacity-80" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    Beranda Utama
                </a>
            </nav>
        </div>

        <!-- Footer Sidebar -->
        <div class="p-4 border-t border-white/[0.08]">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full flex items-center gap-3 px-4 py-3 rounded-xl text-slate-400 hover:text-white hover:bg-white/[0.05] transition-colors font-medium text-sm">
                    <svg class="w-5 h-5 opacity-70" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                    </svg>
                    Keluar Sistem
                </button>
            </form>
        </div>
    </aside>

    <!-- Area Konten Utama -->
    <div class="flex-1 flex flex-col h-screen overflow-hidden relative z-10">
        <!-- Top Navbar Kaca -->
        <header class="h-20 bg-slate-900/30 backdrop-blur-md border-b border-white/[0.05] flex items-center justify-between px-6 z-20 md:justify-end shadow-sm">

            <!-- Logo Mobile -->
            <div class="md:hidden flex items-center gap-3">
                <img src="{{ asset('images/smk.png') }}" alt="Logo" class="w-8 h-8">
            </div>

            <!-- Profil Pengguna -->
            <div class="flex items-center gap-4">
                <div class="text-right hidden sm:block">
                    <p class="text-sm font-bold text-white">{{ Auth::user()->name }}</p>
                    <p class="text-xs text-slate-400 capitalize">{{ str_replace('_', ' ', Auth::user()->role) }}</p>
                </div>
                <div class="w-10 h-10 rounded-2xl bg-gradient-to-br from-blue-500/20 to-purple-500/20 border border-white/10 flex items-center justify-center text-white font-bold text-sm shadow-inner">
                    {{ substr(Auth::user()->name, 0, 1) }}
                </div>
            </div>
        </header>

        <!-- Halaman yang bisa di-scroll -->
        <main class="flex-1 overflow-x-hidden overflow-y-auto p-6 md:p-8">
            {{ $slot }}
        </main>
    </div>

</body>

</html>