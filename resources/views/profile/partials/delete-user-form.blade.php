<section class="relative border border-red-500/30 bg-[#0a0a0a] p-6 md:p-10 overflow-hidden mt-12">
    
    {{-- Hazard Stripes Background --}}
    <div class="absolute inset-0 pointer-events-none opacity-20" 
         style="background: repeating-linear-gradient(-45deg, transparent, transparent 10px, rgba(239, 68, 68, 0.1) 10px, rgba(239, 68, 68, 0.1) 20px);">
    </div>

    {{-- Red Corner Accents --}}
    <div class="absolute top-0 left-0 w-4 h-4 border-t-2 border-l-2 border-red-500/70"></div>
    <div class="absolute top-0 right-0 w-4 h-4 border-t-2 border-r-2 border-red-500/70"></div>
    <div class="absolute bottom-0 left-0 w-4 h-4 border-b-2 border-l-2 border-red-500/70"></div>
    <div class="absolute bottom-0 right-0 w-4 h-4 border-b-2 border-r-2 border-red-500/70"></div>

    {{-- Header --}}
    <header class="relative z-10 space-y-2 border-b border-red-500/30 pb-6 mb-8 max-w-2xl">
        <div class="flex items-center gap-2 font-mono text-[10px] uppercase tracking-widest text-red-500">
            <i class="fa-solid fa-triangle-exclamation animate-pulse"></i>
            >> CRITICAL_WARNING // ZONE_RED
        </div>
        <h2 class="text-2xl md:text-3xl font-bold font-mono tracking-tighter uppercase text-red-500">
            Termination Protocol
        </h2>
        <p class="text-xs font-mono text-muted tracking-wide leading-relaxed">
            Executing this protocol will permanently eradicate all user records, settings, and node data from the mainframe. <span class="text-red-400">This action is irreversible.</span>
        </p>
    </header>

    {{-- Trigger Button --}}
    <div class="relative z-10">
        <button
            x-data
            x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
            class="group relative px-6 py-3 bg-red-500/5 border border-red-500 text-red-500 font-mono text-xs font-bold uppercase tracking-widest hover:bg-red-500 hover:text-white transition-colors flex items-center gap-3 shadow-[0_0_15px_rgba(239,68,68,0.1)] hover:shadow-[0_0_25px_rgba(239,68,68,0.4)] w-max"
        >
            <span>[ INITIATE_PURGE ]</span>
            <i class="fa-solid fa-skull group-hover:animate-ping"></i>
        </button>
    </div>

    {{-- Alpine Modal --}}
    <div
        x-data="{ show: false }"
        x-on:open-modal.window="if ($event.detail === 'confirm-user-deletion') show = true"
        x-on:close.window="show = false"
        x-show="show"
        class="fixed inset-0 z-[99999] flex items-center justify-center px-4 font-sans"
        style="display: none;"
    >
        {{-- Backdrop --}}
        <div x-show="show" 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="absolute inset-0 bg-[#0a0a0a]/90 backdrop-blur-sm cursor-pointer"
             x-on:click="show = false">
        </div>

        {{-- Modal Box (System Dialog) --}}
        <div x-show="show"
             x-transition:enter="transition ease-out duration-300 delay-75"
             x-transition:enter-start="opacity-0 translate-y-8 scale-95"
             x-transition:enter-end="opacity-100 translate-y-0 scale-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 translate-y-0 scale-100"
             x-transition:leave-end="opacity-0 translate-y-4 scale-95"
             class="relative w-full max-w-[450px] bg-background border border-border shadow-[0_0_50px_rgba(239,68,68,0.2)] overflow-hidden"
             style="border-top-color: #ef4444; border-top-width: 2px;">

            {{-- Header Bar --}}
            <div class="flex justify-between items-center px-4 py-2 border-b border-border/50 bg-red-500/5">
                <div class="flex items-center gap-2 font-mono text-[10px] uppercase tracking-widest text-red-500">
                    <span class="w-2 h-2 rounded-full bg-red-500 animate-pulse shadow-[0_0_8px_#ef4444]"></span>
                    SYS.DIALOG // OVERRIDE_AUTH
                </div>
            </div>

            {{-- Form Content --}}
            <form method="post" action="{{ route('dashboard.account.destroy') }}" class="flex flex-col h-full">
                @csrf
                @method('delete')

                <div class="p-6 md:p-8 flex items-start gap-5">
                    {{-- Icon Box --}}
                    <div class="shrink-0 w-12 h-12 flex items-center justify-center border border-red-500/40 bg-surface/30 mt-1 relative text-red-500">
                        <div class="absolute top-0 left-0 w-1.5 h-1.5 border-t border-l border-red-500"></div>
                        <div class="absolute bottom-0 right-0 w-1.5 h-1.5 border-b border-r border-red-500"></div>
                        <i class="fa-solid fa-radiation text-xl"></i>
                    </div>

                    {{-- Text & Input --}}
                    <div class="flex-1 space-y-4">
                        <div>
                            <h2 class="text-lg font-bold uppercase tracking-wide mb-1 font-mono text-red-500 leading-tight">
                                Confirm Eradication
                            </h2>
                            <p class="text-xs text-muted leading-relaxed font-mono mt-2">
                                Warning: Data unrecoverable after execution. Please input your master authorization key to confirm.
                            </p>
                        </div>

                        {{-- Password Input --}}
                        <div class="space-y-2 relative group mt-4">
                            <label for="password" class="flex items-center gap-2 text-[10px] font-mono uppercase tracking-widest text-muted group-focus-within:text-red-500 transition-colors">
                                <span class="text-red-500">></span> REQ: MASTER_KEY
                            </label>
                            <div class="relative">
                                <input
                                    id="password"
                                    name="password"
                                    type="password"
                                    class="w-full bg-surface/30 border border-border/70 px-4 py-3 font-mono text-sm text-text focus:outline-none focus:border-red-500 focus:bg-red-500/5 transition-colors placeholder:text-muted/30"
                                    placeholder="Enter your password"
                                    x-ref="password"
                                />
                                {{-- Blinking Cursor --}}
                                <div class="absolute right-3 top-1/2 -translate-y-1/2 w-1.5 h-4 bg-red-500/30 group-focus-within:bg-red-500 group-focus-within:animate-pulse pointer-events-none"></div>
                            </div>

                            @error('password', 'userDeletion')
                                <p class="text-[10px] font-mono text-red-500 uppercase tracking-wider mt-1 border border-red-500/30 bg-red-500/10 px-2 py-1 w-max">
                                    <i class="fa-solid fa-xmark mr-1"></i> {{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- Actions --}}
                <div class="flex border-t border-border/50 bg-surface/30 mt-auto">
                    <button
                        type="button"
                        x-on:click="$dispatch('close')"
                        class="flex-1 py-4 px-4 font-mono text-xs font-bold uppercase tracking-widest text-muted hover:text-text hover:bg-surface transition-colors border-r border-border/50"
                    >
                        [ Abort ]
                    </button>

                    <button
                        type="submit"
                        class="flex-1 py-4 px-4 font-mono text-xs font-bold uppercase tracking-widest text-red-500 hover:bg-red-500 hover:text-white transition-colors group flex items-center justify-center gap-2"
                    >
                        <span>[ Execute_Purge ]</span>
                        <i class="fa-solid fa-bomb opacity-50 group-hover:opacity-100 group-hover:animate-bounce"></i>
                    </button>
                </div>
            </form>

        </div>
    </div>
</section>