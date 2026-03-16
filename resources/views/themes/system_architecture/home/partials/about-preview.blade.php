<section id="about-teaser" class="min-h-[100dvh] flex flex-col justify-center py-24 border-t border-border relative overflow-hidden">
    <div class="absolute inset-0 z-0 opacity-[0.03]"
        style="background-image: radial-gradient(circle, var(--color-text) 1px, transparent 1px); background-size: 24px 24px;">
    </div>

    <div class="max-w-7xl w-full mx-auto px-6 relative z-10">
        <div class="grid lg:grid-cols-[1fr_400px] gap-12 lg:gap-20 items-center">

            <div class="font-mono">
                <div class="flex items-center gap-4 mb-8">
                    <span
                        class="px-2 py-1 bg-primary/10 text-primary border border-primary/20 text-[10px] uppercase tracking-widest"\
                        data-i18n="home.about_preview.label">
                        Profil Singkta
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

                <a href="{{ route('portofolio.about') }}"
                    class="group inline-flex items-center gap-4 font-bold text-xs uppercase tracking-widest hover:text-primary transition-colors">
                    <span class="border-b border-text/30 group-hover:border-primary pb-1 transition-colors" data-i18n="home.about_preview.button_more">Lihat Selengkapnya</span>
                    <svg class="w-4 h-4 transform group-hover:translate-x-2 transition-transform" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </a>
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
</section>
