@extends('layouts.main')
@section('title', 'Projects')
@vite(['resources/css/project.css'])

@push('head')
<style>
    .no-scrollbar::-webkit-scrollbar { display: none; }
    .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    .scroll-fade {
        mask-image: none;
    }

    @media (max-width: 640px) {
        .scroll-fade {
            mask-image: linear-gradient(to right, transparent, black 10%, black 90%, transparent);
        }
    }
</style>
@endpush
@section('content')
    <div class="relative min-h-screen bg-background overflow-hidden font-sans">
        <div class="absolute inset-0 pointer-events-none opacity-[0.02] z-0"
            style="background-image: linear-gradient(var(--color-text) 1px, transparent 1px), linear-gradient(90deg, var(--color-text) 1px, transparent 1px); background-size: 64px 64px;">
        </div>

        <section id="projects-hero" class="relative z-10 pt-32 pb-16 max-w-7xl mx-auto px-6 space-y-8">

            <div class="flex items-center gap-2 font-mono text-[10px] uppercase tracking-widest text-primary mb-4">
                <span class="w-2 h-2 bg-primary animate-pulse shadow-[0_0_8px_var(--color-primary)]"></span>
                <span data-i18n="project.header.label">Arsip Proyek</span>
            </div>

            <h1
                class="text-[clamp(3.5rem,9vw,7rem)] font-bold font-mono tracking-tighter leading-[1] uppercase flex flex-col md:flex-row md:items-end gap-2 md:gap-6">
                <div>
                    <span class="text-text block" data-i18n="project.header.main_title"></span>
                    <span class="block text-muted/50 text-[clamp(2rem,5vw,4rem)]" data-i18n="project.header.subtitle"></span>
                </div>

                <div class="hidden md:block w-6 h-16 bg-primary animate-pulse mb-3 shadow-[0_0_15px_var(--color-primary)]">
                </div>
            </h1>

            <p class="text-sm md:text-base font-mono text-muted max-w-2xl leading-relaxed border-l-2 border-primary/50 pl-4"
                data-i18n="project.header.description"></p>
        </section>

        <section id="projects-index" class="relative z-10 max-w-7xl mx-auto px-6 py-16 space-y-12 overflow-x-hidden">

            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6 mb-8">
                <div
                    class="relative border border-border/50 bg-surface/20 p-5 group hover:border-primary/50 transition-colors">
                    <div class="absolute top-0 left-0 w-2 h-2 border-t border-l border-primary/50"></div>
                    <div class="absolute bottom-0 right-0 w-2 h-2 border-b border-r border-primary/50"></div>
                    <p class="text-[9px] font-mono uppercase tracking-widest text-muted mb-2 flex items-center gap-2">
                        <i class="fa-solid fa-database text-primary"></i> <span
                            data-i18n="project.stats.totalprojects">Total Proyek</span>
                    </p>
                    <h3 class="text-3xl font-mono font-bold text-text">
                        {{$summary['totalProjects']}}</h3>
                </div>

                <div
                    class="relative border border-border/50 bg-surface/20 p-5 group hover:border-sky-400/50 transition-colors">
                    <div class="absolute top-0 left-0 w-2 h-2 border-t border-l border-sky-400/50"></div>
                    <div class="absolute bottom-0 right-0 w-2 h-2 border-b border-r border-sky-400/50"></div>
                    <p class="text-[9px] font-mono uppercase tracking-widest text-muted mb-2 flex items-center gap-2">
                        <i class="fa-solid fa-tags text-sky-400"></i> <span
                            data-i18n="project.stats.totalCategories">Total Kategori</span>
                    </p>
                    <h3 class="text-3xl font-mono font-bold text-sky-400">
                        {{$summary['totalCategories']}}</h3>
                </div>

                <div
                    class="relative border border-border/50 bg-surface/20 p-5 group hover:border-green-400/50 transition-colors">
                    <div class="absolute top-0 left-0 w-2 h-2 border-t border-l border-green-400/50"></div>
                    <div class="absolute bottom-0 right-0 w-2 h-2 border-b border-r border-green-400/50"></div>
                    <p class="text-[9px] font-mono uppercase tracking-widest text-muted mb-2 flex items-center gap-2">
                        <i class="fa-solid fa-circle-play text-green-400"></i> <span
                            data-i18n="project.stats.activeCount">Live / Aktif</span>
                    </p>
                    <h3 class="text-3xl font-mono font-bold text-green-400">
                        {{$summary['activeCount']}}</h3>
                </div>

                <div
                    class="relative border border-border/50 bg-surface/20 p-5 group hover:border-amber-400/50 transition-colors">
                    <div class="absolute top-0 left-0 w-2 h-2 border-t border-l border-amber-400/50"></div>
                    <div class="absolute bottom-0 right-0 w-2 h-2 border-b border-r border-amber-400/50"></div>
                    <div class="flex justify-between items-start mb-2">
                        <p class="text-[9px] font-mono uppercase tracking-widest text-muted flex items-center gap-2">
                            <i class="fa-solid fa-pause-circle text-amber-400"></i>
                            <span data-i18n="project.stats.inactiveCount">Arsip</span>
                        </p>
                        @if ($summary['inactiveCount'] > 0)
                            <div class="relative group/tooltip cursor-help">
                                <i
                                    class="fa-solid fa-circle-info text-muted hover:text-amber-400 transition-colors text-[10px]"></i>
                                <div
                                    class="absolute right-0 top-full mt-2 w-max bg-[#0a0a0a] border border-border/50 p-3 opacity-0 pointer-events-none group-hover/tooltip:opacity-100 transition-opacity z-50 text-[10px] font-mono text-muted space-y-1 shadow-xl">
                                    <div><span class="text-text"
                                            data-i18n="project.stats.statusBreakdown.Shipped">Shipped</span>: <span
                                            class="text-primary">{{ $summary['statusBreakdown']['Shipped'] }}</span></div>
                                    <div><span class="text-text" data-i18n="project.stats.statusBreakdown.In Progress">In
                                            Progress</span>: <span
                                            class="text-amber-400">{{ $summary['statusBreakdown']['In Progress'] }}</span>
                                    </div>
                                    <div><span class="text-text"
                                            data-i18n="project.stats.statusBreakdown.Prototype">Prototype</span>: <span
                                            class="text-sky-400">{{ $summary['statusBreakdown']['Prototype'] }}</span></div>
                                    <div><span class="text-text"
                                            data-i18n="project.stats.statusBreakdown.archived">Archived</span>: <span
                                            class="text-red-400">{{ $summary['statusBreakdown']['Archived'] }}</span></div>
                                </div>
                            </div>
                        @endif
                    </div>
                    <h3 class="text-3xl font-mono font-bold text-amber-400">
                        {{ $summary['inactiveCount']}}</h3>
                </div>
            </div>

            <div class="relative border border-border/50 bg-surface/10 p-4 md:p-6 space-y-6 overflow-x-hidden">
                <div
                    class="flex flex-col md:flex-row items-stretch md:items-center justify-between gap-4 border-b border-border/50 pb-6">

                    <div class="relative w-full md:w-1/2 group">
                        <div class="absolute left-4 top-1/2 -translate-y-1/2 font-mono text-primary text-sm">></div>
                        <input type="text" id="project-search" placeholder="{{ $projectPlaceholders }}"
                            class="w-full border border-border/70 bg-surface/30 px-4 py-3 pl-8 font-mono text-xs uppercase tracking-widest text-text placeholder:text-muted/50 focus:outline-none focus:border-primary focus:bg-primary/5 transition-colors" />
                        <div
                            class="absolute right-4 top-1/2 -translate-y-1/2 w-1.5 h-3 bg-primary/30 group-focus-within:bg-primary group-focus-within:animate-pulse pointer-events-none">
                        </div>
                    </div>

                    <div class="relative" id="sort-dropdown-wrapper">
                        <button id="sort-toggle"
                            class="w-full md:w-auto flex justify-between items-center gap-4 px-6 py-3 border border-border/70 bg-surface/30 font-mono text-[10px] font-bold uppercase tracking-widest text-muted hover:border-primary hover:text-primary transition-colors focus:outline-none">
                            <span class="flex items-center gap-2">
                                <i class="fa-solid fa-sort"></i>
                                <span id="sort-label" data-i18n="project.sort.menu.latest">Terbaru</span>
                            </span>
                            <i class="fa-solid fa-chevron-down text-[10px]" id="sort-chevron"></i>
                        </button>

                        <div id="sort-menu"
                            class="hidden absolute right-0 top-full mt-2 w-full min-w-[12rem] bg-[#0a0a0a]/95 backdrop-blur-md border border-primary/50 shadow-[0_0_20px_rgba(var(--color-primary-rgb),0.1)] z-50">
                            <button
                                class="sort-option w-full text-left px-5 py-3 font-mono text-[10px] uppercase tracking-widest text-muted hover:bg-primary/10 hover:text-primary transition-colors border-b border-border/50"
                                data-sort="latest"
                                data-i18n="project.sort.menu.latest">
                                Terbaru
                            </button>
                            <button
                                class="sort-option w-full text-left px-5 py-3 font-mono text-[10px] uppercase tracking-widest text-muted hover:bg-primary/10 hover:text-primary transition-colors"
                                data-sort="oldest"
                                data-i18n="project.sort.menu.oldest">
                                Terlama
                            </button>
                        </div>
                    </div>
                </div>

                <div class="flex flex-nowrap overflow-x-auto gap-2 pb-2 no-scrollbar scroll-fade">

                    <button
                        class="filter-btn shrink-0 px-5 py-2 border font-mono text-[10px] font-bold uppercase tracking-widest transition-colors focus:outline-none border-primary bg-primary/10 text-primary"
                        data-filter="all" data-i18n="project.filter.all">
                        [ ALL ]
                    </button>

                    <button
                        class="filter-btn shrink-0 px-5 py-2 border border-border font-mono text-[10px] font-bold uppercase tracking-widest text-muted hover:border-primary transition-colors focus:outline-none"
                        data-filter="Website" data-i18n="project.filter.website">
                        [ WEBSITE ]
                    </button>

                    <button
                        class="filter-btn shrink-0 px-5 py-2 border border-border font-mono text-[10px] font-bold uppercase tracking-widest text-muted hover:border-primary transition-colors focus:outline-none"
                        data-filter="Application" data-i18n="project.filter.application">
                        [ APPLICATION ]
                    </button>

                    <button
                        class="filter-btn shrink-0 px-5 py-2 border border-border font-mono text-[10px] font-bold uppercase tracking-widest text-muted hover:border-primary transition-colors focus:outline-none"
                        data-filter="Design" data-i18n="project.filter.design">
                        [ DESIGN ]
                    </button>

                </div>
            </div>

            @include('themes.system_architecture.project.partials.project-list')

            <div id="projects-pagination">
                @include('themes.system_architecture.project.partials.project-pagination')
            </div>
        </section>

        <section id="projects-end" class="relative py-24 border-t border-border/50 overflow-hidden bg-surface/5">
            <div
                class="absolute left-0 bottom-0 opacity-[0.05] pointer-events-none -translate-x-1/4 translate-y-1/4 text-primary">
                <svg width="400" height="400" viewBox="0 0 100 100" fill="none" stroke="currentColor">
                    <rect x="20" y="20" width="60" height="60" stroke-width="0.5" stroke-dasharray="2 2" />
                    <circle cx="50" cy="50" r="30" stroke-width="0.5" />
                    <line x1="20" y1="20" x2="80" y2="80" stroke-width="0.5" />
                    <line x1="80" y1="20" x2="20" y2="80" stroke-width="0.5" />
                    <circle cx="50" cy="50" r="45" stroke-width="0.2" stroke-dasharray="1 3" />
                </svg>
            </div>

            <div class="max-w-7xl mx-auto px-6 relative z-10">
                <div class="grid md:grid-cols-[1fr_auto] gap-10 items-end">
                    <div>
                        <h3 id="projects-end-title" data-i18n="project.end.title"
                            class="text-[clamp(2rem,5vw,3.5rem)] font-bold font-mono uppercase tracking-tighter text-text leading-[1.1] mb-4"
                            data-i18n="project.notes.title">
                            Project Notes
                        </h3>
                        <p class="text-sm font-mono text-muted max-w-xl leading-relaxed border-l border-primary/30 pl-4"
                            data-i18n="project.notes.description">
                            Detail proyek dan pembaruan akan terus dikembangkan.
                        </p>
                    </div>

                    <div class="hidden md:flex flex-col items-center">
                        <a href="#projects-hero"
                            class="group flex items-center justify-center w-14 h-14 border border-border bg-surface/30 hover:bg-primary/10 hover:border-primary transition-all duration-300 relative">
                            <div
                                class="absolute top-0 left-0 w-1.5 h-1.5 border-t border-l border-primary/50 group-hover:border-primary transition-colors">
                            </div>
                            <div
                                class="absolute bottom-0 right-0 w-1.5 h-1.5 border-b border-r border-primary/50 group-hover:border-primary transition-colors">
                            </div>

                            <i
                                class="fa-solid fa-arrow-up text-muted group-hover:text-primary transition-all duration-300 group-hover:-translate-y-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        </section>

    </div>

