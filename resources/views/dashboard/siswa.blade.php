<x-dashboard-layout>

    <div class="max-w-7xl mx-auto">
        <!-- Panel Liquid Glass Dark Mode -->
        <div class="bg-slate-900/50 backdrop-blur-xl border border-white/[0.08] overflow-hidden shadow-lg shadow-blue-900/20 sm:rounded-2xl p-6 md:p-8">
            <div class="flex items-center gap-4 border-b border-white/10 pb-6 mb-6">
                <div class="w-16 h-16 rounded-2xl bg-blue-600/20 border border-blue-500/30 flex items-center justify-center text-blue-400 font-bold text-2xl">
                    {{ substr(Auth::user()->name, 0, 1) }}
                </div>
                <div>
                    <h2 class="text-2xl font-bold text-white tracking-tight">Portal Siswa</h2>
                    <p class="text-sm text-slate-400 mt-1">Selamat datang kembali, {{ Auth::user()->name }}</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="p-6 rounded-xl bg-white/[0.02] border border-white/[0.05] hover:bg-white/[0.04] transition-colors">
                    <h3 class="text-slate-300 font-semibold">Presensi Harian</h3>
                    <p class="text-slate-500 text-sm mt-2">Batas waktu masuk: 07.30 WITA</p>
                </div>
                <div class="p-6 rounded-xl bg-white/[0.02] border border-white/[0.05] hover:bg-white/[0.04] transition-colors">
                    <h3 class="text-slate-300 font-semibold">Jurnal PKL</h3>
                    <p class="text-slate-500 text-sm mt-2">Belum ada jurnal hari ini.</p>
                </div>
                <div class="p-6 rounded-xl bg-white/[0.02] border border-white/[0.05] hover:bg-white/[0.04] transition-colors">
                    <h3 class="text-slate-300 font-semibold">Laporan Nilai</h3>
                    <p class="text-slate-500 text-sm mt-2">Semester Ganjil 2026/2027</p>
                </div>
            </div>
        </div>
    </div>

</x-dashboard-layout>