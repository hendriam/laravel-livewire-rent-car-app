<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 group">
     @foreach ($cars as $car)
        <div class="bg-[url('/public/assets/images/vector-3.svg')] w-full bg-contain bg-no-repeat shadow-md transition delay-100 duration-300 ease-in-out group-hover:-translate-y-1 group-hover:scale-3d intersect:motion-preset-slide-up-md motion-delay-100 intersect-once">
            <div class="px-5 py-5">
                <img src="{{ $car->photo ? asset('storage/' . $car->photo) : asset('assets/images/default-car.png') }}" width="400" class="" alt="vector-1" srcset="">
                <div class="mt-5">
                    <h4 class="text-2xl text-center font-semibold">{{ $car->brand }} {{$car->model}}</h4>
                    <div class="grid grid-cols-2 gap-2 justify-between mt-4">
                        <div class="">
                            <span class="text-[#4B4B4B] font-medium">Tanpa Supir</span>
                            <x-ui.button-primary type="button" class="mt-1 px-2 w-full lg:max-w-fit">Rp. {{ number_format($car->price_without_driver, 0, ',', '.') }} / Hari</x-ui.button-primary>
                        </div>

                        <div class="">
                            <span class="text-[#4B4B4B] font-medium ">Ikut supir</span>
                            <x-ui.button-primary type="button" class="mt-1 px-2 w-full lg:max-w-fit">Rp. {{ number_format($car->price_with_driver, 0, ',', '.') }} / Hari</x-ui.button-primary>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>