<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIAKAD Pro - SMKN 1 Simpang Empat</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        /* Apple-style Smooth Scroll Reveal */
        .reveal {
            opacity: 0;
            transform: translateY(40px) scale(0.98);
            transition: all 1.2s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .reveal.active {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
        .reveal-delay-1 { transition-delay: 0.1s; }
        .reveal-delay-2 { transition-delay: 0.2s; }
        .reveal-delay-3 { transition-delay: 0.3s; }

        /* Floating Widgets Animation */
        @keyframes float-slow {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(1.5deg); }
        }
        @keyframes float-slower {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-15px) rotate(-1.5deg); }
        }
        .animate-float-1 { animation: float-slow 7s ease-in-out infinite; }
        .animate-float-2 { animation: float-slower 9s ease-in-out infinite 1s; }
        .animate-float-3 { animation: float-slow 8s ease-in-out infinite 2s; }
        .animate-float-4 { animation: float-slower 8.5s ease-in-out infinite 1.5s; }

        /* Marquee Animation */
        @keyframes scroll {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }
        .animate-scroll {
            animation: scroll 30s linear infinite;
            display: flex;
            width: max-content;
        }
        .animate-scroll:hover { animation-play-state: paused; }
        html { scroll-behavior: smooth; }
        
        /* Subtle Mesh Background */
        .mesh-bg {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 80vw;
            height: 80vh;
            background: radial-gradient(circle at 20% 30%, rgba(0, 113, 227, 0.12) 0%, transparent 40%),
                        radial-gradient(circle at 80% 70%, rgba(147, 51, 234, 0.08) 0%, transparent 40%);
            filter: blur(80px);
            z-index: -1;
            pointer-events: none;
        }
    </style>
