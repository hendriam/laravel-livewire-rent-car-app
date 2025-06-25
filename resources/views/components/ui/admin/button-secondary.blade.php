@props(['type' => 'submit'])

<button
	type="{{ $type }}"
	{{ $attributes->merge(['class' => 'flex items-center justify-center p-2 text-sm font-semibold text-gray-900 hover:text-blue-700 rounded-lg border border-gray-200 bg-white focus:z-10 hover:bg-gray-100 focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 hover:cursor-pointer']) }}
>
	{{ $slot }}
</button>