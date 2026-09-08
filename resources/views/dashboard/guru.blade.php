<x-dashboard-layout>
    <div class="max-w-7xl mx-auto space-y-6">

        <!-- Panel Selamat Datang -->
        <div class="bg-white rounded-3xl shadow-[0_2px_12px_rgba(0,0,0,0.04)] border border-[#d2d2d7]/50 p-6 md:p-8">
            <div class="flex items-center gap-4 border-b border-[#d2d2d7]/50 pb-6 mb-6">
                <!-- Ikon Profil -->
                <div class="w-16 h-16 rounded-2xl bg-[#0071e3]/10 text-[#0071e3] flex items-center justify-center font-semibold text-3xl">
                    {{ substr(Auth::user()->name, 0, 1) }}
                </div>
                <div>
                    <h2 class="text-2xl font-semibold tracking-tight text-[#1d1d1f]">Portal Guru Pengampu</h2>
                    <p class="text-[15px] text-[#86868b] mt-1">Selamat datang kembali, {{ Auth::user()->name }}.</p>
                </div>
            </div>

            <!-- Kartu Menu Navigasi -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <a href="{{ route('guru.jurnal') }}" class="block p-6 rounded-2xl bg-[#f5f5f7] hover:bg-[#e8e8ed] transition-colors border border-transparent hover:border-[#d2d2d7]/50">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="p-2.5 bg-white rounded-xl shadow-sm">
                            <svg class="w-5 h-5 text-[#0071e3]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-[17px] font-semibold text-[#1d1d1f]">Validasi Jurnal PKL</h3>
                    </div>
                    <p class="text-[15px] text-[#515154]">Periksa dan setujui laporan harian magang siswa bimbingan.</p>
                </a>

                <a href="{{ route('guru.nilai') }}" class="block p-6 rounded-2xl bg-[#f5f5f7] hover:bg-[#e8e8ed] transition-colors border border-transparent hover:border-[#d2d2d7]/50">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="p-2.5 bg-white rounded-xl shadow-sm">
                            <svg class="w-5 h-5 text-[#0071e3]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <h3 class="text-[17px] font-semibold text-[#1d1d1f]">Input Nilai Akademik</h3>
                    </div>
                    <p class="text-[15px] text-[#515154]">Kelola komponen nilai tugas, UTS, UAS, dan praktik kejuruan.</p>
                </a>
            </div>
        </div>

    </div>
</x-dashboard-layout>