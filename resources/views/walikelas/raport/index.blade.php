<x-dashboard-layout>
    <div class="max-w-7xl mx-auto space-y-6">

        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
            <div>
                <h2 class="text-2xl font-semibold tracking-tight text-[#1d1d1f]">Cetak Raport Siswa</h2>
                <p class="text-[15px] text-[#86868b] mt-1">Daftar siswa kelas binaan <span class="font-medium text-[#1d1d1f]">XI TKJ 1</span> Tahun Ajaran 2026/2027.</p>
            </div>
        </div>

        <div class="bg-white rounded-3xl shadow-[0_2px_12px_rgba(0,0,0,0.04)] border border-[#d2d2d7]/50 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-[14px] text-[#1d1d1f]">
                    <thead class="bg-[#f5f5f7]/50 border-b border-[#d2d2d7]/50 text-[12px] uppercase tracking-wider text-[#86868b]">
                        <tr>
                            <th class="px-6 py-4 font-medium">Data Siswa</th>
                            <th class="px-6 py-4 font-medium text-center">NIS</th>
                            <th class="px-6 py-4 font-medium text-center">Jenis Kelamin</th>
                            <th class="px-6 py-4 font-medium text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-[#d2d2d7]/30">
                        @foreach($daftarSiswa as $siswa)
                        <tr class="hover:bg-[#f5f5f7]/50 transition-colors">
                            <td class="px-6 py-4">
                                <div class="font-semibold text-[#1d1d1f]">{{ $siswa->nama_lengkap }}</div>
                                <div class="text-[13px] text-[#86868b] mt-0.5">Siswa Aktif</div>
                            </td>
                            <td class="px-6 py-4 text-center font-mono text-[13px] text-[#515154]">
                                {{ $siswa->nis }}
                            </td>
                            <td class="px-6 py-4 text-center text-[13px] text-[#515154]">
                                {{ $siswa->jenis_kelamin === 'L' ? 'Laki-laki' : 'Perempuan' }}
                            </td>
                            <td class="px-6 py-4 text-center">
                                <a href="{{ route('walikelas.raport.cetak', $siswa->id) }}" target="_blank" class="inline-flex items-center justify-center gap-2 px-4 py-2 rounded-xl bg-[#0071e3] text-white hover:bg-[#0077ED] transition-colors text-[13px] font-semibold shadow-sm active:scale-[0.98]">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path>
                                    </svg>
                                    Cetak
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-dashboard-layout>