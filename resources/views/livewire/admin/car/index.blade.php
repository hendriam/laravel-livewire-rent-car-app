<div class="space-y-4">
    <h2 class="text-xl font-bold">Manajemen Mobil</h2>

    <x-ui.admin.card>
        @if (session('success'))
            <x-ui.alert class="text-green-800 bg-green-50 dark:bg-gray-800 dark:text-green-400">
                <span class="text-sm font-medium">Success! </span> {{ session('success') }}
            </x-ui.alert>
        @endif

        @if (session('error'))
            <x-ui.alert class="text-red-800 bg-red-50 dark:bg-gray-800 dark:text-red-400">
                <span class="text-sm font-medium">Fail! </span> {{ session('error') }}
            </x-ui.alert>
        @endif
        
        <x-ui.admin.card-header>
            <div class="w-full md:w-1/2">
                <x-ui.input-search placeholder="Cari berdasarkan brand, model atau plat nomor..." />
            </div>
            <a href="{{ route('admin.cars.create') }}">
                <x-ui.admin.button-primary
                    type="button"
                    wire:click="create"
                    class="py-2.5 px-2.5"
                >
                    <x-ui.icons.icon-plus class="w-4 h-4" />
                    Tambah Mobil
                </x-ui.admin.button-primary>
            </a>
        </x-ui.admin.card-header>

        <x-ui.admin.card-body>
            <x-ui.table :data="$cars" :columns="[
                ['label' => 'Brand', 'field' => 'brand'],
                ['label' => 'Model', 'field' => 'model'],
                ['label' => 'Plat Nomor', 'field' => 'plate_number'],
                ['label' => 'Warna', 'field' => 'color'],
                ['label' => 'Tahun', 'field' => 'year'],
                ['label' => 'Status', 'field' => 'status'],
                ['label' => 'Harga Dengan Supir', 'field' => 'price_with_driver'],
                ['label' => 'Harga Tanpa Supir', 'field' => 'price_without_driver'],
                ['label' => 'Created By', 'field' => 'created_by'],
                ['label' => 'Tgl. Input', 'field' => 'created_at']
                ]" :sortField="$sortField" :sortDirection="$sortDirection"
            >
                @foreach($cars as $car)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                        <th class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $car->brand }}</th>
                        <td class="px-4 py-2 ">{{ $car->model }}</td>
                        <td class="px-4 py-2 ">{{ $car->plate_number }}</td>
                        <td class="px-4 py-2 ">{{ $car->color }}</td>
                        <td class="px-4 py-2 ">{{ $car->year }}</td>
                        <td class="px-4 py-2 ">{{ $car->status }}</td>
                        <td class="px-4 py-2 ">{{ number_format($car->price_with_driver, 0, ',', '.') }}</td>
                        <td class="px-4 py-2 ">{{ number_format($car->price_without_driver, 0, ',', '.') }}</td>
                        <td class="px-4 py-2 ">{{ $car->createdBy->fullname }}</td>
                        <td class="px-4 py-2 ">{{ $car->created_at ?? ''  }}</td>
                        <td class="px-4 py-2 ">
                            <div class="flex space-x-1">
                                <a href="{{ route('admin.cars.edit', $car->id) }}" class="">
                                    <x-ui.admin.button-yellow class="text-xs p-2 font-semibold"><x-ui.icons.icon-edit /> Edit</x-ui.admin.button-yellow>
                                </a>

                                <a href="{{ route('admin.cars.show', $car->id) }}" class="">
                                    <x-ui.admin.button-secondary class="text-xs p-2 font-semibold"><x-ui.icons.icon-eye class="w-3 h-3" /> Show</x-ui.admin.button-secondary>
                                </a>
                                
                                <x-ui.admin.button-red
                                    type="button"
                                    wire:click="$set('idToDelete', {{ $car->id }})"
                                    @click="$dispatch('open-delete-confirm')"
                                    class="text-xs p-2 font-semibold"
                                >
                                    <x-ui.icons.icon-delete />
                                    Delete
                                </x-ui.admin.button-red>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </x-ui.table>

            <x-ui.confirm-delete-modal 
                wireDelete="delete"
                title="Hapus Mobbil"
                message="Apakah Anda yakin ingin menghapus data ini? Data tidak dapat dikembalikan."
            />
        </x-ui.admin.card-body>

        <x-ui.admin.card-footer>
            <span class="text-sm font-normal text-gray-500 dark:text-gray-400">
                Showing
                <span class="font-semibold text-gray-900 dark:text-white">{{ $cars->firstItem() }} - {{ $cars->lastItem() }}</span>
                of
                <span class="font-semibold text-gray-900 dark:text-white">{{ $cars->total() }}</span>
            </span>
            <x-ui.admin.pagination :paginator="$cars" />
        </x-ui.admin.card-footer>
    </x-ui.admin.card>
</div>