@endsection

<x-project.detail-modal />

@push('script')
    <script>
        window.openProjectModal = function()
            const modal = document.getElementById('projectDetailModal');
            if (modal) {
                modal.classList.remove('hidden');
                modal.classList.add('flex');
            }
        };

        window.closeProjectModal = function() {
            const modal = document.getElementById('projectDetailModal');
            if (modal) {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
                document.body.classList.remove('overflow-hidden');
            }
        };

        window.openLightbox = function(src) {
            const lightbox = document.getElementById('imageLightbox');
            const lightboxImg = document.getElementById('lightboxImage');
            if (lightbox && lightboxImg) {
                lightboxImg.src = src;
                lightbox.classList.remove('hidden');
                lightbox.classList.add('flex');
            }
        };

        window.closeLightbox = function() {
            const lightbox = document.getElementById('imageLightbox');
            if (lightbox) {
                lightbox.classList.add('hidden');
                lightbox.classList.remove('flex');
            }
        };

        document.addEventListener('DOMContentLoaded', () => {
             const detailModal = document.getElementById('projectDetailModal');
             const closeBtn = document.getElementById('detailModalClose');

             if(closeBtn) {
                 closeBtn.addEventListener('click', window.closeProjectModal);
             }

             if(detailModal) {
                 detailModal.addEventListener('click', (e) => {
                     if (e.target === detailModal) {
                         window.closeProjectModal();
                     }
                 });
             }
        });
    </script>
    @vite(['resources/js/project/filters.js', 'resources/js/project/detail-modal.js'])
@endpush
