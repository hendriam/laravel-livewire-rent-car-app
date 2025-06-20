<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $title ?? config('app.name') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>
	<body class="antialiased bg-gray-50 dark:bg-gray-900 h-screen w-full flex flex-col justify-center items-center">
		<a href="{{ route('home') }}" class="flex space-x-1.5 items-center">
			<img src="{{ asset('assets/logo.svg') }}" alt="Logo" />
			<span class="text-secondary font-semibold text-2xl">Rent.Car</span>
		</a>
        
		{{ $slot }}

        @livewireScripts
	</body>
</html>