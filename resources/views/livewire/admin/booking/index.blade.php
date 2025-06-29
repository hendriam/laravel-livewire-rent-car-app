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
                ['label' => 'Tgl. Booking', 'field' => 'start_date'],
                ['label' => 'Tgl. Kembali', 'field' => 'end_date'],
                ['label' => 'Durasi', 'field' => 'duration'],
                ['label' => 'Customer', 'field' => 'customer_id'],
                ['label' => 'Mobil', 'field' => 'car_id'],
                ['label' => 'Supir', 'field' => 'driver_id'],
                ['label' => 'Total', 'field' => 'total_price'],
                ['label' => 'Status', 'field' => 'status'],
                ]" :sortField="$sortField" :sortDirection="$sortDirection"
            >
                @foreach($bookings as $booking)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                        <th class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $booking->booking_code }}</th>
                        <td class="px-4 py-2 ">{{ $booking->start_date->format('Y-m-d') }}</td>
                        <td class="px-4 py-2 ">{{ $booking->end_date->format('Y-m-d') }}</td>
                        <td class="px-4 py-2 ">{{ $booking->duration }}</td>
                        <td class="px-4 py-2 ">{{ $booking->customer->fullname }}</td>
                        <td class="px-4 py-2 ">{{ $booking->car->model }} - {{ $booking->car->brand }}</td>
                        <td class="px-4 py-2 ">{{ $booking->driver->fullname ?? 'Tanpa supir'}}</td>
                        <td class="px-4 py-2 ">Rp {{ number_format($booking->total_price, 0, ',', '.') }}</td>
                        <td class="px-4 py-2 ">{{ $booking->status }}</td>
                        <td class="px-4 py-2 ">
                            <div class="flex space-x-1">
                                @if ($booking->status === 'pending')
                                    <x-ui.admin.button-red
                                        type="button"
                                        wire:click="$set('idToCancelled', {{ $booking->id }})"
                                        @click="$dispatch('open-cancelled-status-modal')"
                                        class="text-xs"
                                    >
                                        <x-ui.icons.icon-close />
                                        Batal
                                    </x-ui.admin.button-red>
                                @elseif($booking->status === 'confirmed')
                                    <x-ui.admin.button-green
                                        type="button"
                                        wire:click="$set('idToRented', {{ $booking->id }})"
                                        @click="$dispatch('open-rented-status-modal')"
                                        class="text-xs"
                                    >
                                        <x-ui.icons.icon-check />
                                        Terima
                                    </x-ui.admin.button-green>

                                    <x-ui.admin.button-red
                                        type="button"
                                        wire:click="$set('idToCancelled', {{ $booking->id }})"
                                        @click="$dispatch('open-cancelled-status-modal')"
                                        class="text-xs"
                                    >
                                        <x-ui.icons.icon-close />
                                        Batal
                                    </x-ui.admin.button-red>
                                @elseif($booking->status === 'rented')
                                    <x-ui.admin.button-yellow
                                        type="button"
                                        wire:click="$set('idToCompleted', {{ $booking->id }})"
                                        @click="$dispatch('open-completed-status-modal')"
                                        class="text-xs"
                                    >
                                        <x-ui.icons.icon-check />
                                        Selesai
                                    </x-ui.admin.button-yellow>
                                @endif

                            </div>
                        </td>
                    </tr>
                @endforeach
            </x-ui.table>

            <x-ui.confirm-rented-status-modal
                wireUpdateStatusToRented="updateStatusToRented"
                title="Konfirmasi"
                message="Terima booking ini!"
            />

            <x-ui.confirm-cancelled-status-modal
                wireUpdateStatusToCancelled="updateStatusToCancelled"
                title="Konfirmasi"
                message="Batalkan booking ini!"
            />

            <x-ui.confirm-completed-status-modal
                wireUpdateStatusToCompleted="updateStatusToCompleted"
                title="Konfirmasi"
                message="Selesaikan booking ini!"
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