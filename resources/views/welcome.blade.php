<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
</head>

<body class="antialiased">
    <div
        class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        @if (Route::has('login'))
            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
                {{-- dropdown --}}
                <button id="multiLevelDropdownButton" data-dropdown-toggle="dropdown"
                    class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm  focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center"
                    type="button">Profil <svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg></button>
                <!-- Dropdown menu -->
                <div id="dropdown"
                    class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 text-left">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                        aria-labelledby="multiLevelDropdownButton">
                        <li>
                            <button id="doubleDropdownButton" data-dropdown-toggle="doubleDropdown"
                                data-dropdown-placement="right-start" type="button"
                                class="flex items-center justify-between w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Visi Misi<svg
                                    aria-hidden="true" class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg></button>
                            <div id="doubleDropdown"
                                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-96 dark:bg-gray-700">
                                <ul class="py-2 text-center text-sm text-gray-700 dark:text-gray-200"
                                    aria-labelledby="doubleDropdownButton">
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                            <span class="text-l font-bold">KETUPAT (Kelompok Satu Paling Tepat)</span>
                                            <br>
                                            <span class="font-bold"> VISI</span>
                                            <br>
                                            <span>“MENJADI LABORATORIUM MEDIK YANG TERDEPAN DALAM
                                                PELAYANAN DIAGNOSTIK YANG BERMUTU”</span>
                                            <span class="font-bold">MISI</span>
                                            <ul>
                                                <li>1. MENGUTAMAKAN PELAYANAN DIAGNOSTIK MEDIK YANG AKURAT,
                                                    CEPAT DAN HASIL YANG VALID</li>
                                                    <li>2. MENINGKATKAN SUMBER DAYA YANG HANDAL
                                                        MOTTO</li>
                                            </ul>
                                            “KEPUASAN ANDA ADALAH PRIORITAS KAMI”
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <button id="doubleDropdownButton" data-dropdown-toggle="doubleDropdown2"
                                data-dropdown-placement="right-start" type="button"
                                class="flex items-center justify-between w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Tentang<svg
                                    aria-hidden="true" class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg></button>
                            <div id="doubleDropdown2"
                                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-96 dark:bg-gray-700">
                                <ul class="py-2 text-center text-sm text-gray-700 dark:text-gray-200"
                                    aria-labelledby="doubleDropdownButton">
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                            Sistem Informasi Laboratorium (SIL) berbasis website ini, dikembangkan untuk memenuhi tugas mata kuliah Sistem Manajemen Mutu 1, Kelas Alih Jenjang Yogyakarta 2022. Banyak suka dan duka dalam pengembangkan SIL ini, dengan ijin ALLAH SWT kami dapat menyelesaikannya tepat waktu. Kami mengucapkan terima kasih kepada dosen pengampu Mata Kuliah Sistem Manajemen Mutu 1, Bpk. Sujono, SKM, M.Sc yang terus membimbing kami dalam menyusun konsep awal dalam pengembangan SIL. Terima kasih juga kepada Mas Azhar Azziz selaku programmer yang berkontribusi besar dalam mengeksekusi konsep SIL yang kami berikan sehingga SIL ini boleh dikembangkan sesuai konsep awal. Semoga SIL yang kami kembangkan ini, bisa menjadi cikal bakal penerapan SIL yang baik dan benar.
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <button id="doubleDropdownButton" data-dropdown-toggle="doubleDropdown3"
                                data-dropdown-placement="right-start" type="button"
                                class="flex items-center justify-between w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Our Team<svg
                                    aria-hidden="true" class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg></button>
                            <div id="doubleDropdown3"
                                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-96 dark:bg-gray-700">
                                <ul class="py-2 text-center text-sm text-gray-700 dark:text-gray-200"
                                    aria-labelledby="doubleDropdownButton">
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                            Dosen Pengampu:
                                            Sujono, SKM, M.Sc.
                                            <br>
                                            Mahasiswa
                                            <br>
                                            Hanifa RS,
                                            Tri Suryo W,
                                            Andika Filips,
                                            Emi L,
                                            Hermi W,
                                            Nursih ES,
                                            Siti K,
                                            Yuliana W,
                                            Lili S,
                                            Catur W
                                            <br>
                                            Programmer:
                                            Azhar Azziz
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
                {{-- dropdown end --}}
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                @else
                    <a href="{{ route('login') }}"
                        class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Laboratorium</a>
                        <a href="{{ route('login') }}"
                        class=" ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Manajemen Lab</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                    @endif
                @endauth
                <button id="dropdownHoverButton" data-dropdown-toggle="dropdownHover" data-dropdown-trigger="hover"
                    class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm  focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center"
                    type="button">Contact Us<svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg></button>
                <!-- Dropdown menu -->
                <div id="dropdownHover"
                    class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 text-left">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownHoverButton">
                        <li>
                            <a href="#"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Hanifa
                                RS</a>
                        </li>
                        <li>
                            <a href="#"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Tri
                                Suryo W</a>
                        </li>
                        <li>
                            <a href="#"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Andika
                                Filips</a>
                        </li>
                        <li>
                            <a href="#"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Emi
                                L</a>
                        </li>
                        <li>
                            <a href="#"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Nursih
                                ES</a>
                        </li>
                        <li>
                            <a href="#"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Hermi
                                W</a>
                        </li>
                        <li>
                            <a href="#"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Yuliana
                                W</a>
                        </li>
                        <li>
                            <a href="#"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Lili
                                SL</a>
                        </li>
                        <li>
                            <a href="#"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Catur
                                W</a>
                        </li>
                    </ul>
                </div>
            </div>
        @endif

        <div class="max-w-7xl mx-auto p-6 lg:p-8">
            <div class="mt-16 flex flex-col items-center">
                <h5 class="mb-2 text-5xl font-bold tracking-tight text-gray-900 dark:text-white">Sistem Informasi
                    Laboratorium</h5>
                <h5 class="mb-2 text-3xl italic font-light tracking-tight text-gray-900 dark:text-white">Kepuasan Anda
                    Adalah Kebahagiaan Kami</h5>
                <img class="h-80 max-w-lg rounded-lg to-transparent from-black" src="/team.png"
                    alt="image description">
            </div>

            <div class="flex justify-center mt-16 px-0 sm:items-center sm:justify-between">
                <div class="text-center text-sm text-gray-500 dark:text-gray-400 sm:text-left">
                    <div class="flex items-center gap-4">
                        <a href="#"
                            class="group inline-flex items-center hover:text-gray-700 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dev
                            w/
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5"
                                class="-mt-px mr-1 w-5 h-5 stroke-gray-400 dark:stroke-gray-600 group-hover:stroke-gray-600 dark:group-hover:stroke-gray-400">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                            </svg>
                            by A
                        </a>
                    </div>
                </div>
                <div class="ml-4 text-center text-sm text-gray-500 dark:text-gray-400 sm:text-right sm:ml-0">
                    Copyright (c) Kelompok 1 2023
                </div>
                <div class="ml-4 text-center text-sm text-gray-500 dark:text-gray-400 sm:text-right sm:ml-0">
                    Dev in Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                </div>
            </div>
        </div>
    </div>
</body>

</html>
