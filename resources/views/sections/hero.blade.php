<style>
@keyframes orbit {
    from { transform: rotate(0deg); }
    to   { transform: rotate(360deg); }
}

@keyframes orbit-reverse {
    from { transform: rotate(360deg); }
    to   { transform: rotate(0deg); }
}

@keyframes counter {
    from { transform: rotate(0deg); }
    to   { transform: rotate(-360deg); }
}

@keyframes sunPulse {
    0%,100% { transform: scale(1); }
    50% { transform: scale(1.05); }
}

.orbit {
    position: absolute;
    border-radius: 9999px;
    border: 1px dashed rgba(239,68,68,.35);
    animation: orbit linear infinite;
}

.orbit.reverse {
    animation-name: orbit-reverse;
}

.planet {
    animation: counter linear infinite;
}
</style>

<div class="max-w-6xl mx-auto grid lg:grid-cols-2 gap-12 items-center relative z-10">

    <!-- ================= TEXT ================= -->
    <div class="text-center lg:text-left">
        <!-- badge -->
        <span class="inline-flex items-center gap-2 px-4 py-1 mb-6
            rounded-full border border-border bg-surface text-sm text-muted">
            <i class="fa-solid fa-code text-primary"></i>
            Available for Collaboration
        </span>

        <!-- title -->
        <h2 class="text-4xl md:text-6xl font-extrabold mb-6 leading-tight">
            Hi, Saya
            <span class="bg-linear-to-r from-primary to-red-400 bg-clip-text text-transparent">
                Fadlan
            </span>
            <br>
            <span class="text-3xl md:text-4xl text-muted font-semibold">
                Full Stack Developer
            </span>
        </h2>

        <!-- desc -->
        <p class="text-muted max-w-xl mb-8 leading-relaxed">
            Fokus membangun aplikasi web modern dengan struktur
            <strong class="text-text">backend</strong> yang jelas,
            <strong class="text-text">frontend</strong> responsif,
            dan sistem siap produksi.
        </p>

        <!-- CTA -->
        <div class="flex gap-4 flex-wrap justify-center lg:justify-start">
            <a href="#projects"
                class="px-7 py-3 rounded-xl bg-primary text-white font-semibold
                shadow-lg shadow-primary/30 hover:opacity-90 transition">
                Lihat Project
            </a>

            <a href="#contact"
                class="px-7 py-3 rounded-xl border border-border
                hover:border-primary hover:text-primary transition">
                Kontak Saya
            </a>
        </div>

        <!-- social -->
        <div class="mt-8 flex gap-4 justify-center lg:justify-start">
            <a href="https://github.com/Fadlan079" target="_blank" class="social-btn">
                <i class="fa-brands fa-github"></i>
            </a>
            <a href="https://www.linkedin.com/in/fadlan-firdaus-148344386/" target="_blank" class="social-btn">
                <i class="fa-brands fa-linkedin"></i>
            </a>
            <a href="https://instagram.com/fdln007" target="_blank" class="social-btn">
                <i class="fa-brands fa-instagram"></i>
            </a>
            <a href="mailto:fadlanfirdaus220@gmail.com" class="social-btn">
                <i class="fa-solid fa-envelope"></i>
            </a>
            <a href="https://wa.me/6282210732928" target="_blank" class="social-btn">
                <i class="fa-brands fa-whatsapp"></i>
            </a>
        </div>
    </div>

    
</div>