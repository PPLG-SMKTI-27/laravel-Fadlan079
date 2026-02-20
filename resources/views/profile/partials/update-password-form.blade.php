<section class="space-y-8">

    {{-- Header --}}
    <header class="space-y-2">
        <h2 class="text-2xl font-semibold tracking-tight">
            Update Password
        </h2>
        <p class="text-sm text-muted max-w-md">
            Use a strong and unique password to keep your account secure.
        </p>
    </header>

    {{-- Form --}}
    <form method="post"
          action="{{ route('password.update') }}"
          class="space-y-6 max-w-xl">
        @csrf
        @method('put')

        {{-- Current Password --}}
        <div class="space-y-2">
            <x-input-label for="update_password_current_password" :value="__('Current Password')" />
            <x-text-input
                id="update_password_current_password"
                name="current_password"
                type="password"
                class="block w-full rounded-xl border-border bg-transparent focus:ring-primary focus:border-primary"
                autocomplete="current-password"
            />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" />
        </div>

        {{-- New Password --}}
        <div class="space-y-2">
            <x-input-label for="update_password_password" :value="__('New Password')" />
            <x-text-input
                id="update_password_password"
                name="password"
                type="password"
                class="block w-full rounded-xl border-border bg-transparent focus:ring-primary focus:border-primary"
                autocomplete="new-password"
            />
            <x-input-error :messages="$errors->updatePassword->get('password')" />
        </div>

        {{-- Confirm Password --}}
        <div class="space-y-2">
            <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')" />
            <x-text-input
                id="update_password_password_confirmation"
                name="password_confirmation"
                type="password"
                class="block w-full rounded-xl border-border bg-transparent focus:ring-primary focus:border-primary"
                autocomplete="new-password"
            />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" />
        </div>

        {{-- Actions --}}
        <div class="flex items-center gap-4 pt-2">
            <x-primary-button class="px-6 py-3 rounded-xl">
                Update Password
            </x-primary-button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-green-500"
                >
                    Password updated ✓
                </p>
            @endif
        </div>
    </form>
</section>
