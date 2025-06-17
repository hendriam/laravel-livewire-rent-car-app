<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $title ?? config('app.name') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
	<body class="antialiased bg-white">
            <nav class="mx-auto max-w-6xl py-4 flex items-center justify-between">
                <a href="/" class="flex space-x-1.5 items-center">
                    <img src="{{ asset('assets/logo.svg') }}" alt="Logo" />
                    <span class="text-secondary font-semibold text-2xl">Rent.Car</span>
                </a>
    
                <ul class="flex space-x-8 text-lg">
                    <li><a href="/">About us</a></li>
                    <li><a href="/">Contact</a></li>
                    <li><a href="/">Services</a></li>
                </ul>
    
                <a href="" class="px-4 py-2.5 text-sm font-medium text-white bg-primary hover:bg-primary/90 hover:cursor-pointer">Login</a>
            </nav>
    
            <section>
                <img src="{{ asset('assets/images/vector-1.svg') }}" class="absolute w-full h-auto -z-10" alt="vector-1" srcset="">
                <div class="pt-10 sm:pt-15 xl:pt-27 3xl:pt-40 pb-10 space-x-6 mx-auto max-w-6xl flex items-center justify-between">
                    <div class="flex flex-col space-y-7">
                        <h1 class="text-8xl font-semibold leading-28 text-white">Sewa mobil <br> <span class="text-secondary">disini aja.</span></h1>
                        <p class="text-[20px]">Kami membuka pintu bagi Anda untuk menjelajahi dunia dengan nyaman dan penuh gaya. Menjadi mitra perjalanan tepercaya Anda.</p>
                        <x-ui.button-primary type="button" class="px-20 max-w-fit">Call us</x-ui.button-primary>
                    </div>
                    <div>
                        <img src="{{ asset('assets/images/hero-img.svg') }}" class="w-7xl" alt="car-2" srcset="">
                    </div>
                </div>
                <img src="{{ asset('assets/images/vector-2.svg') }}" class=" bottom-0 w-full object-fill -z-10" alt="vector-2" srcset="">
            </section>

	</body>
</html>