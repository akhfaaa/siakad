<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SIAKAD SMKN 1 Simpang Empat</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<!-- Latar Belakang Professional Dark Mode macOS -->

<body class="font-sans text-gray-200 antialiased min-h-screen flex items-center justify-center bg-slate-950 relative overflow-hidden">

    <!-- Pendaran Cahaya (Orbs) yang Halus & Elegan -->
    <div class="absolute top-[-10%] left-[-10%] w-[40rem] h-[40rem] bg-blue-900/30 rounded-full mix-blend-screen filter blur-[120px] opacity-80"></div>
    <div class="absolute bottom-[-20%] right-[-10%] w-[35rem] h-[35rem] bg-cyan-900/20 rounded-full mix-blend-screen filter blur-[100px] opacity-60"></div>
    <div class="absolute top-[20%] right-[20%] w-[25rem] h-[25rem] bg-indigo-900/20 rounded-full mix-blend-screen filter blur-[100px] opacity-50"></div>

    <!-- Panel Utama Liquid Glass -->
    <div class="relative w-full max-w-sm sm:max-w-md mx-4 sm:mx-auto px-6 py-8 sm:px-10 sm:py-12 bg-white/[0.04] backdrop-blur-2xl border border-white/[0.08] shadow-[0_8px_32px_0_rgba(0,0,0,0.4)] rounded-2xl sm:rounded-3xl z-10">
        {{ $slot }}
    </div>

</body>

</html>