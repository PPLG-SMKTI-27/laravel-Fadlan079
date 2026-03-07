<section
    class="relative border border-border/50 bg-surface/10 p-6 md:p-8 space-y-8 group hover:border-primary/50 transition-colors duration-500">

    {{-- HUD Corners --}}
    <div class="absolute top-0 left-0 w-3 h-3 border-t-2 border-l-2 border-primary/50"></div>
    <div class="absolute bottom-0 right-0 w-3 h-3 border-b-2 border-r-2 border-primary/50"></div>

    {{-- Header Module --}}
    <header class="border-b border-border/50 pb-4">
        <h2 class="text-lg md:text-xl font-mono font-bold uppercase tracking-widest text-text flex items-center gap-3">
            <i class="fa-solid fa-satellite-dish text-primary animate-pulse"></i>
            Communication_Nodes
        </h2>
        <p class="text-[10px] md:text-xs font-mono text-muted mt-2 tracking-widest uppercase">
            <span class="text-primary">></span> Configure external transmission endpoints and social arrays.
        </p>
    </header>

    {{-- Form with backend logic --}}
    <form method="post" action="{{ route('dashboard.account.socials.update') }}" class="space-y-6">
        @csrf
        @method('patch')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            {{-- WhatsApp Node --}}
            <div class="space-y-2 relative group/input">
                <label for="whatsapp"
                    class="text-[10px] font-mono uppercase tracking-widest text-primary flex items-center gap-2 group-focus-within/input:text-green-400 transition-colors">
                    > ENDPOINT_01: WHATSAPP_NO
                </label>
                <div class="relative">
                    <div
                        class="absolute left-0 top-0 bottom-0 w-10 flex items-center justify-center bg-surface/50 border-y border-l border-border/70 text-muted group-focus-within/input:text-green-400 group-focus-within/input:border-green-400 transition-colors">
                        <i class="fa-brands fa-whatsapp"></i>
                    </div>
                    <input type="text" id="whatsapp" name="whatsapp"
                        class="w-full bg-surface/30 border border-border/70 pl-12 pr-4 py-2.5 font-mono text-xs text-text focus:outline-none focus:border-green-400 focus:bg-green-400/5 transition-colors placeholder:text-muted/30"
                        placeholder="+6281234567890" value="{{ old('whatsapp', $user->whatsapp) }}" />
                </div>
            </div>

            {{-- Instagram Node --}}
            <div class="space-y-2 relative group/input">
                <label for="instagram"
                    class="text-[10px] font-mono uppercase tracking-widest text-primary flex items-center gap-2 group-focus-within/input:text-pink-500 transition-colors">
                    > ENDPOINT_02: INSTAGRAM_ID
                </label>
                <div class="relative">
                    <div
                        class="absolute left-0 top-0 bottom-0 w-10 flex items-center justify-center bg-surface/50 border-y border-l border-border/70 text-muted group-focus-within/input:text-pink-500 group-focus-within/input:border-pink-500 transition-colors">
                        <i class="fa-brands fa-instagram"></i>
                    </div>
                    <input type="text" id="instagram" name="instagram"
                        class="w-full bg-surface/30 border border-border/70 pl-12 pr-4 py-2.5 font-mono text-xs text-text focus:outline-none focus:border-pink-500 focus:bg-pink-500/5 transition-colors placeholder:text-muted/30"
                        placeholder="@username" value="{{ old('instagram', $user->instagram) }}" />
                </div>
            </div>

            {{-- GitHub Node --}}
            <div class="space-y-2 relative group/input">
                <label for="github"
                    class="text-[10px] font-mono uppercase tracking-widest text-primary flex items-center gap-2 group-focus-within/input:text-text transition-colors">
                    > ENDPOINT_03: GITHUB_REPO
                </label>
                <div class="relative">
                    <div
                        class="absolute left-0 top-0 bottom-0 w-10 flex items-center justify-center bg-surface/50 border-y border-l border-border/70 text-muted group-focus-within/input:text-text group-focus-within/input:border-text transition-colors">
                        <i class="fa-brands fa-github"></i>
                    </div>
                    <input type="text" id="github" name="github"
                        class="w-full bg-surface/30 border border-border/70 pl-12 pr-4 py-2.5 font-mono text-xs text-text focus:outline-none focus:border-text focus:bg-text/5 transition-colors placeholder:text-muted/30"
                        placeholder="https://github.com/username" value="{{ old('github', $user->github) }}" />
                </div>
            </div>

            {{-- LinkedIn Node --}}
            <div class="space-y-2 relative group/input">
                <label for="linkedin"
                    class="text-[10px] font-mono uppercase tracking-widest text-primary flex items-center gap-2 group-focus-within/input:text-sky-500 transition-colors">
                    > ENDPOINT_04: LINKEDIN_URL
                </label>
                <div class="relative">
                    <div
                        class="absolute left-0 top-0 bottom-0 w-10 flex items-center justify-center bg-surface/50 border-y border-l border-border/70 text-muted group-focus-within/input:text-sky-500 group-focus-within/input:border-sky-500 transition-colors">
                        <i class="fa-brands fa-linkedin-in"></i>
                    </div>
                    <input type="text" id="linkedin" name="linkedin"
                        class="w-full bg-surface/30 border border-border/70 pl-12 pr-4 py-2.5 font-mono text-xs text-text focus:outline-none focus:border-sky-500 focus:bg-sky-500/5 transition-colors placeholder:text-muted/30"
                        placeholder="https://linkedin.com/in/username" value="{{ old('linkedin', $user->linkedin) }}" />
                </div>
            </div>

        </div>

        {{-- Submit Action --}}
        <div class="pt-4 flex items-center gap-4 border-t border-border/30">
            <button type="submit"
                class="relative group px-6 py-2.5 bg-primary/10 border border-primary text-primary font-mono text-[10px] md:text-xs font-bold uppercase tracking-widest hover:bg-primary hover:text-background transition-colors flex items-center gap-2 shadow-[0_0_15px_rgba(var(--color-primary-rgb),0.15)]">
                <span>[ SYNC_ENDPOINTS ]</span>
                <i class="fa-solid fa-satellite-dish opacity-50 group-hover:opacity-100 group-hover:animate-ping"></i>
            </button>

            {{-- Success indicator --}}
            @if (session('status') === 'socials-updated')
                <p x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)" x-transition
                    class="text-[10px] font-mono text-green-400 uppercase tracking-widest">
                    > SYNC_SUCCESSFUL
                </p>
            @endif
        </div>
    </form>
</section>
