<x-dashboard-layout>
    <div class="max-w-7xl mx-auto space-y-6">

        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
            <div>
                <h2 class="text-2xl font-semibold tracking-tight text-[#1d1d1f]">Manajemen Jurusan</h2>
                <p class="text-[15px] text-[#86868b] mt-1">Kelola program keahlian dan penetapan Kepala Program Studi.</p>
            </div>

            <div class="flex items-center gap-3 w-full md:w-auto">
                <a href="{{ route('tu.jurusan.create') }}" class="flex-shrink-0 px-4 py-2.5 rounded-xl bg-[#0071e3] text-white text-[14px] font-semibold hover:bg-[#0077ED] active:scale-[0.98] transition-all duration-200 shadow-sm flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Tambah Jurusan
                </a>
            </div>
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
                            <th class="px-6 py-4 font-medium">Kode</th>
                            <th class="px-6 py-4 font-medium">Program Keahlian</th>
                            <th class="px-6 py-4 font-medium">Kepala Program Studi (Kaprodi)</th>
                            <th class="px-6 py-4 font-medium text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-[#d2d2d7]/30">
                        @forelse($daftarJurusan as $jurusan)
                        <tr class="hover:bg-[#f5f5f7]/50 transition-colors">
                            <td class="px-6 py-4 font-mono font-semibold text-[#0071e3]">
                                {{ $jurusan->kode_jurusan }}
                            </td>
                            <td class="px-6 py-4 font-medium">
                                {{ $jurusan->nama_jurusan }}
                            </td>
                            <td class="px-6 py-4">
                                @if($jurusan->kaprodi)
                                <div class="flex items-center gap-2">
                                    <div class="w-6 h-6 rounded-full bg-blue-100 text-blue-700 flex items-center justify-center text-[10px] font-bold">
                                        {{ substr($jurusan->kaprodi->nama_lengkap, 0, 1) }}
                                    </div>
                                    <span>{{ $jurusan->kaprodi->nama_lengkap }}</span>
                                </div>
                                @else
                                <span class="text-[#86868b] italic">Belum ditetapkan</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('tu.jurusan.edit', $jurusan->id) }}" class="p-2 rounded-lg text-[#0071e3] hover:bg-[#f5f5f7] transition-colors border border-transparent hover:border-[#d2d2d7]/50" title="Edit">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                                        </svg>
                                    </a>
                                    <form action="{{ route('tu.jurusan.destroy', $jurusan->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 rounded-lg text-red-500 hover:bg-red-50 transition-colors border border-transparent hover:border-red-100" title="Hapus" onclick="return confirm('Yakin ingin menghapus jurusan ini? (Rombel yang terhubung akan ikut terhapus)')">
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
                                Belum ada data jurusan.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($daftarJurusan->hasPages())
            <div class="px-6 py-4 border-t border-[#d2d2d7]/50 bg-[#f5f5f7]/30">
                {{ $daftarJurusan->links() }}
            </div>
            @endif
        </div>
    </div>
</x-dashboard-layout>