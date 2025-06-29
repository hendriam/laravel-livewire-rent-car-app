

@props(['type' => 'submit'])

<button
	type="{{ $type }}"
	{{ $attributes->merge(['class' => 'flex items-center justify-center p-2 text-sm font-semibold text-white rounded-lg bg-green-500 hover:bg-green-600 focus:ring-green-200 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-900 hover:cursor-pointer']) }}
>
	{{ $slot }}
</button>