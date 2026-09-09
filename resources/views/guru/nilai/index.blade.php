<x-dashboard-layout>
    <div class="max-w-[95%] mx-auto space-y-6">

        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-semibold tracking-tight text-[#1d1d1f]">Input Nilai Akademik</h2>
                <p class="text-[15px] text-[#86868b] mt-1">Pilih mata pelajaran dan kelas untuk mulai memasukkan nilai siswa.</p>
            </div>
        </div>

        <!-- Filter Mapel dan Rombel -->
        <div class="bg-white rounded-3xl shadow-[0_2px_12px_rgba(0,0,0,0.04)] border border-[#d2d2d7]/50 p-6 md:p-8">
            <form method="GET" action="{{ route('guru.nilai') }}" class="flex flex-col md:flex-row gap-5 items-end">
                <div class="flex-1 w-full">
                    <label class="block text-[14px] font-medium text-[#1d1d1f] mb-2">Mata Pelajaran Anda</label>
                    <select name="mapel_id" required class="block w-full px-4 py-3 rounded-xl bg-[#f5f5f7] border border-transparent focus:bg-white focus:border-[#0071e3] focus:ring-1 focus:ring-[#0071e3] transition-all text-[15px]">
                        <option value="">-- Pilih Mata Pelajaran --</option>
                        @foreach($mapels as $mapel)
                        <option value="{{ $mapel->id }}" {{ request('mapel_id') == $mapel->id ? 'selected' : '' }}>
                            {{ $mapel->kode_mapel }} - {{ $mapel->nama_mapel }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="flex-1 w-full">
                    <label class="block text-[14px] font-medium text-[#1d1d1f] mb-2">Kelas (Rombel)</label>
                    <select name="rombel_id" required class="block w-full px-4 py-3 rounded-xl bg-[#f5f5f7] border border-transparent focus:bg-white focus:border-[#0071e3] focus:ring-1 focus:ring-[#0071e3] transition-all text-[15px]">
                        <option value="">-- Pilih Kelas --</option>
                        @foreach($rombels as $rombel)
                        <option value="{{ $rombel->id }}" {{ request('rombel_id') == $rombel->id ? 'selected' : '' }}>
                            Kelas {{ $rombel->tingkat }} - {{ $rombel->nama_rombel }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="w-full md:w-auto">
                    <button type="submit" class="w-full md:w-auto px-8 py-3 rounded-xl bg-[#0071e3] text-white text-[15px] font-semibold hover:bg-[#0077ED] active:scale-[0.98] transition-all duration-200">
                        Tampilkan Siswa
                    </button>
                </div>
            </form>
        </div>

        <!-- Tabel Input Nilai -->
        @if(request()->has('mapel_id') && request()->has('rombel_id'))
        <form action="{{ route('guru.nilai.store') }}" method="POST">
            @csrf
            <input type="hidden" name="mapel_id" value="{{ request('mapel_id') }}">
            <input type="hidden" name="rombel_id" value="{{ request('rombel_id') }}">

            <div class="bg-white rounded-3xl shadow-[0_2px_12px_rgba(0,0,0,0.04)] border border-[#d2d2d7]/50 overflow-hidden relative">

                <div class="p-6 border-b border-[#d2d2d7]/50 flex justify-between items-center bg-[#f5f5f7]/30">
                    <div>
                        <h3 class="font-semibold text-[#1d1d1f]">Daftar Nilai Siswa</h3>
                        <p class="text-[13px] text-[#86868b] mt-0.5">Geser tabel ke kanan untuk melihat kolom nilai lainnya.</p>
                    </div>
                    <button type="submit" class="px-5 py-2.5 rounded-xl bg-emerald-500 text-white text-[14px] font-semibold hover:bg-emerald-600 transition-colors shadow-sm">
                        Simpan Semua Nilai
                    </button>
                </div>

                @if(session('success'))
                <div class="mx-6 mt-4 p-4 rounded-xl bg-emerald-50 text-emerald-700 text-[14px] font-medium border border-emerald-100">
                    {{ session('success') }}
                </div>
                @endif

                <div class="overflow-x-auto pb-4">
                    <table class="w-full text-left text-[14px] whitespace-nowrap">
                        <thead class="text-[12px] uppercase tracking-wider text-[#86868b]">
                            <tr>
                                <th class="px-6 py-4 font-medium sticky left-0 bg-[#f5f5f7] border-b border-r border-[#d2d2d7]/50 z-20 shadow-[2px_0_5px_rgba(0,0,0,0.02)]">
                                    Nama Siswa
                                </th>
                                @for($i=1; $i<=16; $i++)
                                    <th class="px-3 py-4 font-medium text-center border-b border-[#d2d2d7]/50 bg-white">TGS {{ $i }}</th>
                                    @endfor
                                    <th class="px-4 py-4 font-medium text-center border-b border-[#d2d2d7]/50 bg-blue-50/50 text-[#0071e3]">UTS</th>
                                    <th class="px-4 py-4 font-medium text-center border-b border-[#d2d2d7]/50 bg-blue-50/50 text-[#0071e3]">UAS</th>
                                    <th class="px-4 py-4 font-medium text-center border-b border-[#d2d2d7]/50 bg-amber-50/50 text-amber-600">Praktik</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-[#d2d2d7]/30">
                            @forelse($siswas as $siswa)
                            @php
                            $nilaiSiswa = $siswa->nilais->first();
                            @endphp
                            <tr class="hover:bg-[#f5f5f7]/50 transition-colors group">
                                <td class="px-6 py-3 sticky left-0 bg-white group-hover:bg-[#f9f9fb] border-r border-[#d2d2d7]/50 z-10 shadow-[2px_0_5px_rgba(0,0,0,0.02)]">
                                    <div class="font-semibold text-[#1d1d1f]">{{ $siswa->nama_lengkap }}</div>
                                    <div class="text-[11px] text-[#86868b] font-mono mt-0.5">NIS: {{ $siswa->nis }}</div>
                                </td>

                                @for($i=1; $i<=16; $i++)
                                    @php $kolomTugas='tugas_' .$i; @endphp
                                    <td class="px-2 py-3 text-center bg-white">
                                    <input type="number" name="nilai[{{ $siswa->id }}][tugas_{{ $i }}]" value="{{ $nilaiSiswa->$kolomTugas ?? '' }}" min="0" max="100" class="w-16 px-2 py-1.5 text-center text-[13px] rounded-lg bg-[#f5f5f7] border-transparent focus:bg-white focus:border-[#0071e3] focus:ring-1 focus:ring-[#0071e3] transition-all" placeholder="-">
                                    </td>
                                    @endfor

                                    <td class="px-3 py-3 text-center bg-white">
                                        <input type="number" name="nilai[{{ $siswa->id }}][uts]" value="{{ $nilaiSiswa->uts ?? '' }}" min="0" max="100" class="w-16 px-2 py-1.5 text-center text-[13px] font-semibold rounded-lg bg-blue-50/30 border-transparent focus:bg-white focus:border-[#0071e3] transition-all" placeholder="-">
                                    </td>
                                    <td class="px-3 py-3 text-center bg-white">
                                        <input type="number" name="nilai[{{ $siswa->id }}][uas]" value="{{ $nilaiSiswa->uas ?? '' }}" min="0" max="100" class="w-16 px-2 py-1.5 text-center text-[13px] font-semibold rounded-lg bg-blue-50/30 border-transparent focus:bg-white focus:border-[#0071e3] transition-all" placeholder="-">
                                    </td>
                                    <td class="px-3 py-3 text-center bg-white">
                                        <input type="number" name="nilai[{{ $siswa->id }}][praktik]" value="{{ $nilaiSiswa->praktik ?? '' }}" min="0" max="100" class="w-16 px-2 py-1.5 text-center text-[13px] font-semibold rounded-lg bg-amber-50/30 border-transparent focus:bg-white focus:border-amber-500 transition-all" placeholder="-">
                                    </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="20" class="px-6 py-12 text-center text-[#86868b] bg-white">
                                    Belum ada data siswa di rombongan belajar ini.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </form>
        @endif

    </div>
</x-dashboard-layout>