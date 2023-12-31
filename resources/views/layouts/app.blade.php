<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- built -->
        {{-- <link rel="stylesheet" href="/app-80a3f400.css">
        <script src="/app-01285746.js"></script> --}}

        @livewireStyles
    </head>
    <body  class="dark:bg-gray-900">
        @include('layouts.navigation')
        @include('layouts.sidebar')

            <!-- Page Content -->
            <main>
                <div class="p-4 sm:ml-64 ">
                    <div class="p-4 rounded-lg mt-14">
                {{ $slot }}
                    </div>
                </div>
            </main>
        </div>
        @livewireScripts
    </body>
</html>
