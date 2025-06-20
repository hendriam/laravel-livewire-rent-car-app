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
		<div class="flex space-x-2">
			<a href="{{ route('login') }}" class="px-4 py-2.5 text-sm font-medium text-secondary bg-white hover:bg-gray-50 hover:cursor-pointer">Login</a>
			<a href="{{ route('register') }}" class="px-4 py-2.5 text-sm font-medium text-white bg-primary hover:bg-primary/90 hover:cursor-pointer">Register</a>
		</div>
	@else
		<button
			type="button"
			class="flex mx-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
			id="user-menu-button"
			aria-expanded="false"
			data-dropdown-toggle="dropdown"
		>
			<span class="sr-only">Open user menu</span>
			<img class="w-10 h-10 rounded-full" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/michael-gough.png" alt="user photo" />
		</button>

		<!-- Dropdown menu -->
		<div class="hidden z-50 my-4 w-56 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600" id="dropdown">
			<div class="py-3 px-4">
				<span class="block text-sm font-semibold text-gray-900 dark:text-white">{{ auth()->user()->fullname }}</span>
				<span class="block text-sm text-gray-900 truncate dark:text-white">{{ auth()->user()->email }}</span>
			</div>
			<ul class="py-1 text-gray-700 dark:text-gray-300" aria-labelledby="dropdown">
				<li>
					<a href="#" class="block py-2 px-4 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-400 dark:hover:text-white">My profile</a>
				</li>
				<li>
					<a href="#" class="block py-2 px-4 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-400 dark:hover:text-white">Account settings</a>
				</li>
			</ul>
			
			<ul class="py-1 text-gray-700 dark:text-gray-300" aria-labelledby="dropdown">
				<li  class="w-full">
					<form action="{{ route('logout') }}" method="post">
						@csrf
						<button type="submit" class="w-full text-start py-2 px-4 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white hover:cursor-pointer">Logout</button> 
					</form>
					<!-- <a href="#" class="block py-2 px-4 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Sign out</a> -->
				</li>
			</ul>
		</div>

		<!-- <form action="{{ route('logout') }}" method="post">
			@csrf
	        <x-ui.button-primary type="submit" class="w-full p-2.5">Logout</x-ui.button-primary>
		</form> -->
	@endif

</nav>