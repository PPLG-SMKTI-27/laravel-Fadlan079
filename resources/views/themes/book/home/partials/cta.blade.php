<section id="contact" class="py-24 px-5 max-w-4xl mx-auto relative z-10 mb-12">

    <div class="relative bg-surface p-10 md:p-14 shadow-[0_20px_50px_-15px_rgba(0,0,0,0.15)] border border-border transform rotate-1 hover:rotate-0 transition-transform duration-500 rounded-sm">

        <div class="absolute inset-0 pointer-events-none opacity-20"
             style="background-image: repeating-linear-gradient(transparent, transparent 31px, var(--color-border) 31px, var(--color-border) 32px); background-position: 0 40px;">
        </div>

        <div class="absolute top-0 bottom-0 left-8 md:left-12 w-0.5 bg-primary/30 pointer-events-none"></div>

        <div class="absolute -top-4 right-10 md:right-20 w-24 h-8 bg-container/90 backdrop-blur-sm border border-border/50 shadow-sm rotate-[4deg] z-20"></div>

        <div class="absolute top-8 right-8 w-24 h-24 rounded-full border-[3px] border-primary/20 flex flex-col items-center justify-center opacity-30 rotate-[-15deg] pointer-events-none hidden sm:flex">
            <span class="text-[8px] font-black uppercase tracking-widest text-primary border-b border-primary/30 pb-1 mb-1">PRIORITAS</span>
            <i class="fa-regular fa-paper-plane text-xl text-primary"></i>
        </div>

        <div class="relative z-10 pl-6 sm:pl-12">

            <div class="inline-flex items-center gap-2 px-3 py-1 bg-bg border border-border shadow-sm transform -rotate-1 mb-8">
                <i class="fa-solid fa-thumbtack text-primary text-[10px]"></i>
                <span class="text-[10px] font-bold tracking-widest uppercase text-muted" data-i18n="home.cta.status">
                    Siap Menerima Proyek
                </span>
            </div>

            <h2 class="text-4xl md:text-5xl font-bold tracking-tight mb-6 text-text leading-tight font-serif italic"
            data-i18n="home.cta.title">
                Mari Berkolaborasi
            </h2>

            <p class="text-base md:text-lg text-muted mb-10 max-w-lg leading-relaxed font-medium"
            data-i18n="home.cta.description">
                Jika Anda memiliki ide atau proyek yang ingin dikembangkan, saya terbuka untuk berdiskusi dan bekerja sama.
            </p>

            <div class="flex flex-col sm:flex-row items-start sm:items-center gap-6 w-full">

                <a href="{{ route('portofolio.contact') }}"
                   class="w-full sm:w-auto px-8 py-3.5 bg-text text-bg rounded-sm font-bold uppercase tracking-widest text-xs hover:-translate-y-1 transition-transform shadow-md flex items-center justify-center gap-3">
                    <span data-i18n="home.cta.button_message">Tulis Pesan</span>
                    <i class="fa-solid fa-feather-pointed text-sm"></i>
                </a>

                <a href="mailto:fadlanfirdaus220@gmail.com"
                   class="group flex items-center justify-center gap-2 text-sm font-bold text-muted hover:text-primary transition-colors w-max">
                    <i class="fa-regular fa-envelope"></i>
                    <span class="border-b border-border group-hover:border-primary pb-0.5 transition-colors"
                    data-i18n="home.cta.button_email">Kirim via Email</span>
                </a>

            </div>

        </div>

    </div>
</section>
