<div class="space-y-4">
    <h2 class="text-xl font-bold">Manejemen Mobil</h2>

    <x-ui.admin.card>
        <x-ui.admin.card-header>
            <h2 class=" text-lg font-semibold text-gray-900 dark:text-white">Detail Mobil</h2>
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

        <div class="grid grid-cols-2 gap-2">
            <div class="">
                <h1 class="text-4xl font-semibold">{{ $car->brand }} {{ $car->model }}</h1>
                <h2 class="text-lg font-medium text-gray-500 dark:text-gray-400 mt-2">Plat {{ $car->plate_number }}</h2>
                <h2 class="text-lg font-medium text-gray-500 dark:text-gray-400 mt-2">Warna {{ $car->color }}</h2>
                <h2 class="text-lg font-medium text-gray-500 dark:text-gray-400 mt-2">Tahun {{ $car->year }}</h2>
                <div class="mt-4">
                    <span class="text-base text-gray-600 dark:text-gray-500">Harga Dengan Supir</span>
                    <span class="bg-green-100 text-green-800 text-sm font-medium me-2 px-2.5 py-0.5  dark:bg-green-900 dark:text-green-300">Rp {{ number_format($car->price_with_driver, 0, ',', '.') }}</span>
                    <span class="text-base text-gray-600 dark:text-gray-500">Per Hari</span>
                </div>

                <div class="mt-4">
                    <span class="text-base text-gray-600 dark:text-gray-500">Harga Tanpa Supir</span>
                    <span class="bg-green-100 text-green-800 text-sm font-medium me-2 px-2.5 py-0.5  dark:bg-green-900 dark:text-green-300">Rp {{ number_format($car->price_without_driver, 0, ',', '.') }}</span>
                    <span class="text-base text-gray-600 dark:text-gray-500">Per Hari</span>
                </div>
            </div>
            <img src="{{ asset('storage/' . $oldPhotoPath) }}" class="aspect-3/2 rounded" />
        </div>

    </x-ui.admin.card>
</div>
