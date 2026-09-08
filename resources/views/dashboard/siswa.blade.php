<x-dashboard-layout>
    <div class="max-w-7xl mx-auto space-y-6">

        <div class="bg-white rounded-3xl shadow-[0_2px_12px_rgba(0,0,0,0.04)] border border-[#d2d2d7]/50 p-6 md:p-8">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-b border-[#d2d2d7]/50 pb-6 mb-6">
                <div class="flex items-center gap-4">
                    <div class="w-16 h-16 rounded-2xl bg-[#0071e3]/10 text-[#0071e3] flex items-center justify-center font-semibold text-3xl">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </div>
                    <div>
                        <h2 class="text-2xl font-semibold tracking-tight text-[#1d1d1f]">Portal Siswa</h2>
                        <p class="text-[15px] text-[#86868b] mt-1">Selamat datang kembali, {{ Auth::user()->name }}.</p>
                    </div>
                </div>
                <div class="text-right">
                    <div class="text-[13px] text-[#86868b] font-medium uppercase tracking-wider">Tahun Ajaran</div>
                    <div class="text-[15px] font-semibold text-[#1d1d1f]">2026/2027 Ganjil</div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Menu Presensi -->
                <a href="{{ route('siswa.absensi') }}" class="block p-6 rounded-2xl bg-[#f5f5f7] hover:bg-[#e8e8ed] transition-colors border border-transparent hover:border-[#d2d2d7]/50">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="p-2.5 bg-white rounded-xl shadow-sm">
                            <svg class="w-5 h-5 text-[#0071e3]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-[17px] font-semibold text-[#1d1d1f]">Presensi Harian</h3>
                    </div>
                    <p class="text-[15px] text-[#515154]">Catat kehadiran Anda saat tiba di sekolah dan saat pulang.</p>
                </a>

                <!-- Menu Jurnal PKL -->
                <a href="{{ route('siswa.jurnal') }}" class="block p-6 rounded-2xl bg-[#f5f5f7] hover:bg-[#e8e8ed] transition-colors border border-transparent hover:border-[#d2d2d7]/50">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="p-2.5 bg-white rounded-xl shadow-sm">
                            <svg class="w-5 h-5 text-[#0071e3]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                        </div>
                        <h3 class="text-[17px] font-semibold text-[#1d1d1f]">Jurnal PKL</h3>
                    </div>
                    <p class="text-[15px] text-[#515154]">Tulis laporan kegiatan magang harian dan lihat status validasi.</p>
                </a>

                <!-- Menu E-Raport -->
                <a href="{{ route('siswa.raport') }}" class="block p-6 rounded-2xl bg-[#f5f5f7] hover:bg-[#e8e8ed] transition-colors border border-transparent hover:border-[#d2d2d7]/50">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="p-2.5 bg-white rounded-xl shadow-sm">
                            <svg class="w-5 h-5 text-[#0071e3]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                        </div>
                        <h3 class="text-[17px] font-semibold text-[#1d1d1f]">E-Raport</h3>
                    </div>
                    <p class="text-[15px] text-[#515154]">Lihat rekapitulasi nilai akademik dari seluruh mata pelajaran.</p>
                </a>
            </div>
        </div>

    </div>
</x-dashboard-layout>