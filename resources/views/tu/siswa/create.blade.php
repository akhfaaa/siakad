<x-dashboard-layout>
    <div class="max-w-4xl mx-auto space-y-6">

        <div class="flex items-center gap-4">
            <a href="{{ route('tu.siswa') }}" class="p-2 rounded-full bg-white border border-[#d2d2d7] text-[#515154] hover:bg-[#f5f5f7] hover:text-[#1d1d1f] transition-colors shadow-sm">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
            </a>
            <div>
                <h2 class="text-2xl font-semibold tracking-tight text-[#1d1d1f]">Tambah Siswa Baru</h2>
                <p class="text-[15px] text-[#86868b] mt-1">Registrasi data induk dan pembuatan akun portal siswa.</p>
            </div>
        </div>

        <form action="{{ route('tu.siswa.store') }}" method="POST" class="space-y-6">
            @csrf

            <!-- Notifikasi Error Sistem -->
            @if(session('error_system'))
            <div class="p-4 rounded-xl bg-red-50 text-red-700 text-[14px] font-medium border border-red-100">
                {{ session('error_system') }}
            </div>
            @endif

            <!-- Notifikasi Error Validasi Global -->
            @if($errors->any())
            <div class="p-4 rounded-xl bg-red-50 text-red-700 text-[14px] font-medium border border-red-100">
                Gagal menyimpan! Periksa kembali isian yang berwarna merah di bawah ini.
            </div>
            @endif

            <!-- Sesi 1: Profil Akademik -->
            <div class="bg-white rounded-3xl shadow-[0_2px_12px_rgba(0,0,0,0.04)] border border-[#d2d2d7]/50 p-6 md:p-8">
                <h3 class="text-[15px] font-semibold text-[#1d1d1f] mb-6 uppercase tracking-wider border-b border-[#d2d2d7]/50 pb-3">Profil Akademik</h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="md:col-span-2">
                        <label class="block text-[14px] font-medium text-[#1d1d1f] mb-2">Nama Lengkap Sesuai Ijazah</label>
                        <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap') }}" required class="block w-full px-4 py-3 rounded-xl bg-[#f5f5f7] border border-transparent text-[#1d1d1f] focus:bg-white focus:border-[#0071e3] focus:ring-1 focus:ring-[#0071e3] transition-all text-[15px]">
                        @error('nama_lengkap') <span class="text-[13px] text-red-500 mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-[14px] font-medium text-[#1d1d1f] mb-2">Nomor Induk Siswa (NIS)</label>
                        <input type="text" name="nis" value="{{ old('nis') }}" required class="block w-full px-4 py-3 rounded-xl bg-[#f5f5f7] border border-transparent text-[#1d1d1f] focus:bg-white focus:border-[#0071e3] focus:ring-1 focus:ring-[#0071e3] transition-all text-[15px] font-mono">
                        @error('nis') <span class="text-[13px] text-red-500 mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-[14px] font-medium text-[#1d1d1f] mb-2">NISN</label>
                        <input type="text" name="nisn" value="{{ old('nisn') }}" required class="block w-full px-4 py-3 rounded-xl bg-[#f5f5f7] border border-transparent text-[#1d1d1f] focus:bg-white focus:border-[#0071e3] focus:ring-1 focus:ring-[#0071e3] transition-all text-[15px] font-mono">
                        @error('nisn') <span class="text-[13px] text-red-500 mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-[14px] font-medium text-[#1d1d1f] mb-2">Jenis Kelamin</label>
                        <select name="jenis_kelamin" required class="block w-full px-4 py-3 rounded-xl bg-[#f5f5f7] border border-transparent text-[#1d1d1f] focus:bg-white focus:border-[#0071e3] focus:ring-1 focus:ring-[#0071e3] transition-all text-[15px]">
                            <option value="">-- Pilih Jenis Kelamin --</option>
                            <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                        @error('jenis_kelamin') <span class="text-[13px] text-red-500 mt-1 block">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            <!-- Sesi 2: Kredensial Akses -->
            <div class="bg-white rounded-3xl shadow-[0_2px_12px_rgba(0,0,0,0.04)] border border-[#d2d2d7]/50 p-6 md:p-8">
                <h3 class="text-[15px] font-semibold text-[#1d1d1f] mb-6 uppercase tracking-wider border-b border-[#d2d2d7]/50 pb-3">Kredensial Portal (Login)</h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-[14px] font-medium text-[#1d1d1f] mb-2">Alamat Email Aktif</label>
                        <input type="email" name="email" value="{{ old('email') }}" required class="block w-full px-4 py-3 rounded-xl bg-[#f5f5f7] border border-transparent text-[#1d1d1f] focus:bg-white focus:border-[#0071e3] focus:ring-1 focus:ring-[#0071e3] transition-all text-[15px]">
                        @error('email') <span class="text-[13px] text-red-500 mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-[14px] font-medium text-[#1d1d1f] mb-2">Kata Sandi (Minimal 6 karakter)</label>
                        <input type="password" name="password" required class="block w-full px-4 py-3 rounded-xl bg-[#f5f5f7] border border-transparent text-[#1d1d1f] focus:bg-white focus:border-[#0071e3] focus:ring-1 focus:ring-[#0071e3] transition-all text-[15px]">
                        @error('password') <span class="text-[13px] text-red-500 mt-1 block">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            <!-- Tombol Aksi (Kini berada di luar kotak form) -->
            <div class="flex justify-end gap-3 pb-8">
                <a href="{{ route('tu.siswa') }}" class="py-3 px-6 rounded-xl text-[15px] font-semibold text-[#1d1d1f] bg-white border border-[#d2d2d7] hover:bg-[#f5f5f7] transition-all duration-200 shadow-sm">
                    Batal
                </a>
                <button type="submit" class="py-3 px-8 rounded-xl text-[15px] font-semibold text-white bg-[#0071e3] hover:bg-[#0077ED] active:scale-[0.98] transition-all duration-200 shadow-sm">
                    Simpan & Daftarkan
                </button>
            </div>
        </form>

    </div>
</x-dashboard-layout>