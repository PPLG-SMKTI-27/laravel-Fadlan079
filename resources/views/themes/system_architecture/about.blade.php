@extends('layouts.main')
@section('title', 'About Me')
<style>
    .constraint-line {
        opacity: 0.15;
        transform: translateX(-10%);
        white-space: nowrap;
    }

    .scanlines {
        background: linear-gradient(to bottom, rgba(255, 255, 255, 0), rgba(255, 255, 255, 0) 50%, rgba(0, 0, 0, 0.1) 50%, rgba(0, 0, 0, 0.1));
        background-size: 100% 4px;
    }
</style>

@section('content')
    <section class="relative max-w-7xl mx-auto px-6 py-32 space-y-32 overflow-x-hidden">
        <div class="max-w-7xl w-full mx-auto px-6 relative z-10">
            <div class="grid lg:grid-cols-[1fr_400px] gap-12 lg:gap-20 items-center">

                <div class="font-mono">
                    <div class="flex items-center gap-4 mb-8">
                        <span
                            class="px-2 py-1 bg-primary/10 text-primary border border-primary/20 text-[10px] uppercase tracking-widest"\
                            data-i18n="about.teaser.label">
                            Profil Saya
                        </span>
                    </div>

                    <h3 class="text-3xl md:text-5xl font-bold tracking-tight mb-6 uppercase text-text font-sans">
                        <span data-i18n="home.about_preview.title">Tentang Saya</span>
                        <br/>
                        <span class="text-muted" data-i18n="home.about_preview.subtitle">Latar Belakang</span>
                    </h3>

                    <p class="text-sm md:text-base text-muted leading-relaxed mb-10 max-w-xl font-sans" data-i18n="home.about_preview.description">
                        Saya adalah siswa SMK TI Airlangga generasi ke-24 yang berfokus pada pengembangan web full-stack.
                        Saat ini saya sedang mempelajari Laravel dan Vue, serta senang mengeksplorasi berbagai teknologi baru untuk mengembangkan kemampuan saya.
                    </p>

                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-6 py-6 border-y border-border/50 mb-10 text-xs">
                        <div>
                            <p class="font-semibold text-text">Indonesia</p>
                        </div>
                        <div>
                            <p class="font-semibold text-primary flex items-center gap-2">
                                <span class="w-1.5 h-1.5 rounded-full bg-primary animate-pulse"></span>
                                Tersedia
                            </p>
                        </div>
                        <div>
                            <p class="font-semibold text-text">Aplikasi Web</p>
                        </div>
                    </div>
                </div>

                <div class="relative group max-w-[270px] m-auto">
                    <div
                        class="absolute -inset-4 border border-border/50 z-0 transition-transform duration-500 group-hover:scale-[1.02]">
                    </div>
                    <div class="absolute -top-5 -left-5 w-3 h-3 border-t-2 border-l-2 border-primary z-20"></div>
                    <div class="absolute -bottom-5 -right-5 w-3 h-3 border-b-2 border-r-2 border-primary z-20"></div>

                    <div
                        class="absolute top-4 -left-8 text-[9px] font-mono text-muted rotate-90 tracking-widest uppercase origin-bottom-left"
                        data-i18n="home.about_preview.photo_author_tag">
                        Profil Penulis
                    </div>

                    <div class="relative z-10 aspect-[4/5] bg-surface border border-border overflow-hidden flex items-center justify-center filter grayscale group-hover:grayscale-0 transition-all duration-700">
                        <img src="{{ $profilePhoto }}" alt="Photo Profile"
                            onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';"
                            class="w-4/5 h-4/5 object-contain mx-auto my-auto opacity-80 group-hover:opacity-100 transition-all duration-500">

                        <div style="display:none" class="flex flex-col items-center justify-center w-full h-full font-mono bg-surface">
                            <svg class="w-16 h-16 text-primary/30 mb-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1">
                                <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <span class="text-[10px] uppercase tracking-[0.3em] text-primary animate-pulse">Data_Not_Found</span>
                            <span class="text-[8px] uppercase tracking-widest text-muted mt-1">Err_0x00404</span>
                        </div>

                        <div class="absolute inset-0 bg-[linear-gradient(transparent_50%,rgba(0,0,0,0.1)_50%)] bg-[length:100%_4px] pointer-events-none"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="pt-32 pb-16 border-t border-border/50" id="about-visions">
            <div class="relative border border-border bg-surface/20 p-8 md:p-16 overflow-hidden">

                <div class="absolute inset-0 flex items-center justify-end opacity-[0.03] pointer-events-none -mr-32">
                    <svg width="600" height="600" viewBox="0 0 100 100" fill="none" stroke="currentColor">
                        <circle cx="50" cy="50" r="45" stroke-width="0.2" stroke-dasharray="1 2" />
                        <circle cx="50" cy="50" r="30" stroke-width="0.2" />
                        <circle cx="50" cy="50" r="15" stroke-width="0.2" />
                        <path d="M50 0 V100 M0 50 H100" stroke-width="0.2" />
                    </svg>
                </div>

                <div class="relative z-10">
                    <div class="flex items-center gap-3 mb-8">
                        <div class="w-3 h-3 bg-primary animate-pulse"></div>
                        <span class="font-mono text-[10px] uppercase tracking-widest text-primary"
                            data-i18n="about.career_roadmap.label">Peta Jalan Karir</span>
                    </div>

                    <h3 class="text-4xl md:text-5xl font-bold tracking-tighter uppercase  text-text font-sans">
                        <span data-i18n="about.career_roadmap.title">Tujuan / Visi</span>
                    </h3>
                    <br>
                    <p class="text-sm text-muted font-medium mb-12"
                        data-i18n="about.career_roadmap.description">
                        Hal yang ingin saya capai dalam perjalanan belajar web development.
                    </p>

                    <div class="grid md:grid-cols-2 gap-12 font-mono">

                        <div class="relative group">
                            <div
                                class="absolute -left-4 top-0 w-[2px] h-full bg-border group-hover:bg-primary transition-colors">
                            </div>
                            <p class="text-[10px] text-muted tracking-widest uppercase mb-3"
                                data-i18n="about.career_roadmap.short_term.label">Jangka Pendek</p>
                            <h4 class="text-lg font-bold text-text mb-3" data-i18n="about.career_roadmap.short_term.title">
                                Memperkuat Dasar
                            </h4>
                            <p class="text-sm text-muted font-sans leading-relaxed"
                                data-i18n="about.career_roadmap.short_term.description">
                                Fokus mempelajari Laravel, Vue, dan teknologi web lainnya sambil membangun berbagai proyek untuk memperkuat pemahaman dalam pengembangan web full-stack.
                            </p>
                        </div>

                        <div class="relative group">
                            <div
                                class="absolute -left-4 top-0 w-[2px] h-full bg-border group-hover:bg-text transition-colors">
                            </div>
                            <p class="text-[10px] text-muted tracking-widest uppercase mb-3"
                                data-i18n="about.career_roadmap.long_term.label">Jangka Panjang</p>
                            <h4 class="text-lg font-bold text-text mb-3" data-i18n="about.career_roadmap.long_term.title">Tech
                               Menjadi Web Developer
                            </h4>
                            <p class="text-sm text-muted font-sans leading-relaxed"
                                data-i18n="about.career_roadmap.long_term.description">
                                Terus mengembangkan kemampuan dalam membangun aplikasi web yang bermanfaat, serta memperdalam pengalaman sebagai developer full-stack.
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="max-w-6xl mx-auto space-y-16 pt-20 border-t border-border/50" id="about-values">
            <div class="space-y-2">
                <h3 class="text-[clamp(2.5rem,6vw,4rem)] font-bold tracking-tighter leading-none text-text uppercase"
                    data-i18n="about.focus.title">
                    Fokus Saya
                </h3>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">

                @foreach ($principles as $i => $principle)
                    <div
                        class="value-item group space-y-3 border-t border-text/10 pt-4 hover:border-primary transition-colors">

                        <div class="text-[10px] font-mono text-muted">
                            0{{ $i + 1 }}
                        </div>

                        <h4 class="value-title text-lg font-bold leading-none uppercase tracking-tight
                            {{ $i === 1 ? 'text-primary' : 'text-text' }}"
                            data-i18n="about.principles.{{ $i }}.title">
                            {{ $principle['title'] }}
                        </h4>

                        <p class="value-desc text-sm text-muted font-medium leading-relaxed"
                            data-i18n="about.principles.{{ $i }}.desc">
                            {{ $principle['description'] }}
                        </p>

                    </div>
                @endforeach

            </div>
        </div>
    </section>
@endsection
