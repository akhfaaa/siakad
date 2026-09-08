<x-dashboard-layout>
    <div class="max-w-7xl mx-auto space-y-6">

        <!-- Header -->
        <div class="flex items-center gap-4 bg-slate-900/50 backdrop-blur-xl border border-white/[0.08] shadow-lg rounded-2xl p-6">
            <div class="w-16 h-16 rounded-2xl bg-amber-600/20 border border-amber-500/30 flex items-center justify-center text-amber-400 font-bold text-2xl">
                {{ substr(Auth::user()->name, 0, 1) }}
            </div>
            <div>
                <h2 class="text-2xl font-bold text-white tracking-tight">Portal Kepala Sekolah</h2>
                <p class="text-sm text-slate-400 mt-1">Sistem Informasi Akademik Eksekutif</p>
            </div>
        </div>

        <!-- Statistik Cepat -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div class="p-6 rounded-xl bg-slate-900/50 backdrop-blur-xl border border-white/[0.08] shadow-lg">
                <div class="text-slate-400 text-sm font-medium mb-1">Total Siswa Aktif</div>
                <div class="text-3xl font-bold text-white">1,248</div>
            </div>
            <div class="p-6 rounded-xl bg-slate-900/50 backdrop-blur-xl border border-white/[0.08] shadow-lg">
                <div class="text-slate-400 text-sm font-medium mb-1">Total Tenaga Pendidik</div>
                <div class="text-3xl font-bold text-white">86</div>
            </div>
            <div class="p-6 rounded-xl bg-slate-900/50 backdrop-blur-xl border border-white/[0.08] shadow-lg">
                <div class="text-slate-400 text-sm font-medium mb-1">Tingkat Kehadiran (Hari Ini)</div>
                <div class="text-3xl font-bold text-emerald-400">94.5%</div>
            </div>
            <div class="p-6 rounded-xl bg-slate-900/50 backdrop-blur-xl border border-white/[0.08] shadow-lg">
                <div class="text-slate-400 text-sm font-medium mb-1">Mitra DUDI (Aktif)</div>
                <div class="text-3xl font-bold text-blue-400">42</div>
            </div>
        </div>

        <!-- Menu Laporan -->
        <div class="bg-slate-900/50 backdrop-blur-xl border border-white/[0.08] shadow-lg rounded-2xl p-6">
            <h3 class="text-lg font-bold text-white mb-4">Laporan & Persetujuan</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <a href="#" class="flex items-center gap-4 p-4 rounded-xl bg-white/[0.02] border border-white/[0.05] hover:bg-white/[0.04] transition-colors">
                    <div class="p-3 rounded-lg bg-blue-500/10 text-blue-400"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg></div>
                    <div>
                        <div class="font-semibold text-slate-200">Statistik Akademik</div>
                        <div class="text-xs text-slate-500">Lihat grafik perkembangan nilai rata-rata.</div>
                    </div>
                </a>
                <a href="#" class="flex items-center gap-4 p-4 rounded-xl bg-white/[0.02] border border-white/[0.05] hover:bg-white/[0.04] transition-colors">
                    <div class="p-3 rounded-lg bg-emerald-500/10 text-emerald-400"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg></div>
                    <div>
                        <div class="font-semibold text-slate-200">Persetujuan Dokumen</div>
                        <div class="text-xs text-slate-500">Validasi SK Mengajar dan Raport Akhir.</div>
                    </div>
                </a>
            </div>
        </div>

    </div>
</x-dashboard-layout>