<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIAKAD Pro - SMKN 1 Simpang Empat</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>

<body class="bg-[#f5f5f7] font-['Inter'] antialiased text-[#1d1d1f] selection:bg-[#0071e3]/20 overflow-x-hidden">

    <!-- Global Nav (Dark Mode ala Apple) -->
    <!-- <nav class="fixed top-0 w-full z-50 bg-[#1d1d1f]/80 backdrop-blur-md border-b border-[#333336]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-12">
                <div class="flex items-center gap-3">
                    <span class="font-semibold text-[15px] tracking-tight text-white/90 hover:text-white transition-colors cursor-pointer">SIAKAD</span>
                </div>
                <div class="flex gap-6 text-[12px] font-medium text-white/70">
                    <a href="#fitur" class="hover:text-white transition-colors hidden sm:block">Fitur</a>
                    <a href="#ekosistem" class="hover:text-white transition-colors hidden sm:block">Ekosistem</a>
                    @if (Route::has('login'))
                    @auth
                    <a href="{{ url('/dashboard') }}" class="text-white hover:text-[#0071e3] transition-colors">Dasbor Utama</a>
                    @else
                    <a href="{{ route('login') }}" class="text-white hover:text-[#0071e3] transition-colors">Masuk</a>
                    @endauth
                    @endif
                </div>
            </div>
        </div>
    </nav> -->

    <!-- Hero Section (Tipografi Raksasa & Mockup) -->
    <main class="pt-32 pb-0 px-4 text-center flex flex-col items-center">
        <h2 class="text-[#86868b] font-semibold tracking-widest text-[11px] sm:text-xs mb-3 uppercase">Memperkenalkan</h2>
        <h1 class="text-6xl sm:text-8xl md:text-[120px] font-bold tracking-tighter text-[#1d1d1f] leading-none mb-4">SIAKAD.</h1>
        <h2 class="text-2xl sm:text-4xl md:text-5xl font-semibold tracking-tight text-[#1d1d1f] mb-8">SMKN 1 SIMPANG EMPAT.</h2>

        <div class="flex items-center gap-6 mb-16">
            @if (Route::has('login'))
            @auth
            <a href="{{ url('/dashboard') }}" class="px-6 py-2.5 rounded-full bg-[#0071e3] text-white text-[15px] font-semibold hover:bg-[#0077ED] active:scale-[0.98] transition-all duration-200">
                Buka Dasbor
            </a>
            @else
            <a href="{{ route('login') }}" class="px-6 py-2.5 rounded-full bg-[#0071e3] text-white text-[15px] font-semibold hover:bg-[#0077ED] active:scale-[0.98] transition-all duration-200">
                Mulai Sesi
            </a>
            <a href="#fitur" class="text-[15px] font-medium text-[#0071e3] hover:underline flex items-center gap-1">
                Pelajari lebih lanjut <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>
            @endauth
            @endif
        </div>

        <!-- Abstract Mac Mockup -->
        <div class="w-full max-w-5xl h-[300px] sm:h-[450px] bg-white rounded-t-[2.5rem] sm:rounded-t-[3.5rem] shadow-2xl border-t border-x border-[#d2d2d7]/80 relative overflow-hidden">
            <!-- Mac Window Dots -->
            <div class="absolute top-5 left-6 sm:left-8 flex gap-2">
                <div class="w-3 h-3 rounded-full bg-[#ff5f56] border border-[#e0443e]"></div>
                <div class="w-3 h-3 rounded-full bg-[#ffbd2e] border border-[#dea123]"></div>
                <div class="w-3 h-3 rounded-full bg-[#27c93f] border border-[#1aab29]"></div>
            </div>
            <!-- Mockup Content Skeleton -->
            <div class="absolute top-16 left-6 right-6 bottom-0 bg-[#f5f5f7] rounded-t-2xl border-t border-x border-[#d2d2d7]/50 flex">
                <div class="w-48 border-r border-[#d2d2d7]/50 h-full hidden sm:block p-4 space-y-3">
                    <div class="h-4 w-20 bg-[#d2d2d7] rounded-md"></div>
                    <div class="h-4 w-32 bg-[#d2d2d7]/50 rounded-md"></div>
                    <div class="h-4 w-24 bg-[#d2d2d7]/50 rounded-md"></div>
                </div>
                <div class="flex-1 p-8 space-y-6">
                    <div class="h-8 w-64 bg-[#d2d2d7] rounded-lg"></div>
                    <div class="grid grid-cols-3 gap-4">
                        <div class="h-32 bg-white rounded-2xl shadow-sm border border-[#d2d2d7]/50"></div>
                        <div class="h-32 bg-white rounded-2xl shadow-sm border border-[#d2d2d7]/50"></div>
                        <div class="h-32 bg-white rounded-2xl shadow-sm border border-[#d2d2d7]/50"></div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Fitur Bento Grid Section -->
    <section id="fitur" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 sm:gap-6 auto-rows-[280px]">

            <!-- Bento 1: Presensi (Dark, Span 2x2) -->
            <div class="md:col-span-2 md:row-span-2 bg-[#1d1d1f] rounded-[2rem] p-8 md:p-12 flex flex-col justify-between overflow-hidden relative group">
                <div class="relative z-10">
                    <h3 class="text-white text-3xl md:text-5xl font-semibold tracking-tight leading-tight">Presensi <br>secepat kilat.</h3>
                    <p class="text-[#86868b] mt-4 text-[17px] max-w-sm">Hanya dengan satu sentuhan, waktu kedatangan dan kepulangan Anda tercatat akurat hingga hitungan detik.</p>
                </div>
                <!-- Dekorasi Jam Digital -->
                <div class="absolute -bottom-10 -right-10 text-[120px] font-bold text-white/5 tracking-tighter font-mono group-hover:scale-105 transition-transform duration-700">
                    07:15
                </div>
            </div>

            <!-- Bento 2: E-Raport (Light, Span 2x1) -->
            <div class="md:col-span-2 md:row-span-1 bg-white rounded-[2rem] p-8 md:p-10 border border-[#d2d2d7]/50 overflow-hidden relative">
                <h3 class="text-[#1d1d1f] text-2xl md:text-3xl font-semibold tracking-tight">E-Raport Pintar.</h3>
                <p class="text-[#515154] mt-2 text-[15px]">Kalkulasi otomatis. Langsung siap cetak.</p>
                <div class="absolute right-8 bottom-8 text-emerald-500 font-semibold text-5xl tracking-tight">A+</div>
            </div>

            <!-- Bento 3: Jurnal PKL (Blue Gradient, Span 1x1) -->
            <div class="md:col-span-1 md:row-span-1 bg-gradient-to-br from-[#0071e3] to-[#005bb5] rounded-[2rem] p-8 flex flex-col justify-between text-white shadow-lg">
                <svg class="w-8 h-8 text-white/80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                </svg>
                <h3 class="text-xl font-semibold tracking-tight leading-snug">Jurnal PKL <br>Terintegrasi.</h3>
            </div>

            <!-- Bento 4: UI/UX (Light, Span 1x1) -->
            <div class="md:col-span-1 md:row-span-1 bg-white rounded-[2rem] p-8 border border-[#d2d2d7]/50 flex flex-col items-center justify-center text-center">
                <div class="w-12 h-12 rounded-full bg-[#f5f5f7] flex items-center justify-center mb-3">
                    <svg class="w-6 h-6 text-[#1d1d1f]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                    </svg>
                </div>
                <h3 class="text-[#1d1d1f] text-[17px] font-semibold tracking-tight">Desain minimal.</h3>
                <p class="text-[#86868b] text-[13px] mt-1">Tanpa distraksi.</p>
            </div>

        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-white border-t border-[#d2d2d7]/50 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row justify-between items-center gap-4">
            <p class="text-[12px] text-[#86868b]">Hak Cipta © 2026 SMKN 1 Simpang Empat. Hak cipta dilindungi undang-undang.</p>
            <div class="flex gap-4 text-[12px] text-[#515154]">
                <a href="#" class="hover:text-[#1d1d1f] hover:underline">Kebijakan Privasi</a>
                <span class="text-[#d2d2d7]">|</span>
                <a href="#" class="hover:text-[#1d1d1f] hover:underline">Syarat Penggunaan</a>
            </div>
        </div>
    </footer>

</body>

</html>