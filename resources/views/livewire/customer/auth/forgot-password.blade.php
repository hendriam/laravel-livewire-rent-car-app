<section class="bg-white min-w-sm shadow py-8 px-9 mt-6">
    <h3 class="text-xl font-semibold text-secondary">Request to change password</h3>
    <form class="mt-6 flex flex-col space-y-4">
        <div>
            <x-ui.label for="email">Email</x-ui.label>
            <x-ui.input type="text" wire:model.defer="email" class="w-full p-2.5" placeholder="test@example.com" required></x-ui.input>
        </div>

        <x-ui.button-primary type="submit" class="w-full p-2.5">Send</x-ui.button-primary>

        <p class="text-sm font-light text-gray-700 dark:text-gray-400">
            Already have an account? <a href="{{ route('login')}}" wire:navigate class="font-medium text-primary hover:underline dark:text-blue-500">Login here</a>
        </p>
    </form>
</section>