<x-dashboard-layout>
    <div class="max-w-7xl mx-auto space-y-6">

        <div class="bg-slate-900/50 backdrop-blur-xl border border-white/[0.08] shadow-lg shadow-pink-900/20 rounded-2xl p-6 md:p-8">
            <div class="flex items-center gap-4 border-b border-white/10 pb-6 mb-6">
                <div class="w-16 h-16 rounded-2xl bg-pink-600/20 border border-pink-500/30 flex items-center justify-center text-pink-400 font-bold text-2xl">
                    {{ substr(Auth::user()->name, 0, 1) }}
                </div>
                <div>
                    <h2 class="text-2xl font-bold text-white tracking-tight">Portal Orang Tua</h2>
                    <p class="text-sm text-slate-400 mt-1">Selamat datang, {{ Auth::user()->name }}</p>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
                <a href="#" class="p-5 rounded-xl bg-white/[0.02] border border-white/[0.05] hover:bg-white/[0.04] transition-colors text-center">
                    <svg class="w-8 h-8 mx-auto text-emerald-400 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <div class="font-semibold text-slate-300">Presensi Anak</div>
                </a>
                <a href="#" class="p-5 rounded-xl bg-white/[0.02] border border-white/[0.05] hover:bg-white/[0.04] transition-colors text-center">
                    <svg class="w-8 h-8 mx-auto text-blue-400 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    <div class="font-semibold text-slate-300">Nilai Akademik</div>
                </a>
                <a href="#" class="p-5 rounded-xl bg-white/[0.02] border border-white/[0.05] hover:bg-white/[0.04] transition-colors text-center">
                    <svg class="w-8 h-8 mx-auto text-amber-400 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                    <div class="font-semibold text-slate-300">Jurnal PKL Anak</div>
                </a>
                <a href="#" class="p-5 rounded-xl bg-white/[0.02] border border-white/[0.05] hover:bg-white/[0.04] transition-colors text-center">
                    <svg class="w-8 h-8 mx-auto text-purple-400 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                    </svg>
                    <div class="font-semibold text-slate-300">Pesan Wali Kelas</div>
                </a>
            </div>
        </div>

    </div>
</x-dashboard-layout>