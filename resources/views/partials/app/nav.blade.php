<nav class="mx-auto max-w-6xl py-4 px-5 xl:px-0 flex items-center justify-between">
	<a href="{{ route('home') }}" class="flex space-x-1.5 items-center">
		<img src="{{ asset('assets/logo.svg') }}" alt="Logo" />
		<span class="text-secondary font-semibold text-2xl">Rent.Car</span>
	</a>

	<ul class="flex space-x-8 text-lg">
		<li><a href="/">About us</a></li>
		<li><a href="/">Contact</a></li>
		<li><a href="/">Services</a></li>
		
	</ul>

	
	@if(!auth()->user())
		<a href="{{ route('login') }}" class="px-4 py-2.5 text-sm font-medium text-white bg-primary hover:bg-primary/90 hover:cursor-pointer">Login</a>
	@else
		<form action="{{ route('logout') }}" method="post">
			@csrf
	        <x-ui.button-primary type="submit" class="w-full p-2.5">Logout</x-ui.button-primary>
		</form>
	@endif

</nav>