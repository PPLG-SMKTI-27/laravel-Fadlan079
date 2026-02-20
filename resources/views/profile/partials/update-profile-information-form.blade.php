<section class="space-y-8">

    {{-- Header --}}
    <header class="space-y-2">
        <h2 class="text-2xl font-semibold tracking-tight">
            Profile Information
        </h2>
        <p class="text-sm text-muted max-w-md">
            Update your personal details and email address associated with your account.
        </p>
    </header>

    {{-- Email Verification --}}
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    {{-- Form --}}
    <form method="post"
          action="{{ route('profile.update') }}"
          class="space-y-6 max-w-xl">
        @csrf
        @method('patch')

        {{-- Name --}}
        <div class="space-y-2">
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input
                id="name"
                name="name"
                type="text"
                class="block w-full rounded-xl border-border bg-transparent focus:ring-primary focus:border-primary"
                :value="old('name', $user->name)"
                required
                autofocus
                autocomplete="name"
            />
            <x-input-error :messages="$errors->get('name')" />
        </div>

        {{-- Email --}}
        <div class="space-y-2">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input
                id="email"
                name="email"
                type="email"
                class="block w-full rounded-xl border-border bg-transparent focus:ring-primary focus:border-primary"
                :value="old('email', $user->email)"
                required
                autocomplete="username"
            />
            <x-input-error :messages="$errors->get('email')" />

            {{-- Email not verified --}}
            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-3 rounded-xl border border-yellow-500/30 bg-yellow-500/5 p-4 text-sm">
                    <p class="text-yellow-600">
                        Your email address is not verified.
                    </p>

                    <button
                        form="send-verification"
                        class="mt-2 inline-flex items-center gap-2 text-sm font-medium text-primary hover:underline"
                    >
                        Resend verification email
                        <i class="fa-solid fa-arrow-right text-xs"></i>
                    </button>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 text-green-500 font-medium">
                            Verification link sent successfully.
                        </p>
                    @endif
                </div>
            @endif
        </div>

        {{-- Actions --}}
        <div class="flex items-center gap-4 pt-2">
            <x-primary-button class="px-6 py-3 rounded-xl">
                Save Changes
            </x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-green-500"
                >
                    Saved successfully ✓
                </p>
            @endif
        </div>
    </form>
</section>
