@extends('layouts.main')
@section('title', 'Login')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-bg text-text px-4">
    <div class="w-full max-w-md bg-surface border border-border p-8 shadow-lg mt-13">
        <h1 class="text-2xl font-bold mb-2">Login</h1>
        <p class="text-muted mb-6" data-i18n="login.subtitle"></p>

        <form action="/login" method="post" class="space-y-4">
            @csrf

            <div>
                <label class="block text-sm mb-1 text-muted">Email</label>

                <input
                    type="text"
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

            <div>
                <label class="block text-sm mb-1 text-muted" data-i18n="login.password"></label>
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
            </div>
            <p class="text-xs text-muted mb-6" data-i18n="login.demo_account">

            </p>

            <div class="flex flex-col gap-4 flex-wrap text-center justify-center text-md">
                <div class="flex justify-center">
                    <button
                        type="submit"
                        class="cta-btn relative overflow-hidden px-8 py-3 w-full
                            bg-primary text-text font-semibold"
                            style="--cta-bubble-color: var(--color-bg);">
                        <span class="cta-bubble"></span>

                        <span class="cta-text relative z-10" data-i18n="login.enter"></span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
