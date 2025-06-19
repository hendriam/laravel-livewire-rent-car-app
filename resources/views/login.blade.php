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
    </head>
	<body class="antialiased bg-gray-50 h-screen w-full flex flex-col justify-center items-center">
		<a href="/" class="flex space-x-1.5 items-center">
			<img src="{{ asset('assets/logo.svg') }}" alt="Logo" />
			<span class="text-secondary font-semibold text-2xl">Rent.Car</span>
		</a>
		<section class="bg-white min-w-sm shadow py-8 px-9 mt-6">
			<h3 class="text-xl font-semibold text-secondary">Sign in to your account</h3>
			<form class="mt-6 flex flex-col space-y-4">
				<div>
					<x-ui.label for="email">Email</x-ui.label>
					<x-ui.input type="text" name="email" wire:model.defer="email" class="w-full p-2.5" placeholder="test@example.com" required></x-ui.input>
				</div>
				<div>
					<x-ui.label for="password">Password</x-ui.label>
					<x-ui.input type="password" name="password" wire:model.defer="password" class="w-full p-2.5" placeholder="*********" required></x-ui.input>					
				</div>

				<div class="flex items-center justify-between">
					<div class="flex items-start">
						<div class="flex items-center h-5">
							<input id="remember" aria-describedby="remember" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-1 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800">
						</div>
						<div class="ml-3 text-sm">
							<label for="remember" class="text-gray-700 dark:text-gray-300">Remember me</label>
						</div>
					</div>
					<a href="/forgot-password" class="text-sm font-medium text-primary hover:underline dark:text-primary-500">Forgot password?</a>
				</div>

				<x-ui.button-primary type="submit" class="w-full p-2.5">Login</x-ui.button-primary>

				<p class="text-sm font-light text-gray-700 dark:text-gray-400">
					Don’t have an account yet? <a href="/register" class="font-medium text-primary hover:underline dark:text-blue-500">Register</a>
				</p>
			</form>
		</section>
	</body>
</html>