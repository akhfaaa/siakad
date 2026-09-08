<x-dashboard-layout>
    <div class="max-w-7xl mx-auto space-y-6">

        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
            <div>
                <h2 class="text-2xl font-semibold tracking-tight text-[#1d1d1f]">Manajemen Nilai Akademik</h2>
                <p class="text-[15px] text-[#86868b] mt-1">Mata Pelajaran: <span class="font-medium text-[#1d1d1f]">{{ $mapel->nama_mapel ?? $mapel->nama_pelajaran ?? 'Kejuruan' }}</span> | Semester Ganjil 2026/2027</p>
            </div>
            <div class="bg-[#f5f5f7] text-[#515154] px-4 py-2.5 rounded-xl text-[13px] font-medium border border-[#d2d2d7]/50">
                Sistem menghitung Nilai Akhir otomatis.
            </div>
        </div>

        @if(session('success'))
        <div class="p-4 rounded-xl bg-emerald-50 text-emerald-700 text-[14px] font-medium border border-emerald-100">
            {{ session('success') }}
        </div>
        @endif

        <div class="bg-white rounded-3xl shadow-[0_2px_12px_rgba(0,0,0,0.04)] border border-[#d2d2d7]/50 overflow-hidden">
            <div class="overflow-x-auto pb-4">
                <table class="w-full text-left text-[14px] text-[#1d1d1f]">
                    <thead class="bg-[#f5f5f7]/50 border-b border-[#d2d2d7]/50 text-[12px] uppercase tracking-wider text-[#86868b]">
                        <tr>
                            <th class="px-6 py-4 font-medium min-w-[200px]">Data Siswa</th>
                            <th class="px-4 py-4 font-medium text-center">Tugas (20%)</th>
                            <th class="px-4 py-4 font-medium text-center">UTS (25%)</th>
                            <th class="px-4 py-4 font-medium text-center">UAS (25%)</th>
                            <th class="px-4 py-4 font-medium text-center">Praktik (30%)</th>
                            <th class="px-4 py-4 font-medium text-center">Akhir</th>
                            <th class="px-6 py-4 font-medium text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-[#d2d2d7]/30">
                        @foreach($daftarSiswa as $siswa)
                        @php
                        $nilai = $riwayatNilai->get($siswa->id);
                        @endphp
                        <tr class="hover:bg-[#f5f5f7]/50 transition-colors">
                            <form action="{{ route('guru.nilai.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="siswa_id" value="{{ $siswa->id }}">
                                <input type="hidden" name="mata_pelajaran_id" value="{{ $mapel->id }}">

                                <td class="px-6 py-4">
                                    <div class="font-semibold text-[#1d1d1f]">{{ $siswa->nama_lengkap }}</div>
                                    <div class="text-[13px] text-[#86868b] mt-0.5">NIS: {{ $siswa->nis }}</div>
                                </td>

                                <td class="px-4 py-4 text-center">
                                    <input type="number" name="nilai_tugas" value="{{ $nilai ? $nilai->nilai_tugas : 0 }}" min="0" max="100" class="w-16 px-2 py-1.5 text-center rounded-lg bg-[#f5f5f7] border border-transparent text-[#1d1d1f] focus:bg-white focus:border-[#0071e3] focus:ring-1 focus:ring-[#0071e3] transition-all">
                                </td>
                                <td class="px-4 py-4 text-center">
                                    <input type="number" name="nilai_uts" value="{{ $nilai ? $nilai->nilai_uts : 0 }}" min="0" max="100" class="w-16 px-2 py-1.5 text-center rounded-lg bg-[#f5f5f7] border border-transparent text-[#1d1d1f] focus:bg-white focus:border-[#0071e3] focus:ring-1 focus:ring-[#0071e3] transition-all">
                                </td>
                                <td class="px-4 py-4 text-center">
                                    <input type="number" name="nilai_uas" value="{{ $nilai ? $nilai->nilai_uas : 0 }}" min="0" max="100" class="w-16 px-2 py-1.5 text-center rounded-lg bg-[#f5f5f7] border border-transparent text-[#1d1d1f] focus:bg-white focus:border-[#0071e3] focus:ring-1 focus:ring-[#0071e3] transition-all">
                                </td>
                                <td class="px-4 py-4 text-center">
                                    <input type="number" name="nilai_praktik" value="{{ $nilai ? $nilai->nilai_praktik : 0 }}" min="0" max="100" class="w-16 px-2 py-1.5 text-center rounded-lg bg-[#f5f5f7] border border-transparent text-[#1d1d1f] focus:bg-white focus:border-[#0071e3] focus:ring-1 focus:ring-[#0071e3] transition-all">
                                </td>

                                <td class="px-4 py-4 text-center font-semibold {{ $nilai && $nilai->nilai_akhir >= 75 ? 'text-[#0071e3]' : ($nilai ? 'text-red-500' : 'text-[#86868b]') }}">
                                    {{ $nilai ? number_format($nilai->nilai_akhir, 1) : '-' }}
                                </td>

                                <td class="px-6 py-4 text-center">
                                    <button type="submit" class="inline-flex items-center justify-center min-w-[70px] px-3 py-1.5 rounded-lg {{ $nilai ? 'bg-[#f5f5f7] text-[#1d1d1f] hover:bg-[#e8e8ed] border border-[#d2d2d7]' : 'bg-[#0071e3] text-white hover:bg-[#0077ED]' }} transition-colors text-[13px] font-medium">
                                        {{ $nilai ? 'Update' : 'Simpan' }}
                                    </button>
                                </td>
                            </form>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</x-dashboard-layout>