@extends('layouts.main')
@section('title', 'Register')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-bg text-text px-4">
    <div class="w-full max-w-md bg-surface border border-border p-8 shadow-lg mt-13">
        <h1 class="text-2xl font-bold mb-2" data-i18n="login.regis.title"></h1>
        <p class="text-muted mb-6 text-sm"
        data-i18n="login.regis.subtitle">
        </p>

        <form method="POST" action="{{ route('register') }}" class="space-y-4">
            @csrf

            {{-- NAME --}}
            <div>
                <label class="block text-sm mb-1 text-muted">Name</label>
                <input
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    class="w-full px-4 py-2
                        bg-container border border-border
                        text-text placeholder:text-muted
                        focus:outline-none focus:ring-2
                        @error('name')
                            border-red-500 focus:ring-red-500/60
                        @else
                            focus:ring-primary/60
                        @enderror"
                    placeholder="Your name"
                    required
                    autofocus
                >
                @error('name')
                    <p class="mt-1 text-sm text-red-500">
                        {{ $message }}
                    </p>
                @enderror
            </div>

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
                           focus:outline-none focus:ring-2
                           focus:ring-primary/60"
                    placeholder="••••••••"
                    required
                >
                @error('password')
                    <p class="mt-1 text-sm text-red-500">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            {{-- CONFIRM PASSWORD --}}
            <div>
                <label class="block text-sm mb-1 text-muted">Confirm Password</label>
                <input
                    type="password"
                    name="password_confirmation"
                    class="w-full px-4 py-2
                           bg-container border border-border
                           text-text placeholder:text-muted
                           focus:outline-none focus:ring-2
                           focus:ring-primary/60"
                    placeholder="••••••••"
                    required
                >
                @error('password_confirmation')
                    <p class="mt-1 text-sm text-red-500">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            {{-- SUBMIT --}}
            <button
                type="submit"
                class="cta-btn relative overflow-hidden px-8 py-3 w-full
                       bg-primary text-text font-semibold"
                style="--cta-bubble-color: var(--color-bg);">
                <span class="cta-bubble"></span>
                <span class="cta-text relative z-10">
                    Register
                </span>
            </button>

            {{-- LOGIN LINK --}}
            <a href="{{ route('login') }}"
               class="block text-sm text-muted text-center hover:underline mt-4"
               data-i18n="login.regis.have_account">
            </a>
        </form>
    </div>
</div>
@endsection
