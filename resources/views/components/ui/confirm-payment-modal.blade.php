@props(['show' => false, 'title' => 'Konfirmasi Pembayaran', 'message' => 'Apakah anda yakin untuk konfirmasi pembayaran ini?', 'confirmText' => 'Konfirmasi', 'cancelText' => 'Batal'])

<div 
    x-data="{ open: @js($show) }" 
    x-show="open"
    x-cloak
    x-on:open-modal-confirm-payment.window="open = true"
    x-on:close-modal-confirm-payment.window="open = false"
    class="fixed inset-0 z-50 flex items-center justify-center bg-black/50"
>
    <div class="bg-white dark:bg-gray-700 rounded-lg shadow-sm p-6 w-full max-w-md">
		<x-ui.icons.icon-confirm />
		<h3 class="mb-5 text-lg text-center font-normal text-gray-500 dark:text-gray-400">{{ $message }}</h3>

        <div class="mt-4 flex justify-center gap-2">
			<x-ui.admin.button-yellow
                wire:click="{{ $attributes->get('wireConfirm') }}"
				wire:target="{{ $attributes->get('wireConfirm') }}"
				wire:loading.attr="disabled"
                type="button" 
                class="px-5 py-2.5 "
            >
				<span wire:loading wire:target="{{ $attributes->get('wireConfirm') }}">Proses...</span>
				<span wire:loading.remove wire:target="{{ $attributes->get('wireConfirm') }}">{{ $confirmText }}</span>
            </x-ui.admin.button-yellow>

            <x-ui.admin.button-secondary
                @click="open = false" 
                type="button" 
                class="px-5 py-2.5 font-medium"
            >
                {{ $cancelText }}
            </x-ui.admin.button-secondary>
        </div>
    </div>
</div>
