@if (isset($projects) && $projects->hasPages())
    <div class="flex justify-center pt-8">
        <nav class="paper-tab-nav px-3 md:px-4 py-2 overflow-hidden border-b-2 border-r-2 border-gray-200/70 shadow-lg relative z-10 rotate-1 bg-amber-100 rounded-sm shadow-md border border-border">
            <div class="before:content-[''] before:absolute before:top-0 before:left-1/2 before:-translate-x-1/2 before:w-1/2 before:h-4 before:bg-white/50 before:shadow-inner"></div>

            <div class="flex items-center gap-3 relative z-10 font-serif">
                @if ($projects->onFirstPage())
                    <span class="w-10 h-10 flex items-center justify-center rounded-sm text-muted bg-amber-200/50 cursor-not-allowed"><i class="fa-solid fa-chevron-left text-xs"></i></span>
                @else
                    <a href="javascript:void(0)" data-page="{{ $projects->currentPage() - 1 }}" class="ajax-page w-10 h-10 flex items-center justify-center rounded-sm text-yellow-950 bg-amber-200/50 hover:bg-yellow-950 hover:text-white transition-colors"><i class="fa-solid fa-chevron-left text-xs"></i></a>
                @endif

                <span class="px-4 text-xs font-bold text-yellow-950 uppercase tracking-widest border-b border-dashed border-yellow-600/50 pb-1">
                    Hal {{ $projects->currentPage() }} / {{ $projects->lastPage() }}
                </span>

                @if ($projects->hasMorePages())
                    <a href="javascript:void(0)" data-page="{{ $projects->currentPage() + 1 }}" class="ajax-page w-10 h-10 flex items-center justify-center rounded-sm text-yellow-950 bg-amber-200/50 hover:bg-yellow-950 hover:text-white transition-colors"><i class="fa-solid fa-chevron-right text-xs"></i></a>
                @else
                    <span class="w-10 h-10 flex items-center justify-center rounded-sm text-muted bg-amber-200/50 cursor-not-allowed"><i class="fa-solid fa-chevron-right text-xs"></i></span>
                @endif
            </div>
        </nav>
    </div>
@endif
