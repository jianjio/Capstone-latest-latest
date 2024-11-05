<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GameDev</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Protest+Guerrilla&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="{{ asset('logo-footer.png') }}" type="image/x-icon">
</head>
<body class="bg-black font-poppins" x-data="{ open: false }">

    <!-- Header -->

    <header class="bg-transparent py-8">
        <div class="container mx-auto flex justify-between items-center px-4">
            <a href="/" class="text-gray-400 text-6xl uppercase tracking-wide font-protest">
                <img src="{{ asset('logo-footer.png') }}" class="w-2/3" alt="logo" />
            </a>
            <nav class="hidden md:flex space-x-20">
                @if (Route::has('login'))
                    <div class="hidden md:flex space-x-10 sm:top-2 sm:right-0 p-6 text-right z-10">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="font-semibold text-xl text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm uppercase focus:outline-red-500">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="text-2xl text-neutral-500 hover:text-gray-300">Log in</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="text-2xl text-neutral-500 hover:text-gray-300">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif
            </nav>
            <button @click="open = !open" class="md:hidden">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
    </header>

    <!-- Responsive Navigation Menu -->
    <div x-show="open" class="md:hidden">
        <div class="bg-black text-white p-4 space-y-2">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="block text-gray-300 hover:text-gray-500">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="block text-gray-300 hover:text-gray-500">Log in</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="block text-gray-300 hover:text-gray-500">Register</a>
                    @endif
                @endauth
            @endif
        </div>
    </div>
{{-- hero section  --}}
    <section class="hero text-center content-center">
        <div class="container mx-auto px-2">
            <h1 class="md:text-9xl text-8xl tracking-widest font-protest text-[#D1BDC6]">GAMEDEV</h1>
            <p class="md:text-2xl text-xl tracking-wide text-blue-500 uppercase mb-8">
                Discover the Best Free-To-Play Games with Ease!
            </p>
        </div>
    </section>
    @include('profile.partials._footer')
</body>
</html>