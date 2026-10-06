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
    <body class="antialiased" style="font-family:'Poppins',ui-sans-serif,system-ui,sans-serif;">
        <div class="min-h-screen" style="background:linear-gradient(135deg,#fff1f5 0%,#ffe4ec 45%,#fdf2f8 100%);">
            @include('layouts.navigation')

            @isset($header)
                <header>
                    <div class="max-w-6xl mx-auto pt-8 pb-1 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <main>
                {{ $slot }}
            </main>

            <footer class="text-center text-xs text-pink-400 py-8">
                Dibuat dengan 💗 · UTS Pemrograman Web III
            </footer>
        </div>
    </body>
</html>