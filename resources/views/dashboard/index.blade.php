@extends('layouts.dashboard')
@section('title', 'Dashboard')

@vite(['resources/css/dashboard_project.css', 'resources/js/app.js'])

@section('content')

<section class="py-20 max-w-6xl mx-auto px-6 space-y-20">

    {{-- ================= HEADER ================= --}}
    <header class="space-y-6">
        <p class="text-xs uppercase tracking-widest text-muted">
            dashboard / overview
        </p>

        <h1 class="text-[clamp(2.5rem,6vw,4rem)] font-semibold leading-tight">
            Portfolio Overview
            <span class="block text-muted font-normal text-lg mt-2">
                System Summary & Activity
            </span>
        </h1>

        <div class="flex flex-wrap gap-3">
            <a href="{{ route('dashboard.projects.create') }}"
                class="px-4 py-2 border border-border text-sm hover:border-primary transition">
                + New Project
            </a>

            <a href="{{ route('dashboard.projects.index') }}"
                class="px-4 py-2 border border-border text-sm hover:border-primary transition">
                Manage Projects
            </a>

            <a href="{{ route('dashboard.account.edit') }}"
                class="px-4 py-2 border border-border text-sm hover:border-red-400 text-red-400">
                Settings
            </a>
        </div>
    </header>


    {{-- ================= MAIN SUMMARY CARDS ================= --}}
    <div class="grid md:grid-cols-4 gap-6">

        <div class="border border-border bg-surface p-6">
            <p class="text-xs uppercase tracking-widest text-muted mb-2">
                Total Projects
            </p>
            <h3 class="text-3xl font-semibold">
                {{ $totalProjects ?? 12 }}
            </h3>
        </div>

        <div class="border border-border bg-surface p-6">
            <p class="text-xs uppercase tracking-widest text-muted mb-2">
                Active
            </p>
            <h3 class="text-3xl font-semibold text-green-400">
                {{ $activeProjects ?? 5 }}
            </h3>
        </div>

        <div class="border border-border bg-surface p-6">
            <p class="text-xs uppercase tracking-widest text-muted mb-2">
                Archived
            </p>
            <h3 class="text-3xl font-semibold text-yellow-400">
                {{ $archivedProjects ?? 3 }}
            </h3>
        </div>

        <div class="border border-border bg-surface p-6">
            <p class="text-xs uppercase tracking-widest text-muted mb-2">
                Technologies Used
            </p>
            <h3 class="text-3xl font-semibold">
                {{ $totalTech ?? 14 }}
            </h3>
        </div>

    </div>


    {{-- ================= SECONDARY DASHBOARD GRID ================= --}}
    <div class="grid lg:grid-cols-3 gap-6">

        {{-- Activity Feed --}}
        <div class="border border-border bg-surface p-6 space-y-6">
            <p class="text-xs uppercase tracking-widest text-muted">
                Activity
            </p>

            <div class="space-y-4 text-sm">
                <div class="flex justify-between">
                    <span>Project Updated</span>
                    <span class="text-muted">2h ago</span>
                </div>
                <div class="flex justify-between">
                    <span>New Project Created</span>
                    <span class="text-muted">1d ago</span>
                </div>
                <div class="flex justify-between">
                    <span>Project Archived</span>
                    <span class="text-muted">3d ago</span>
                </div>
                <div class="flex justify-between">
                    <span>System Backup</span>
                    <span class="text-muted">1w ago</span>
                </div>
            </div>
        </div>


        {{-- Project Status Breakdown --}}
        <div class="border border-border bg-surface p-6 space-y-6">
            <p class="text-xs uppercase tracking-widest text-muted">
                Status Breakdown
            </p>

            <div class="space-y-3 text-sm">

                <div>
                    <div class="flex justify-between mb-1">
                        <span>Shipped</span>
                        <span>4</span>
                    </div>
                    <div class="h-2 bg-border">
                        <div class="h-2 bg-green-400 w-2/3"></div>
                    </div>
                </div>

                <div>
                    <div class="flex justify-between mb-1">
                        <span>In Progress</span>
                        <span>3</span>
                    </div>
                    <div class="h-2 bg-border">
                        <div class="h-2 bg-yellow-400 w-1/2"></div>
                    </div>
                </div>

                <div>
                    <div class="flex justify-between mb-1">
                        <span>Prototype</span>
                        <span>2</span>
                    </div>
                    <div class="h-2 bg-border">
                        <div class="h-2 bg-blue-400 w-1/3"></div>
                    </div>
                </div>

            </div>
        </div>


        {{-- System Info --}}
        <div class="border border-border bg-surface p-6 space-y-6">
            <p class="text-xs uppercase tracking-widest text-muted">
                System Info
            </p>

            <div class="space-y-3 text-sm">
                <div class="flex justify-between">
                    <span>Storage Usage</span>
                    <span>320MB</span>
                </div>

                <div class="flex justify-between">
                    <span>Last Backup</span>
                    <span>2 days ago</span>
                </div>

                <div class="flex justify-between">
                    <span>Environment</span>
                    <span class="text-green-400">Production</span>
                </div>

                <div class="flex justify-between">
                    <span>App Version</span>
                    <span>v1.0.0</span>
                </div>
            </div>
        </div>

    </div>


    {{-- ================= RECENT PROJECTS ================= --}}
    <div class="space-y-10">

        <header class="space-y-4">
            <p class="text-xs uppercase tracking-widest text-muted">
                index / recent
            </p>

            <h2 class="text-2xl font-semibold">
                Recent Projects
            </h2>

            <p class="text-muted text-sm">
                @if ($latestProject)
                    Latest update · {{ $latestProject->updated_at->diffForHumans() }}
                @else
                    No recent activity
                @endif
            </p>
        </header>


        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            @forelse ($recentProjects as $project)

                <div class="project-folder group relative border border-border bg-surface p-6 pt-12 hover:border-primary transition">

                    <div class="absolute top-0 left-6 -translate-y-1/2 flex gap-2 z-20">
                        <span class="px-4 py-1 text-xs uppercase tracking-widest badge-primary font-semibold">
                            {{ $project->type }}
                        </span>

                        <span class="px-3 py-1 text-[10px] uppercase tracking-wide border {{ $project->statusClass }}">
                            {{ $project->status }}
                        </span>
                    </div>

                    <div class="cursor-pointer">

                        <h3 class="text-lg font-semibold">
                            {{ $project->title }}
                        </h3>

                        <p class="text-sm text-muted mt-2">
                            {{ $project->desc }}
                        </p>

                        <div class="mt-4 flex flex-wrap gap-2 text-xs">
                            @foreach ($project->visibleTechs as $tech)
                                <span class="px-2 py-1 border border-border">
                                    {{ strtoupper($tech) }}
                                </span>
                            @endforeach
                        </div>

                    </div>
                </div>

            @empty
                <div class="col-span-full border border-border bg-surface py-20 px-6 text-center">
                    <h3 class="text-xl font-semibold">
                        No Projects Yet
                    </h3>
                    <p class="text-muted mt-2">
                        Start by creating your first project.
                    </p>
                </div>
            @endforelse

        </div>

    </div>

</section>

@endsection
