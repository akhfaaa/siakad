<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIAKAD Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Font Inter (Alternatif San Francisco Apple) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-[#f5f5f7] font-['Inter'] antialiased text-[#1d1d1f]">
    <div class="min-h-screen flex w-full">

        <!-- Sidebar Apple Style -->
        <aside class="w-64 bg-white/80 backdrop-blur-xl border-r border-[#d2d2d7] fixed h-full z-20 flex flex-col transition-transform duration-300">
            <div class="h-16 flex items-center px-6 border-b border-[#d2d2d7]/50">
                <img src="{{ asset('images/smk.png') }}" alt="Logo" class="w-8 h-8 mr-3 object-contain drop-shadow-sm">
                <span class="font-semibold text-lg tracking-tight">SIAKAD</span>
            </div>

            <div class="flex-1 overflow-y-auto py-4 px-3 space-y-1.5">
                <!-- Menu Beranda Umum -->
                <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg {{ request()->routeIs('dashboard') ? 'bg-[#f5f5f7] text-[#1d1d1f] font-semibold' : 'text-[#515154] hover:bg-[#f5f5f7]/50 hover:text-[#1d1d1f] transition-colors' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    Beranda
                </a>

                <!-- Navigasi Siswa -->
                @if(Auth::user()->role === 'siswa')
                <div class="pt-4 pb-1">
                    <p class="px-3 text-[11px] font-semibold text-[#86868b] uppercase tracking-wider">Akademik</p>
                </div>
                <a href="{{ route('siswa.absensi') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg {{ request()->routeIs('siswa.absensi') ? 'bg-[#f5f5f7] text-[#1d1d1f] font-semibold' : 'text-[#515154] hover:bg-[#f5f5f7]/50 hover:text-[#1d1d1f] transition-colors' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    Presensi Harian
                </a>
                <a href="{{ route('siswa.jurnal') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg {{ request()->routeIs('siswa.jurnal') ? 'bg-[#f5f5f7] text-[#1d1d1f] font-semibold' : 'text-[#515154] hover:bg-[#f5f5f7]/50 hover:text-[#1d1d1f] transition-colors' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                    Jurnal PKL
                </a>
                @endif

                <!-- Navigasi Guru Mapel -->
                @if(Auth::user()->role === 'guru_mapel')
                <div class="pt-4 pb-1">
                    <p class="px-3 text-[11px] font-semibold text-[#86868b] uppercase tracking-wider">Tugas Guru</p>
                </div>
                <a href="{{ route('guru.jurnal') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg {{ request()->routeIs('guru.jurnal') ? 'bg-[#f5f5f7] text-[#1d1d1f] font-semibold' : 'text-[#515154] hover:bg-[#f5f5f7]/50 hover:text-[#1d1d1f] transition-colors' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    Validasi Jurnal PKL
                </a>
                <a href="{{ route('guru.nilai') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg {{ request()->routeIs('guru.nilai') ? 'bg-[#f5f5f7] text-[#1d1d1f] font-semibold' : 'text-[#515154] hover:bg-[#f5f5f7]/50 hover:text-[#1d1d1f] transition-colors' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    Input Nilai Akademik
                </a>
                @endif

                <!-- Navigasi Wali Kelas -->
                @if(Auth::user()->role === 'wali_kelas')
                <div class="pt-4 pb-1">
                    <p class="px-3 text-[11px] font-semibold text-[#86868b] uppercase tracking-wider">Perwalian</p>
                </div>
                <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-[#515154] hover:bg-[#f5f5f7]/50 hover:text-[#1d1d1f] transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                    Rekap Presensi
                </a>
                <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-[#515154] hover:bg-[#f5f5f7]/50 hover:text-[#1d1d1f] transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path>
                    </svg>
                    Cetak Raport
                </a>
                @endif

                <!-- Navigasi Tata Usaha (TU) -->
                @if(Auth::user()->role === 'tu' || Auth::user()->role === 'admin')
                <div class="pt-4 pb-1">
                    <p class="px-3 text-[11px] font-semibold text-[#86868b] uppercase tracking-wider">Manajemen Data</p>
                </div>
                <a href="{{ route('tu.siswa') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg {{ request()->routeIs('tu.siswa*') ? 'bg-[#f5f5f7] text-[#1d1d1f] font-semibold' : 'text-[#515154] hover:bg-[#f5f5f7]/50 hover:text-[#1d1d1f] transition-colors' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                    Data Siswa
                </a>
                <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-[#515154] hover:bg-[#f5f5f7]/50 hover:text-[#1d1d1f] transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                    Data Guru
                </a>
                @endif
            </div>

            <div class="p-4 border-t border-[#d2d2d7]/50">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex items-center justify-center gap-2 py-2.5 px-4 rounded-lg text-sm font-medium text-[#1d1d1f] bg-[#f5f5f7] hover:bg-[#e8e8ed] transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                        </svg>
                        Keluar
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content Area -->
        <main class="flex-1 ml-64 min-h-screen">
            <!-- Navbar Atas Transparan -->
            <header class="h-16 bg-[#f5f5f7]/80 backdrop-blur-md sticky top-0 z-10 flex items-center justify-end px-8">
                <div class="flex items-center gap-4">
                    <div class="text-right">
                        <div class="text-sm font-semibold text-[#1d1d1f]">{{ Auth::user()->name }}</div>
                        <div class="text-xs text-[#86868b]">{{ ucwords(str_replace('_', ' ', Auth::user()->role)) }}</div>
                    </div>
                    <!-- Avatar Apple Blue -->
                    <div class="w-10 h-10 rounded-full bg-[#0071e3] text-white flex items-center justify-center font-semibold text-lg shadow-sm">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </div>
                </div>
            </header>

            <!-- Area Render Konten -->
            <div class="p-8">
                {{ $slot }}
            </div>
        </main>
    </div>
</body>

</html>