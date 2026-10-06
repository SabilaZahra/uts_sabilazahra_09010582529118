<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>PustakaManis</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=poppins:400,500,600,700&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased text-gray-800" style="font-family:'Poppins',ui-sans-serif,system-ui,sans-serif;">
        <div class="min-h-screen flex flex-col sm:justify-center items-center px-4 py-10"
             style="background:linear-gradient(135deg,#ffe4ec 0%,#fbcfe8 50%,#fce7f3 100%);">
            <a href="/" class="text-center">
                <div class="w-16 h-16 mx-auto rounded-2xl flex items-center justify-center text-3xl shadow-lg"
                     style="background:linear-gradient(135deg,#f9a8d4,#f472b6);">📚</div>
                <div class="mt-3 text-2xl font-bold text-pink-600">Pustaka<span class="text-pink-400">Manis</span></div>
                <p class="text-sm text-pink-400">Sistem Manajemen Buku Perpustakaan</p>
            </a>

            <div class="w-full sm:max-w-md mt-6 px-8 py-7 bg-white/90 shadow-xl rounded-3xl border border-pink-100">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>