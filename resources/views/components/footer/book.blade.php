<footer class="relative bg-surface border-t border-border pt-20 pb-10 z-30 font-sans">

    <div class="absolute inset-0 pointer-events-none opacity-[0.03]"
         style="background-image: radial-gradient(var(--color-text) 0.5px, transparent 0.5px); background-size: 12px 12px;">
    </div>

    <div class="absolute top-0 bottom-0 left-0 w-1.5 bg-primary/10 border-r border-border hidden md:block"></div>

    <div class="max-w-6xl mx-auto px-6 md:px-10 relative z-10">

        <div class="grid grid-cols-1 md:grid-cols-12 gap-12 lg:gap-8">

            <div class="md:col-span-12 lg:col-span-5 space-y-6">

                <div>
                    <h2 class="text-3xl md:text-4xl font-bold tracking-tight text-text leading-none">
                        {{ $brand }}
                    </h2>
                    <div class="w-16 h-1 bg-primary rounded-full mt-4"></div>
                </div>

                <p class="text-sm text-muted leading-relaxed max-w-sm font-medium"
                data-i18n="footer.brand_description">
                    Siswa SMK TI Airlangga generasi ke-24 yang tertarik pada pengembangan web full-stack.
                </p>
            </div>

            <div class="md:col-span-6 lg:col-span-3 lg:col-start-7 space-y-6">
                <p class="text-[11px] font-bold uppercase tracking-widest text-text border-b border-border/50 pb-2" data-i18n="footer.quick_links_label">
                    Tautan Cepat
                </p>

                <ul class="flex flex-col gap-3">
                    @foreach ($links as $link)
                        <li>
                            <a href="{{ $link['href'] }}" class="group flex items-center gap-3 text-sm font-bold text-muted hover:text-primary transition-colors w-max">
                                <span class="transform group-hover:translate-x-1 transition-transform" data-i18n="{{ $link['key'] }}">
                                    {{ ucwords(strtolower(str_replace('nav.', '', __($link['key'])))) }}
                                </span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="md:col-span-6 lg:col-span-3 space-y-6">
                <p class="text-[11px] font-bold uppercase tracking-widest text-text border-b border-border/50 pb-2" data-i18n="footer.connect_label">
                    Hubungi
                </p>

                <div class="flex flex-wrap gap-3">
                    @foreach ($socials as $social)
                        <a href="{{ $social['href'] }}" target="_blank"
                           class="group flex items-center justify-center w-10 h-10 rounded-full border border-border bg-container hover:bg-primary hover:border-primary transition-all duration-300 shadow-sm hover:-translate-y-1">
                            <i class="{{ $social['icon'] }} text-muted group-hover:text-white transition-colors text-sm"></i>
                        </a>
                    @endforeach
                </div>

                <div class="pt-4 flex items-center gap-2 opacity-60">
                    <i class="fa-solid fa-map-pin text-[10px] text-text"></i>
                    <span class="text-[10px] font-bold uppercase tracking-widest text-text">Indonesia</span>
                </div>
            </div>

        </div>

        <div class="mt-16 pt-8 border-t border-border">
            <div class="flex flex-col md:flex-row items-center justify-center gap-3 md:gap-6
                        text-[10px] font-bold uppercase tracking-widest text-muted">

                <div class="flex items-center gap-2">
                    <span>© {{ now()->year }}</span>
                    <span class="text-primary">{{ $brand }}</span>
                </div>

                <span class="hidden md:inline text-border">|</span>

                <span data-i18n="footer.copyright" class="">Hak Cipta Dilindungi</span>

            </div>
        </div>
    </div>
</footer>
