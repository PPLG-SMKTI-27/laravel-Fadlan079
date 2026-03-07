<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
    @forelse ($skills as $skill)
        @php
            // Logika pewarnaan HUD dinamis dengan class Tailwind penuh (agar terbaca JIT compiler)
            $catStyle = match (strtolower($skill->category)) {
                'frontend' => [
                    'box' => 'border-sky-400/50 bg-sky-400/10 text-sky-400',
                    'icon' => 'group-hover:text-sky-400',
                    'line' => 'group-hover:bg-sky-400/50',
                ],
                'backend' => [
                    'box' => 'border-red-400/50 bg-red-400/10 text-red-400',
                    'icon' => 'group-hover:text-red-400',
                    'line' => 'group-hover:bg-red-400/50',
                ],
                'tools' => [
                    'box' => 'border-amber-400/50 bg-amber-400/10 text-amber-400',
                    'icon' => 'group-hover:text-amber-400',
                    'line' => 'group-hover:bg-amber-400/50',
                ],
                default => [
                    'box' => 'border-primary/50 bg-primary/10 text-primary',
                    'icon' => 'group-hover:text-primary',
                    'line' => 'group-hover:bg-primary/50',
                ],
            };
        @endphp

        <div
            class="group relative flex flex-col justify-between p-5 border border-border/50 bg-surface/10 hover:bg-surface/30 transition-all duration-300 hover:border-primary/60 overflow-hidden">

            {{-- HUD Corner Brackets --}}
            <div
                class="absolute top-0 left-0 w-2 h-2 border-t border-l border-border/50 group-hover:border-primary transition-colors">
            </div>
            <div
                class="absolute bottom-0 right-0 w-2 h-2 border-b border-r border-border/50 group-hover:border-primary transition-colors">
            </div>

            {{-- Top Bar: Category Label & Actions --}}
            <div class="flex justify-between items-start mb-8 relative z-10">
                <span
                    class="px-2 py-0.5 text-[9px] font-mono font-bold uppercase tracking-widest border {{ $catStyle['box'] }}">
                    {{ $skill->category }}
                </span>

                {{-- Action Buttons (Hidden until hover) --}}
                <div
                    class="flex gap-1 opacity-0 group-hover:opacity-100 transition-opacity bg-background/80 border border-border/50 p-1">
                    <button type="button"
                        class="edit-skill-btn w-6 h-6 flex items-center justify-center text-muted hover:text-primary hover:bg-primary/10 transition-colors"
                        data-id="{{ $skill->id }}" data-name="{{ $skill->name }}"
                        data-category="{{ $skill->category }}" data-icon="{{ $skill->icon }}"
                        data-description="{{ $skill->description }}">
                        <i class="fa-solid fa-pen text-[10px]"></i>
                    </button>
                    <button type="button"
                        class="delete-skill-btn w-6 h-6 flex items-center justify-center text-muted hover:text-red-500 hover:bg-red-500/10 transition-colors"
                        data-id="{{ $skill->id }}">
                        <i class="fa-solid fa-xmark text-[12px]"></i>
                    </button>
                </div>
            </div>

            {{-- Bottom Area: Icon, Name & Reference Count --}}
            <div class="flex items-center gap-4 relative z-10">

                {{-- Icon Box --}}
                <div
                    class="shrink-0 w-11 h-11 flex items-center justify-center border border-border/50 bg-background/50 text-2xl text-muted grayscale group-hover:grayscale-0 {{ $catStyle['icon'] }} transition-all duration-300 shadow-inner">
                    {!! $skill->icon !!}
                </div>

                {{-- Text Data --}}
                <div class="flex-1 flex flex-col min-w-0">
                    <h3
                        class="text-sm font-bold font-mono uppercase tracking-widest text-text group-hover:text-primary transition-colors truncate">
                        {{ $skill->name }}
                    </h3>

                    {{-- Data Line & Count --}}
                    <div class="flex items-center gap-3 mt-2">
                        <div class="h-[1px] flex-1 bg-border/50 {{ $catStyle['line'] }} transition-colors"></div>
                        <span class="text-[9px] font-mono text-muted uppercase tracking-widest">
                            REF: <span
                                class="text-text group-hover:text-primary">{{ str_pad($skill->projects_count, 2, '0', STR_PAD_LEFT) }}</span>
                        </span>
                    </div>
                </div>

            </div>
        </div>

    @empty
        {{-- Empty State HUD --}}
        <div
            class="col-span-full border border-border/50 bg-surface/10 py-16 px-6 flex flex-col items-center justify-center text-center relative overflow-hidden group">
            {{-- Background Hazard Lines --}}
            <div
                class="absolute inset-0 bg-[repeating-linear-gradient(45deg,transparent,transparent_10px,rgba(255,255,255,0.02)_10px,rgba(255,255,255,0.02)_20px)] pointer-events-none">
            </div>

            <i
                class="fa-solid fa-server text-4xl text-muted/30 mb-5 group-hover:text-primary/50 transition-colors duration-500"></i>

            <p class="text-xs font-mono uppercase tracking-widest text-muted mb-6">
                > SYS_ALERT: NO_SKILL_NODES_FOUND
            </p>

            <button onclick="window.openCreateSkillModal()"
                class="relative z-10 px-6 py-3 bg-primary/10 border border-primary text-[10px] font-mono font-bold uppercase tracking-widest text-primary hover:bg-primary hover:text-background transition-colors shadow-[0_0_15px_rgba(var(--color-primary-rgb),0.15)]">
                [ INIT_SKILL_NODE ]
            </button>
        </div>
    @endforelse
</div>

{{-- PAGINATION --}}
@if ($skills instanceof \Illuminate\Pagination\LengthAwarePaginator && $skills->hasPages())
    <div class="flex justify-center pt-8">
        <nav class="flex items-center gap-2 font-mono text-[10px] uppercase tracking-widest">
            @if ($skills->onFirstPage())
                <span class="px-3 py-2 text-muted border border-border/50 bg-surface/30 opacity-50 cursor-not-allowed">[
                    PREV ]</span>
            @else
                <a href="{{ $skills->previousPageUrl() }}"
                    class="px-3 py-2 border border-border text-muted hover:border-primary hover:text-primary transition-colors">[
                    PREV ]</a>
            @endif

            <span class="px-4 py-2 border border-primary bg-primary/5 text-primary font-bold">
                PG_{{ sprintf('%02d', $skills->currentPage()) }} / {{ sprintf('%02d', $skills->lastPage()) }}
            </span>

            @if ($skills->hasMorePages())
                <a href="{{ $skills->nextPageUrl() }}"
                    class="px-3 py-2 border border-border text-muted hover:border-primary hover:text-primary transition-colors">[
                    NEXT ]</a>
            @else
                <span class="px-3 py-2 text-muted border border-border/50 bg-surface/30 opacity-50 cursor-not-allowed">[
                    NEXT ]</span>
            @endif
        </nav>
    </div>
@endif
