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
</head>
<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gradient-to-br from-pink-200 via-red-200 to-pink-400">
        <div>
            <a href="/">
                <svg class="w-20 h-20" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M32 58s-22-13.333-22-30A14 14 0 0132 14a14 14 0 0122 14c0 16.667-22 30-22 30z" fill="#e11d48" stroke="#be185d" stroke-width="2" />
                </svg>
            </a>
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-8 bg-white/90 dark:bg-gray-800/90 shadow-lg overflow-hidden sm:rounded-lg border-2 border-pink-300">
            <div class="text-center mb-4">
                <h2 class="text-2xl font-bold text-pink-700">Welcome to Love Login</h2>
                <p class="text-pink-500">Sign in or sign up to find your match!</p>
            </div>
            {{ $slot }}
        </div>
    </div>
</body>
</html>
