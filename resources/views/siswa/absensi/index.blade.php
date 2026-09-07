<x-dashboard-layout>
    <div class="max-w-7xl mx-auto space-y-6">

        <!-- Header Halaman -->
        <div>
            <h2 class="text-2xl font-bold text-white tracking-tight">Presensi Harian</h2>
            <p class="text-sm text-slate-400 mt-1">Rekam kehadiran Anda hari ini. Batas waktu masuk adalah 07.30 WITA.</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            <!-- Panel Kiri: Form Aksi Presensi -->
            <div class="col-span-1 bg-slate-900/50 backdrop-blur-xl border border-white/[0.08] shadow-lg shadow-blue-900/10 rounded-2xl p-6 flex flex-col h-fit">

                <div class="text-center mb-8">
                    <p class="text-slate-400 text-sm font-medium mb-1">{{ $hariIniStr }}</p>
                    <div class="text-5xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-cyan-300 tracking-tighter">
                        {{ $jamSekarang }}
                    </div>
                    <p class="text-xs text-slate-500 mt-2">Waktu Sistem Server (WITA)</p>
                </div>

                <!-- Notifikasi Flash Message -->
                @if(session('success'))
                <div class="mb-4 p-3 rounded-xl bg-emerald-500/20 border border-emerald-500/30 text-emerald-400 text-sm font-medium text-center">
                    {{ session('success') }}
                </div>
                @endif

                <div class="space-y-4">
                    <!-- Kondisi 1: Belum Absen Sama Sekali -->
                    @if(!$absensiHariIni)
                    <form method="POST" action="{{ route('siswa.absensi.masuk') }}">
                        @csrf
                        <button type="submit" class="w-full flex items-center justify-center gap-3 py-3.5 px-4 rounded-xl text-sm font-bold text-white bg-blue-600/90 border border-blue-500/50 shadow-[0_0_15px_rgba(37,99,235,0.3)] hover:bg-blue-500 hover:shadow-[0_0_25px_rgba(37,99,235,0.4)] transition-all duration-300 active:scale-[0.98]">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                            </svg>
                            Catat Kehadiran Masuk
                        </button>
                    </form>
                    <button disabled class="w-full flex items-center justify-center gap-3 py-3.5 px-4 rounded-xl text-sm font-bold text-slate-500 bg-white/[0.02] border border-white/[0.05] cursor-not-allowed transition-all">
                        <svg class="w-5 h-5 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                        </svg>
                        Catat Kehadiran Pulang
                    </button>

                    <!-- Kondisi 2: Sudah Absen Masuk, Belum Absen Pulang -->
                    @elseif(!$absensiHariIni->waktu_pulang)
                    <button disabled class="w-full flex items-center justify-center gap-3 py-3.5 px-4 rounded-xl text-sm font-bold text-slate-500 bg-white/[0.02] border border-white/[0.05] cursor-not-allowed transition-all">
                        Tercatat Masuk: {{ \Carbon\Carbon::parse($absensiHariIni->waktu_masuk)->format('H:i') }}
                    </button>
                    <form method="POST" action="{{ route('siswa.absensi.pulang') }}">
                        @csrf
                        <button type="submit" class="w-full flex items-center justify-center gap-3 py-3.5 px-4 rounded-xl text-sm font-bold text-white bg-amber-600/90 border border-amber-500/50 shadow-[0_0_15px_rgba(217,119,6,0.3)] hover:bg-amber-500 hover:shadow-[0_0_25px_rgba(217,119,6,0.4)] transition-all duration-300 active:scale-[0.98]">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                            </svg>
                            Catat Kehadiran Pulang
                        </button>
                    </form>

                    <!-- Kondisi 3: Sudah Absen Pulang (Selesai Hari Ini) -->
                    @else
                    <button disabled class="w-full flex items-center justify-center gap-3 py-3.5 px-4 rounded-xl text-sm font-bold text-emerald-500 bg-emerald-500/10 border border-emerald-500/20 cursor-not-allowed transition-all">
                        Tercatat Masuk: {{ \Carbon\Carbon::parse($absensiHariIni->waktu_masuk)->format('H:i') }}
                    </button>
                    <button disabled class="w-full flex items-center justify-center gap-3 py-3.5 px-4 rounded-xl text-sm font-bold text-emerald-500 bg-emerald-500/10 border border-emerald-500/20 cursor-not-allowed transition-all">
                        Tercatat Pulang: {{ \Carbon\Carbon::parse($absensiHariIni->waktu_pulang)->format('H:i') }}
                    </button>
                    @endif
                </div>

                <div class="mt-6 p-4 rounded-xl bg-blue-900/20 border border-blue-500/20 text-xs text-blue-300 leading-relaxed text-center">
                    Absensi hanya dapat dilakukan 1 kali dalam sehari dan tidak dapat diubah setelah terekam sistem.
                </div>
            </div>

            <!-- Panel Kanan: Tabel Riwayat -->
            <div class="col-span-1 lg:col-span-2 bg-slate-900/50 backdrop-blur-xl border border-white/[0.08] shadow-lg shadow-cyan-900/5 rounded-2xl overflow-hidden flex flex-col">
                <div class="px-6 py-5 border-b border-white/[0.08] flex items-center justify-between">
                    <h3 class="font-semibold text-white">Riwayat Kehadiran (Bulan Ini)</h3>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm text-slate-300">
                        <thead class="bg-white/[0.02] border-b border-white/[0.05] text-xs uppercase text-slate-400">
                            <tr>
                                <th scope="col" class="px-6 py-4 font-medium">Tanggal</th>
                                <th scope="col" class="px-6 py-4 font-medium">Masuk</th>
                                <th scope="col" class="px-6 py-4 font-medium">Pulang</th>
                                <th scope="col" class="px-6 py-4 font-medium">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-white/[0.05]">
                            @forelse($riwayatAbsensi as $riwayat)
                            <tr class="hover:bg-white/[0.02] transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap text-white font-medium">
                                    {{ \Carbon\Carbon::parse($riwayat->tanggal)->isoFormat('DD MMM YYYY') }}
                                </td>
                                <td class="px-6 py-4 text-emerald-400 font-mono">
                                    {{ $riwayat->waktu_masuk ? \Carbon\Carbon::parse($riwayat->waktu_masuk)->format('H:i') : '--:--' }}
                                </td>
                                <td class="px-6 py-4 text-slate-400 font-mono">
                                    {{ $riwayat->waktu_pulang ? \Carbon\Carbon::parse($riwayat->waktu_pulang)->format('H:i') : '--:--' }}
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-2.5 py-1 rounded-full text-[10px] font-bold tracking-wider bg-blue-500/20 text-blue-400 border border-blue-500/30 uppercase">
                                        {{ $riwayat->status }}
                                    </span>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="px-6 py-8 text-center text-slate-500">Belum ada riwayat kehadiran.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-dashboard-layout>