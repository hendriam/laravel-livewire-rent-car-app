<section class="">
    <img src="{{ asset('assets/images/vector-4.svg') }}" class="absolute w-full h-auto -z-10" alt="vector-4" srcset="">
    <div class="xl:mx-auto max-w-6xl px-5 xl:px-0 py-12 md:py-20">
        <div class="grid grid-rows-1 md:grid-cols-2 gap-10 items-start md:justify-between mt-2 lg:mt-10">
            <div class="">
                <h3 class="text-3xl md:text-5xl font-semibold">Form Booking</h3>
                <form wire:submit.prevent="save" class="mt-6 flex flex-col space-y-4" autocomplete="off">
                    <div>
                        <x-ui.label for="start_date" class="text-lg">Tanggal Sewa</x-ui.label>
                        <x-ui.input type="date" wire:model.defer="start_date" class="w-full text-lg px-2.5 py-3 rounded-none" required></x-ui.input>
                        @error('start_date')<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $message }}!</p>@enderror
                    </div>

                    <div>
                        <x-ui.label for="end_date" class="text-lg">Tanggal Kembali</x-ui.label>
                        <x-ui.input type="date" wire:model.defer="end_date" class="w-full text-lg px-2.5 py-3 rounded-none" required></x-ui.input>
                        @error('end_date')<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $message }}!</p>@enderror
                    </div>

                    <div>
                        <x-ui.label for="driver_id" class="text-lg">Supir</x-ui.label>
                         <x-ui.select wire:model.defer="driver_id" class="w-full text-lg px-2.5 py-3 rounded-none">
                            <option selected="">Pilih Supir</option>
                            @foreach ($drivers as $driver)
                                <option value="{{ $driver->id }}">{{ $driver->fullname }}</option>
                            @endforeach
                        </x-ui.select>
                        @error('driver_id')<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $message }}!</p>@enderror
                    </div>

                    <div>
                        <x-ui.label for="notes">Catatan</x-ui.label>
                        <x-ui.textarea rows="3" wire:model.defer="notes" placeholder="Masukkan catatan jika perlu (opsional)" />
                        @error('notes')<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $message }}!</p>@enderror
                    </div>

                    <div class="text-sm text-start">
                        <span>Detail Mobil</span>
                        <table>
                            <tr>
                                <td>Nomor Plat</td><td class="w-5">:</td><td> <b>{{$car->plate_number}}</b></td>
                            </tr>
                            <tr>
                                <td>Tahun</td><td>:</td><td><b>{{$car->year}}</b></td>
                            </tr>
                            <tr>
                                <td>Warna</th><td>:</td><td><b>{{$car->color}}</b></td>
                            </tr>
                        </table>
                    </div>

                    <x-ui.button-primary type="submit" class="w-full sm:w-fit p-2.5 px-10">
                        <span wire:loading.remove wire:target="save">Simpan</span>
                        <span wire:loading wire:target="save">Process...</span>
                    </x-ui.button-primary>
                </form>
            </div>
            <div class="bg-[url('/public/assets/images/vector-3.svg')] w-full bg-contain bg-no-repeat shadow-md transition delay-100 duration-300 ease-in-out group-hover:-translate-y-1 group-hover:scale-3d intersect:motion-preset-slide-up-md motion-delay-100 intersect-once">
                <div class="px-5 py-5">
                    <img src="{{ $car->photo ? asset('storage/' . $car->photo) : asset('assets/images/default-car.png') }}" width="" class="" alt="vector-1" srcset="">
                    <div class="mt-5">
                        <a href="{{ route('cars.detail', $car->id) }}">
                            <h4 class="text-2xl text-center font-semibold">{{ $car->brand }} {{$car->model}}</h4>
                        </a>
                        <div class="grid grid-cols-2 gap-2 justify-between mt-4">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
