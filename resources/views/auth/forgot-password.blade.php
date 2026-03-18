@extends('layouts.main')
@section('title', 'Forgot Password')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-bg relative px-4 font-serif">

    <div class="absolute inset-0 pointer-events-none opacity-[0.03]"
         style="background-image: radial-gradient(var(--color-text) 0.5px, transparent 0.5px); background-size: 12px 12px;">
    </div>

    <div class="w-full max-w-md bg-surface border border-border p-8 md:p-10 shadow-lg relative z-10 rotate-[-0.5deg] hover:rotate-0 transition-transform duration-300">

        <div class="absolute -top-4 left-1/2 -translate-x-1/2 w-24 h-7 bg-warning/20 backdrop-blur-sm rotate-[2deg] shadow-sm pointer-events-none"></div>

        <i class="fa-solid fa-paperclip absolute top-6 -left-3 text-muted text-xl -rotate-12 opacity-60 pointer-events-none"></i>

        <div class="mb-8 text-center">
            <h1 class="text-3xl font-bold mb-2 text-text">Forgot Password</h1>
            <p class="text-sm font-sans text-muted">
                Forgot your password? No problem.
                Enter your email and we’ll send you a reset link.
            </p>
        </div>

        {{-- SESSION STATUS (success message) --}}
        @if (session('status'))
            <div class="mb-6 p-3 bg-success/10 border-l-4 border-success text-success text-xs font-bold font-sans">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}" class="space-y-6 font-sans">
            @csrf

            {{-- EMAIL --}}
            <div>
                <label class="block text-xs font-bold mb-2 text-muted uppercase tracking-wider">Email</label>
                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    class="w-full px-3 py-2 bg-container border-b-2 border-border border-dashed
                              text-text placeholder:text-muted/50 text-sm
                              focus:outline-none focus:border-primary focus:bg-primary/5 transition-colors"
                    placeholder="email@example.com"
                    required
                    autofocus
                >
                @error('email')
                    <p class="mt-1 text-xs font-bold text-danger">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            {{-- SUBMIT --}}
            <div class="w-full mt-4" style="filter: drop-shadow(0px 4px 6px rgba(0,0,0,0.08));">
                <button
                    type="submit"
                    class="relative flex items-center justify-center gap-3 w-full px-8 pt-4 pb-6 bg-warning text-yellow-900 font-serif font-bold text-center hover:-translate-y-1 transition-transform duration-300 group"
                    style="clip-path: polygon(0% 0%, 100% 0%, 100% 88%, 95% 100%, 89% 86%, 83% 98%, 78% 87%, 72% 100%, 66% 85%, 60% 98%, 54% 86%, 48% 100%, 42% 85%, 36% 97%, 30% 86%, 24% 100%, 18% 87%, 12% 98%, 6% 86%, 0% 96%);">
                    
                    <div class="absolute top-1.5 left-0 w-full h-px bg-white/20 z-0"></div>

                    <span class="relative z-10 uppercase tracking-widest text-sm" data-i18n="login.Reset">
                        Email Password Reset Link
                    </span>
                    <i class="fa-solid fa-paper-plane text-sm relative z-10 group-hover:translate-x-1.5 transition-transform"></i>
                </button>
            </div>

            {{-- BACK TO LOGIN --}}
            <div class="text-center mt-6">
                <a href="{{ route('login') }}"
                   class="text-sm text-muted hover:text-primary transition-colors underline decoration-dashed underline-offset-4"
                   data-i18n="login.Back">
                    Back to login
                </a>
            </div>
        </form>
    </div>
</div>
@endsection

