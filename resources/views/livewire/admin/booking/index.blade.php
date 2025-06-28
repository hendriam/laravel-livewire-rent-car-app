<div class="space-y-4">
    <h2 class="text-xl font-bold">Manajemen Booking</h2>

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
                <x-ui.input-search placeholder="Cari kode booking..." />
            </div>
           
        </x-ui.admin.card-header>

        <x-ui.admin.card-body>
            <x-ui.table :data="$bookings" :columns="[
                ['label' => 'Kode Booking', 'field' => 'booking_code'],
                ['label' => 'Tanggal Booking', 'field' => 'start_date'],
                ['label' => 'Tanggal Kembali', 'field' => 'end_date'],
                ['label' => 'Durasi', 'field' => 'duration'],
                ['label' => 'Customer', 'field' => 'customer_id'],
                ['label' => 'Mobil', 'field' => 'car_id'],
                ['label' => 'Supir', 'field' => 'driver_id'],
                ['label' => 'Status', 'field' => 'status'],
                ]" :sortField="$sortField" :sortDirection="$sortDirection"
            >
                @foreach($bookings as $booking)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                        <th class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $booking->booking_code }}</th>
                        <td class="px-4 py-2 ">{{ $booking->start_date }}</td>
                        <td class="px-4 py-2 ">{{ $booking->end_date }}</td>
                        <td class="px-4 py-2 ">{{ $booking->duration }}</td>
                        <td class="px-4 py-2 ">{{ $booking->customer->fullname }}</td>
                        <td class="px-4 py-2 ">{{ $booking->car->model }} - {{ $booking->car->brand }}</td>
                        <td class="px-4 py-2 ">{{ $booking->driver->fullname ?? 'Tanpa supir'}}</td>
                        <td class="px-4 py-2 ">{{ $booking->status }}</td>
                        <td class="px-4 py-2 ">
                            <div class="flex space-x-1">
                                
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
                <span class="font-semibold text-gray-900 dark:text-white">{{ $bookings->firstItem() }} - {{ $bookings->lastItem() }}</span>
                of
                <span class="font-semibold text-gray-900 dark:text-white">{{ $bookings->total() }}</span>
            </span>
            <x-ui.admin.pagination :paginator="$bookings" />
        </x-ui.admin.card-footer>
    </x-ui.admin.card>
</div>