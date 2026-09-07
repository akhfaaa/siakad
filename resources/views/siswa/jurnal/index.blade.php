<x-dashboard-layout>
    <div class="max-w-7xl mx-auto space-y-6">

        <!-- Header Halaman -->
        <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4">
            <div>
                <h2 class="text-2xl font-bold text-white tracking-tight">Jurnal Harian PKL</h2>
                <p class="text-sm text-slate-400 mt-1">Catat dan laporkan aktivitas Praktik Kerja Lapangan Anda setiap hari.</p>
            </div>

            <!-- Tombol Tambah Jurnal -->
            <a href="{{ route('siswa.jurnal.create') }}" class="flex items-center justify-center gap-2 py-2.5 px-5 rounded-xl text-sm font-bold text-white bg-blue-600/90 border border-blue-500/50 shadow-[0_0_15px_rgba(37,99,235,0.3)] hover:bg-blue-500 hover:shadow-[0_0_25px_rgba(37,99,235,0.4)] transition-all duration-300">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Tulis Jurnal Baru
            </a>
        </div>

        <!-- Notifikasi Flash Message -->
        @if(session('success'))
        <div class="mb-4 p-3 rounded-xl bg-emerald-500/20 border border-emerald-500/30 text-emerald-400 text-sm font-medium text-center">
            {{ session('success') }}
        </div>
        @endif

        <!-- Tabel Riwayat Jurnal -->
        <div class="bg-slate-900/50 backdrop-blur-xl border border-white/[0.08] shadow-lg shadow-cyan-900/5 rounded-2xl overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-slate-300">
                    <thead class="bg-white/[0.02] border-b border-white/[0.05] text-xs uppercase text-slate-400">
                        <tr>
                            <th scope="col" class="px-6 py-4 font-medium">Tanggal</th>
                            <th scope="col" class="px-6 py-4 font-medium">Kegiatan</th>
                            <th scope="col" class="px-6 py-4 font-medium">Waktu</th>
                            <th scope="col" class="px-6 py-4 font-medium">Status Validasi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/[0.05]">
                        @forelse($riwayatJurnal as $jurnal)
                        <tr class="hover:bg-white/[0.02] transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap text-white font-medium">
                                {{ \Carbon\Carbon::parse($jurnal->tanggal)->isoFormat('D MMM YYYY') }}
                            </td>
                            <td class="px-6 py-4">
                                <span class="line-clamp-1 max-w-xs">{{ $jurnal->deskripsi_kegiatan }}</span>
                            </td>
                            <td class="px-6 py-4 font-mono text-slate-400">
                                {{ $jurnal->waktu_mulai }} - {{ $jurnal->waktu_selesai }}
                            </td>
                            <td class="px-6 py-4">
                                @if($jurnal->status_validasi === 'Disetujui')
                                <span class="px-2.5 py-1 rounded-full text-[10px] font-bold tracking-wider bg-emerald-500/20 text-emerald-400 border border-emerald-500/30">DISETUJUI</span>
                                @elseif($jurnal->status_validasi === 'Revisi')
                                <span class="px-2.5 py-1 rounded-full text-[10px] font-bold tracking-wider bg-pink-500/20 text-pink-400 border border-pink-500/30">REVISI</span>
                                @else
                                <span class="px-2.5 py-1 rounded-full text-[10px] font-bold tracking-wider bg-amber-500/20 text-amber-400 border border-amber-500/30">MENUNGGU</span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="px-6 py-12 text-center text-slate-500">
                                <svg class="w-12 h-12 mx-auto text-slate-600 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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