<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>{{ config('app.name', 'GameDev') }}</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Protest+Guerrilla&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
         <!-- Scripts -->
         @vite(['resources/css/app.css', 'resources/js/app.js'])
         <link rel="icon" href="{{ asset('logo-footer.png') }}" type="image/x-icon">
    </head>
    <body class="background font-poppins antialiased">

        {{-- card positioning --}}

        <div
            class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0"
        >
            <div>

                {{-- centered website logo  --}}

                <a href="/">
                    <x-application-logo
                        class="w-20 h-20 fill-current text-gray-500"
                    /> 
                </a>
                
            </div>

            {{-- card design  --}}

            <div
                class="w-full sm:max-w-md mt-6 px-8 py-8 dark:bg-[#53212b] shadow-md overflow-hidden rounded sm:rounded-lg card "
            >
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
