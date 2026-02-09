<footer class="relative py-10 bg-white/70 dark:bg-black/40 z-50">
    <div class="max-w-6xl mx-auto px-6 space-y-8">

        <div class="text-center md:text-left space-y-2">
            <h2 class="text-[2rem] md:text-[2.2rem] font-semibold mb-1">
                {{ strtoupper($brand) }}
            </h2>
            <div class="w-16 h-0.5 bg-primary mx-auto md:mx-0"></div>
        </div>

        <p class="text-center md:text-left text-sm text-muted leading-snug max-w-lg mx-auto md:mx-0"
        data-i18n="footer.description">
        </p>

        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-8 mt-6">
            <div class="flex-1">
                <h4 class="font-semibold text-sm uppercase tracking-widest text-outline mb-2" data-i18n="footer.quick_links"></h4>
                <ul class="flex flex-col md:flex-row md:gap-6 space-y-2 md:space-y-0">
                    @foreach ($links as $link)
                        <li>
                            <a href="{{ $link['href'] }}" data-i18n="{{ $link['key'] }}"
                               class="text-text font-medium text-[0.85rem] md:text-sm uppercase tracking-wider relative
                                      hover:text-primary transition-all
                                      after:block after:h-px after:w-0 after:bg-primary after:mt-0.5 after:transition-all hover:after:w-full">
                                {{ strtoupper(str_replace('nav.', '', $link['key'])) }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="flex flex-col items-start md:items-end gap-3">
                <h4 class="font-semibold text-sm uppercase tracking-widest text-outline mb-2" data-i18n="footer.connect"></h4>
                <div class="flex flex-col md:flex-row md:gap-4 gap-2">
                    @foreach ($socials as $social)
                        <a href="{{ $social['href'] }}" target="_blank"
                           class="group relative flex items-center gap-2 p-2 border border-border rounded-lg
                                  text-text font-medium text-[0.85rem] md:text-sm
                                  hover:text-primary hover:border-primary transition-all overflow-hidden">
                            <i class="{{ $social['icon'] }} text-lg md:text-xl group-hover:scale-110 transition-transform"></i>
                        </a>
                    @endforeach
                </div>
            </div>

        </div>

        <div class="border-t border-border pt-4 text-xs text-muted text-center md:text-left flex flex-col md:flex-row justify-between items-center gap-1 mt-6">
            <span data-i18n="footer.copyright"> {{ date('Y') }}</span>
            <span class="text-primary font-semibold">{{ $brand }}</span>
        </div>

    </div>
</footer>
