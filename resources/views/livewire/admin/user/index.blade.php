<div class="space-y-4">
    <h2 class="text-xl font-bold">Manajemen User</h2>

    <x-ui.admin.card>
        @if (session('success'))
            <x-ui.alert class="text-green-800 bg-green-50 dark:bg-gray-800 dark:text-green-400">
                <span class="sr-only">Info</span>
                <div>
                    <span class="ms-3 text-sm font-medium">Success! </span> {{ session('success') }}
                </div>
            </x-ui.alert>
        @endif

        @if (session('error'))
            <x-ui.alert class="text-red-800 bg-red-50 dark:bg-gray-800 dark:text-red-400">
                <span class="sr-only">Error</span>
                <div>
                    <span class="ms-3 text-sm font-medium">Error! </span> {{ session('error') }}
                </div>
            </x-ui.alert>
        @endif
        
        <x-ui.admin.card-header>
            <div class="w-full md:w-1/2">
                <x-ui.input-search placeholder="Cari nama user..." />
            </div>
            <a href="{{ route('admin.users.create') }}">
                <x-ui.admin.button-primary
                    type="button"
                    wire:click="create"
                    class="py-2.5 px-2.5"
                >
                    <x-ui.icons.icon-plus class="w-4 h-4" />
                    Tambah User
                </x-ui.admin.button-primary>
            </a>
        </x-ui.admin.card-header>

        <x-ui.admin.card-body>
            <x-ui.table :data="$users" :columns="[
                ['label' => 'Nama User', 'field' => 'fullname'],
                ['label' => 'Email', 'field' => 'email'],
                ['label' => 'Phone', 'field' => 'phone'],
                ['label' => 'Alamat', 'field' => 'address'],
                ['label' => 'Tipe User', 'field' => 'type'],
                ['label' => 'Role', 'field' => 'role'],
                ['label' => 'Tgl. Input', 'field' => 'created_at']
                ]" :sortField="$sortField" :sortDirection="$sortDirection"
            >
                @foreach($users as $user)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                        <th class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $user->fullname }}</th>
                        <td class="px-4 py-2 ">{{ $user->email }}</td>
                        <td class="px-4 py-2 ">{{ $user->phone }}</td>
                        <td class="px-4 py-2 ">{{ $user->address }}</td>
                        <td class="px-4 py-2 ">{{ $user->type }}</td>
                        <td class="px-4 py-2 ">{{ $user->role }}</td>
                        <td class="px-4 py-2 ">{{ $user->created_at ?? ''  }}</td>
                        <td class="px-4 py-2 ">
                            <div class="flex space-x-1">
                                <a href="{{ route('admin.users.edit', $user->id) }}" class="">
                                    <x-ui.admin.button-yellow class="text-xs p-2 font-semibold"><x-ui.icons.icon-edit /> Edit</x-ui.admin.button-yellow>
                                </a>
                                
                                <x-ui.admin.button-red type="button" wire:click="delete({{ $user->id }})">
                                    <span wire:loading wire:target="delete({{ $user->id }})">
                                        <x-ui.icons.icon-loading />
                                    </span>

                                    <span wire:loading.remove wire:target="delete({{ $user->id }})">
                                        <x-ui.icons.icon-delete />
                                    </span>
                                    Delete
                                </x-ui.admin.button-red>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </x-ui.table>

        </x-ui.admin.card-body>

        <x-ui.admin.card-footer>
            <span class="text-sm font-normal text-gray-500 dark:text-gray-400">
                Showing
                <span class="font-semibold text-gray-900 dark:text-white">{{ $users->firstItem() }} - {{ $users->lastItem() }}</span>
                of
                <span class="font-semibold text-gray-900 dark:text-white">{{ $users->total() }}</span>
            </span>
            <x-ui.admin.pagination :paginator="$users" />
        </x-ui.admin.card-footer>
    </x-ui.admin.card>
</div>