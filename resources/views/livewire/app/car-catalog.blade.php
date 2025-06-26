<div class="grid grid-cols-3 gap-4 relative group">
    @foreach ($cars as $car)
        <div class="bg-[url('/public/assets/images/vector-3.svg')] w-full bg-fill bg-no-repeat shadow-md px-5 py-10 transition delay-100 duration-300 ease-in-out hover:-translate-y-1 hover:scale-3d intersect:motion-preset-slide-up-md motion-delay-100 intersect-once">
            <img src="{{ $car->photo ? asset('storage/' . $car->photo) : asset('assets/images/default-car.png') }}" width="400" height="400" class="" alt="{{ $car->model }}" />
            <div class="mt-5">
                <h4 class="text-2xl text-center font-semibold">{{ $car->brand }} {{$car->model}}</h4>
                <div class="flex justify-between space-x-2 mt-8">
                    <div class="flex flex-col">
                        <span class="text-gray-700 font-medium">Tanpa Supir</span>
                        <x-ui.button-primary type="button" class="px-2 max-w-fit">
                            Rp. {{ number_format($car->price_without_driver, 0, ',', '.') }} / Hari
                        </x-ui.button-primary>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-gray-700 font-medium">Ikut Supir</span>
                        <x-ui.button-primary type="button" class="px-2 max-w-fit">
                            Rp. {{ number_format($car->price_with_driver, 0, ',', '.') }} / Hari
                        </x-ui.button-primary>
                    </div>
                </div>
            </div>
        </div>
    @endforeach                  
</div>