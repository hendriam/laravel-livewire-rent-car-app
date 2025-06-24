@props(['type' => 'submit'])

<button
	type="{{ $type }}"
	{{ $attributes->merge(['class' => 'flex items-center justify-center p-2 text-sm font-semibold text-white rounded-lg bg-yellow-400 hover:bg-yellow-500 focus:ring-yellow-300 dark:focus:ring-yellow-900 hover:cursor-pointer']) }}
>
	{{ $slot }}
</button>