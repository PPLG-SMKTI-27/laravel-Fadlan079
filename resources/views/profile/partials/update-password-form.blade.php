<section class="relative border border-border/50 bg-surface/20 p-6 md:p-10 overflow-hidden mt-12">
    
    {{-- Background Tech Grid --}}
    <div class="absolute inset-0 pointer-events-none opacity-[0.03]" 
         style="background-image: linear-gradient(var(--color-text) 1px, transparent 1px), linear-gradient(90deg, var(--color-text) 1px, transparent 1px); background-size: 24px 24px;">
    </div>

    {{-- Corner Accents --}}
    <div class="absolute top-0 left-0 w-4 h-4 border-t-2 border-l-2 border-primary/50"></div>
    <div class="absolute top-0 right-0 w-4 h-4 border-t-2 border-r-2 border-primary/50"></div>
    <div class="absolute bottom-0 left-0 w-4 h-4 border-b-2 border-l-2 border-primary/50"></div>
    <div class="absolute bottom-0 right-0 w-4 h-4 border-b-2 border-r-2 border-primary/50"></div>

    {{-- Header --}}
    <header class="relative z-10 space-y-2 border-b border-border/50 pb-6 mb-8">
        <div class="flex items-center gap-2 font-mono text-[10px] uppercase tracking-widest text-primary">
            <span class="w-1.5 h-1.5 bg-primary animate-pulse shadow-[0_0_8px_var(--color-primary)]"></span>
            >> SECURITY_MODULE
        </div>
        <h2 class="text-2xl md:text-3xl font-bold font-mono tracking-tighter uppercase text-text">
            Access Credentials
        </h2>
        <p class="text-xs font-mono text-muted tracking-wide">
            Enforce cryptographic integrity. Update your authentication key to maintain secure access.
        </p>
    </header>

    {{-- Form --}}
    <form method="post" action="{{ route('password.update') }}" class="relative z-10 space-y-8 max-w-2xl">
        @csrf
        @method('put')

        {{-- Current Password --}}
        <div class="space-y-3 relative group">
            <label for="update_password_current_password" class="flex items-center gap-2 text-[10px] font-mono uppercase tracking-widest text-muted group-focus-within:text-primary transition-colors">
                <span class="text-primary">></span> KEY_00: CURRENT_HASH
            </label>
            <div class="relative">
                <input id="update_password_current_password" name="current_password" type="password" autocomplete="current-password"
                    class="w-full bg-surface/30 border border-border/70 px-4 py-3 font-mono text-sm text-text focus:outline-none focus:border-primary focus:bg-primary/5 transition-colors placeholder:text-muted/50" />
                {{-- Decorative Blinking Cursor --}}
                <div class="absolute right-3 top-1/2 -translate-y-1/2 w-1.5 h-4 bg-primary/30 group-focus-within:bg-primary group-focus-within:animate-pulse pointer-events-none"></div>
            </div>
            @error('current_password', 'updatePassword')
                <p class="text-[10px] font-mono text-red-500 uppercase tracking-wider"><i class="fa-solid fa-triangle-exclamation mr-1"></i> {{ $message }}</p>
            @enderror
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            {{-- New Password --}}
            <div class="space-y-3 relative group">
                <label for="update_password_password" class="flex items-center gap-2 text-[10px] font-mono uppercase tracking-widest text-muted group-focus-within:text-primary transition-colors">
                    <span class="text-primary">></span> KEY_01: NEW_HASH
                </label>
                <div class="relative">
                    <input id="update_password_password" name="password" type="password" autocomplete="new-password"
                        class="w-full bg-surface/30 border border-border/70 px-4 py-3 font-mono text-sm text-text focus:outline-none focus:border-primary focus:bg-primary/5 transition-colors placeholder:text-muted/50" />
                    <div class="absolute right-3 top-1/2 -translate-y-1/2 w-1.5 h-4 bg-primary/30 group-focus-within:bg-primary group-focus-within:animate-pulse pointer-events-none"></div>
                </div>
                @error('password', 'updatePassword')
                    <p class="text-[10px] font-mono text-red-500 uppercase tracking-wider"><i class="fa-solid fa-triangle-exclamation mr-1"></i> {{ $message }}</p>
                @enderror
            </div>

            {{-- Confirm Password --}}
            <div class="space-y-3 relative group">
                <label for="update_password_password_confirmation" class="flex items-center gap-2 text-[10px] font-mono uppercase tracking-widest text-muted group-focus-within:text-primary transition-colors">
                    <span class="text-primary">></span> KEY_02: CONFIRM_HASH
                </label>
                <div class="relative">
                    <input id="update_password_password_confirmation" name="password_confirmation" type="password" autocomplete="new-password"
                        class="w-full bg-surface/30 border border-border/70 px-4 py-3 font-mono text-sm text-text focus:outline-none focus:border-primary focus:bg-primary/5 transition-colors placeholder:text-muted/50" />
                    <div class="absolute right-3 top-1/2 -translate-y-1/2 w-1.5 h-4 bg-primary/30 group-focus-within:bg-primary group-focus-within:animate-pulse pointer-events-none"></div>
                </div>
                @error('password_confirmation', 'updatePassword')
                    <p class="text-[10px] font-mono text-red-500 uppercase tracking-wider"><i class="fa-solid fa-triangle-exclamation mr-1"></i> {{ $message }}</p>
                @enderror
            </div>
        </div>

        {{-- Actions --}}
        <div class="flex items-center gap-6 pt-6 border-t border-border/50 mt-4">
            
            <button type="submit" class="group relative px-6 py-3 bg-primary/5 border border-primary text-primary font-mono text-xs font-bold uppercase tracking-widest hover:bg-primary hover:text-background transition-colors flex items-center gap-3">
                <span>[ REKEY_SYSTEM ]</span>
                <i class="fa-solid fa-key group-hover:rotate-180 transition-transform duration-500"></i>
            </button>

            @if (session('status') === 'password-updated')
                <p x-data="{ show: true }" x-show="show" x-transition.opacity.duration.500ms x-init="setTimeout(() => show = false, 3000)"
                    class="text-[10px] font-mono text-primary uppercase tracking-widest flex items-center gap-2 bg-primary/10 px-3 py-1.5 border border-primary/30">
                    <i class="fa-solid fa-shield-halved"></i> ENCRYPTION_UPDATED
                </p>
            @endif

        </div>
    </form>
</section>