<x-dashboard-layout>
    <div class="max-w-7xl mx-auto space-y-6">

        <div>
            <h2 class="text-2xl font-semibold tracking-tight text-[#1d1d1f]">Validasi Jurnal PKL</h2>
            <p class="text-[15px] text-[#86868b] mt-1">Pantau dan berikan penilaian terhadap aktivitas magang siswa bimbingan Anda.</p>
        </div>

        @if(session('success'))
        <div class="p-4 rounded-xl bg-emerald-50 text-emerald-700 text-[14px] font-medium border border-emerald-100">
            {{ session('success') }}
        </div>
        @endif

        <div class="bg-white rounded-3xl shadow-[0_2px_12px_rgba(0,0,0,0.04)] border border-[#d2d2d7]/50 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-[14px] text-[#1d1d1f]">
                    <thead class="bg-[#f5f5f7]/50 border-b border-[#d2d2d7]/50 text-[12px] uppercase tracking-wider text-[#86868b]">
                        <tr>
                            <th class="px-6 py-4 font-medium">Siswa & Tanggal</th>
                            <th class="px-6 py-4 font-medium">Aktivitas & Lokasi</th>
                            <th class="px-6 py-4 font-medium">Dokumentasi</th>
                            <th class="px-6 py-4 font-medium text-center">Aksi Validasi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-[#d2d2d7]/30">
                        @forelse($daftarJurnal as $jurnal)
                        <tr class="hover:bg-[#f5f5f7]/50 transition-colors">
                            <td class="px-6 py-4">
                                <div class="font-semibold text-[#1d1d1f]">{{ $jurnal->siswa->nama_lengkap }}</div>
                                <div class="text-[13px] text-[#86868b] mt-0.5">{{ \Carbon\Carbon::parse($jurnal->tanggal)->isoFormat('D MMM YYYY') }}</div>
                                <div class="text-[12px] font-mono text-[#515154] mt-0.5">{{ $jurnal->waktu_mulai }} - {{ $jurnal->waktu_selesai }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-[14px] text-[#1d1d1f] line-clamp-2">{{ $jurnal->deskripsi_kegiatan }}</div>
                                <div class="text-[12px] text-[#0071e3] mt-1.5 flex items-center gap-1 font-medium">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                    </svg>
                                    {{ $jurnal->mitraDudi->nama_perusahaan }}
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                @if($jurnal->foto_dokumentasi)
                                <a href="{{ asset('storage/' . $jurnal->foto_dokumentasi) }}" target="_blank" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-[#f5f5f7] text-[#0071e3] hover:bg-[#e8e8ed] transition-colors text-[13px] font-medium border border-[#d2d2d7]/50">
                                    Lihat Foto
                                </a>
                                @else
                                <span class="text-[13px] text-[#86868b] italic">Tanpa foto</span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                @if($jurnal->status_validasi === 'Menunggu')
                                <div class="flex items-center justify-center gap-2">
                                    <form action="{{ route('guru.jurnal.validasi', $jurnal->id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="status_validasi" value="Disetujui">
                                        <button type="submit" class="p-2 rounded-full bg-emerald-50 text-emerald-600 hover:bg-emerald-100 border border-emerald-200 transition-colors" title="Setujui">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                            </svg>
                                        </button>
                                    </form>
                                    <form action="{{ route('guru.jurnal.validasi', $jurnal->id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="status_validasi" value="Revisi">
                                        <button type="submit" class="p-2 rounded-full bg-red-50 text-red-600 hover:bg-red-100 border border-red-200 transition-colors" title="Revisi">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                                @else
                                <div class="text-center">
                                    @if($jurnal->status_validasi === 'Disetujui')
                                    <span class="px-2.5 py-1 rounded-full text-[11px] font-semibold tracking-wide bg-emerald-50 text-emerald-700 border border-emerald-200">DISETUJUI</span>
                                    @else
                                    <span class="px-2.5 py-1 rounded-full text-[11px] font-semibold tracking-wide bg-red-50 text-red-700 border border-red-200">REVISI</span>
                                    @endif
                                </div>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="px-6 py-12 text-center text-[#86868b]">Belum ada jurnal siswa yang perlu divalidasi.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-dashboard-layout>