</head>
<body class="bg-[#fcfcfd] font-['Inter'] antialiased text-[#1d1d1f] selection:bg-[#0071e3]/20 overflow-x-hidden relative">

    <!-- Navbar -->
    <nav class="fixed top-0 w-full z-50 bg-[#fcfcfd]/70 backdrop-blur-2xl border-b border-[#1d1d1f]/[0.05] transition-all duration-300" id="navbar">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-14">
                <div class="flex items-center gap-3">
                    <span class="font-semibold text-[17px] tracking-tight text-[#1d1d1f]">SIAKAD<span class="text-[#0071e3]">SMK TUPAT</span></span>
                </div>
                <div class="flex gap-8 text-[13px] font-medium text-[#515154]">
                    <a href="#fitur" class="hover:text-[#1d1d1f] transition-colors hidden sm:block">Fitur Inovatif</a>
                    <a href="#jurusan" class="hover:text-[#1d1d1f] transition-colors hidden sm:block">Ekosistem Keahlian</a>
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="text-[#0071e3] hover:text-[#0077ED] transition-colors font-semibold">Dasbor Utama</a>
                        @else
                            <a href="{{ route('login') }}" class="text-[#0071e3] hover:text-[#0077ED] transition-colors font-semibold">Masuk Portal</a>
                        @endauth
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <!-- HERO SECTION (Mesh Gradient & Scroll Reveal) -->
    <main class="relative pt-32 pb-20 sm:pt-44 sm:pb-32 px-4 mx-auto max-w-7xl text-center min-h-[90vh] flex flex-col justify-center items-center">
        <!-- Aurora / Mesh Gradient Background -->
        <div class="mesh-bg"></div>
        
        <!-- Floating Widgets (Desktop Only) -->
        <div class="absolute top-32 left-4 lg:left-12 animate-float-1 hidden md:flex items-center gap-3 bg-white/70 backdrop-blur-2xl border border-white/50 p-3 pr-5 rounded-[20px] shadow-[0_8px_32px_rgba(0,0,0,0.06)] z-10">
            <div class="w-11 h-11 bg-[#1d1d1f] rounded-xl flex items-center justify-center text-white"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path></svg></div>
            <div class="text-left"><p class="text-[13px] font-bold text-[#1d1d1f] tracking-tight">TKJ</p><p class="text-[11px] font-medium text-[#86868b]">Konektivitas</p></div>
        </div>
        <div class="absolute top-40 right-4 lg:right-12 animate-float-2 hidden md:flex items-center gap-3 bg-white/70 backdrop-blur-2xl border border-white/50 p-3 pr-5 rounded-[20px] shadow-[0_8px_32px_rgba(0,0,0,0.06)] z-10">
            <div class="w-11 h-11 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-xl flex items-center justify-center text-white"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path></svg></div>
            <div class="text-left"><p class="text-[13px] font-bold text-[#1d1d1f] tracking-tight">RPL</p><p class="text-[11px] font-medium text-[#86868b]">Inovasi Kode</p></div>
        </div>
        <div class="absolute bottom-24 left-12 lg:left-32 animate-float-3 hidden md:flex items-center gap-3 bg-white/70 backdrop-blur-2xl border border-white/50 p-3 pr-5 rounded-[20px] shadow-[0_8px_32px_rgba(0,0,0,0.06)] z-10">
            <div class="w-11 h-11 bg-gradient-to-br from-purple-500 to-pink-500 rounded-xl flex items-center justify-center text-white"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg></div>
            <div class="text-left"><p class="text-[13px] font-bold text-[#1d1d1f] tracking-tight">DKV</p><p class="text-[11px] font-medium text-[#86868b]">Kreativitas</p></div>
        </div>

        <!-- Typography Utama -->
        <div class="relative z-20 reveal">
            <h2 class="text-[#86868b] font-semibold tracking-widest text-[12px] mb-6 uppercase">Ekosistem Pendidikan Digital</h2>
            
            <h1 class="text-6xl sm:text-7xl md:text-[100px] font-extrabold tracking-tighter text-[#1d1d1f] leading-[1.05] mb-6">
                Cerdas. <br>
                <span class="bg-clip-text text-transparent bg-gradient-to-r from-[#0071e3] via-indigo-500 to-purple-600">Sangat bertenaga.</span>
            </h1>
            
            <p class="text-[20px] sm:text-[22px] font-medium text-[#515154] max-w-2xl mx-auto mb-12 leading-relaxed">
                Manajemen akademik yang dirancang ulang. Menyatukan presensi, jurnal, dan e-raport dalam satu pengalaman magis yang mulus.
            </p>
            
            <div class="flex flex-col sm:flex-row items-center justify-center gap-5">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="w-full sm:w-auto px-8 py-4 rounded-full bg-[#1d1d1f] text-white text-[17px] font-semibold hover:bg-black hover:scale-105 active:scale-[0.98] transition-all duration-300 shadow-[0_8px_20px_rgba(0,0,0,0.15)]">
                            Buka Dasbor
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="w-full sm:w-auto px-8 py-4 rounded-full bg-[#0071e3] text-white text-[17px] font-semibold hover:bg-[#0077ED] hover:shadow-[0_8px_25px_rgba(0,113,227,0.3)] hover:scale-105 active:scale-[0.98] transition-all duration-300">
                            Mulai Sesi
                        </a>
                    @endauth
                @endif
                <a href="#fitur" class="w-full sm:w-auto px-8 py-4 rounded-full bg-white/50 backdrop-blur-md border border-[#d2d2d7]/50 text-[#1d1d1f] text-[17px] font-semibold hover:bg-white hover:scale-105 active:scale-[0.98] transition-all duration-300">
                    Jelajahi Fitur
                </a>
            </div>
        </div>
    </main>

    <!-- BENTO GRID SECTION -->
    <section id="fitur" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-32 border-t border-[#d2d2d7]/30">
        <div class="text-center mb-16 reveal">
            <h2 class="text-4xl md:text-5xl font-bold tracking-tight text-[#1d1d1f]">Fitur inti. Didesain sempurna.</h2>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 sm:gap-6 auto-rows-[300px]">
            <!-- Bento 1: Presensi (Hitam Elegan dengan Glow) -->
            <div class="md:col-span-2 md:row-span-2 bg-[#000000] rounded-[2.5rem] p-10 md:p-14 flex flex-col justify-between overflow-hidden relative group reveal reveal-delay-1 shadow-xl">
                <!-- Inner Glow -->
                <div class="absolute inset-0 bg-gradient-to-br from-slate-800/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                <div class="relative z-10">
                    <h3 class="text-[#f5f5f7] text-4xl md:text-5xl font-semibold tracking-tight leading-[1.1]">Presensi <br>secepat kilat.</h3>
                    <p class="text-[#a1a1a6] mt-5 text-[17px] max-w-sm leading-relaxed">Teknologi pencatatan kehadiran presisi tinggi. Tanpa jeda, terintegrasi langsung ke sistem sekolah.</p>
                </div>
                <div class="absolute -bottom-8 -right-8 text-[140px] font-bold text-white/[0.03] tracking-tighter font-mono group-hover:scale-105 transition-transform duration-700">
                    07:15
                </div>
            </div>

            <!-- Bento 2: E-Raport (Putih Bersih) -->
            <div class="md:col-span-2 md:row-span-1 bg-white rounded-[2.5rem] p-10 border border-[#d2d2d7]/50 overflow-hidden relative group reveal reveal-delay-2 shadow-sm hover:shadow-lg transition-shadow duration-500">
                <h3 class="text-[#1d1d1f] text-3xl font-semibold tracking-tight">E-Raport Pintar.</h3>
                <p class="text-[#86868b] mt-3 text-[16px] max-w-[250px]">Kalkulasi nilai otomatis. Dokumen PDF siap cetak dalam satu klik.</p>
                <div class="absolute right-8 bottom-4 text-transparent bg-clip-text bg-gradient-to-br from-emerald-400 to-emerald-600 font-bold text-[80px] tracking-tighter group-hover:scale-110 transition-transform duration-500 origin-bottom-right">
                    A+
                </div>
            </div>

            <!-- Bento 3: Jurnal PKL (Gradient Khas Apple) -->
            <div class="md:col-span-1 md:row-span-1 bg-gradient-to-br from-[#0071e3] to-[#42a1ff] rounded-[2.5rem] p-8 flex flex-col justify-between text-white shadow-lg relative overflow-hidden group reveal reveal-delay-3 hover:-translate-y-2 transition-transform duration-500">
                <div class="absolute top-0 right-0 w-32 h-32 bg-white/10 rounded-full blur-2xl -mr-10 -mt-10"></div>
                <svg class="w-9 h-9 text-white/90 group-hover:scale-110 group-hover:rotate-12 transition-transform duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                <h3 class="text-2xl font-semibold tracking-tight leading-snug relative z-10">Jurnal PKL <br>Real-time.</h3>
            </div>

            <!-- Bento 4: Minimalis / Aman -->
            <div class="md:col-span-1 md:row-span-1 bg-white rounded-[2.5rem] p-8 border border-[#d2d2d7]/50 flex flex-col items-center justify-center text-center reveal reveal-delay-3 hover:shadow-lg transition-shadow duration-500">
                <div class="w-14 h-14 rounded-full bg-[#f5f5f7] flex items-center justify-center mb-4">
                    <svg class="w-7 h-7 text-[#1d1d1f]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                </div>
                <h3 class="text-[#1d1d1f] text-[18px] font-semibold tracking-tight">Privasi Aman.</h3>
                <p class="text-[#86868b] text-[14px] mt-1">Enkripsi data berlapis.</p>
            </div>
        </div>
    </section>

    <!-- MARQUEE JURUSAN (Premium Glassmorphism) -->
    <section id="jurusan" class="py-32 bg-[#fcfcfd] overflow-hidden relative">
        <div class="text-center mb-16 px-4 reveal">
            <h2 class="text-4xl md:text-5xl font-bold tracking-tight text-[#1d1d1f]">Mendukung setiap keahlian.</h2>
            <p class="text-[19px] text-[#86868b] mt-4 max-w-2xl mx-auto">Sistem yang dirancang fleksibel untuk beradaptasi dengan seluruh program kompetensi di sekolah Anda.</p>
        </div>

        <div class="relative w-full flex reveal reveal-delay-1">
            <!-- Fade edges -->
            <div class="absolute top-0 left-0 w-32 h-full bg-gradient-to-r from-[#fcfcfd] to-transparent z-10"></div>
            <div class="absolute top-0 right-0 w-32 h-full bg-gradient-to-l from-[#fcfcfd] to-transparent z-10"></div>
            
            <div class="animate-scroll flex gap-6 px-3">
                <!-- Data Jurusan -->
                @php
                    $jurusans = [
                        ['nama' => 'Teknik Komputer & Jaringan', 'desc' => 'Infrastruktur IT & Keamanan Siber.', 'bg' => 'bg-[#1d1d1f]', 'icon' => 'M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9'],
                        ['nama' => 'Rekayasa Perangkat Lunak', 'desc' => 'Web, Algoritma & Aplikasi Mobile.', 'bg' => 'bg-gradient-to-br from-blue-500 to-indigo-600', 'icon' => 'M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4'],
                        ['nama' => 'Desain Komunikasi Visual', 'desc' => 'UI/UX, Fotografi & Seni Digital.', 'bg' => 'bg-gradient-to-br from-purple-500 to-pink-500', 'icon' => 'M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z'],
                        ['nama' => 'Akuntansi & Keuangan', 'desc' => 'Pembukuan & Administrasi Bisnis.', 'bg' => 'bg-gradient-to-br from-emerald-400 to-teal-500', 'icon' => 'M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z']
                    ];
                @endphp

                <!-- Loop 2 kali agar infinite scroll tidak terputus -->
                @for ($i = 0; $i < 2; $i++)
                    @foreach ($jurusans as $j)
                    <div class="w-80 bg-white/50 backdrop-blur-xl rounded-[2rem] p-8 border border-[#d2d2d7]/40 hover:bg-white shadow-[0_4px_20px_rgba(0,0,0,0.03)] hover:shadow-[0_20px_40px_rgba(0,0,0,0.08)] hover:-translate-y-3 transition-all duration-500 cursor-default group">
                        <div class="w-14 h-14 {{ $j['bg'] }} rounded-2xl flex items-center justify-center mb-6 text-white shadow-inner group-hover:scale-110 group-hover:rotate-6 transition-transform duration-500">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="{{ $j['icon'] }}"></path></svg>
                        </div>
                        <h4 class="text-[20px] font-semibold text-[#1d1d1f] tracking-tight">{{ $j['nama'] }}</h4>
                        <p class="text-[15px] text-[#86868b] mt-2 leading-relaxed">{{ $j['desc'] }}</p>
                    </div>
                    @endforeach
                @endfor
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="bg-white py-12 border-t border-[#d2d2d7]/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row justify-between items-center gap-4">
            <p class="text-[13px] font-medium text-[#86868b]">Hak Cipta © 2026 SMKN 1 Simpang Empat.</p>
            <div class="flex gap-6 text-[13px] font-medium text-[#86868b]">
                <a href="#" class="hover:text-[#1d1d1f] transition-colors">Kebijakan Privasi</a>
                <span class="text-[#d2d2d7]">|</span>
                <a href="#" class="hover:text-[#1d1d1f] transition-colors">Syarat Penggunaan</a>
            </div>
        </div>
    </footer>

    <!-- SCRIPT: Scroll Reveal Animations ala Apple -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Setup Intersection Observer untuk memunculkan elemen saat di-scroll
            const observerOptions = {
                root: null,
                rootMargin: '0px',
                threshold: 0.15 // Elemen akan muncul saat 15% bagiannya masuk layar
            };

            const observer = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('active');
                        // Optional: stop observing once revealed
                        // observer.unobserve(entry.target); 
                    }
                });
            }, observerOptions);

            // Observasi semua elemen dengan class 'reveal'
            document.querySelectorAll('.reveal').forEach(el => {
                observer.observe(el);
            });
            
            // Efek Blur Navbar saat discroll ke bawah
            window.addEventListener('scroll', () => {
                const nav = document.getElementById('navbar');
                if (window.scrollY > 20) {
                    nav.classList.add('shadow-sm');
                    nav.classList.replace('bg-[#fcfcfd]/70', 'bg-white/80');
                } else {
                    nav.classList.remove('shadow-sm');
                    nav.classList.replace('bg-white/80', 'bg-[#fcfcfd]/70');
                }
            });
        });
    </script>
</body>
</html>