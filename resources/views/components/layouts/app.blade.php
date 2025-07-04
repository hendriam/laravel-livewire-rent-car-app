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
        @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/flowbite.min.js'])
        @livewireStyles
    </head>
	<body class="antialiased bg-white">
        <!-- Navbar -->
        @include('partials.app.nav')
        
        {{ $slot }}

        <!-- Footer -->
        @include('partials.app.footer')

        @livewireScripts
    </body>
</html>