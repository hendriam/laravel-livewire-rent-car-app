<div class="space-y-4">
    <h2 class="text-xl font-bold">Manajemen User</h2>

    <x-ui.admin.card>
        <x-ui.admin.card-header>
            <div class="w-full md:w-1/2">
                <x-ui.admin.input-search placeholder="Cari nama user..." />
            </div>
            <a href="{{ route('admin.users.create') }}">
                <x-ui.admin.button-primary
                    type="button"
                    class=""
                >
                    <x-ui.icons.icon-plus />
                    Tambah User
                </x-ui.admin.button-primary>
            </a>
        </x-ui.admin.card-header>
    </x-ui.admin.card>
</div>