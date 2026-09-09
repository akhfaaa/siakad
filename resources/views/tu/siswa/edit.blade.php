<x-dashboard-layout>
    <div class="max-w-4xl mx-auto space-y-6">
        <div class="flex items-center gap-4">
            <a href="{{ route('tu.siswa') }}" class="p-2 rounded-full bg-white border border-[#d2d2d7] text-[#515154] hover:bg-[#f5f5f7] hover:text-[#1d1d1f] transition-colors shadow-sm">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
            </a>
            <div>
                <h2 class="text-2xl font-semibold tracking-tight text-[#1d1d1f]">Edit Data Siswa</h2>
            </div>
        </div>

        <form action="{{ route('tu.siswa.update', $siswa->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="bg-white rounded-3xl shadow-[0_2px_12px_rgba(0,0,0,0.04)] border border-[#d2d2d7]/50 p-6 md:p-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="md:col-span-2">
                        <label class="block text-[14px] font-medium text-[#1d1d1f] mb-2">Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap', $siswa->nama_lengkap) }}" required class="block w-full px-4 py-3 rounded-xl bg-[#f5f5f7] border border-transparent focus:bg-white focus:border-[#0071e3] focus:ring-1 focus:ring-[#0071e3] transition-all text-[15px]">
                        @error('nama_lengkap') <span class="text-[13px] text-red-500 mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-[14px] font-medium text-[#1d1d1f] mb-2">NIS (Nomor Induk Siswa)</label>
                        <input type="text" name="nis" value="{{ old('nis', $siswa->nis) }}" required class="block w-full px-4 py-3 rounded-xl bg-[#f5f5f7] border border-transparent focus:bg-white focus:border-[#0071e3] focus:ring-1 focus:ring-[#0071e3] transition-all text-[15px] font-mono">
                        @error('nis') <span class="text-[13px] text-red-500 mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-[14px] font-medium text-[#1d1d1f] mb-2">NISN</label>
                        <input type="text" name="nisn" value="{{ old('nisn', $siswa->nisn) }}" required class="block w-full px-4 py-3 rounded-xl bg-[#f5f5f7] border border-transparent focus:bg-white focus:border-[#0071e3] focus:ring-1 focus:ring-[#0071e3] transition-all text-[15px] font-mono">
                        @error('nisn') <span class="text-[13px] text-red-500 mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-[14px] font-medium text-[#1d1d1f] mb-2">Jenis Kelamin</label>
                        <select name="jenis_kelamin" required class="block w-full px-4 py-3 rounded-xl bg-[#f5f5f7] border border-transparent focus:bg-white focus:border-[#0071e3] focus:ring-1 focus:ring-[#0071e3] transition-all text-[15px]">
                            <option value="L" {{ old('jenis_kelamin', $siswa->jenis_kelamin) == 'L' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="P" {{ old('jenis_kelamin', $siswa->jenis_kelamin) == 'P' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                        @error('jenis_kelamin') <span class="text-[13px] text-red-500 mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-[14px] font-medium text-[#1d1d1f] mb-2">Penempatan Kelas (Rombel)</label>
                        <select name="rombel_id" required class="block w-full px-4 py-3 rounded-xl bg-[#f5f5f7] border border-transparent focus:bg-white focus:border-[#0071e3] focus:ring-1 focus:ring-[#0071e3] transition-all text-[15px]">
                            <option value="">-- Pilih Kelas --</option>
                            @foreach($rombels as $rombel)
                            <option value="{{ $rombel->id }}" {{ old('rombel_id', $siswa->rombel_id) == $rombel->id ? 'selected' : '' }}>
                                Kelas {{ $rombel->tingkat }} - {{ $rombel->nama_rombel }} ({{ $rombel->jurusan->kode_jurusan ?? '' }})
                            </option>
                            @endforeach
                        </select>
                        @error('rombel_id') <span class="text-[13px] text-red-500 mt-1 block">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            <div class="flex justify-end gap-3 pb-8">
                <a href="{{ route('tu.siswa') }}" class="py-3 px-6 rounded-xl text-[15px] font-semibold text-[#1d1d1f] bg-white border border-[#d2d2d7] hover:bg-[#f5f5f7] transition-all duration-200">Batal</a>
                <button type="submit" class="py-3 px-8 rounded-xl text-[15px] font-semibold text-white bg-[#0071e3] hover:bg-[#0077ED] active:scale-[0.98] transition-all duration-200">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</x-dashboard-layout>