<section class="bg-white min-w-sm shadow py-8 px-9 mt-6">
    <h3 class="text-xl font-semibold text-secondary">Create an account</h3>
    <form class="mt-6 flex flex-col space-y-4">
        <div>
            <x-ui.label for="fullname">Nama Lengkap</x-ui.label>
            <x-ui.input type="text" name="fullname" wire:model.defer="fullname" class="w-full p-2.5" placeholder="John Doe" required></x-ui.input>
        </div>

        <div>
            <x-ui.label for="email">Email</x-ui.label>
            <x-ui.input type="text" name="email" wire:model.defer="email" class="w-full p-2.5" placeholder="test@example.com" required></x-ui.input>
        </div>

        <div>
            <x-ui.label for="password">Password</x-ui.label>
            <x-ui.input type="password" name="password" wire:model.defer="password" class="w-full p-2.5" placeholder="*********" required></x-ui.input>					
        </div>
        
        <div>
            <x-ui.label for="confirmPassword">Confirm Password</x-ui.label>
            <x-ui.input type="password" name="confirmPassword" wire:model.defer="confirmPassword" class="w-full p-2.5" placeholder="*********" required></x-ui.input>					
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

        <x-ui.button-primary type="submit" class="w-full p-2.5">Create an account</x-ui.button-primary>

        <p class="text-sm font-light text-gray-700 dark:text-gray-400">
            Already have an account? <a href="/login" class="font-medium text-primary hover:underline dark:text-blue-500">Login here</a>
        </p>
    </form>
</section>