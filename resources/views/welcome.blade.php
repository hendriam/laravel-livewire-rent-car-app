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
                        <p class="text-[20px]" text-[#4B4B4B] >Kami membuka pintu bagi Anda untuk menjelajahi dunia dengan nyaman dan penuh gaya. Menjadi mitra perjalanan tepercaya Anda.</p>
                        <x-ui.button-primary type="button" class="px-20 max-w-fit text-xl">Call us</x-ui.button-primary>
                    </div>
                    <div>
                        <img src="{{ asset('assets/images/hero-img.svg') }}" class="w-7xl" alt="car-2" srcset="">
                    </div>
                </div>
                <img src="{{ asset('assets/images/vector-2.svg') }}" class=" bottom-0 w-full object-fill -z-10" alt="vector-2" srcset="">
            </section>

            <section class="mx-auto max-w-6xl py-16">
                <div class="flex justify-between items-center">
                    <h2 class="text-5xl font-semibold">Armada Kami</h2>
                    <x-ui.button-primary type="button" class="px-3 py-1.5">Lihat Semua</x-ui.button-primary>
                </div>
                <div class="mt-10">
                    <div class="grid grid-cols-3 gap-4 relative group">
                        <div class="bg-[url('/public/assets/images/vector-3.svg')] w-full bg-fill bg-no-repeat shadow-md px-5 py-10 transition delay-100 duration-300 ease-in-out hover:-translate-y-1 hover:scale-3d">
                            <img src="{{ asset('assets/images/car-2.png') }}" class="" alt="vector-1" srcset="">
                            <div class="mt-5">
                                <h4 class="text-2xl text-center font-semibold">Avanza 2025</h4>
                                <div class="flex justify-between space-x-2 mt-8">
                                    <div class="flex flex-col">
                                        <span class="text-[#4B4B4B]  font-medium">Lepas kunci</span>
                                        <x-ui.button-primary type="button" class="px-2 max-w-fit">Rp. 200.000 / Hari</x-ui.button-primary>
                                    </div>

                                    <div class="flex flex-col">
                                        <span class="text-[#4B4B4B] font-medium ">Ikut supir</span>
                                        <x-ui.button-primary type="button" class="px-2 max-w-fit">Rp. 300.000 / Hari</x-ui.button-primary>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="bg-[url('/public/assets/images/vector-3.svg')] w-full bg-fill bg-no-repeat shadow-md px-5 py-10 transition delay-100 duration-300 ease-in-out hover:-translate-y-1 hover:scale-3d">
                            <img src="{{ asset('assets/images/car-2.png') }}" class="" alt="vector-1" srcset="">
                            <div class="mt-5">
                                <h4 class="text-2xl text-center font-semibold">Avanza 2025</h4>

                                <div class="flex justify-between space-x-2 mt-8">
                                    <div class="flex flex-col">
                                        <span class="text-[#4B4B4B]  font-medium">Lepas kunci</span>
                                        <x-ui.button-primary type="button" class="px-2 max-w-fit">Rp. 200.000 / Hari</x-ui.button-primary>
                                    </div>

                                    <div class="flex flex-col">
                                        <span class="text-[#4B4B4B] font-medium ">Ikut supir</span>
                                        <x-ui.button-primary type="button" class="px-2 max-w-fit">Rp. 300.000 / Hari</x-ui.button-primary>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="bg-[url('/public/assets/images/vector-3.svg')] w-full bg-fill bg-no-repeat shadow-md px-5 py-10 transition delay-100 duration-300 ease-in-out hover:-translate-y-1 hover:scale-3d">
                            <img src="{{ asset('assets/images/car-2.png') }}" class="" alt="vector-1" srcset="">
                            <div class="mt-5">
                                <h4 class="text-2xl text-center font-semibold">Avanza 2025</h4>

                                <div class="flex justify-between space-x-2 mt-8">
                                    <div class="flex flex-col">
                                        <span class="text-[#4B4B4B]  font-medium">Lepas kunci</span>
                                        <x-ui.button-primary type="button" class="px-2 py-1">Rp. 300.000 / Hari</x-ui.button-primary>
                                    </div>

                                    <div class="flex flex-col">
                                        <span class="text-[#4B4B4B] font-medium ">Ikut supir</span>
                                        <x-ui.button-primary type="button" class="px-2 py-1">Rp. 300.000 / Hari</x-ui.button-primary>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="bg-[url('/public/assets/images/vector-3.svg')] w-full bg-fill bg-no-repeat shadow-md px-5 py-10 transition delay-100 duration-300 ease-in-out hover:-translate-y-1 hover:scale-3d">
                            <img src="{{ asset('assets/images/car-2.png') }}" class="" alt="vector-1" srcset="">
                            <div class="mt-5">
                                <h4 class="text-2xl text-center font-semibold">Avanza 2025</h4>

                                <div class="flex justify-between space-x-2 mt-8">
                                    <div class="flex flex-col">
                                        <span class="text-[#4B4B4B]  font-medium">Lepas kunci</span>
                                        <x-ui.button-primary type="button" class="px-2 py-1">Rp. 300.000 / Hari</x-ui.button-primary>
                                    </div>

                                    <div class="flex flex-col">
                                        <span class="text-[#4B4B4B] font-medium ">Ikut supir</span>
                                        <x-ui.button-primary type="button" class="px-2 py-1">Rp. 300.000 / Hari</x-ui.button-primary>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="bg-[url('/public/assets/images/vector-3.svg')] w-full bg-fill bg-no-repeat shadow-md px-5 py-10 transition delay-100 duration-300 ease-in-out hover:-translate-y-1 hover:scale-3d">
                            <img src="{{ asset('assets/images/car-2.png') }}" class="" alt="vector-1" srcset="">
                            <div class="mt-5">
                                <h4 class="text-2xl text-center font-semibold">Avanza 2025</h4>

                                <div class="flex justify-between space-x-2 mt-8">
                                    <div class="flex flex-col">
                                        <span class="text-[#4B4B4B]  font-medium">Lepas kunci</span>
                                        <x-ui.button-primary type="button" class="px-2 py-1">Rp. 300.000 / Hari</x-ui.button-primary>
                                    </div>

                                    <div class="flex flex-col">
                                        <span class="text-[#4B4B4B] font-medium ">Ikut supir</span>
                                        <x-ui.button-primary type="button" class="px-2 py-1">Rp. 300.000 / Hari</x-ui.button-primary>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="bg-[url('/public/assets/images/vector-3.svg')] w-full bg-fill bg-no-repeat shadow-md px-5 py-10 transition delay-100 duration-300 ease-in-out hover:-translate-y-1 hover:scale-3d">
                            <img src="{{ asset('assets/images/car-2.png') }}" class="" alt="vector-1" srcset="">
                            <div class="mt-5">
                                <h4 class="text-2xl text-center font-semibold">Avanza 2025</h4>

                                <div class="flex justify-between space-x-2 mt-8">
                                    <div class="flex flex-col">
                                        <span class="text-[#4B4B4B]  font-medium">Lepas kunci</span>
                                        <x-ui.button-primary type="button" class="px-2 py-1">Rp. 300.000 / Hari</x-ui.button-primary>
                                    </div>

                                    <div class="flex flex-col">
                                        <span class="text-[#4B4B4B] font-medium ">Ikut supir</span>
                                        <x-ui.button-primary type="button" class="px-2 py-1">Rp. 300.000 / Hari</x-ui.button-primary>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
	</body>
</html>