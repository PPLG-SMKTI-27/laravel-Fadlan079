@extends('layouts.main')
@section('title', 'Project')
@vite(['resources/css/project.css'])
@section('content')
<section id="projects-hero" class="py-32 max-w-7xl mx-auto px-6 space-y-10 overflow-hidden">
  <p class="text-xs uppercase tracking-widest flex items-center gap-3">
    <span class="w-6 h-px bg-primary"></span>
    <span class="text-primary font-semibold">archive / selected work</span>
  </p>

  <h1 class="text-[clamp(3.5rem,9vw,7rem)] font-semibold leading-[0.95]">
    <span class="text-text">Projects</span>
    <span class="block text-muted font-normal">
      I had to think through.
    </span>
  </h1>

  <p class="text-muted max-w-xl leading-relaxed">
    A collection of <span class="text-primary font-semibold">systems, tools, and interfaces</span> I designed and built.
    Some shipped to real users.
    Some still evolving behind the scenes.
  </p>

  <div class="flex gap-6 text-xs uppercase tracking-widest">
    <span class="text-primary font-medium">2019 – Present</span>
    <span class="text-primary font-medium">Web / Systems</span>
    <span class="text-primary font-medium">Shipped & In Progress</span>
  </div>
</section>

@php
$projects = [
    [
        'type' => 'Web App',
        'title' => 'Inventory System',
        'desc' => 'Structured backend, clean UI, real usage.'
    ],
    [
        'type' => 'Website',
        'title' => 'Portfolio V2',
        'desc' => 'Website portofolio interaktif dengan Laravel, TailwindCSS, GSAP, dan JavaScript untuk menampilkan karya.'
    ],
    [
        'type' => 'Dashboard',
        'title' => 'Analytics Panel',
        'desc' => 'Data-focused interface with clarity.'
    ],
];
@endphp

<section id="projects-index" class="relative max-w-6xl mx-auto px-6 py-32 space-y-24 overflow-hidden">
    <header class="space-y-6 max-w-xl">
        <p class="text-xs uppercase tracking-widest text-muted">
            index / selected
        </p>

        <h2 class="text-[clamp(2.5rem,6vw,4rem)] font-semibold leading-tight">
            Selected Works
        </h2>

        <p class="text-muted leading-relaxed">
            A focused selection of projects that represent
            how I approach structure, systems, and clarity.
        </p>

        <div class="flex flex-wrap gap-x-6 gap-y-2 text-sm text-muted pt-2">
            <span>{{ count($projects) }} Projects</span>
            <span>3 Categories</span>
            <span>2019 – Present</span>
        </div>
    </header>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($projects as $project)
        <div class="project-folder group relative border border-border bg-surface p-6 pt-12 ">
            <div class="absolute top-0 left-6 -translate-y-1/2 flex gap-2 z-20">
                <span class="px-4 py-1 text-xs uppercase tracking-widest badge-primary font-semibold">
                    {{ $project['type'] }}
                </span>

                <span class="px-3 py-1 text-[10px] uppercase tracking-wide border border-border text-muted bg-bg">
                    Shipped
                </span>
            </div>

            <div class="folder-files absolute inset-0 pointer-events-none z-0">
                <span class="file"></span>
                <span class="file"></span>

                <div class="file file-front pointer-events-auto p-5 flex flex-col gap-3">
                    <div>
                        <h3 class="text-xl font-semibold leading-tight">
                            {{ $project['title'] }}
                        </h3>


                        <p class="text-sm text-muted leading-snug mt-1">
                            {{ $project['desc'] }}
                        </p>
                    </div>

                    <div class="file-divider"></div>

                    <div class="tech-row">
                        <span>LARAVEL</span>
                        <span>HTMX</span>
                        <span>TAILWIND</span>

                        <span class="tech-more">
                            +3
                            <span class="tech-tooltip">
                            Alpine.js<br>
                            Redis<br>
                            MySQL
                            </span>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>

<section id="projects-end" class="py-32 border-t border-border overflow-hidden">
  <div class="max-w-6xl mx-auto px-6 space-y-10">

    <p class="text-xs uppercase tracking-widest text-muted">
      end of index
    </p>

    <h3 id="projects-end-title"
        data-text="Each project is a response to a real constraint, not a design exercise."
        class="text-[clamp(2rem,5vw,3rem)] font-semibold leading-tight max-w-2xl">
    </h3>

    <p class="text-muted max-w-xl leading-relaxed">
      Some were built under pressure.
      Some evolved over time.
      All of them shaped how I think about systems and responsibility.
    </p>

  </div>
</section>
@endsection
