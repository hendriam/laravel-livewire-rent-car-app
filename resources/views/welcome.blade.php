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
            <nav class="mx-auto max-w-6xl py-4 px-5 xl:px-0 flex items-center justify-between">
                <a href="/" class="flex space-x-1.5 items-center">
                    <img src="{{ asset('assets/logo.svg') }}" alt="Logo" />
                    <span class="text-secondary font-semibold text-2xl">Rent.Car</span>
                </a>
    
                <ul class="flex space-x-8 text-lg">
                    <li><a href="/">About us</a></li>
                    <li><a href="/">Contact</a></li>
                    <li><a href="/">Services</a></li>
                </ul>
    
                <a href="{{ route('login') }}" class="px-4 py-2.5 text-sm font-medium text-white bg-primary hover:bg-primary/90 hover:cursor-pointer">Login</a>
            </nav>
    
            <section class="">
                <img src="{{ asset('assets/images/vector-1.svg') }}" class="absolute w-full h-auto -z-10" alt="vector-1" srcset="">
                <div class="px-5 xl:px-0 pt-5 sm:pt-10 md:pt-12 lg:pt-18 2xl:pt-27 3xl:pt-40 pb-10 space-x-6 mx-auto max-w-6xl flex items-center justify-between">
                    <div class="flex flex-col space-y-7 motion-preset-slide-right-md">
                        <h1 class="text-7xl xl:text-8xl font-semibold leading-24 xl:leading-28 text-white">Sewa mobil <br> <span class="text-secondary">disini aja.</span></h1>
                        <p class="text-[20px] text-[#4B4B4B]">Kami membuka pintu bagi Anda untuk menjelajahi dunia dengan nyaman dan penuh gaya. Menjadi mitra perjalanan tepercaya Anda.</p>
                        <x-ui.button-primary type="button" class="px-20 max-w-fit text-xl">Call us</x-ui.button-primary>
                    </div>
                    <div class="motion-preset-slide-left-md">
                        <img src="{{ asset('assets/images/hero-img.svg') }}" class="w-7xl" alt="car-2" srcset="">
                    </div>
                </div>
                <img src="{{ asset('assets/images/vector-2.svg') }}" class=" bottom-0 w-full object-fill -z-10" alt="vector-2" srcset="">
            </section>

            <section class="mx-auto max-w-6xl px-5 xl:px-0 pt-20 pb-10">
                <div class="max-w-5xl mx-auto">
                    <div class="flex sm:space-x-8 space-y-24 sm:flex-row flex-col justify-center items-center">
                        <div class="-z-10 intersect:motion-preset-slide-right-md intersect-once">
                            <div class="-z-10 relative">
                                <div class="bg-primary -z-10 w-[450px] h-[450px] rounded-full pt-18 pl-15">
                                    <h2 class="text-5xl text-white font-semibold">Sewa Mobil</h2>
                                    <h3 class="text-6xl text-secondary font-semibold">Terlengkap</h3>
                                </div>
                                <img src="{{ asset('assets/images/hero-img.svg') }}" class="w-md h-auto absolute -bottom-20" alt="profile " srcset="">
                            </div>
                        </div>    
                        <div class="intersect:motion-preset-slide-left-md intersect-once">
                            <h3 class="text-4xl font-semibold">CV. Rental Mobil</h3>
                            <p class="mt-6 text-[#4B4B4B]">
                                CV. Rental Mobil adalah penyedia jasa sewa mobil di kota medan yang telah beroperasi sejak 2020.
                                Kami menawarkan jasa rental mobil dengan Harga yang cukup terjangkau, ada banyak pilihan Armada yang bisa anda pakai.
                                <br>
                                <br>
                                Tersedia lebih 50+ unit yang sudah standby menanti kedatangan anda.
                                <br>
                                <br>
                                Di antaranya:
                                Ayla/Agya Facelift, New Calya, New Sigra, New Brio, New Agya, Avanza/Xenia, Ertiga, XL7, All New Avanza, All New Xenia, Rush, Terios, Xpander, New Livina, Grand Innova, Innova Reborn, Innova Zenix, Fortuner, Pajero dan Alphard.
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="mx-auto max-w-6xl px-5 xl:px-0 py-16 bg-gray-50">
                <div class="flex justify-between items-center">
                    <h2 class="text-5xl font-semibold">Armada Kami</h2>
                    <x-ui.button-primary type="button" class="px-3 py-1.5">Lihat Semua</x-ui.button-primary>
                </div>
                <div class="mt-10">
                    <div class="grid grid-cols-3 gap-4 relative group">
                        <div class="bg-[url('/public/assets/images/vector-3.svg')] w-full bg-fill bg-no-repeat shadow-md px-5 py-10 transition delay-100 duration-300 ease-in-out hover:-translate-y-1 hover:scale-3d intersect:motion-preset-slide-up-md motion-delay-100 intersect-once">
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

                        <div class="bg-[url('/public/assets/images/vector-3.svg')] w-full bg-fill bg-no-repeat shadow-md px-5 py-10 transition delay-100 duration-300 ease-in-out hover:-translate-y-1 hover:scale-3d intersect:motion-preset-slide-up-md motion-delay-300 intersect-once">
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

                        <div class="bg-[url('/public/assets/images/vector-3.svg')] w-full bg-fill bg-no-repeat shadow-md px-5 py-10 transition delay-100 duration-300 ease-in-out hover:-translate-y-1 hover:scale-3d intersect:motion-preset-slide-up-md motion-delay-500 intersect-once">
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

                        <div class="bg-[url('/public/assets/images/vector-3.svg')] w-full bg-fill bg-no-repeat shadow-md px-5 py-10 transition delay-100 duration-300 ease-in-out hover:-translate-y-1 hover:scale-3d intersect:motion-preset-slide-up-md motion-delay-100 intersect-once">
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

                        <div class="bg-[url('/public/assets/images/vector-3.svg')] w-full bg-fill bg-no-repeat shadow-md px-5 py-10 transition delay-100 duration-300 ease-in-out hover:-translate-y-1 hover:scale-3d intersect:motion-preset-slide-up-md motion-delay-300 intersect-once">
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

                        <div class="bg-[url('/public/assets/images/vector-3.svg')] w-full bg-fill bg-no-repeat shadow-md px-5 py-10 transition delay-100 duration-300 ease-in-out hover:-translate-y-1 hover:scale-3d intersect:motion-preset-slide-up-md motion-delay-500 intersect-once">
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

            <section class="border-t-2 border-primary">
                <div class="mx-auto max-w-6xl px-5 xl:px-0 py-10">
                    <div class="flex space-x-36 items-start">
                        <div class="w-full">
                            <a href="/" class="flex space-x-1.5 items-center">
                                <img src="{{ asset('assets/logo.svg') }}" alt="Logo" />
                                <span class="text-secondary font-semibold text-2xl">Rent.Car</span>
                            </a>
                            <p class="text-base text-[#4B4B4B]">Kami membuka pintu bagi Anda untuk menjelajahi dunia dengan nyaman dan penuh gaya. Menjadi mitra perjalanan tepercaya Anda.</p>
                        </div>
                        <div class="w-full">
                            <h4 class="text-2xl font-semibold mb-5">Kontak</h4>
                            <p class="text-[#4B4B4B]">Telpon 1: 02166666</p>
                            <p class="text-[#4B4B4B]">Telpon 2: 02166667</p>
                            <p class="text-[#4B4B4B]">Wa: 08213940343</p>
                        </div>

                        <div class="w-full">
                            <h4 class="text-2xl font-semibold mb-5">Alamat</h4>
                            <p class="text-[#4B4B4B]">Jl. Jendral Sudirman No. 40 Medan Kota, Sumatera Utara</p>
                        </div>
                    </div>
                </div>
            </section>
	</body>
</html>