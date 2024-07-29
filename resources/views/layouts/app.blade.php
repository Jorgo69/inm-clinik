<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        {{-- <link rel="manifest" href="{{asset('assets/json/manifest.json')}}"> --}}
        {{-- @livewireStyles --}}
        {{-- Manifest Start --}}

    
        @laravelPWA


        {{-- Manifest Done --}}

        <title>{{ config('app.name', 'Ma Clinik') }}</title>
        @stack('hrefCDN')
        @stack('jquery')
        @stack('summernoteCdnHref')

        <!-- Fonts -->
        {{-- <link rel="preconnect" href="https://fonts.bunny.net"> --}}
        {{-- <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" /> --}}

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            @if (auth()->user()->role !== 'patient')

                @yield('layouts-sidebar')
                @yield('layouts-sidebarClinic')

            @endif

            <!-- Page Content -->
            <main>
                @yield('app-container')
            </main>

        </div>
        @include('layouts.footer')
        @stack('srcCDN')
        @stack('liveSearchAjax')
        @stack('summernoteCdnScript')
        {{-- @livewireScripts --}}
    </body>
</html>
