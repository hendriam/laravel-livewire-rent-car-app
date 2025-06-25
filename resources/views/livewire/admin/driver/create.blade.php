<div class="space-y-4">
    <h2 class="text-xl font-bold">Manejemen Supir</h2>

    <x-ui.admin.card>
        @if (session('success'))
            <x-ui.alert class="text-green-800 bg-green-50 dark:bg-gray-800 dark:text-green-400">
                <span class="text-sm font-medium">Success! </span> {{ session('success') }}
            </x-ui.alert>
        @endif
        
        <x-ui.admin.card-header>
            <h2 class=" text-lg font-semibold text-gray-900 dark:text-white">Tambah supir baru</h2>
            <a href="{{ route('admin.drivers.index') }}">
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

        <form wire:submit.prevent="save" class="max-w-2xl pb-3">
            <div class="grid gap-3 sm:grid-cols-2">
                <div class="sm:col-span-2">
                    <x-ui.label for="fullname">Nama Supir</x-ui.label>
                    <x-ui.input type="text" wire:model.defer="fullname" class="w-full" placeholder="Contoh: John Doe" />
                    @error('fullname')<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $message }}!</p>@enderror
                </div>

                <div class="sm:col-span-2">
                    <x-ui.label for="phone">Phone</x-ui.label>
                    <x-ui.input type="phone" wire:model.defer="phone" class="w-full" placeholder="Contoh: 081234567890" />
                    @error('phone')<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $message }}!</p>@enderror
                </div>

                <div class="sm:col-span-2">
                    <x-ui.label for="address">Alamat</x-ui.label>
                    <x-ui.textarea rows="3" wire:model.defer="address" placeholder="Contoh: Jl. Punak no. 45" />
                    @error('address')<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $message }}!</p>@enderror
                </div>

                <div class="sm:col-span-2">
                    <x-ui.label for="status">Status</x-ui.label>
                    <x-ui.select wire:model.defer="status">
                        <option selected="">Select status</option>
                        <option value="available">Tersedia</option>
                        <option value="unavailable">Tidak Tersedia</option>
                    </x-ui.select>
                    @error('status')<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $message }}!</p>@enderror
                </div>

                <div class="sm:col-span-2">
                    <x-ui.label for="photo">Photo</x-ui.label>
                    <x-ui.input type="file" wire:model.defer="photo" class="w-full" placeholder="Masukkan poto (opsional)"/>
                    <div wire:loading wire:target="photo">Uploading...</div>
                    @error('photo')<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $message }}!</p>@enderror
                    @if ($photo)
                        <img src="{{ $photo->temporaryUrl() }}" class="mt-2 w-md h-auto rounded" />
                    @endif
                </div>
            </div>
            
            <div class="mt-3">
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
        </form>

    </x-ui.admin.card>
</div>
