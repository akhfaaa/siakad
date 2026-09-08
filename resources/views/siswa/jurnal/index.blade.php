<x-dashboard-layout>
    <div class="max-w-7xl mx-auto space-y-6">

        <!-- Header Halaman -->
        <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4">
            <div>
                <h2 class="text-2xl font-semibold tracking-tight text-[#1d1d1f]">Jurnal Harian PKL</h2>
                <p class="text-[15px] text-[#86868b] mt-1">Catat dan laporkan aktivitas Praktik Kerja Lapangan Anda setiap hari.</p>
            </div>

            <!-- Tombol Tambah Jurnal -->
            <a href="{{ route('siswa.jurnal.create') }}" class="flex items-center justify-center gap-2 py-2.5 px-5 rounded-xl text-[15px] font-semibold text-white bg-[#0071e3] hover:bg-[#0077ED] active:scale-[0.98] transition-all duration-200 shadow-sm">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Tulis Jurnal Baru
            </a>
        </div>

        @if(session('success'))
        <div class="p-4 rounded-xl bg-emerald-50 text-emerald-700 text-[14px] font-medium border border-emerald-100">
            {{ session('success') }}
        </div>
        @endif

        <!-- Tabel Riwayat Jurnal -->
        <div class="bg-white rounded-3xl shadow-[0_2px_12px_rgba(0,0,0,0.04)] border border-[#d2d2d7]/50 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-[14px] text-[#1d1d1f]">
                    <thead class="bg-[#f5f5f7]/50 border-b border-[#d2d2d7]/50 text-[12px] uppercase tracking-wider text-[#86868b]">
                        <tr>
                            <th scope="col" class="px-6 py-4 font-medium">Tanggal</th>
                            <th scope="col" class="px-6 py-4 font-medium">Kegiatan</th>
                            <th scope="col" class="px-6 py-4 font-medium">Waktu</th>
                            <th scope="col" class="px-6 py-4 font-medium">Status Validasi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-[#d2d2d7]/30">
                        @forelse($riwayatJurnal as $jurnal)
                        <tr class="hover:bg-[#f5f5f7]/50 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap font-semibold text-[#1d1d1f]">
                                {{ \Carbon\Carbon::parse($jurnal->tanggal)->isoFormat('D MMM YYYY') }}
                            </td>
                            <td class="px-6 py-4">
                                <span class="line-clamp-1 max-w-xs text-[14px]">{{ $jurnal->deskripsi_kegiatan }}</span>
                            </td>
                            <td class="px-6 py-4 font-mono text-[13px] text-[#515154]">
                                {{ $jurnal->waktu_mulai }} - {{ $jurnal->waktu_selesai }}
                            </td>
                            <td class="px-6 py-4">
                                @if($jurnal->status_validasi === 'Disetujui')
                                <span class="px-2.5 py-1 rounded-full text-[11px] font-semibold tracking-wide bg-emerald-50 text-emerald-700 border border-emerald-200">DISETUJUI</span>
                                @elseif($jurnal->status_validasi === 'Revisi')
                                <span class="px-2.5 py-1 rounded-full text-[11px] font-semibold tracking-wide bg-red-50 text-red-700 border border-red-200">REVISI</span>
                                @else
                                <span class="px-2.5 py-1 rounded-full text-[11px] font-semibold tracking-wide bg-amber-50 text-amber-700 border border-amber-200">MENUNGGU</span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="px-6 py-12 text-center text-[#86868b]">
                                <svg class="w-12 h-12 mx-auto text-[#d2d2d7] mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                Belum ada jurnal yang ditulis.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</x-dashboard-layout>