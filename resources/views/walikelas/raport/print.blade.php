<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lembar Hasil Belajar - {{ $siswa->nama_lengkap }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        @media print {
            .no-print {
                display: none !important;
            }

            body {
                background: white !important;
                color: black !important;
            }
        }
    </style>
</head>

<body class="bg-[#f5f5f7] font-['Inter'] text-[#1d1d1f] antialiased py-10 print:py-0">

    <!-- Tombol Aksi Cetak (Hilang saat diprint) -->
    <div class="max-w-4xl mx-auto mb-6 flex justify-between items-center no-print px-4">
        <a href="{{ route('walikelas.raport') }}" class="px-4 py-2 rounded-xl bg-white border border-[#d2d2d7] text-sm font-medium hover:bg-[#f5f5f7] transition-colors shadow-sm">
            ← Kembali
        </a>
        <button onclick="window.print()" class="px-6 py-2.5 rounded-xl bg-[#0071e3] text-white text-sm font-semibold hover:bg-[#0077ED] transition-colors shadow-sm">
            Cetak Dokumen
        </button>
    </div>

    <!-- Lembar Dokumen Raport -->
    <div class="max-w-4xl mx-auto bg-white p-8 sm:p-12 rounded-3xl shadow-[0_2px_12px_rgba(0,0,0,0.04)] border border-[#d2d2d7]/50 print:shadow-none print:border-none print:p-0">

        <!-- Kop Surat -->
        <div class="border-b border-[#1d1d1f] pb-6 mb-8 flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-bold tracking-tight">LAPORAN HASIL BELAJAR SISWA</h1>
                <p class="text-sm text-[#515154] mt-1">Sistem Informasi Akademik (SIAKAD) SMK Negeri 1 Simpang Empat</p>
            </div>
            <div class="text-right">
                <span class="text-xs uppercase tracking-wider font-semibold bg-[#f5f5f7] px-3 py-1.5 rounded-lg border border-[#d2d2d7]/50">Tahun Ajaran 2026/2027</span>
            </div>
        </div>

        <!-- Informasi Siswa -->
        <div class="grid grid-cols-2 gap-4 mb-8 text-sm bg-[#f5f5f7]/50 p-6 rounded-2xl border border-[#d2d2d7]/30">
            <div>
                <p class="text-[#86868b]">Nama Lengkap:</p>
                <p class="font-semibold text-base text-[#1d1d1f] mt-0.5">{{ $siswa->nama_lengkap }}</p>
            </div>
            <div>
                <p class="text-[#86868b]">Nomor Induk Siswa (NIS):</p>
                <p class="font-semibold text-base text-[#1d1d1f] mt-0.5 font-mono">{{ $siswa->nis }}</p>
            </div>
            <div>
                <p class="text-[#86868b]">Kelas:</p>
                <p class="font-semibold text-[#1d1d1f] mt-0.5">XI Teknik Komputer dan Jaringan 1</p>
            </div>
            <div>
                <p class="text-[#86868b]">Rata-rata Nilai Akhir:</p>
                <p class="font-semibold text-base text-[#0071e3] mt-0.5 font-mono">{{ $rataRata ? number_format($rataRata, 1) : '-' }}</p>
            </div>
        </div>

        <!-- Tabel Nilai Akademik -->
        <div class="mb-10">
            <table class="w-full text-left text-sm border-collapse">
                <thead>
                    <tr class="border-b border-[#1d1d1f] text-xs uppercase tracking-wider text-[#515154]">
                        <th class="py-3 px-2">Mata Pelajaran</th>
                        <th class="py-3 px-2 text-center">Tugas</th>
                        <th class="py-3 px-2 text-center">UTS</th>
                        <th class="py-3 px-2 text-center">UAS</th>
                        <th class="py-3 px-2 text-center">Praktik</th>
                        <th class="py-3 px-2 text-center">Nilai Akhir</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#d2d2d7]/40">
                    @forelse($daftarNilai as $nilai)
                    <tr>
                        <td class="py-3.5 px-2 font-medium">{{ $nilai->mataPelajaran->nama_mapel ?? $nilai->mataPelajaran->nama_pelajaran ?? 'Kejuruan' }}</td>
                        <td class="py-3.5 px-2 text-center font-mono">{{ $nilai->nilai_tugas }}</td>
                        <td class="py-3.5 px-2 text-center font-mono">{{ $nilai->nilai_uts }}</td>
                        <td class="py-3.5 px-2 text-center font-mono">{{ $nilai->nilai_uas }}</td>
                        <td class="py-3.5 px-2 text-center font-mono">{{ $nilai->nilai_praktik }}</td>
                        <td class="py-3.5 px-2 text-center font-semibold font-mono">{{ number_format($nilai->nilai_akhir, 1) }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="py-8 text-center text-[#86868b] italic">Belum ada komponen nilai yang diinput untuk siswa ini.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Tanda Tangan / Pengesahan -->
        <div class="flex justify-between items-end pt-8 mt-12 border-t border-[#d2d2d7]/40 text-sm page-break-inside-avoid">
            <div class="text-center">
                <p class="text-[#86868b] mb-16">Mengetahui,<br>Orang Tua / Wali Murid</p>
                <p class="font-semibold underline">( ........................................ )</p>
            </div>
            <div class="text-center">
                <p class="text-[#515154] mb-1">Banjarmasin, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</p>
                <p class="text-[#86868b] mb-16">Wali Kelas XI TKJ 1</p>
                <p class="font-semibold underline">{{ Auth::user()->name }}</p>
            </div>
        </div>

    </div>

</body>

</html>