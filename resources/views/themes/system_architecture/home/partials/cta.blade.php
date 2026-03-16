<style>
    @keyframes marquee {
        0% {
            transform: translateX(0%);
        }

        100% {
            transform: translateX(calc(-50% - 1rem));
        }
    }

    .animate-marquee {
        animation: marquee 60s linear infinite;
    }

    .animate-marquee:hover {
        animation-play-state: paused;
    }
</style>
<section
    class="relative z-10 py-40 border-t border-border overflow-hidden bg-background flex items-center justify-center min-h-[60vh]">

    <div class="absolute w-[200%] flex whitespace-nowrap opacity-[0.03] hover:opacity-10 transition-opacity duration-700 cursor-default pointer-events-auto z-0 select-none"
        aria-hidden="true">
        <div
            class="animate-marquee text-[clamp(8rem,15vw,12rem)] font-extrabold tracking-tighter leading-none flex gap-8 text-text">
            <span data-i18n="home.cta.title">Mari Berkolaborasi -</span>
            <span data-i18n="home.cta.status">Siap Menerima Proyek</span>
            <span data-i18n="home.cta.title">Mari Berkolaborasi -</span>
            <span data-i18n="home.cta.status">Siap Menerima Proyek</span>
        </div>
    </div>

    <div class="relative z-10 max-w-4xl mx-auto px-6 text-center flex flex-col items-center group">

        <div
            class="inline-flex items-center gap-2 mb-8 bg-surface/50 border border-border px-4 py-2  backdrop-blur-md">
            <span class="w-2 h-2 rounded-full bg-primary animate-pulse"></span>
            <p class="text-xs uppercase tracking-widest text-muted" data-i18n="home.cta.status">Siap Menerima Proyek</p>
        </div>

        <h3 class="text-[clamp(3rem,7vw,5rem)] font-semibold leading-[1.05] mb-10 tracking-tight">
            <span data-i18n="home.cta.title">Mari Berkolaborasi</span>
        </h3>

        <div
            class="flex flex-col sm:flex-row justify-center items-center gap-6 font-mono text-sm uppercase tracking-widest font-bold">

            <a href="{{ route('portofolio.contact') }}"
                class="relative overflow-hidden flex items-center justify-center gap-3
                    px-8 py-4 min-w-[220px]
                    bg-primary text-background border-2 border-primary
                    hover:bg-transparent hover:text-text
                    transition-all duration-300 transform hover:-translate-y-1
                    shadow-[0_0_20px_rgba(var(--color-primary-rgb),0.2)] group">

                <span data-i18n="home.cta.button_message">Tulis Pesan</span>
                <i class="fa-solid fa-angle-right transition-transform duration-300 group-hover:translate-x-1"></i>
            </a>

            <a href="mailto:fadlanfirdaus220@gmail.com"
                class="flex items-center justify-center gap-3
                    px-8 py-4 min-w-[220px]
                    border-2 border-border bg-surface/30 backdrop-blur-sm text-text
                    hover:border-primary transition-colors duration-300">

                <span data-i18n="home.cta.button_email">Kirim Via Email</span>
            </a>

        </div>

    </div>
</section>
