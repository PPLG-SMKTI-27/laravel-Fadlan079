<style>
.hero-ribbons {
    position: absolute;
    inset: 0;
    font-family: 'Space Grotesk', sans-serif;
    letter-spacing: 0.08em;
}

.ribbon {
    mask-image: linear-gradient(
    to right,
    transparent,
    black 10%,
    black 90%,
    transparent
  );

    position: absolute;
    width: 240%;
    left: -40%;
    overflow: hidden;
}

.ribbon-track {
    display: flex;
    gap: 3rem;
    white-space: nowrap;
    width: max-content;
    will-change: transform;
}

.ribbon-blue {
    top: 75%;
    transform: rotate(-5deg);

background-color: var(--color-primary);

    padding: 1rem 0;
    color: var(--color-bg);
    opacity: 0.9;
}


.ribbon-white {
    top: 85%;
    transform: rotate(5deg);

    background: rgba(255,255,255,0.08);
    backdrop-filter: blur(6px);

    border: 1px solid rgba(255,255,255,0.35);

    color: rgba(255,255,255,0.9);
    padding: 1rem 0;
    opacity: 0.85;
}


.hero-floats {
    position: absolute;
    inset: 0;
}

.hero-section {
    perspective: 1000px;
}

.float-icon {
    position: absolute;
    width: 52px;
    height: 52px;
    border-radius: 999px;
    display: flex;
    align-items: center;
    justify-content: center;
    transform-style: preserve-3d;

    background: var(--color-surface);
    border: 1px solid var(--color-border);
    color: var(--color-text);

    font-size: 1.4rem;
    box-shadow: 0 20px 40px rgba(0,0,0,.2);
    backdrop-filter: blur(8px);

    transition: transform .3s ease, color .3s ease;
}

.float-icon:hover {
    transform: scale(1.15);
    color: var(--color-primary);
}

.icon-github {
    top: 19%;
    left: 18%;
}

.icon-linkedin {
    top: 18%;
    right: 22%;
}

.icon-instagram {
    bottom: 30%;
    left: 20%;
}

.icon-mail {
    bottom: 30%;
    right: 26%;
}

.icon-whatsapp {
    top: 45%;
    right: 12%;
}

@media (max-width: 768px) {
    .hero-floats {
        pointer-events: none;
    }

    .float-icon {
        width: 40px;
        height: 40px;
        font-size: 1.1rem;
        opacity: 0.6;
        box-shadow: 0 10px 20px rgba(0,0,0,.15);
        transform: none !important;
    }

    .icon-instagram,
    .icon-mail,
    .icon-whatsapp {
        bottom: 30%;
        top: auto;
        transform: scale(0.85);
        opacity: 0.5;
    }

    .icon-instagram { left: 20%; }
    .icon-mail { left: 45%; bottom:80%; transform: translateX(-50%) scale(0.85); }
    .icon-whatsapp { right: 20%; }
}

/* === HERO TYPO STYLE (THE CODE vibe) === */
.hero-title {
  font-family: 'Space Grotesk', sans-serif;
  letter-spacing: 0.06em;
  text-transform: uppercase;
}

/* SOLID TEXT */
.hero-solid {
  position: relative;
  color: #eaeaea;
  font-weight: 800;
}

/* subtle scanline */
.hero-solid::after {
  content: attr(data-text);
  position: absolute;
  inset: 0;
  background: repeating-linear-gradient(
    to bottom,
    rgba(255,255,255,.15),
    rgba(255,255,255,.15) 1px,
    transparent 1px,
    transparent 3px
  );
  -webkit-background-clip: text;
  color: transparent;
  pointer-events: none;
}

/* OUTLINE TEXT */
.hero-outline {
  color: transparent;
  -webkit-text-stroke: 1px rgba(255,255,255,.6);
  font-weight: 700;
}

/* RESPONSIVE SCALE */
.hero-big {
  font-size: clamp(2.6rem, 8vw, 5.5rem);
  line-height: 0.95;
}

.hero-sub {
  font-size: clamp(1.2rem, 3vw, 1.8rem);
  letter-spacing: 0.04em;
}

.ribbon-track span {
  font-size: 0.85rem;
  font-weight: 600;
  letter-spacing: 0.25em;
  opacity: 0.85;
}

.ribbon-track span em {
  font-style: normal;
  opacity: 0.5;
  margin: 0 0.75rem;
}

@keyframes ribbon-move {
  from {
    transform: translateX(0);
  }
  to {
    transform: translateX(-50%);
  }
}

.ribbon-track {
  animation: ribbon-move 35s linear infinite;
}

