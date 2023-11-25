<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Orchid Opinion') }}</title>

    <link rel="shortcut icon" href="{{ asset('assets/logo-partai/Logo_PPP.svg') }}" type="image/x-icon">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    <script defer src="https://unpkg.com/alpinejs-persist-extended@latest/dist/storage.min.js"></script>
    <wireui:scripts />
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- @livewireStyles --}}
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        <livewire:layout.navigation />

        <!-- Page Heading -->
        {{-- @if (isset($header))
                <header class="bg-white shadow dark:bg-gray-800">
                    <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                        {{ $header }}
    </div>
    </header>
    @endif --}}

    <!-- Page Content -->
    <main>
        <div class="m-3 bg-white rounded-md">
            {{ $slot }}
        </div>
    </main>
    </div>

    {{-- @livewireScripts --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.1.1/flowbite.min.js"></script>
    @wireUiScripts
    @stack('scripts')
</body>
</html>