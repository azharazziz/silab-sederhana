<x-app-layout>
    <div class="w-full p-4 text-center bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
        <p class="mb-2 text-base text-gray-500 sm:text-lg dark:text-gray-400">Selamat datang di SIRS.</p>
        <h5 class="mb-2 text-3xl font-bold text-gray-900 dark:text-white">Halo, {{ Auth::user()->name }}!</h5>
        <p class="mb-2 text-base text-gray-500 sm:text-lg dark:text-gray-400">{{ date_format(now(),"l, d F Y"); }}</p>
        <p class="mb-2 text-base text-gray-500 sm:text-lg dark:text-gray-400">{{ date_format(now(),"h:m A"); }}</p>

    </div>
</x-app-layout>
