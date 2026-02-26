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

    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
    @if($projects->currentPage() == 1 && $projects->count())
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
    @if ($projects->hasPages())
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

</section>

@endsection
<x-project.detail-modal />

<x-project.edit-modal :technologies="$technologies" />

<x-project.create-modal :technologies="$technologies" />

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
    const toggleBtn = document.getElementById('toggleSelectMode');
    const bulkBar = document.getElementById('bulkBar');
    const checkboxes = document.querySelectorAll('.bulk-checkbox');
    const cards = document.querySelectorAll('.project-folder');
    const selectedCountText = document.getElementById('selectedCount');

    let selectMode = false;

    function updateBulkBar() {
        if (!selectMode) return;
        const selected = document.querySelectorAll('.bulk-checkbox:checked').length;
        if (selected > 0) {
            bulkBar.classList.remove('opacity-0','pointer-events-none','translate-y-4');
            selectedCountText.innerText = selected + ' Selected';
        } else {
            bulkBar.classList.add('opacity-0','pointer-events-none','translate-y-4');
        }
    }

    toggleBtn.addEventListener('click', () => {
        selectMode = !selectMode;
        checkboxes.forEach(cb => cb.classList.toggle('opacity-0'));
        cards.forEach(card => card.classList.toggle('border-primary', false));
        cards.forEach(card => card.classList.toggle('bg-primary/5', false));
        bulkBar.classList.add('opacity-0','pointer-events-none','translate-y-4');
    });

    cards.forEach(card => {
        card.addEventListener('click', function(e) {
            if (!selectMode) return;
            if (e.target.closest('form') || e.target.tagName === 'BUTTON') return;

            const checkbox = card.querySelector('.bulk-checkbox');
            checkbox.checked = !checkbox.checked;
            card.classList.toggle('border-primary', checkbox.checked);
            card.classList.toggle('bg-primary/5', checkbox.checked);
            updateBulkBar();
        });
    });
});
</script>
@vite([
'resources/js/project/detail-modal.js',
'resources/js/project/filters.js'
])
@endpush
