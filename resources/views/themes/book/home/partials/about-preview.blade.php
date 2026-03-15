<section id="about-teaser" class="py-24 px-5 max-w-6xl mx-auto relative z-10">

    <div class="relative bg-surface rounded-lg shadow-[0_15px_40px_-15px_rgba(0,0,0,0.1)] border border-border p-8 md:p-14 lg:p-20 flex flex-col md:flex-row gap-12 lg:gap-16 items-center overflow-hidden">

        <div class="absolute inset-0 pointer-events-none opacity-[0.03]" style="background-image: radial-gradient(var(--color-text) 1px, transparent 1px); background-size: 20px 20px;"></div>

        <div class="absolute top-0 bottom-0 left-0 w-10 bg-container border-r border-border/50 flex flex-col justify-center gap-16 items-center py-10 shadow-inner">
            <div class="w-4 h-4 rounded-full bg-bg shadow-inner border border-border/70"></div>
            <div class="w-4 h-4 rounded-full bg-bg shadow-inner border border-border/70"></div>
            <div class="w-4 h-4 rounded-full bg-bg shadow-inner border border-border/70"></div>
            <div class="w-4 h-4 rounded-full bg-bg shadow-inner border border-border/70"></div>
        </div>

        <div class="w-full md:w-3/5 pl-6 sm:pl-10 relative z-10">

        <div class="inline-block px-3 py-1 border-2 border-primary/40 text-primary font-bold text-[10px] tracking-widest uppercase mb-8 transform -rotate-2 opacity-80 rounded-sm">
            PROFIL SINGKAT
        </div>

            <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold tracking-tight mb-6 text-text leading-[1.1]">
                Tentang Saya<br />
                <span class="text-muted font-medium italic font-serif">Latar belakang</span>
            </h2>

            <p class="text-base md:text-lg text-muted leading-relaxed mb-8 font-medium">
                Saya adalah siswa SMK TI Airlangga generasi ke-24 yang berfokus pada pengembangan web full-stack.
                Saat ini saya sedang mempelajari Laravel dan Vue, serta senang mengeksplorasi berbagai teknologi baru untuk mengembangkan kemampuan saya.
            </p>

            <div class="flex flex-wrap gap-3 mb-10">
                <span class="px-3 py-1.5 bg-bg text-muted border border-border text-[10px] font-bold uppercase tracking-widest shadow-sm rotate-1">
                    <i class="fa-solid fa-location-dot text-primary mr-1"></i> Indonesia
                </span>
                <span class="px-3 py-1.5 bg-bg text-muted border border-border text-[10px] font-bold uppercase tracking-widest shadow-sm -rotate-1">
                    <i class="fa-solid fa-code text-primary mr-1"></i> Aplikasi Web
                </span>
                <span class="px-3 py-1.5 bg-success/10 text-success border border-success/20 text-[10px] font-bold uppercase tracking-widest shadow-sm rotate-1 flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-success animate-pulse"></span> Tersedia
                </span>
            </div>

            <a href="{{ route('portofolio.about') }}"
            class="inline-flex items-center gap-3 text-sm font-bold text-text hover:text-primary transition-colors group/link border-b border-text hover:border-primary pb-1">
                Lihat Selengkapnya
                <i class="fa-solid fa-feather-pointed transform group-hover/link:translate-x-1 transition-transform text-xs"></i>
            </a>
        </div>

        <div class="hidden w-full md:w-2/5 md:flex justify-center relative z-10 mt-8 md:mt-0">

            <div class="relative bg-white p-3 pb-16 shadow-[0_15px_30px_-5px_rgba(0,0,0,0.15)] border border-border/50 w-64 sm:w-72 transform rotate-3 hover:rotate-0 transition-transform duration-500">

                <div class="absolute -top-3 left-1/2 -translate-x-1/2 w-20 h-6 bg-surface/80 border border-border/50 shadow-sm backdrop-blur-md -rotate-2 z-20"></div>

                <div class="aspect-[4/5] overflow-hidden bg-container border border-border/50 relative">
                    <div class="absolute inset-0 opacity-[0.03] pointer-events-none z-10" style="background-image: radial-gradient(#000 0.5px, transparent 0.5px); background-size: 6px 6px;"></div>

                    <img src="{{ $profilePhoto }}" alt="Foto Fadlan"
                        onerror="this.style.display='none'; document.getElementById('fallback-profile').style.display='flex';"
                        class="w-full h-full object-cover grayscale-[0.3] hover:grayscale-0 transition-all duration-700">

                    <div id="fallback-profile" style="display:none;" class="flex-col items-center justify-center w-full h-full text-muted p-4 text-center bg-surface">
                        <i class="fa-regular fa-image text-3xl opacity-30 mb-2"></i>
                        <span class="text-[9px] uppercase tracking-widest font-bold">Kliping Kosong</span>
                    </div>
                </div>

                <div class="absolute -bottom-4 -left-4 bg-warning text-yellow-900 px-3 py-1.5 text-[10px] font-black uppercase tracking-widest shadow-md -rotate-[6deg] border-l-4 border-yellow-500">
                    Author Profile
                </div>
            </div>

        </div>
    </div>
</section>
