

@props(['type' => 'submit'])

<button
	type="{{ $type }}"
	{{ $attributes->merge(['class' => 'flex items-center justify-center p-2 text-sm font-semibold text-white rounded-lg bg-red-600 hover:bg-red-700 focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900 hover:cursor-pointer']) }}
>
	{{ $slot }}
</button>