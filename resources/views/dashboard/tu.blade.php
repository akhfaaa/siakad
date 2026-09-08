<x-dashboard-layout>
    <div class="max-w-7xl mx-auto space-y-6">

        <!-- Panel Selamat Datang -->
        <div class="bg-white rounded-3xl shadow-[0_2px_12px_rgba(0,0,0,0.04)] border border-[#d2d2d7]/50 p-6 md:p-8">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-b border-[#d2d2d7]/50 pb-6 mb-6">
                <div class="flex items-center gap-4">
                    <div class="w-16 h-16 rounded-2xl bg-[#0071e3]/10 text-[#0071e3] flex items-center justify-center font-semibold text-3xl">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </div>
                    <div>
                        <h2 class="text-2xl font-semibold tracking-tight text-[#1d1d1f]">Portal Tata Usaha</h2>
                        <p class="text-[15px] text-[#86868b] mt-1">Kelola data induk sekolah dan pengguna sistem.</p>
                    </div>
                </div>
            </div>

            <!-- Kartu Modul Utama -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <a href="{{ route('tu.siswa') }}" class="block p-6 rounded-2xl bg-[#f5f5f7] hover:bg-[#e8e8ed] transition-colors border border-transparent hover:border-[#d2d2d7]/50">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="p-2.5 bg-white rounded-xl shadow-sm text-[#0071e3]">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-[17px] font-semibold text-[#1d1d1f]">Manajemen Siswa</h3>
                    </div>
                    <p class="text-[15px] text-[#515154]">Tambah, edit, dan kelola data induk siswa serta status akun mereka.</p>
                </a>

                <a href="#" class="block p-6 rounded-2xl bg-[#f5f5f7] hover:bg-[#e8e8ed] transition-colors border border-transparent hover:border-[#d2d2d7]/50">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="p-2.5 bg-white rounded-xl shadow-sm text-[#0071e3]">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <h3 class="text-[17px] font-semibold text-[#1d1d1f]">Manajemen Guru</h3>
                    </div>
                    <p class="text-[15px] text-[#515154]">Atur data staf pengajar, akses wali kelas, dan mata pelajaran.</p>
                </a>
            </div>
        </div>
    </div>
</x-dashboard-layout>