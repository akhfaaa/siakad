<x-dashboard-layout>
    <div class="max-w-4xl mx-auto space-y-6">

        <div>
            <h2 class="text-2xl font-semibold tracking-tight text-[#1d1d1f]">Presensi Harian</h2>
            <p class="text-[15px] text-[#86868b] mt-1">Jangan lupa mencatat kehadiran Anda setiap hari.</p>
        </div>

        @if(session('success'))
        <div class="p-4 rounded-xl bg-emerald-50 text-emerald-700 text-[14px] font-medium border border-emerald-100">
            {{ session('success') }}
        </div>
        @endif

        @if(session('error'))
        <div class="p-4 rounded-xl bg-red-50 text-red-700 text-[14px] font-medium border border-red-100">
            {{ session('error') }}
        </div>
        @endif

        <!-- Widget Jam Real-time -->
        <div class="text-center py-6">
            <p class="text-[13px] text-[#86868b] font-medium uppercase tracking-wider mb-2">Waktu Saat Ini</p>
            <div id="jam-realtime" class="text-5xl sm:text-6xl font-semibold tracking-tight text-[#1d1d1f]" style="font-variant-numeric: tabular-nums;">
                --:--:--
            </div>
            <p class="text-[15px] text-[#515154] mt-3">{{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}</p>
        </div>

        <!-- Panel Aksi Presensi -->
        <div class="bg-white rounded-3xl shadow-[0_2px_12px_rgba(0,0,0,0.04)] border border-[#d2d2d7]/50 p-6 md:p-8 flex flex-col md:flex-row items-center justify-around gap-6">

            <div class="text-center w-full">
                <p class="text-[13px] text-[#86868b] font-medium mb-3 uppercase tracking-wider">Jam Masuk</p>
                @if($absensiHariIni && $absensiHariIni->waktu_masuk)
                <div class="py-3 px-6 rounded-2xl bg-[#f5f5f7] border border-[#d2d2d7]/50 inline-block">
                    <span class="text-[20px] font-semibold text-[#1d1d1f]">{{ $absensiHariIni->waktu_masuk }}</span>
                    <div class="text-[12px] text-emerald-600 font-medium mt-1">Telah Hadir</div>
                </div>
                @else
                <form action="{{ route('siswa.absensi.masuk') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full md:w-auto py-3 px-8 rounded-2xl text-[15px] font-semibold text-white bg-[#0071e3] hover:bg-[#0077ED] active:scale-[0.98] transition-all duration-200 shadow-sm">
                        Catat Kehadiran Masuk
                    </button>
                </form>
                @endif
            </div>

            <div class="hidden md:block w-px h-20 bg-[#d2d2d7]/50"></div>

            <div class="text-center w-full">
                <p class="text-[13px] text-[#86868b] font-medium mb-3 uppercase tracking-wider">Jam Pulang</p>
                @if($absensiHariIni && $absensiHariIni->waktu_pulang)
                <div class="py-3 px-6 rounded-2xl bg-[#f5f5f7] border border-[#d2d2d7]/50 inline-block">
                    <span class="text-[20px] font-semibold text-[#1d1d1f]">{{ $absensiHariIni->waktu_pulang }}</span>
                    <div class="text-[12px] text-[#86868b] font-medium mt-1">Selesai</div>
                </div>
                @else
                <form action="{{ route('siswa.absensi.pulang') }}" method="POST">
                    @csrf
                    <button type="submit"
                        @if(!$absensiHariIni || !$absensiHariIni->waktu_masuk) disabled @endif
                        class="w-full md:w-auto py-3 px-8 rounded-2xl text-[15px] font-semibold transition-all duration-200 shadow-sm
                        @if($absensiHariIni && $absensiHariIni->waktu_masuk) bg-[#1d1d1f] text-white hover:bg-black active:scale-[0.98]
                        @else bg-[#f5f5f7] text-[#86868b] cursor-not-allowed border border-[#d2d2d7]/50 @endif">
                        Catat Kehadiran Pulang
                    </button>
                </form>
                @endif
            </div>
        </div>

    </div>

    <!-- Script JavaScript untuk Jam Real-time -->
    <script>
        function updateJamRealtime() {
            const sekarang = new Date();
            const jam = String(sekarang.getHours()).padStart(2, '0');
            const menit = String(sekarang.getMinutes()).padStart(2, '0');
            const detik = String(sekarang.getSeconds()).padStart(2, '0');

            const elemenJam = document.getElementById('jam-realtime');
            if (elemenJam) {
                elemenJam.innerText = `${jam}:${menit}:${detik}`;
            }
        }
        setInterval(updateJamRealtime, 1000);
        updateJamRealtime();
    </script>
</x-dashboard-layout>