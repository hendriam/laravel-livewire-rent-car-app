@props(['type' => 'submit'])

<button
	type="{{ $type }}"
	{{ $attributes->merge(['class' => 'px-4 py-2.5 text-sm font-medium text-white bg-primary hover:bg-primary/90 hover:cursor-pointer ring-1 ring-primary']) }}
>
	{{ $slot }}
</button>