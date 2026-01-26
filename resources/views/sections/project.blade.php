<div class="mx-auto px-6 overflow-hidden "
style="--cta-bubble-color: var(--color-primary);">

    {{-- <h3 class="text-3xl font-bold text-center mb-4 text-primary" data-i18n="projects"></h3>
    <p class="text-muted text-center mb-16" data-i18n="subtitle.projects"></p> --}}

    <div class="project-row project-row-top md:flex hidden mb-6">
        @foreach ($featuredProjects as $l)
            <div class="project-card relative w-105 h-65 shrink-0 bg-container p-6 ">
                <div class="relative w-full h-full bg-neutral-900 overflow-hidden">
                    <img
                        src="{{ (!empty($l['thumbnail']) && file_exists(public_path('images/projects/'.$l['thumbnail'])))
                            ? asset('images/projects/'.$l['thumbnail'])
                            : asset('images/projects/default.svg') }}"
                        alt="{{ $l['title'] }}"
                        class="absolute inset-0 w-full h-full object-cover">

                    <div class="absolute inset-0 bg-black/40"></div>

                    <div class="relative z-10 p-5 h-full flex flex-col justify-between">

                        <div>
                            <p class="text-xs text-white/50 mb-1 tracking-wide">
                                {{ $l['status'] }}
                            </p>

                            <h4 class="text-lg font-semibold text-white leading-snug">
                                {{ $l['title'] }}
                            </h4>
                        </div>

                        <div class="flex justify-between items-end">
                            <span class="text-xs text-white/50">
                                {{ $l['year'] ?? '2025' }}
                            </span>

                            <a
                                href="{{ $l['repo'] }}"
                                class="text-xs text-white/70 hover:text-white transition">
                                View →
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="project-row project-row-bottom flex gap-6 overflow-x-auto snap-x snap-mandatory">
        @foreach ($featuredProjects as $l)
            <div class="project-card relative w-105 h-65 shrink-0 bg-container p-6">
                <div class="relative w-full h-full bg-neutral-900 overflow-hidden">
                    <img
                        src="{{ (!empty($l['thumbnail']) && file_exists(public_path('images/projects/'.$l['thumbnail'])))
                            ? asset('images/projects/'.$l['thumbnail'])
                            : asset('images/projects/default.svg') }}"
                        alt="{{ $l['title'] }}"
                        class="absolute inset-0 w-full h-full object-cover">

                    <div class="absolute inset-0 bg-black/40"></div>

                    <div class="relative z-10 p-5 h-full flex flex-col justify-between">

                        <div>
                            <p class="text-xs text-white/50 mb-1 tracking-wide">
                                {{ $l['status'] }}
                            </p>

                            <h4 class="text-lg font-semibold text-white leading-snug">
                                {{ $l['title'] }}
                            </h4>
                        </div>

                        <div class="flex justify-between items-end">
                            <span class="text-xs text-white/50">
                                {{ $l['year'] ?? '2025' }}
                            </span>

                            <a
                                href="{{ $l['repo'] }}"
                                class="text-xs text-white/70 hover:text-white transition">
                                View →
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{-- <div class="mt-16 flex justify-center">
        <a
            href="pages.project"
            class="cta-btn relative overflow-hidden px-8 py-3 rounded-2xl
                border-2 border-primary text-text font-semibold">
            <span class="cta-bubble"></span>

            <span class="cta-text relative z-10" data-i18n="more.projects"> </span>
        </a>
    </div> --}}
</div>
