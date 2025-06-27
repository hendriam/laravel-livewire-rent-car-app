<section class="bg-white min-w-md lg:min-w-4xl shadow py-8 px-9 mt-6">
    <h3 class="text-xl font-semibold text-secondary">Create an account</h3>
    <form wire:submit.prevent="register" class="mt-6 flex flex-col lg:flex-row space-x-4">
        <div class="w-full flex flex-col space-y-4">
             <div>
                <x-ui.label for="fullname">Nama Lengkap</x-ui.label>
                <x-ui.input type="text" wire:model.defer="fullname" class="w-full p-2.5" placeholder="John Doe" required></x-ui.input>
                @error('fullname')<p class="mt-2 text-xs text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $message }}!</p>@enderror
            </div>

            <div>
                <x-ui.label for="email">Email</x-ui.label>
                <x-ui.input type="text" wire:model.defer="email" class="w-full p-2.5" placeholder="test@example.com" required></x-ui.input>
                @error('email')<p class="mt-2 text-xs text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $message }}!</p>@enderror
            </div>

            <div>
                <x-ui.label for="phone">Phone</x-ui.label>
                <x-ui.input type="text" wire:model.defer="phone" class="w-full p-2.5" placeholder="081293040504" required></x-ui.input>
                @error('phone')<p class="mt-2 text-xs text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $message }}!</p>@enderror
            </div>

            <div class="hidden lg:block">
                <x-ui.button-primary type="submit" class="w-full p-2.5">
                    <span wire:loading.remove wire:target="register">Create an account</span>
                    <span wire:loading wire:target="register">Process...</span>
                </x-ui.button-primary>

                <p class="text-sm font-light text-gray-700 dark:text-gray-400 mt-2">
                    Already have an account? <a href="{{ route('login')}}" wire:navigate class="font-medium text-primary hover:underline dark:text-blue-500">Login here</a>
                </p>
            </div>
            
        </div>

        <div class="w-full flex flex-col space-y-4">
            <div>
                <x-ui.label for="password">Password</x-ui.label>
                <x-ui.input type="password" wire:model.defer="password" class="w-full p-2.5" placeholder="*********" required></x-ui.input>					
                @error('password')<p class="mt-2 text-xs text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $message }}!</p>@enderror
            </div>
            
            <div>
                <x-ui.label for="confirmPassword">Confirm Password</x-ui.label>
                <x-ui.input type="password" wire:model.defer="password_confirmation" class="w-full p-2.5" placeholder="*********" required></x-ui.input>					
                @error('password_confirmation')<p class="mt-2 text-xs text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $message }}!</p>@enderror
            </div>

            <div class="flex items-center justify-between">
                <div class="flex items-start">
                    <div class="flex items-center h-5">
                        <input id="remember" aria-describedby="remember" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-1 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800">
                    </div>
                    <div class="ml-3 text-sm">
                        <label for="remember" class="text-gray-700 dark:text-gray-300">I accept the <span class="text-primary">Terms and Conditions</span></label>
                    </div>
                </div>
            </div>

            <div class="block lg:hidden">
                <x-ui.button-primary type="submit" class="w-full p-2.5">
                    <span wire:loading.remove wire:target="register">Create an account</span>
                    <span wire:loading wire:target="register">Process...</span>
                </x-ui.button-primary>

                <p class="text-sm font-light text-gray-700 dark:text-gray-400 mt-2">
                    Already have an account? <a href="{{ route('login')}}" wire:navigate class="font-medium text-primary hover:underline dark:text-blue-500">Login here</a>
                </p>
            </div>
        </div>
    </form>
</section>