<div class="space-y-4">
    <h2 class="text-xl font-bold">Manejemen Mobil</h2>

    <x-ui.admin.card>
        @if (session('success'))
            <x-ui.alert class="text-green-800 bg-green-50 dark:bg-gray-800 dark:text-green-400">
                <span class="text-sm font-medium">Success! </span> {{ session('success') }}
            </x-ui.alert>
        @endif
        
        <x-ui.admin.card-header>
            <h2 class=" text-lg font-semibold text-gray-900 dark:text-white">Tambah mobil baru</h2>
            <a href="{{ route('admin.cars.index') }}">
                <x-ui.admin.button-yellow
                    type="button"
                    wire:click="create"
                    class="p-2.5"
                >
                    <x-ui.icons.icon-back class="w-4 h-4" />
                    Kembali
                </x-ui.admin.button-yellow>
            </a>
        </x-ui.admin.card-header>

        <x-ui.hr />

        <form wire:submit.prevent="save" class="w-full pb-3">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-3 items-start lg:gap-5">
                <div class="grid gap-3 sm:grid-cols-2">
                    <div class="w-full">
                        <x-ui.label for="brand">Brand</x-ui.label>
                         <x-ui.select wire:model.defer="brand">
                            <option selected="">Select brand</option>
                            <option value="Toyota">Toyota</option>
                            <option value="Daihatsu">Daihatsu</option>
                            <option value="Honda">Honda</option>
                            <option value="Suzuki">Suzuki</option>
                            <option value="Mitsubishi">Mitsubishi</option>
                            <option value="Nissan">Nissan</option>
                            <option value="Mazda">Mazda</option>
                            <option value="Isuzu">Isuzu</option>
                        </x-ui.select>
                        @error('brand')<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $message }}!</p>@enderror
                    </div>
    
                    <div class="w-full">
                        <x-ui.label for="model">Model</x-ui.label>
                        <x-ui.input type="text" wire:model.defer="model" class="w-full" placeholder="Contoh: Avanza" />
                        @error('model')<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $message }}!</p>@enderror
                    </div>
                    
                    <div class="w-full">
                        <x-ui.label for="plate_number">Plat Nomor</x-ui.label>
                        <x-ui.input type="text" wire:model.defer="plate_number" class="w-full" placeholder="Contoh: BK 0001 AMD" />
                        @error('plate_number')<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $message }}!</p>@enderror
                    </div>

                    <div class="w-full">
                        <x-ui.label for="color">Warna</x-ui.label>
                         <x-ui.select wire:model.defer="color">
                            <option selected="">Select warna</option>
                            <option value="Putih">Putih</option>
                            <option value="Hiam">Hiam</option>
                            <option value="Coklat">Coklat</option>
                            <option value="Silver">Silver</option>
                            <option value="Merah">Merah</option>
                            <option value="Kuning">Kuning</option>
                            <option value="Biru">Biru</option>
                            <option value="Abu-abu">Abu-abu</option>
                        </x-ui.select>
                        @error('color')<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $message }}!</p>@enderror
                    </div>
    
                    <div class="w-full">
                        <x-ui.label for="year">Tahun</x-ui.label>
                        <x-ui.input type="number" wire:model.defer="year" class="w-full" placeholder="Contoh: 2020" />
                        @error('year')<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $message }}!</p>@enderror
                    </div>
                    
                    <div class="w-full">
                        <x-ui.label for="status">Status</x-ui.label>
                        <x-ui.select wire:model.defer="status">
                            <option selected="">Select status</option>
                            <option value="available">Tersedia</option>
                            <option value="rented">Dirental</option>
                            <option value="maintenance">Service</option>
                        </x-ui.select>
                        @error('status')<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $message }}!</p>@enderror
                    </div>
    
                    <div class="w-full">
                        <x-ui.label for="price_with_driver">Harga Dengan Supir / Hari</x-ui.label>
                        <x-ui.input type="number" wire:model.defer="price_with_driver" class="w-full" placeholder="Contoh: 200000" />
                        @error('price_with_driver')<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $message }}!</p>@enderror
                    </div>
                    
                    <div class="w-full">
                        <x-ui.label for="price_without_driver">Harga Tanpa Supir / Hari</x-ui.label>
                        <x-ui.input type="number" wire:model.defer="price_without_driver" class="w-full" placeholder="Contoh: 300000" />
                        @error('price_without_driver')<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $message }}!</p>@enderror
                    </div>

                    <div class="mt-2">
                        <x-ui.admin.button-primary type="submit" wire:loading.attr="disabled" wire:target="save" class="flex items-center justify-center px-4 py-2.5">
                            <span wire:loading wire:target="save">
                                <x-ui.icons.icon-loading />
                            </span>
                            <span wire:loading.remove wire:target="save">
                                <x-ui.icons.icon-save />
                            </span>
                            Simpan
                        </x-ui.admin.button-primary>
                    </div>
                </div>

                <div class="">
                    <x-ui.label for="photo">Photo</x-ui.label>
                    <x-ui.input type="file" wire:model.defer="photo" class="block w-full py-0"/>
                    <div wire:loading wire:target="photo">Uploading...</div>
                    @error('photo')<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $message }}!</p>@enderror
                    @if ($photo)
                        <img src="{{ $photo->temporaryUrl() }}" class="mt-2 w-md h-auto rounded" />
                    @endif
                </div>
            </div>
        </form>
    </x-ui.admin.card>
</div>
