<div>
    <section class="">
        <img src="{{ asset('assets/images/vector-1.svg') }}" class="absolute w-full h-auto -z-10" alt="vector-1" srcset="">
        <div class="px-5 xl:px-0 pt-5 sm:pt-10 md:pt-12 lg:pt-18 2xl:pt-27 3xl:pt-40 pb-10 mx-auto max-w-6xl flex flex-col md:flex-row items-center justify-center md:justify-between space-x-6 space-y-6">
            <div class="flex flex-col items-center md:items-start space-y-7 motion-preset-slide-right-md">
                <h1 class="text-5xl md:text-6xl lg:text-7xl xl:text-8xl font-semibold leading-16 md:leading-24 xl:leading-28 text-white text-center md:text-start">Sewa mobil <br> <span class="text-secondary">disini aja.</span></h1>
                <p class="text-[20px] text-[#4B4B4B] text-center md:text-start">Kami membuka pintu bagi Anda untuk menjelajahi dunia dengan nyaman dan penuh gaya. Menjadi mitra perjalanan tepercaya Anda.</p>
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
            <div class="flex md:space-x-8 space-y-24 md:flex-row flex-col justify-center items-center">
                <div class="-z-10 intersect:motion-preset-slide-right-md intersect-once">
                    <div class="-z-10 relative">
                        <div class="bg-primary -z-10 w-[350px] h-[350px] md:w-[450px] md:h-[450px] rounded-full pt-15 md:pt-18 pl-13 md:pl-15">
                            <h2 class="text-4xl md:text-5xl text-white font-semibold">Sewa Mobil</h2>
                            <h3 class="text-5xl md:text-6xl text-secondary font-semibold">Terlengkap</h3>
                        </div>
                        <img src="{{ asset('assets/images/hero-img.svg') }}" class="w-md h-auto absolute -bottom-20" alt="profile " srcset="">
                    </div>
                </div>    
                <div class="intersect:motion-preset-slide-left-md intersect-once">
                    <h3 class="text-3xl sm:text-5xl text-center md:text-start font-semibold">CV. Rental Mobil</h3>
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

    <section class="mx-auto max-w-6xl px-5 xl:px-0 py-16">
        <div class="flex justify-between items-center">
            <h2 class="text-3xl sm:text-5xl font-semibold">Armada Kami</h2>
            <a href="{{ route('cars.index') }}"><x-ui.button-primary type="button" class="px-3 py-1.5">Lihat Semua</x-ui.button-primary></a>
        </div>
        <div class="mt-10">
            @livewire('app.car-catalog')
        </div>
    </section>
</div>
