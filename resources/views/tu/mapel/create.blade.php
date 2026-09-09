<x-dashboard-layout>
    <div class="max-w-4xl mx-auto space-y-6">
        <div class="flex items-center gap-4">
            <a href="{{ route('tu.mapel') }}" class="p-2 rounded-full bg-white border border-[#d2d2d7] text-[#515154] hover:bg-[#f5f5f7] hover:text-[#1d1d1f] transition-colors shadow-sm">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
            </a>
            <div>
                <h2 class="text-2xl font-semibold tracking-tight text-[#1d1d1f]">Tambah Mata Pelajaran</h2>
            </div>
        </div>

        <form action="{{ route('tu.mapel.store') }}" method="POST" class="space-y-6">
            @csrf
            <div class="bg-white rounded-3xl shadow-[0_2px_12px_rgba(0,0,0,0.04)] border border-[#d2d2d7]/50 p-6 md:p-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-[14px] font-medium text-[#1d1d1f] mb-2">Kode Mapel</label>
                        <input type="text" name="kode_mapel" value="{{ old('kode_mapel') }}" placeholder="Contoh: MAT-10" required class="block w-full px-4 py-3 rounded-xl bg-[#f5f5f7] border border-transparent focus:bg-white focus:border-[#0071e3] focus:ring-1 focus:ring-[#0071e3] transition-all text-[15px] font-mono">
                        @error('kode_mapel') <span class="text-[13px] text-red-500 mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-[14px] font-medium text-[#1d1d1f] mb-2">Nama Mata Pelajaran</label>
                        <input type="text" name="nama_mapel" value="{{ old('nama_mapel') }}" placeholder="Contoh: Matematika / Pemrograman Web" required class="block w-full px-4 py-3 rounded-xl bg-[#f5f5f7] border border-transparent focus:bg-white focus:border-[#0071e3] focus:ring-1 focus:ring-[#0071e3] transition-all text-[15px]">
                        @error('nama_mapel') <span class="text-[13px] text-red-500 mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-[14px] font-medium text-[#1d1d1f] mb-2">Kategori Mapel</label>
                        <select name="kategori" required class="block w-full px-4 py-3 rounded-xl bg-[#f5f5f7] border border-transparent focus:bg-white focus:border-[#0071e3] focus:ring-1 focus:ring-[#0071e3] transition-all text-[15px]">
                            <option value="Umum" {{ old('kategori') == 'Umum' ? 'selected' : '' }}>Umum</option>
                            <option value="Kejuruan" {{ old('kategori') == 'Kejuruan' ? 'selected' : '' }}>Kejuruan (Praktik)</option>
                        </select>
                        @error('kategori') <span class="text-[13px] text-red-500 mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-[14px] font-medium text-[#1d1d1f] mb-2">Guru Pengampu</label>
                        <select name="guru_id" class="block w-full px-4 py-3 rounded-xl bg-[#f5f5f7] border border-transparent focus:bg-white focus:border-[#0071e3] focus:ring-1 focus:ring-[#0071e3] transition-all text-[15px]">
                            <option value="">-- Pilih Guru Pengampu --</option>
                            @foreach($gurus as $guru)
                            <option value="{{ $guru->id }}" {{ old('guru_id') == $guru->id ? 'selected' : '' }}>
                                {{ $guru->nama_lengkap }}
                            </option>
                            @endforeach
                        </select>
                        @error('guru_id') <span class="text-[13px] text-red-500 mt-1 block">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            <div class="flex justify-end gap-3 pb-8">
                <a href="{{ route('tu.mapel') }}" class="py-3 px-6 rounded-xl text-[15px] font-semibold text-[#1d1d1f] bg-white border border-[#d2d2d7] hover:bg-[#f5f5f7] transition-all duration-200">Batal</a>
                <button type="submit" class="py-3 px-8 rounded-xl text-[15px] font-semibold text-white bg-[#0071e3] hover:bg-[#0077ED] active:scale-[0.98] transition-all duration-200">Simpan Mapel</button>
            </div>
        </form>
    </div>
</x-dashboard-layout>