.ribbon-white .ribbon-track {
  animation-direction: reverse;
  animation-duration: 45s;
}
</style>
<div class="hero-ribbons pointer-events-none absolute inset-0 overflow-hidden z-0 font-bold">
    <div class="ribbon ribbon-blue">
        <div class="ribbon-track">
            <span>
            FULL STACK DEVELOPER
            <em>◆</em>
            WEB APPLICATION
            </span>
            <span>
            FULL STACK DEVELOPER
            <em>◆</em>
            WEB APPLICATION
            </span>
            <span>
            FULL STACK DEVELOPER
            <em>◆</em>
            WEB APPLICATION
            </span>
            <span>
            FULL STACK DEVELOPER
            <em>◆</em>
            WEB APPLICATION
            </span>
        </div>
    </div>

    <div class="ribbon ribbon-white">
        <div class="ribbon-track">
            <span>
            FULL STACK DEVELOPER
            <em>◆</em>
            WEB APPLICATION
            </span>
            <span>
            FULL STACK DEVELOPER
            <em>◆</em>
            WEB APPLICATION
            </span>
            <span>
            FULL STACK DEVELOPER
            <em>◆</em>
            WEB APPLICATION
            </span>
            <span>
            FULL STACK DEVELOPER
            <em>◆</em>
            WEB APPLICATION
            </span>
        </div>
    </div>
</div>

<div class="hero-floats pointer-events-auto">

    <a href="https://github.com/Fadlan079" target="_blank"
       class="float-icon icon-github" data-depth="1.2">
        <i class="fa-brands fa-github"></i>
    </a>

    <a href="https://www.linkedin.com/in/fadlan-firdaus-148344386/"
       target="_blank"
       class="float-icon icon-linkedin" data-depth="0.9">
        <i class="fa-brands fa-linkedin"></i>
    </a>

    <a href="https://instagram.com/fdln007"
       target="_blank"
       class="float-icon icon-instagram" data-depth="0.7">
        <i class="fa-brands fa-instagram"></i>
    </a>

    <a href="mailto:fadlanfirdaus220@gmail.com"
       class="float-icon icon-mail" data-depth="0.6">
        <i class="fa-solid fa-envelope"></i>
    </a>

    <a href="https://wa.me/6282210732928"
       target="_blank"
       class="float-icon icon-whatsapp" data-depth="1.0">
        <i class="fa-brands fa-whatsapp"></i>
    </a>

</div>

<div class="hero-center relative z-10 text-center max-w-3xl -top-10">
    <div class="text-center">
        <span
            data-i18n="collaboration"
            class="hero-badge inline-flex items-center gap-2 px-4 py-1 mb-6
            rounded-full border border-border bg-surface text-sm text-muted">
        </span>

        <h2 class="hero-title mb-6 leading-tight text-center">

            <div
                class="hero-big hero-solid"
                data-text="HI">
                <span data-i18n="hi"></span>
            </div>

            <div class="hero-big hero-outline">
                FADLAN
            </div>

            <div class="hero-sub text-muted mt-4 font-semibold">
                Full Stack Developer
            </div>

        </h2>

        <p class="hero-desc max-w-xl mb-5 text-sm md:text-base leading-loose
                tracking-wide text-muted/80 relative">
            <span class="hero-desc-line"></span>
            <span data-i18n="hero.description"></span>
        </p>

        <div class="flex gap-4 flex-wrap justify-center text-md">
            <div class="flex justify-center">
                <a
                    href="pages.project"
                    class="cta-btn relative overflow-hidden px-8 py-3
                        bg-primary text-text font-semibold"
                        style="--cta-bubble-color: var(--color-bg);">
                    <span class="cta-bubble"></span>

                    <span class="cta-text relative z-10" data-i18n="more.projects"> </span>
                </a>
            </div>
            <div class="flex justify-center">
                @if (!session('is_login'))
                    <a
                        href="/login"
                        class="cta-btn relative overflow-hidden px-8 py-3
                            border-2 border-border text-text font-semibold"
                        style="--cta-bubble-color: var(--color-primary);">

                        <span class="cta-bubble"></span>
                        <span class="cta-text relative z-10">Login</span>
                    </a>
                @else
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button
                            type="submit"
                            class="cta-btn relative overflow-hidden px-8 py-3
                                border-2 border-border text-text font-semibold"
                            style="--cta-bubble-color: #ef4444;">

                            <span class="cta-bubble"></span>
                            <span class="cta-text relative z-10">Logout</span>
                        </button>
                    </form>
                @endif
            </div>
        </div>
    </div>
</div>
