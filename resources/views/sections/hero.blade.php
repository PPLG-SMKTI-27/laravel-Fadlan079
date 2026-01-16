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

<div class="max-w-6xl mx-auto mt-12 md:mt-0 grid lg:grid-cols-2 gap-12 items-center relative z-10">

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

    <!-- ================= ORBIT ANIMATION ================= -->
    <div class="relative flex items-center justify-center h-[380px]">

        <!-- glow background -->
        <div class="absolute w-72 h-72 bg-primary/20 blur-3xl rounded-full"></div>

        <!-- ===== SUN ===== -->
        <div class="relative z-20">
            <div class="absolute inset-0 bg-primary/30 blur-3xl rounded-full"></div>
            <div class="w-48 h-48 rounded-full
                animate-[sunPulse_6s_ease-in-out_infinite]
                bg-gradient-to-br from-primary via-red-400 to-primary
                shadow-[0_0_120px_rgba(239,68,68,0.9)]">
            </div>
        </div>

        <!-- ===== ORBIT BESAR ===== -->
        <div class="orbit w-105 h-105" style="animation-duration:36s">
            <div class="absolute top-0 left-1/2 -translate-x-1/2">
                <i class="fa-brands fa-laravel text-red-500 text-5xl planet" style="animation-duration:36s"></i>
            </div>
            <div class="absolute right-0 top-1/2 -translate-y-1/2">
                <i class="fa-brands fa-php text-indigo-400 text-5xl planet" style="animation-duration:36s"></i>
            </div>
            <div class="absolute bottom-0 left-1/2 -translate-x-1/2">
                <i class="fa-brands fa-js text-yellow-400 text-5xl planet" style="animation-duration:36s"></i>
            </div>
            <div class="absolute left-0 top-1/2 -translate-y-1/2">
                <i class="fa-brands fa-html5 text-orange-500 text-5xl planet" style="animation-duration:36s"></i>
            </div>
        </div>

        <!-- ===== ORBIT MEDIUM ===== -->
        <div class="orbit reverse w-75 h-75 opacity-80" style="animation-duration:26s">
            <div class="absolute top-0 left-1/2 -translate-x-1/2">
                <i class="fa-brands fa-css3-alt text-blue-500 text-4xl planet" style="animation-duration:26s"></i>
            </div>
            <div class="absolute right-0 top-1/2 -translate-y-1/2">
                <i class="fa-brands fa-bootstrap text-purple-500 text-4xl planet" style="animation-duration:26s"></i>
            </div>
            <div class="absolute bottom-0 left-1/2 -translate-x-1/2">
                <i class="fa-brands fa-git-alt text-orange-500 text-4xl planet" style="animation-duration:26s"></i>
            </div>
        </div>

        <!-- ===== ORBIT KECIL ===== -->
        <div class="orbit w-50 h-50 opacity-70" style="animation-duration:18s">
            <div class="absolute top-0 left-1/2 -translate-x-1/2">
                <i class="fa-solid fa-database text-sky-400 text-3xl planet" style="animation-duration:18s"></i>
            </div>
            <div class="absolute bottom-0 left-1/2 -translate-x-1/2">
                <i class="fa-brands fa-linux text-3xl planet" style="animation-duration:18s"></i>
            </div>
        </div>

    </div>
</div>