<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-full bg-[#0f6a41]">
    <section class="flex flex-col justify-between w-full h-screen px-4 pt-4 md:flex-row">
        <img src="{{ asset('assets/foto-H.Miftah.webp') }}" alt="" class="hidden w-auto h-full md:block">
        <div class="flex flex-col items-center text-center">
            <img src="{{ asset('assets/logo-partai/Logo_PPP.svg') }}" alt="" class="w-16 mb-4 md:mb-0 md:w-auto">
            <p class="hidden mt-4 text-2xl text-white md:block">Partai Persatuan Pembangunan</p>
            <div class="hidden mt-14 md:block">
                <p class="-mb-5 text-2xl text-white">Pilih</p>
                <div class="text-white">
                    <span class="text-5xl">Nomor</span>
                    <span class="text-7xl">1</span>
                </div>
            </div>
        </div>
        <img src="{{ asset('assets/foto-H.Miftah.webp') }}" alt="" class="block w-auto h-full md:hidden">
        <div class="flex flex-col justify-end h-auto pb-4 text-center md:text-right">
            <h3 class="text-lg text-white md:text-2xl">MOHON DOA & DUKUNGANNYA</h3>
            <h3 class="text-lg text-white md:text-2xl">ANGGOTA DPRD PROVINSI 3 PERIODE</h3>
            <h3 class="text-lg text-white md:text-2xl">UNTUK DPR RI 2024</h3>

            <div class="p-2 text-center bg-white">
                <h2 class="text-4xl font-extrabold text-gray-700 md:text-6xl">H. MIFTAH S.H.I</h2>
            </div>
            <div class="p-2 text-center bg-gray-300">
                <h2 class="text-2xl font-semibold text-gray-700 md:text-4xl">CALEG DPR RI KALBAR 1</h2>
            </div>
        </div>
    </section>
    {{-- <section class="flex w-full h-screen pt-4 pl-4">
        <img src="{{ asset('assets/panggilan_ulama.png') }}" alt="" class="hidden w-auto h-full md:block">
        <div>
            <h3 class="text-2xl">MOHON DOA & DUKUNGANNYA</h3>
            <h3 class="text-2xl">ANGGOTA DPRD PROVINSI 3 PERIODE</h3>
            <h3 class="text-2xl">UNTUK DPR RI 2024</h3>

            <h2 class="text-6xl font-extrabold">H. MIFTAH S.H.I</h2>
            <h2 class="text-4xl font-semibold">CALEG DPR RI KALBAR 1</h2>
        </div>
        <div class="text-right text-white">
            <h3 class="text-2xl">MOHON DOA & DUKUNGANNYA</h3>
            <h3 class="text-2xl">ANGGOTA DPRD PROVINSI 3 PERIODE</h3>
            <h3 class="text-2xl">UNTUK DPR RI 2024</h3>

            <h2 class="text-6xl font-extrabold">H. MIFTAH S.H.I</h2>
            <h2 class="text-4xl font-semibold">CALEG DPR RI KALBAR 1</h2>
        </div>
    </section> --}}
</body>
</html>