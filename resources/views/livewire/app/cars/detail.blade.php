<section class="">
    <img src="{{ asset('assets/images/vector-4.svg') }}" class="absolute w-full h-auto -z-10" alt="vector-4" srcset="">
    <div class="xl:mx-auto max-w-6xl px-5 xl:px-0 py-12 md:py-20">
        <div class="grid grid-rows-1 sm:grid-cols-2 items-center">
            <div class="text-center sm:text-start flex flex-col space-y-3">
                <h1 class="text-3xl md:text-5xl font-semibold">{{ $car->brand }} {{ $car->model }}</h1>
                <h2 class="font-medium text-gray-500 dark:text-gray-400">Plat {{ $car->plate_number }}</h2>
                <h2 class="font-medium text-gray-500 dark:text-gray-400">Warna {{ $car->color }}</h2>
                <h2 class="font-medium text-gray-500 dark:text-gray-400">Tahun {{ $car->year }}</h2>
            </div>
            <img src="{{ $car->photo ? asset('storage/' . $car->photo) : asset('assets/images/default-car.png') }}"  class="" alt="vector-1" srcset="">
        </div>  
    </div>
</section>
