@if ($projects->hasPages())
    <div class="flex justify-center pt-8" id="projects-pagination">
        <nav class="flex items-center gap-2 font-mono text-[10px] uppercase tracking-widest">

            @if ($projects->onFirstPage())
                <span
                    class="px-4 py-2 text-muted border border-border/50 bg-surface/30 opacity-50 cursor-not-allowed">[
                    PREV ]</span>
            @else
                <a href="javascript:void(0)" data-page="{{ $projects->currentPage() - 1 }}"
                    class="ajax-page px-4 py-2 border border-border text-muted hover:border-primary hover:text-primary transition-colors">[
                    PREV ]</a>
            @endif

            <span class="px-4 py-2 border border-primary bg-primary/5 text-primary font-bold">
                PG_{{ sprintf('%02d', $projects->currentPage()) }} /
                {{ sprintf('%02d', $projects->lastPage()) }}
            </span>

            @if ($projects->hasMorePages())
                <a href="javascript:void(0)" data-page="{{ $projects->currentPage() + 1 }}"
                    class="ajax-page px-4 py-2 border border-border text-muted hover:border-primary hover:text-primary transition-colors">[
                    NEXT ]</a>
            @else
                <span
                    class="px-4 py-2 text-muted border border-border/50 bg-surface/30 opacity-50 cursor-not-allowed">[
                    NEXT ]</span>
            @endif

        </nav>
    </div>
@else
    <div id="projects-pagination"></div>
@endif
