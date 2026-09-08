<x-dashboard-layout>
    <div class="max-w-4xl mx-auto space-y-6">

        <div class="flex items-center gap-4">
            <a href="{{ route('siswa.jurnal') }}" class="p-2 rounded-full bg-white border border-[#d2d2d7] text-[#515154] hover:bg-[#f5f5f7] hover:text-[#1d1d1f] transition-colors shadow-sm">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
            </a>
            <div>
                <h2 class="text-2xl font-semibold tracking-tight text-[#1d1d1f]">Tulis Jurnal Baru</h2>
                <p class="text-[15px] text-[#86868b] mt-1">Formulir pelaporan aktivitas Praktik Kerja Lapangan.</p>
            </div>
        </div>

        <div class="bg-white rounded-3xl shadow-[0_2px_12px_rgba(0,0,0,0.04)] border border-[#d2d2d7]/50 p-6 md:p-8">
            <form action="{{ route('siswa.jurnal.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Tempat Magang -->
                    <div>
                        <label class="block text-[14px] font-medium text-[#1d1d1f] mb-2">Mitra DUDI</label>
                        <select name="mitra_dudi_id" required class="block w-full px-4 py-3 rounded-xl bg-[#f5f5f7] border border-transparent text-[#1d1d1f] focus:bg-white focus:border-[#0071e3] focus:ring-1 focus:ring-[#0071e3] transition-all text-[15px]">
                            <option value="">-- Pilih Tempat Magang --</option>
                            @foreach($mitras as $mitra)
                            <option value="{{ $mitra->id }}">{{ $mitra->nama_perusahaan }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Guru Pembimbing -->
                    <div>
                        <label class="block text-[14px] font-medium text-[#1d1d1f] mb-2">Guru Pembimbing</label>
                        <select name="guru_pembimbing_id" required class="block w-full px-4 py-3 rounded-xl bg-[#f5f5f7] border border-transparent text-[#1d1d1f] focus:bg-white focus:border-[#0071e3] focus:ring-1 focus:ring-[#0071e3] transition-all text-[15px]">
                            <option value="">-- Pilih Guru --</option>
                            @foreach($gurus as $guru)
                            <option value="{{ $guru->id }}">{{ $guru->nama_lengkap }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Tanggal -->
                    <div>
                        <label class="block text-[14px] font-medium text-[#1d1d1f] mb-2">Tanggal Kegiatan</label>
                        <input type="date" name="tanggal" value="{{ $hariIni }}" required class="block w-full px-4 py-3 rounded-xl bg-[#f5f5f7] border border-transparent text-[#1d1d1f] focus:bg-white focus:border-[#0071e3] focus:ring-1 focus:ring-[#0071e3] transition-all text-[15px]">
                    </div>

                    <!-- Waktu -->
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-[14px] font-medium text-[#1d1d1f] mb-2">Mulai</label>
                            <input type="time" name="waktu_mulai" required class="block w-full px-4 py-3 rounded-xl bg-[#f5f5f7] border border-transparent text-[#1d1d1f] focus:bg-white focus:border-[#0071e3] focus:ring-1 focus:ring-[#0071e3] transition-all text-[15px]">
                        </div>
                        <div>
                            <label class="block text-[14px] font-medium text-[#1d1d1f] mb-2">Selesai</label>
                            <input type="time" name="waktu_selesai" required class="block w-full px-4 py-3 rounded-xl bg-[#f5f5f7] border border-transparent text-[#1d1d1f] focus:bg-white focus:border-[#0071e3] focus:ring-1 focus:ring-[#0071e3] transition-all text-[15px]">
                        </div>
                    </div>
                </div>

                <!-- Deskripsi -->
                <div>
                    <label class="block text-[14px] font-medium text-[#1d1d1f] mb-2">Deskripsi Kegiatan</label>
                    <textarea name="deskripsi_kegiatan" rows="4" required placeholder="Contoh: Melakukan perbaikan jaringan LAN di ruang rapat..." class="block w-full px-4 py-3 rounded-xl bg-[#f5f5f7] border border-transparent text-[#1d1d1f] placeholder-[#86868b] focus:bg-white focus:border-[#0071e3] focus:ring-1 focus:ring-[#0071e3] transition-all resize-none text-[15px]"></textarea>
                </div>

                <!-- Upload Foto -->
                <div>
                    <label class="block text-[14px] font-medium text-[#1d1d1f] mb-2">Foto Dokumentasi (Opsional)</label>
                    <input type="file" name="foto_dokumentasi" accept="image/*" class="block w-full text-[14px] text-[#515154] file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-[14px] file:font-semibold file:bg-[#f5f5f7] file:text-[#1d1d1f] hover:file:bg-[#e8e8ed] transition-all cursor-pointer bg-white border border-[#d2d2d7] rounded-xl shadow-sm">
                </div>

                <!-- Tombol Submit -->
                <div class="pt-4 border-t border-[#d2d2d7]/50 flex justify-end">
                    <button type="submit" class="py-3 px-8 rounded-xl text-[15px] font-semibold text-white bg-[#0071e3] hover:bg-[#0077ED] active:scale-[0.98] transition-all duration-200 shadow-sm">
                        Kirim Jurnal
                    </button>
                </div>

            </form>
        </div>
    </div>
</x-dashboard-layout>