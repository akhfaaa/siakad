<x-dashboard-layout>
    <div class="max-w-7xl mx-auto space-y-6">

        <!-- Header & Pencarian -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
            <div>
                <h2 class="text-2xl font-semibold tracking-tight text-[#1d1d1f]">Manajemen Data Guru</h2>
                <p class="text-[15px] text-[#86868b] mt-1">Total: <span class="font-medium text-[#1d1d1f]">{{ $daftarGuru->total() }}</span> staf pengajar.</p>
            </div>

            <div class="flex items-center gap-3 w-full md:w-auto">
                <form action="{{ route('tu.guru') }}" method="GET" class="relative w-full md:w-64">
                    <input type="text" name="cari" value="{{ request('cari') }}" placeholder="Cari nama atau NIP..."
                        class="w-full pl-10 pr-4 py-2 rounded-xl bg-white border border-[#d2d2d7] text-[14px] text-[#1d1d1f] focus:border-[#0071e3] focus:ring-1 focus:ring-[#0071e3] transition-all outline-none shadow-sm placeholder-[#86868b]">
                    <svg class="w-4 h-4 text-[#86868b] absolute left-3.5 top-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </form>

                <!-- Tombol Tambah (Rute sudah diperbarui ke create) -->
                <a href="{{ route('tu.guru.create') }}" class="flex-shrink-0 px-4 py-2.5 rounded-xl bg-[#0071e3] text-white text-[14px] font-semibold hover:bg-[#0077ED] active:scale-[0.98] transition-all duration-200 shadow-sm flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Tambah
                </a>
            </div>
        </div>

        @if(session('success'))
        <div class="p-4 rounded-xl bg-emerald-50 text-emerald-700 text-[14px] font-medium border border-emerald-100">
            {{ session('success') }}
        </div>
        @endif

        <!-- Tabel Data -->
        <div class="bg-white rounded-3xl shadow-[0_2px_12px_rgba(0,0,0,0.04)] border border-[#d2d2d7]/50 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-[14px] text-[#1d1d1f]">
                    <thead class="bg-[#f5f5f7]/50 border-b border-[#d2d2d7]/50 text-[12px] uppercase tracking-wider text-[#86868b]">
                        <tr>
                            <th class="px-6 py-4 font-medium">Nama Guru & Gelar</th>
                            <th class="px-6 py-4 font-medium">NIP / NUPTK</th>
                            <th class="px-6 py-4 font-medium">Status Tugas</th>
                            <th class="px-6 py-4 font-medium text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-[#d2d2d7]/30">
                        <!-- Perulangan Data Guru Dimulai Di Sini -->
                        @forelse($daftarGuru as $guru)
                        <tr class="hover:bg-[#f5f5f7]/50 transition-colors">
                            <td class="px-6 py-4">
                                <div class="font-semibold text-[#1d1d1f]">{{ $guru->nama_lengkap }}</div>
                            </td>
                            <td class="px-6 py-4 font-mono text-[13px] text-[#515154]">
                                {{ $guru->nip ?? '-' }}
                            </td>
                            <td class="px-6 py-4 text-[13px]">
                                <span class="px-2.5 py-1 bg-blue-50 text-blue-700 border border-blue-200 rounded-lg font-medium">
                                    Aktif
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">

                                    <!-- Tombol Edit -->
                                    <a href="{{ route('tu.guru.edit', $guru->id) }}" class="p-2 rounded-lg text-[#0071e3] hover:bg-[#f5f5f7] transition-colors border border-transparent hover:border-[#d2d2d7]/50" title="Edit">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                                        </svg>
                                    </a>

                                    <!-- Tombol Hapus -->
                                    <form action="{{ route('tu.guru.destroy', $guru->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 rounded-lg text-red-500 hover:bg-red-50 transition-colors border border-transparent hover:border-red-100" title="Hapus" onclick="return confirm('Yakin ingin menghapus data guru ini?')">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                        </button>
                                    </form>

                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="px-6 py-12 text-center text-[#86868b]">
                                Tidak ada data guru ditemukan.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($daftarGuru->hasPages())
            <div class="px-6 py-4 border-t border-[#d2d2d7]/50 bg-[#f5f5f7]/30">
                {{ $daftarGuru->links() }}
            </div>
            @endif
        </div>
    </div>
</x-dashboard-layout>