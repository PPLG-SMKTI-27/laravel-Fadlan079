@extends('layouts.dashboard')
@section('title', 'Projects')
@vite(['resources/css/dashboard_project.css', 'resources/js/app.js'])
@section('content')


@if($errors->any())
    <div class="mb-4">
        <ul class="list-disc list-inside text-red-500">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<section class="py-20 max-w-6xl mx-auto px-6 space-y-16">
    <header class="space-y-6 max-w-6xl">
        <p class="text-xs uppercase tracking-widest text-muted">
            dashboard / projects
        </p>

        <h1 class="text-[clamp(2.5rem,6vw,4rem)] font-semibold leading-tight">
            Project Management
            <span class="block text-muted font-normal text-lg mt-2">
                Manage · Track · Publish
            </span>
        </h1>

        <div class="flex items-center justify-between w-full gap-4">

            <div class="relative w-full md:w-1/3">
                <form method="GET">
                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Search projects..."
                        class="w-full border border-border px-4 py-2 pl-10 text-sm placeholder:text-muted bg-surface focus:outline-none focus:ring-1 focus:ring-primary"
                    />
                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-muted">
                        <i class="fas fa-search"></i>
                    </span>
                </form>
            </div>

            <div class="flex items-center gap-2 ml-auto">

                <button
                    class="open-create-modal px-4 py-2 border border-border text-sm hover:border-primary transition focus:outline-none focus:ring-1 focus:ring-primary">
                    + Create
                </button>

                <a href="{{ route('dashboard.trash') }}"
                    class="px-4 py-2 border border-border text-sm hover:border-red-400 text-red-400">
                    Trash
                </a>

            </div>

        </div>
    </header>

    <div class="grid md:grid-cols-4 gap-6">

        <div class="border border-border bg-surface p-6">
            <p class="text-xs uppercase tracking-widest text-muted mb-2">
                Total Projects
            </p>
            <h3 class="text-3xl font-semibold">
                {{ $summary['totalProjects'] }}
            </h3>
        </div>

        <div class="border border-border bg-surface p-6">
            <p class="text-xs uppercase tracking-widest text-muted mb-2">
                Active
            </p>
            <h3 class="text-3xl font-semibold text-green-400">
                {{ $summary['activeCount'] }}
            </h3>
        </div>

        <div class="border border-border bg-surface p-6">
            <p class="text-xs uppercase tracking-widest text-muted mb-2">
                Archived / Draft
            </p>
            <h3 class="text-3xl font-semibold text-yellow-400">
                {{ $summary['inactiveCount'] }}
            </h3>
        </div>

        <div class="border border-border bg-surface p-6">
            <p class="text-xs uppercase tracking-widest text-muted mb-2">
                Categories
            </p>
            <h3 class="text-3xl font-semibold">
                {{ $summary['totalCategories'] }}
            </h3>
        </div>

    </div>

    @php
    $currentType = request('type', 'all');
    @endphp

    <div class="flex flex-wrap justify-between items-center gap-4">
        <div class="flex flex-wrap gap-2">
            <button class="filter-btn px-4 py-2 border border-border text-sm" data-filter="all">All</button>
            <button class="filter-btn px-4 py-2 border border-border text-sm" data-filter="Website">Website</button>
            <button class="filter-btn px-4 py-2 border border-border text-sm" data-filter="Application">Application</button>
            <button class="filter-btn px-4 py-2 border border-border text-sm" data-filter="Design">Design</button>
        </div>

        <div class="flex items-center gap-2">

            <form method="GET">
                @foreach(request()->except('sort','page') as $key => $value)
                    <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                @endforeach

                <select name="sort"
                        onchange="this.form.submit()"
                        class="border border-border px-4 py-2 text-sm bg-surface focus:outline-none focus:ring-1 focus:ring-primary">
                    <option value="desc" {{ request('sort','desc') == 'desc' ? 'selected' : '' }}>
                        Newest
                    </option>
                    <option value="asc" {{ request('sort') == 'asc' ? 'selected' : '' }}>
                        Oldest
                    </option>
                </select>
            </form>
            <button
                id="toggleSelectMode"
                type="button"
                class="px-4 py-2 border border-border text-sm hover:border-primary transition focus:outline-none focus:ring-1 focus:ring-primary"
            >
                Select Multiple
            </button>
        </div>
    </div>

    <div id="projects-container">
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
    @if($projects instanceof \Illuminate\Pagination\LengthAwarePaginator && $projects->currentPage() == 1 && $projects->count())
            <div class="project-folder group relative border border-dashed border-border bg-surface p-6 pt-12">
                    <div class="absolute top-0 left-6 -translate-y-1/2 flex gap-2 z-20">
                        <span class="px-4 py-1 text-xs uppercase tracking-widest badge-primary font-semibold">
                            SYSTEM
                        </span>
                        <span class="px-3 py-1 text-[10px] uppercase tracking-wide border bg-muted/10 text-muted border-border">
                            CREATE
                        </span>
                    </div>

                <div class="folder-files absolute inset-0 pointer-events-none z-0">
                    <span class="file"></span>
                    <span class="file"></span>

                    <div
                    class="open-create-modal file file-front pointer-events-auto
                            p-5 flex flex-col items-center justify-center
                            gap-4 text-center">

                        <div class="flex items-center justify-center
                                    w-16 h-16 text-6xl text-muted
                                    group-hover:text-primary
                                    group-hover:border-primary
                                    transition">

                            <i class="fas fa-plus"></i>
                        </div>

                        <div>
                            <h3 class="text-lg font-semibold">
                                Create Project
                            </h3>

                            <p class="text-sm text-muted mt-1">
                                Add a new portfolio entry
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        @endif

        @forelse ($projects as $project)
            <div class="project-folder group relative border border-border bg-surface p-6 pt-12 ">
                <div class="absolute top-0 left-6 -translate-y-1/2 flex gap-2 z-20">
                    <span class="px-4 py-1 text-xs uppercase tracking-widest badge-primary font-semibold">
                        {{ $project->type }}
                    </span>

                    <span class="px-3 py-1 text-[10px] uppercase tracking-wide border {{ $project->statusClass }}">
                        {{ $project->status }}
                    </span>
                </div>
                <input type="checkbox"
                    name="projects[]"
                    value="{{ $project->id }}"
                    class="bulk-checkbox w-4 h-4 opacity-0 pointer-events-none transition absolute top-3 right-3 z-30">

                <div class="folder-files absolute inset-0 z-0">
                    <span class="file"></span>
                    <span class="file"></span>

                       <a href="javascript:void(0)"
                        class="file file-front pointer-events-auto p-5 flex flex-col gap-3 project-open"
                            data-id="{{ $project->id }}"
                            data-title="{{ $project->title }}"
                            data-desc="{{ $project->desc }}"
                            data-type="{{ $project->type }}"
                            data-status="{{ $project->status }}"
                            data-visibility="{{ $project->visibility }}"
                            data-created="{{ $project->created_at->format('d M Y') }}"
                            data-updated="{{ $project->updated_at->format('d M Y') }}"
                            data-repo="{{ $project->repo }}"
                            data-role="{{ $project->role }}"
                            data-team="{{ $project->team_size }}"
                            data-responsibilities="{{ $project->responsibilities }}"
                            data-live="{{ $project->live_url }}"
                            data-screenshot='@json(
                                $project->screenshot
                                    ? collect($project->screenshot)
                                        ->map(fn($img) => ["path" => $img, "url" => asset("storage/".$img)])
                                        ->values()
                                    : []
                            )'
                            data-tech='@json($project->tech)'>

                        <div>
                            <h3 class="text-xl font-semibold leading-tight">
                                {{ $project->title}}
                            </h3>


                            <p class="text-sm text-muted leading-snug mt-1">
                                {{ \Illuminate\Support\Str::limit($project->desc, 100) }}
                            </p>

                            @if(strlen($project->desc) > 100)
                                <button
                                    @click="$dispatch('open-desc-modal', {
                                        title: '{{ addslashes($project->title) }}',
                                        desc: `{!! addslashes($project->desc) !!}`
                                    })"
                                    class="text-xs font-medium text-primary mt-1 hover:underline">
                                    Selengkapnya
                                </button>
                            @endif
                        </div>
                        <div class="tech-row">
                            @foreach ($project->visibleTechs as $tech)
                                <span>{{ strtoupper($tech) }}</span>
                            @endforeach

                            @if (count($project->extraTechs) > 0)
                                <span class="tech-more">
                                    +{{ count($project->extraTechs) }}
                                    <span class="tech-tooltip">
                                        @foreach ($project->extraTechs as $extra)
                                    {{ $extra }}<br>
                                        @endforeach
                                    </span>
                                </span>
                            @endif
                        </div>
                    </a>
                </div>
            </div>

        @empty
            <p class="text-xs uppercase tracking-widest text-muted">
                index / empty
            </p>
            <div class="col-span-full border border-border bg-surface py-20 px-6 flex flex-col items-center justify-center text-center">
                <svg class="w-20 h-20 text-muted mb-4 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>

                <h3 class="mt-6 text-[clamp(1.5rem,4vw,2rem)] font-semibold max-w-xl" data-i18n="project.empty.title"></h3>

                <p class="mt-2 text-muted max-w-md leading-relaxed" data-i18n="project.empty.desc"></p>

                <button class="open-create-modal mt-6 px-4 py-2 border border-border text-sm hover:border-primary hover:text-primary transition focus:outline-none focus:ring-1 focus:ring-primary shadow-sm">
                    + Create Project
                </button>
            </div>
        @endforelse

    </div>

    @if($projects instanceof \Illuminate\Pagination\LengthAwarePaginator && $projects->hasPages())
    <div class="flex justify-center pt-10">
        <nav class="flex items-center gap-2 text-sm">

            @if ($projects->onFirstPage())
                <span class="px-3 py-2 text-muted border border-border">Prev</span>
            @else
                <a href="{{ $projects->previousPageUrl() }}"
                   class="px-3 py-2 border border-border hover:border-primary">
                   Prev
                </a>
            @endif

            <span class="px-4 py-2 border border-border">
                {{ $projects->currentPage() }} / {{ $projects->lastPage() }}
            </span>

            @if ($projects->hasMorePages())
                <a href="{{ $projects->nextPageUrl() }}"
                   class="px-3 py-2 border border-border hover:border-primary">
                   Next
                </a>
            @else
                <span class="px-3 py-2 text-muted border border-border">Next</span>
            @endif

        </nav>
    </div>
    @endif

    </div>{{-- end #projects-container --}}

    <div id="bulkBar"
        class="fixed bottom-6 left-1/2 -translate-x-1/2
            bg-surface border border-border px-6 py-4
            flex gap-4 shadow-lg
            opacity-0 pointer-events-none translate-y-4
            transition-all duration-200">

        <span id="selectedCount"
            class="text-xs uppercase tracking-widest text-muted flex items-center">
            0 Selected
        </span>

        <button type="button"
            onclick="bulkAction('publish')"
            class="px-4 py-2 border border-border text-sm hover:border-primary">
            Publish Selected
        </button>

        <button type="button"
            onclick="bulkAction('delete')"
            class="px-4 py-2 border border-red-500 text-red-400 text-sm hover:bg-red-500/10">
            Delete Selected
        </button>

    </div>

    <form id="bulkForm" method="POST" class="hidden">
        @csrf
    </form>

</section>

@endsection
<x-project.detail-modal />

<x-project.edit-modal :technologies="$technologies" />

<x-project.create-modal :technologies="$technologies" />

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {

    const toggleBtn = document.getElementById('toggleSelectMode');
    const bulkBar   = document.getElementById('bulkBar');
    const selectedCountText = document.getElementById('selectedCount');

    let selectMode = new URL(window.location.href).searchParams.has('multiple_select');

    // ══════════════════════════════════════════════════════════════════════════
    // AJAX FETCH + SWAP HELPER
    // ══════════════════════════════════════════════════════════════════════════

    async function ajaxNavigate(url) {
        const container = document.querySelector('#projects-container');
        if (!container) return;

        container.style.opacity = '0.5';
        container.style.pointerEvents = 'none';

        try {
            const response = await fetch(url.toString(), {
                headers: { 'X-Requested-With': 'XMLHttpRequest' }
            });
            if (!response.ok) throw new Error(`HTTP ${response.status}`);

            const html = await response.text();
            const parser = new DOMParser();
            const doc = parser.parseFromString(html, 'text/html');

            const newContainer = doc.querySelector('#projects-container');
            if (newContainer) {
                container.innerHTML = newContainer.innerHTML;
            }

            window.history.pushState({}, '', url.toString());
            afterSwap();

        } catch (err) {
            console.error('[ajax-nav] Navigation failed:', err);
        } finally {
            container.style.opacity = '';
            container.style.pointerEvents = '';
        }
    }

    function buildUrl(params) {
        const url = new URL(window.location.href);
        for (const [key, value] of Object.entries(params)) {
            if (value === null || value === '') {
                url.searchParams.delete(key);
            } else {
                url.searchParams.set(key, value);
            }
        }
        if (!('page' in params)) url.searchParams.delete('page');
        return url;
    }

    // ══════════════════════════════════════════════════════════════════════════
    // AFTER-SWAP: re-init all listeners after #projects-container replaced
    // ══════════════════════════════════════════════════════════════════════════

    function afterSwap() {
        initDetailModalListeners();
        initPaginationLinks();
        attachCardEvents();
        updateBulkBar();
        highlightSearch();
    }

    // ══════════════════════════════════════════════════════════════════════════
    // DETAIL MODAL RE-INIT (for cards created by AJAX swap)
    // ══════════════════════════════════════════════════════════════════════════

    function initDetailModalListeners() {
        const detailModal = document.getElementById('projectDetailModal');
        if (!detailModal) return;

        document.querySelectorAll('.project-open').forEach(card => {
            if (card._detailBound) return;
            card._detailBound = true;

            card.addEventListener('click', () => {
                detailModal.dataset.id = card.dataset.id;
                detailModal.dataset.tech = card.dataset.tech;
                detailModal.dataset.type = card.dataset.type;
                detailModal.dataset.status = card.dataset.status;
                detailModal.dataset.visibility = card.dataset.visibility;
                detailModal.dataset.title = card.dataset.title;
                detailModal.dataset.desc = card.dataset.desc;
                detailModal.dataset.role = card.dataset.role;
                detailModal.dataset.team = card.dataset.team;
                detailModal.dataset.responsibilities = card.dataset.responsibilities;
                detailModal.dataset.repo = card.dataset.repo;
                detailModal.dataset.live = card.dataset.live;
                detailModal.dataset.screenshot = card.dataset.screenshot;

                document.getElementById('detailType').textContent = card.dataset.type;
                document.getElementById('detailStatus').textContent = card.dataset.status;
                document.getElementById('detailTitle').textContent = card.dataset.title;
                document.getElementById('detailDesc').textContent = card.dataset.desc;
                document.getElementById('detailRole').textContent = card.dataset.role || '-';
                document.getElementById('detailTeamSize').textContent = card.dataset.team || '-';
                document.getElementById('detailResponsibilities').textContent = card.dataset.responsibilities || '-';
                document.getElementById('detailCreated').textContent = card.dataset.created;
                document.getElementById('detailUpdated').textContent = card.dataset.updated;

                const techContainer = document.getElementById('detailTech');
                techContainer.innerHTML = '';
                if (card.dataset.tech) {
                    try {
                        JSON.parse(card.dataset.tech).forEach(t => {
                            techContainer.innerHTML += `<span class="px-2 py-1 text-xs border border-border">${t}</span>`;
                        });
                    } catch { techContainer.innerHTML = '-'; }
                }

                const wrapper = document.getElementById('detailScreenshotsWrapper');
                const sc = document.getElementById('detailScreenshots');
                sc.innerHTML = '';
                if (card.dataset.screenshot) {
                    try {
                        const images = JSON.parse(card.dataset.screenshot);
                        if (images.length > 0) {
                            images.forEach(img => {
                                sc.innerHTML += `<div class="aspect-video overflow-hidden border border-border/50 bg-surface/40 group"><img src="${img.url}" class="w-full h-full object-cover transition duration-500 group-hover:scale-105 cursor-pointer"></div>`;
                            });
                            wrapper.classList.remove('hidden');
                        } else { wrapper.classList.add('hidden'); }
                    } catch { wrapper.classList.add('hidden'); }
                } else { wrapper.classList.add('hidden'); }

                const live = document.getElementById('detailLive');
                const repo = document.getElementById('detailRepo');
                card.dataset.live ? (live.href = card.dataset.live, live.classList.remove('hidden')) : live.classList.add('hidden');
                card.dataset.repo ? (repo.href = card.dataset.repo, repo.classList.remove('hidden')) : repo.classList.add('hidden');

                window.openProjectModal();
                document.body.classList.add('overflow-hidden');
            });
        });
    }

    // ══════════════════════════════════════════════════════════════════════════
    // PAGINATION LINK INTERCEPTION
    // ══════════════════════════════════════════════════════════════════════════

    function initPaginationLinks() {
        const container = document.querySelector('#projects-container');
        if (!container) return;

        // Remove old handler
        if (container._paginationHandler) {
            container.removeEventListener('click', container._paginationHandler);
        }

        container._paginationHandler = function(e) {
            const anchor = e.target.closest('a[href]');
            if (!anchor) return;

            const href = anchor.getAttribute('href');
            if (!href || href === '#' || href.startsWith('javascript')) return;

            try {
                const target = new URL(href, window.location.origin);
                if (target.origin !== window.location.origin) return;
                e.preventDefault();
                ajaxNavigate(target);
            } catch { /* let native navigation handle */ }
        };

        container.addEventListener('click', container._paginationHandler);
    }

    // ══════════════════════════════════════════════════════════════════════════
    // SEARCH (intercept form submit + debounced input)
    // ══════════════════════════════════════════════════════════════════════════

    const searchForm = document.querySelector('header form');
    const searchInput = searchForm ? searchForm.querySelector('input[name="search"]') : null;

    if (searchForm && searchInput) {
        searchForm.addEventListener('submit', e => {
            e.preventDefault();
            const url = buildUrl({ search: searchInput.value || null });
            ajaxNavigate(url);
        });

        let searchTimer;
        searchInput.addEventListener('input', () => {
            clearTimeout(searchTimer);
            searchTimer = setTimeout(() => {
                const url = buildUrl({ search: searchInput.value || null });
                ajaxNavigate(url);
            }, 500);
        });
    }

    // ══════════════════════════════════════════════════════════════════════════
    // FILTER BUTTONS (AJAX)
    // ══════════════════════════════════════════════════════════════════════════

    function initFilterButtons() {
        const filterButtons = document.querySelectorAll('.filter-btn');
        const currentType = new URLSearchParams(window.location.search).get('type') ?? 'all';

        filterButtons.forEach(btn => {
            // Highlight active
            const isActive = btn.dataset.filter === currentType;
            btn.classList.toggle('border-primary', isActive);
            btn.classList.toggle('bg-primary/10', isActive);
            btn.classList.toggle('text-primary', isActive);

            if (btn._ajaxBound) return;
            btn._ajaxBound = true;

            btn.addEventListener('click', () => {
                const filter = btn.dataset.filter;
                const url = buildUrl({ type: filter === 'all' ? null : filter });
                ajaxNavigate(url).then(() => initFilterButtons());
            });
        });
    }

    initFilterButtons();

    // ══════════════════════════════════════════════════════════════════════════
    // SORT DROPDOWN (AJAX, intercept form submit)
    // ══════════════════════════════════════════════════════════════════════════

    const sortSelect = document.querySelector('select[name="sort"]');
    if (sortSelect) {
        const sortForm = sortSelect.closest('form');

        // Remove the onchange="this.form.submit()" by overriding
        sortSelect.onchange = null;
        sortSelect.removeAttribute('onchange');

        sortSelect.addEventListener('change', (e) => {
            e.preventDefault();
            const url = buildUrl({ sort: sortSelect.value });
            ajaxNavigate(url);
        });

        // Prevent form submit fallback
        if (sortForm) {
            sortForm.addEventListener('submit', e => e.preventDefault());
        }
    }

    // ══════════════════════════════════════════════════════════════════════════
    // HIGHLIGHT SEARCH RESULTS
    // ══════════════════════════════════════════════════════════════════════════

    function highlightSearch() {
        const keyword = new URLSearchParams(window.location.search).get('search');
        if (!keyword) return;

        const safe = keyword.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
        const regex = new RegExp(`(${safe})`, 'gi');

        document.querySelectorAll('.project-folder h3, .project-folder p, .tech-row span').forEach(el => {
            if (el.children.length > 0) return;
            const text = el.textContent;
            if (regex.test(text)) {
                el.innerHTML = text.replace(regex, '<span class="search-highlight">$1</span>');
            }
        });

        document.querySelectorAll('.tech-tooltip').forEach(tooltip => {
            const original = tooltip.innerHTML;
            if (regex.test(tooltip.textContent)) {
                tooltip.innerHTML = original.replace(regex, '<span class="search-highlight">$1</span>');
                tooltip.style.opacity = '1';
                tooltip.style.visibility = 'visible';
                const parent = tooltip.closest('.tech-more');
                if (parent) parent.classList.add('tech-match');
            }
        });
    }

    highlightSearch();

    // ══════════════════════════════════════════════════════════════════════════
    // BULK BAR + CARD SELECT
    // ══════════════════════════════════════════════════════════════════════════

    function updateBulkBar() {
        if (!selectMode || !bulkBar) return;
        const selected = document.querySelectorAll('.bulk-checkbox:checked').length;
        if (selected > 0) {
            bulkBar.classList.remove('opacity-0','pointer-events-none','translate-y-4');
            selectedCountText.innerText = selected + ' Selected';
        } else {
            bulkBar.classList.add('opacity-0','pointer-events-none','translate-y-4');
        }
    }

    function attachCardEvents() {
        const cards      = document.querySelectorAll('.project-folder');
        const checkboxes = document.querySelectorAll('.bulk-checkbox');

        if (selectMode) {
            checkboxes.forEach(cb => cb.classList.remove('opacity-0', 'pointer-events-none'));
        } else {
            checkboxes.forEach(cb => {
                cb.checked = false;
                cb.classList.add('opacity-0', 'pointer-events-none');
            });
            cards.forEach(card => card.classList.remove('border-primary', 'bg-primary/5'));
        }

        cards.forEach(card => {
            card.addEventListener('click', function (e) {
                if (!selectMode) return;

                const anchor = e.target.closest('.project-open');
                if (anchor) {
                    e.preventDefault();
                    e.stopImmediatePropagation();
                }

                if (e.target.closest('.open-create-modal') || e.target.tagName === 'BUTTON') return;

                const checkbox = card.querySelector('.bulk-checkbox');
                if (!checkbox) return;

                checkbox.checked = !checkbox.checked;
                card.classList.toggle('border-primary', checkbox.checked);
                card.classList.toggle('bg-primary/5', checkbox.checked);
                updateBulkBar();
            }, true);
        });
    }

    // ── initial attach ───────────────────────────────────────────────────────

    attachCardEvents();
    initPaginationLinks();

    if (selectMode) {
        toggleBtn.innerText = 'Cancel Selection';
        toggleBtn.classList.add('border-red-500', 'text-red-400');
    }

    // ══════════════════════════════════════════════════════════════════════════
    // TOGGLE SELECT MODE (AJAX)
    // ══════════════════════════════════════════════════════════════════════════

    toggleBtn.addEventListener('click', async () => {
        const wasSelectMode = selectMode;
        selectMode = !selectMode;

        const url = new URL(window.location.href);
        const originalText = toggleBtn.innerText;
        toggleBtn.innerText = 'Loading...';
        toggleBtn.disabled  = true;

        if (selectMode) {
            url.searchParams.set('multiple_select', '1');
            toggleBtn.classList.add('border-red-500', 'text-red-400');
        } else {
            url.searchParams.delete('multiple_select');
            toggleBtn.classList.remove('border-red-500', 'text-red-400');
            if (bulkBar) bulkBar.classList.add('opacity-0', 'pointer-events-none', 'translate-y-4');
        }

        try {
            const response = await fetch(url.toString(), {
                headers: { 'X-Requested-With': 'XMLHttpRequest' }
            });

            if (!response.ok) throw new Error('Network response was not ok');

            const html   = await response.text();
            const parser = new DOMParser();
            const doc    = parser.parseFromString(html, 'text/html');

            const newContainer = doc.querySelector('#projects-container');
            if (newContainer) {
                document.querySelector('#projects-container').innerHTML = newContainer.innerHTML;
            }

            window.history.pushState({}, '', url.toString());
            toggleBtn.innerText = selectMode ? 'Cancel Selection' : 'Select Multiple';

            afterSwap();

        } catch (error) {
            console.error('Error fetching data:', error);
            selectMode = wasSelectMode;
            if (!selectMode) {
                toggleBtn.classList.remove('border-red-500', 'text-red-400');
            } else {
                toggleBtn.classList.add('border-red-500', 'text-red-400');
            }
            toggleBtn.innerText = originalText;
            alert('Something went wrong. Please try again.');
        } finally {
            toggleBtn.disabled = false;
        }
    });

});
</script>
@vite([
'resources/js/project/detail-modal.js',
'resources/js/project/filters.js'
])
@endpush
