<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        Forgot your password? Enter your mobile number and you can reset your password if your number is registered.
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.mobile.verify') }}">
        @csrf

        <!-- Mobile Number -->
        <div>
            <x-input-label for="phone" :value="__('Mobile Number')" />
            <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required autofocus />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                Next
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
