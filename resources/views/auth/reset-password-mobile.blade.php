<x-guest-layout>
    <form method="POST" action="{{ route('password.mobile.update') }}">
        @csrf
        <input type="hidden" name="phone" value="{{ old('phone', $phone ?? '') }}">
        <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
            Enter your new password for mobile number <strong>{{ $phone }}</strong>.
        </div>
        <div class="mt-4">
            <x-input-label for="password" :value="__('New Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>
        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                Update Password
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
