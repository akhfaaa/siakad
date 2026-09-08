<x-dashboard-layout>
    <div class="max-w-7xl mx-auto space-y-6">

        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
            <div>
                <h2 class="text-2xl font-semibold tracking-tight text-[#1d1d1f]">Hasil Belajar Akademik</h2>
                <p class="text-[15px] text-[#86868b] mt-1">Transkrip nilai elektronik untuk <span class="font-medium text-[#1d1d1f]">{{ $siswa->nama_lengkap }}</span> (NIS: {{ $siswa->nis }}).</p>
            </div>

            @if($rataRata)
            <div class="bg-white px-5 py-3 rounded-2xl border border-[#d2d2d7]/50 shadow-sm flex items-center gap-4">
                <div class="text-[13px] text-[#86868b] font-medium uppercase tracking-wider">Rata-rata Keseluruhan</div>
                <div class="text-2xl font-semibold text-[#0071e3]">{{ number_format($rataRata, 1) }}</div>
            </div>
            @endif
        </div>

        <div class="bg-white rounded-3xl shadow-[0_2px_12px_rgba(0,0,0,0.04)] border border-[#d2d2d7]/50 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-[14px] text-[#1d1d1f]">
                    <thead class="bg-[#f5f5f7]/50 border-b border-[#d2d2d7]/50 text-[12px] uppercase tracking-wider text-[#86868b]">
                        <tr>
                            <th class="px-6 py-4 font-medium">Mata Pelajaran & Guru</th>
                            <th class="px-4 py-4 font-medium text-center">Periode</th>
                            <th class="px-4 py-4 font-medium text-center">Tugas (20%)</th>
                            <th class="px-4 py-4 font-medium text-center">UTS (25%)</th>
                            <th class="px-4 py-4 font-medium text-center">UAS (25%)</th>
                            <th class="px-4 py-4 font-medium text-center">Praktik (30%)</th>
                            <th class="px-6 py-4 font-medium text-center">Nilai Akhir</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-[#d2d2d7]/30">
                        @forelse($daftarNilai as $nilai)
                        <tr class="hover:bg-[#f5f5f7]/50 transition-colors">
                            <td class="px-6 py-4">
                                <div class="font-semibold text-[#1d1d1f]">{{ $nilai->mataPelajaran->nama_mapel ?? $nilai->mataPelajaran->nama_pelajaran ?? 'Mapel Tidak Diketahui' }}</div>
                                <div class="text-[13px] text-[#86868b] mt-0.5">Pengampu: {{ $nilai->guru->nama_lengkap ?? 'Guru Tidak Diketahui' }}</div>
                            </td>
                            <td class="px-4 py-4 text-center">
                                <span class="px-2.5 py-1 bg-[#f5f5f7] border border-[#d2d2d7]/50 rounded-lg text-[12px] font-medium text-[#515154]">
                                    {{ $nilai->semester }} {{ $nilai->tahun_ajaran }}
                                </span>
                            </td>
                            <td class="px-4 py-4 text-center font-mono text-[13px] text-[#515154]">{{ $nilai->nilai_tugas }}</td>
                            <td class="px-4 py-4 text-center font-mono text-[13px] text-[#515154]">{{ $nilai->nilai_uts }}</td>
                            <td class="px-4 py-4 text-center font-mono text-[13px] text-[#515154]">{{ $nilai->nilai_uas }}</td>
                            <td class="px-4 py-4 text-center font-mono text-[13px] text-[#515154]">{{ $nilai->nilai_praktik }}</td>
                            <td class="px-6 py-4 text-center">
                                <div class="inline-flex items-center justify-center min-w-[48px] py-1.5 px-2 rounded-lg font-semibold text-[15px]
                                    {{ $nilai->nilai_akhir >= 75 ? 'bg-emerald-50 text-emerald-700 border border-emerald-200' : 'bg-red-50 text-red-700 border border-red-200' }}">
                                    {{ number_format($nilai->nilai_akhir, 1) }}
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="px-6 py-16 text-center">
                                <svg class="w-12 h-12 mx-auto text-[#d2d2d7] mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                <p class="text-[15px] font-medium text-[#1d1d1f]">Belum Ada Nilai</p>
                                <p class="text-[13px] text-[#86868b] mt-1">Nilai akademik Anda belum diterbitkan oleh guru mata pelajaran.</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-dashboard-layout>