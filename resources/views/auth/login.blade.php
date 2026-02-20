@extends('layouts.main')
@section('title', 'Login')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-bg text-text px-4">
    <div class="w-full max-w-md bg-surface border border-border p-8 shadow-lg mt-13">
        <h1 class="text-2xl font-bold mb-2">Login</h1>
        <p class="text-muted mb-6" data-i18n="login.subtitle"></p>

        <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf

            {{-- EMAIL --}}
            <div>
                <label class="block text-sm mb-1 text-muted">Email</label>

                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    class="w-full px-4 py-2
                        bg-container border border-border
                        text-text placeholder:text-muted
                        focus:outline-none focus:ring-2
                        @error('email')
                            border-red-500 focus:ring-red-500/60
                        @else
                            focus:ring-primary/60
                        @enderror"
                    placeholder="email@example.com"
                    required
                    autofocus
                >

                @error('email')
                    <p class="mt-1 text-sm text-red-500">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            {{-- PASSWORD --}}
            <div>
                <label class="block text-sm mb-1 text-muted">Password</label>

                <input
                    type="password"
                    name="password"
                    class="w-full px-4 py-2
                           bg-container border border-border
                           text-text placeholder:text-muted
                           focus:outline-none focus:ring-2 focus:ring-primary/60"
                    placeholder="••••••••"
                    required
                >

                @error('password')
                    <p class="mt-1 text-sm text-red-500">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            {{-- REMEMBER ME --}}
            <div class="flex items-center gap-2 text-sm text-muted">
                <input type="checkbox" name="remember" class="rounded border-border">
                <span data-i18n="login.Remember"></span>
            </div>

            {{-- SUBMIT --}}
            <button
                type="submit"
                class="cta-btn relative overflow-hidden px-8 py-3 w-full
                       bg-primary text-text font-semibold"
                style="--cta-bubble-color: var(--color-bg);">
                <span class="cta-bubble"></span>
                <span class="cta-text relative z-10">
                    Login
                </span>
            </button>

            {{-- FORGOT PASSWORD --}}
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}"
                   class="block text-sm text-muted text-center hover:underline mt-4"
                   data-i18n="login.Forgot">
                </a>
            @endif
        </form>
    </div>
</div>
@endsection
