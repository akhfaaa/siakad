<x-guest-layout>
    <!-- Logo & Judul -->
    <div class="text-center mb-8 sm:mb-10">
        <div class="w-20 h-20 sm:w-24 sm:h-24 mx-auto mb-4 sm:mb-5 drop-shadow-[0_8px_16px_rgba(0,0,0,0.4)] hover:scale-105 transition-transform duration-500 ease-out">
            <img src="{{ asset('images/smk.png') }}" alt="Logo SMKN 1 Simpang Empat" class="w-full h-full object-contain">
        </div>
        <h1 class="text-xl sm:text-2xl font-bold text-white tracking-tight">SIAKAD Vokasi</h1>
        <p class="text-xs sm:text-sm text-slate-400 mt-1 sm:mt-1.5 font-medium tracking-wide">SMKN 1 Simpang Empat</p>
    </div>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf

        <!-- Email Address -->
        <div>
            <label for="email" class="block text-sm font-medium text-slate-300 mb-2">Email Terdaftar</label>
            <input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username"
                class="block w-full px-5 py-3.5 rounded-xl bg-slate-900/50 border border-white/[0.06] text-white placeholder-slate-500 focus:bg-slate-900/80 focus:border-blue-500/50 focus:ring-1 focus:ring-blue-500/50 transition-all shadow-inner backdrop-blur-md"
                placeholder="nama@smk.com">
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-400" />
        </div>

        <!-- Password -->
        <div>
            <div class="flex justify-between items-center mb-2">
                <label for="password" class="block text-sm font-medium text-slate-300">Kata Sandi</label>
                @if (Route::has('password.request'))
                <a class="text-xs font-medium text-slate-400 hover:text-white transition-colors" href="{{ route('password.request') }}">
                    Lupa sandi?
                </a>
                @endif
            </div>
            <input id="password" type="password" name="password" required autocomplete="current-password"
                class="block w-full px-5 py-3.5 rounded-xl bg-slate-900/50 border border-white/[0.06] text-white placeholder-slate-500 focus:bg-slate-900/80 focus:border-blue-500/50 focus:ring-1 focus:ring-blue-500/50 transition-all shadow-inner backdrop-blur-md"
                placeholder="••••••••">
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-400" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center pt-2">
            <input id="remember_me" type="checkbox" name="remember" class="rounded border-white/10 bg-slate-900/50 text-blue-500 shadow-sm focus:ring-blue-500/50 focus:ring-offset-slate-900 w-4 h-4 cursor-pointer transition-all">
            <label for="remember_me" class="ml-3 text-sm text-slate-400 cursor-pointer hover:text-slate-300 transition-colors">Ingat perangkat ini</label>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="w-full mt-4 flex justify-center py-3.5 px-4 border border-white/10 rounded-xl shadow-lg shadow-blue-900/20 text-sm font-bold text-white bg-blue-600/90 hover:bg-blue-500 backdrop-blur-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-slate-950 focus:ring-blue-500 transition-all duration-300 active:scale-[0.98]">
            Login
        </button>
    </form>
</x-guest-layout>