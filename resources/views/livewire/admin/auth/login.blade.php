<section class="bg-white min-w-sm shadow py-8 px-9 mt-6">
    <h3 class="text-xl font-semibold text-secondary">Silahkan login sebagai admin</h3>
    <form wire:submit.prevent="login" class="mt-6 flex flex-col space-y-4" autocomplete="off">
        <div>
            <x-ui.label for="email">Email</x-ui.label>
            <x-ui.input type="text" wire:model.defer="email" class="w-full p-2.5" placeholder="test@example.com" required></x-ui.input>
            @error('email')<p class="mt-2 text-xs text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $message }}!</p>@enderror
        </div>
        <div>
            <x-ui.label for="password">Password</x-ui.label>
            <x-ui.input type="password" wire:model.defer="password" class="w-full p-2.5" placeholder="*********" required></x-ui.input>					
            @error('password')<p class="mt-2 text-xs text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $message }}!</p>@enderror
        </div>

        <div class="flex items-center justify-between">
            <div class="flex items-start">
                <div class="flex items-center h-5">
                    <input id="remember" wire:model.defer="remember" aria-describedby="remember" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-1 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800">
                </div>
                <div class="ml-3 text-sm">
                    <label for="remember" class="text-gray-700 dark:text-gray-300">Remember me</label>
                </div>
            </div>
            <a href="{{ route('forgot-password') }}" wire:navigate class="text-sm font-medium text-primary hover:underline dark:text-primary-500">Forgot password?</a>
        </div>

        <x-ui.button-primary type="submit" class="w-full p-2.5">
            <span wire:loading.remove wire:target="login">Login</span>
            <span wire:loading wire:target="login">Process...</span>
        </x-ui.button-primary>
    </form>
</section>