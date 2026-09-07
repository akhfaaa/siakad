<x-dashboard-layout>
    <div class="max-w-4xl mx-auto space-y-6">

        <div class="flex items-center gap-4">
            <a href="{{ route('siswa.jurnal') }}" class="p-2 rounded-xl bg-white/[0.02] border border-white/[0.05] text-slate-400 hover:text-white hover:bg-white/[0.05] transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
            </a>
            <div>
                <h2 class="text-2xl font-bold text-white tracking-tight">Tulis Jurnal Baru</h2>
                <p class="text-sm text-slate-400 mt-1">Formulir pelaporan aktivitas Praktik Kerja Lapangan.</p>
            </div>
        </div>

        <div class="bg-slate-900/50 backdrop-blur-xl border border-white/[0.08] shadow-lg shadow-blue-900/10 rounded-2xl p-6 md:p-8">
            <form action="{{ route('siswa.jurnal.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Tempat Magang -->
                    <div>
                        <label class="block text-sm font-medium text-slate-300 mb-2">Mitra DUDI</label>
                        <select name="mitra_dudi_id" required class="block w-full px-4 py-3 rounded-xl bg-slate-900/50 border border-white/[0.06] text-white focus:bg-slate-900/80 focus:border-blue-500/50 focus:ring-1 focus:ring-blue-500/50 transition-all shadow-inner">
                            <option value="">-- Pilih Tempat Magang --</option>
                            @foreach($mitras as $mitra)
                            <option value="{{ $mitra->id }}">{{ $mitra->nama_perusahaan }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Guru Pembimbing -->
                    <div>
                        <label class="block text-sm font-medium text-slate-300 mb-2">Guru Pembimbing</label>
                        <select name="guru_pembimbing_id" required class="block w-full px-4 py-3 rounded-xl bg-slate-900/50 border border-white/[0.06] text-white focus:bg-slate-900/80 focus:border-blue-500/50 focus:ring-1 focus:ring-blue-500/50 transition-all shadow-inner">
                            <option value="">-- Pilih Guru --</option>
                            @foreach($gurus as $guru)
                            <option value="{{ $guru->id }}">{{ $guru->nama_lengkap }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Tanggal -->
                    <div>
                        <label class="block text-sm font-medium text-slate-300 mb-2">Tanggal Kegiatan</label>
                        <input type="date" name="tanggal" value="{{ $hariIni }}" required class="block w-full px-4 py-3 rounded-xl bg-slate-900/50 border border-white/[0.06] text-white focus:bg-slate-900/80 focus:border-blue-500/50 focus:ring-1 focus:ring-blue-500/50 transition-all shadow-inner [color-scheme:dark]">
                    </div>

                    <!-- Waktu -->
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-slate-300 mb-2">Mulai</label>
                            <input type="time" name="waktu_mulai" required class="block w-full px-4 py-3 rounded-xl bg-slate-900/50 border border-white/[0.06] text-white focus:bg-slate-900/80 focus:border-blue-500/50 focus:ring-1 focus:ring-blue-500/50 transition-all shadow-inner [color-scheme:dark]">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-300 mb-2">Selesai</label>
                            <input type="time" name="waktu_selesai" required class="block w-full px-4 py-3 rounded-xl bg-slate-900/50 border border-white/[0.06] text-white focus:bg-slate-900/80 focus:border-blue-500/50 focus:ring-1 focus:ring-blue-500/50 transition-all shadow-inner [color-scheme:dark]">
                        </div>
                    </div>
                </div>

                <!-- Deskripsi -->
                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-2">Deskripsi Kegiatan</label>
                    <textarea name="deskripsi_kegiatan" rows="4" required placeholder="Contoh: Melakukan perbaikan jaringan LAN di ruang rapat..." class="block w-full px-4 py-3 rounded-xl bg-slate-900/50 border border-white/[0.06] text-white placeholder-slate-500 focus:bg-slate-900/80 focus:border-blue-500/50 focus:ring-1 focus:ring-blue-500/50 transition-all shadow-inner resize-none"></textarea>
                </div>

                <!-- Upload Foto -->
                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-2">Foto Dokumentasi (Opsional)</label>
                    <input type="file" name="foto_dokumentasi" accept="image/*" class="block w-full text-sm text-slate-400 file:mr-4 file:py-3 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-blue-600/20 file:text-blue-400 hover:file:bg-blue-600/30 transition-all cursor-pointer bg-slate-900/50 border border-white/[0.06] rounded-xl shadow-inner">
                </div>

                <!-- Tombol Submit -->
                <div class="pt-4 border-t border-white/[0.05] flex justify-end">
                    <button type="submit" class="py-3 px-8 rounded-xl text-sm font-bold text-white bg-blue-600/90 border border-blue-500/50 shadow-[0_0_15px_rgba(37,99,235,0.3)] hover:bg-blue-500 hover:shadow-[0_0_25px_rgba(37,99,235,0.4)] transition-all duration-300 active:scale-[0.98]">
                        Kirim Jurnal
                    </button>
                </div>

            </form>
        </div>
    </div>
</x-dashboard-layout>