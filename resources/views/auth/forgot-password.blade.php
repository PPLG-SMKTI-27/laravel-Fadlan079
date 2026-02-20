@extends('layouts.main')
@section('title', 'Forgot Password')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-bg text-text px-4">
    <div class="w-full max-w-md bg-surface border border-border p-8 shadow-lg mt-13">
        <h1 class="text-2xl font-bold mb-2">Forgot Password</h1>

        <p class="text-muted mb-6 text-sm">
            Forgot your password? No problem.
            Enter your email and we’ll send you a reset link.
        </p>

        {{-- SESSION STATUS (success message) --}}
        @if (session('status'))
            <div class="mb-4 text-sm text-green-500">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}" class="space-y-4">
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

            {{-- SUBMIT --}}
            <button
                type="submit"
                class="cta-btn relative overflow-hidden px-8 py-3 w-full
                       bg-primary text-text font-semibold"
                style="--cta-bubble-color: var(--color-bg);">
                <span class="cta-bubble"></span>
                <span class="cta-text relative z-10"
                data-i18n="login.Reset">
                </span>
            </button>

            {{-- BACK TO LOGIN --}}
            <a href="{{ route('login') }}"
               class="block text-sm text-muted text-center hover:underline mt-4"
               data-i18n="login.Back">
            </a>
        </form>
    </div>
</div>
@endsection
