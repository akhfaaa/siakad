<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Masuk - SIAKAD</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Menggunakan font Inter sebagai alternatif gratis yang paling mirip dengan font Apple San Francisco -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
</head>

<body class="bg-[#f5f5f7] font-['Inter'] antialiased text-[#1d1d1f] selection:bg-[#0071e3]/20">

    <!-- Navbar Minimalis ala Apple -->
    <!-- <nav class="w-full bg-white/70 backdrop-blur-md border-b border-black/[0.05] fixed top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-center h-12 items-center">
                <span class="font-semibold text-lg tracking-tight">SIAKAD SMK TUPAT</span>
            </div>
        </div>
    </nav> -->

    <!-- Kontainer Form -->
    <div class="min-h-screen flex flex-col justify-center items-center py-12 px-4 sm:px-6 lg:px-8 pt-20">

        <!-- Header Typography & Logo -->
        <div class="text-center mb-10 flex flex-col items-center">
            <!-- Tempat Logo SMK -->
            <img src="{{ asset('images/smk.png') }}" alt="Logo SMKN 1 Simpang Empat" class="w-24 h-24 mb-6 drop-shadow-sm object-contain">

            <h1 class="text-3xl sm:text-4xl font-semibold tracking-tight text-[#1d1d1f]">Masuk ke Portal.</h1>
            <p class="mt-3 text-[17px] text-[#86868b]">Gunakan kredensial akademik Anda.</p>
        </div>

        <div class="max-w-[420px] w-full">
            <!-- Session Status -->
            @if (session('status'))
            <div class="mb-4 text-sm font-medium text-emerald-600 text-center">
                {{ session('status') }}
            </div>
            @endif

            <!-- Error Messages -->
            @if ($errors->any())
            <div class="mb-4 text-sm text-red-600 text-center bg-red-50 py-3 rounded-xl">
                Kredensial yang diberikan tidak cocok.
            </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="space-y-4">
                @csrf

                <!-- Kontainer Input yang Menyatu (Apple Style) -->
                <div class="bg-white rounded-2xl shadow-[0_2px_12px_rgba(0,0,0,0.04)] border border-[#d2d2d7] overflow-hidden">

                    <!-- Input Email -->
                    <div class="relative border-b border-[#d2d2d7]">
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus placeholder="Email atau ID Pengguna"
                            class="peer block w-full px-4 py-4 bg-transparent border-none focus:ring-0 text-[17px] placeholder-transparent">
                        <label for="email" class="absolute left-4 top-1.5 text-xs text-[#86868b] transition-all peer-placeholder-shown:text-[17px] peer-placeholder-shown:top-4 peer-focus:top-1.5 peer-focus:text-xs">
                            Email atau ID Pengguna
                        </label>
                    </div>

                    <!-- Input Password -->
                    <div class="relative">
                        <input id="password" type="password" name="password" required placeholder="Kata Sandi"
                            class="peer block w-full px-4 py-4 bg-transparent border-none focus:ring-0 text-[17px] placeholder-transparent">
                        <label for="password" class="absolute left-4 top-1.5 text-xs text-[#86868b] transition-all peer-placeholder-shown:text-[17px] peer-placeholder-shown:top-4 peer-focus:top-1.5 peer-focus:text-xs">
                            Kata Sandi
                        </label>
                    </div>
                </div>

                <div class="flex items-center justify-between pt-2">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input id="remember_me" type="checkbox" name="remember" class="w-4 h-4 rounded text-[#0071e3] border-[#d2d2d7] focus:ring-[#0071e3] focus:ring-offset-0">
                        <span class="text-sm text-[#1d1d1f]">Ingat saya</span>
                    </label>

                    @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-sm text-[#0071e3] hover:underline">
                        Lupa kata sandi?
                    </a>
                    @endif
                </div>

                <div class="pt-4">
                    <button type="submit" class="w-full py-3.5 px-4 rounded-xl text-[17px] font-semibold text-white bg-[#0071e3] hover:bg-[#0077ED] active:scale-[0.98] transition-all duration-200">
                        Lanjutkan
                    </button>
                </div>
            </form>
        </div>

        <!-- Footer -->
        <div class="mt-16 border-t border-[#d2d2d7] pt-8 max-w-md w-full text-center">
            <p class="text-xs text-[#86868b]">
                Sistem Informasi Akademik <br> Hak Cipta © 2026 SMKN 1 Simpang Empat.
            </p>
        </div>

    </div>
</body>

</html>