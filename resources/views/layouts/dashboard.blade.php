<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flag-icons@7.2.1/css/flag-icons.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;600;700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <title>Fadlan | @yield('title')</title>
    <style>
        html {
            scroll-behavior: smooth;
        }

        * {
            scrollbar-width: thin;
            scrollbar-color: var(--color-primary) transparent;
        }

        ::-webkit-scrollbar {
            width: 10px;
        }

        ::-webkit-scrollbar-track {
            background: transparent;
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(180deg,
                    color-mix(in srgb, var(--color-primary) 90%, white),
                    var(--color-primary));
            border-radius: 999px;
            border: 2px solid transparent;
            background-clip: content-box;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(180deg,
                    color-mix(in srgb, var(--color-primary) 70%, white),
                    color-mix(in srgb, var(--color-primary) 90%, black));
        }

        ::selection {
            background: var(--color-primary);
            color: var(--color-text);
        }

        .cta-bubble {
            position: absolute;
            top: 60%;
            left: 50%;
            width: 240%;
            height: 220%;
            background: var(--cta-bubble-color, var(--color-primary));
            border-radius: 50%;
            transform: translateX(-50%) scale(0);
            z-index: 0;
        }

        [data-i18n] {
            visibility: hidden;
        }

        .text-outline {
            color: transparent;
            -webkit-text-stroke: 1px var(--color-text);
            text-stroke: 1px var(--color-text);
        }

        .text-outline-muted {
            color: transparent;
            -webkit-text-stroke: 1px var(--color-muted);
        }
    </style>

    @stack('head')

    <script>
        (function() {
            const userTheme = '{{ auth()->check() ? auth()->user()->setting->theme ?? 'system' : 'system' }}';
            const userLocale =
                '{{ auth()->check() && (auth()->user()->setting->locale ?? false) ? auth()->user()->setting->locale : '' }}';

            localStorage.setItem('theme', userTheme);
            if (userLocale) {
                localStorage.setItem('locale', userLocale);
                document.cookie = `locale=${userLocale};path=/;max-age=31536000`;
            }

            function applyTheme(theme) {
                if (theme === 'dark') {
                    document.documentElement.classList.add('theme-dark');
                    document.documentElement.classList.remove('theme-light');
                } else if (theme === 'light') {
                    document.documentElement.classList.add('theme-light');
                    document.documentElement.classList.remove('theme-dark');
                } else {
                    if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
                        document.documentElement.classList.add('theme-dark');
                        document.documentElement.classList.remove('theme-light');
                    } else {
                        document.documentElement.classList.add('theme-light');
                        document.documentElement.classList.remove('theme-dark');
                    }
                }
            }

            applyTheme(userTheme);
            if (userTheme === 'system') {
                window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', e => {
                    if (e.matches) {
                        document.documentElement.classList.add('theme-dark');
                        document.documentElement.classList.remove('theme-light');
                    } else {
                        document.documentElement.classList.add('theme-light');
                        document.documentElement.classList.remove('theme-dark');
                    }
                });
            }
        })();
    </script>
</head>

<body class="bg-bg text-text overflow-x-hidden"
    data-cursor-theme="{{ auth()->check() ? auth()->user()->setting->cursor_theme ?? 'viewfinder' : 'viewfinder' }}">

    <div id="custom-cursor-container" class="fixed inset-0 pointer-events-none z-[9999]">

        <div class="cursor-theme" id="cursor-viewfinder">
            <div class="v-dot"></div>
            <div class="v-box">
                <div class="v-corner top-left"></div>
                <div class="v-corner top-right"></div>
                <div class="v-corner bottom-left"></div>
                <div class="v-corner bottom-right"></div>
            </div>
        </div>

        <div class="cursor-theme" id="cursor-blob">
            <div class="b-circle">
                <div class="b-plus"></div>
            </div>
            <div class="b-trail"></div>
        </div>

        <div class="cursor-theme" id="cursor-terminal">
            <div class="t-block"></div>
        </div>
    </div>

    <style>
        @media (pointer: fine) {
            body:not([data-cursor-theme="native"]) {
                cursor: none !important;
            }

            body:not([data-cursor-theme="native"]) *,
            body:not([data-cursor-theme="native"]) a,
            body:not([data-cursor-theme="native"]) button,
            body:not([data-cursor-theme="native"]) [role="button"],
            body:not([data-cursor-theme="native"]) input,
            body:not([data-cursor-theme="native"]) select,
            body:not([data-cursor-theme="native"]) textarea,
            body:not([data-cursor-theme="native"]) label {
                cursor: none !important;
            }

            body[data-cursor-theme="native"],
            body[data-cursor-theme="native"] *,
            body[data-cursor-theme="native"] a,
            body[data-cursor-theme="native"] button {
                cursor: auto !important;
            }

            body[data-cursor-theme="native"] a,
            body[data-cursor-theme="native"] button,
            body[data-cursor-theme="native"] [role="button"] {
                cursor: pointer !important;
            }
        }

        #custom-cursor-container {
            pointer-events: none;
            z-index: 999999;
        }

        .cursor-theme {
            display: none;
        }

        @media (pointer: fine) {
            body[data-cursor-theme="viewfinder"] #cursor-viewfinder { display: block; }
            body[data-cursor-theme="blob"] #cursor-blob { display: block; }
            body[data-cursor-theme="terminal"] #cursor-terminal { display: block; }
        }

        @media (pointer: coarse), (max-width: 768px) {
            #custom-cursor-container {
                display: none !important;
            }
            body, body *, a, button, input, textarea {
                cursor: auto !important;
            }
        }

        .v-dot {
            position: fixed; width: 4px; height: 4px; background: var(--color-primary); border-radius: 50%;
            transform: translate(-50%, -50%); transition: transform 0.2s, background 0.2s, border 0.2s; will-change: left, top;
        }
        .v-box {
            position: fixed; width: 32px; height: 32px; transform: translate(-50%, -50%);
            transition: width 0.3s, height 0.3s, transform 0.3s; will-change: left, top, width, height, transform;
        }
        .v-corner {
            position: absolute; width: 8px; height: 8px; border-color: color-mix(in srgb, var(--color-primary) 40%, transparent);
            border-style: solid; border-width: 0; transition: border-width 0.3s, border-color 0.3s;
        }
        .v-corner.top-left { top: 0; left: 0; border-top-width: 1px; border-left-width: 1px; }
        .v-corner.top-right { top: 0; right: 0; border-top-width: 1px; border-right-width: 1px; }
        .v-corner.bottom-left { bottom: 0; left: 0; border-bottom-width: 1px; border-left-width: 1px; }
        .v-corner.bottom-right { bottom: 0; right: 0; border-bottom-width: 1px; border-right-width: 1px; }
        .v-box.is-hovering { width: 48px; height: 48px; transform: translate(-50%, -50%) rotate(45deg); }
        .v-box.is-hovering .v-corner { border-color: var(--color-primary); border-width: 2px; }
        .v-dot.is-hovering { transform: translate(-50%, -50%) scale(2.5); background: transparent; border: 1px solid var(--color-primary); }
        .v-box.is-clicking { width: 20px; height: 20px; }
        .v-dot.is-clicking { transform: translate(-50%, -50%) scale(0.5); }

        .b-circle {
            position: fixed; width: 32px; height: 32px; border-radius: 50%; transform: translate(-50%, -50%);
            backdrop-filter: invert(100%); -webkit-backdrop-filter: invert(100%); background: transparent;
            border: 1px solid rgba(255, 255, 255, 0.15); transition: width 0.2s ease-out, height 0.2s ease-out;
            will-change: left, top, width, height; display: flex; align-items: center; justify-content: center;
        }
        .b-trail {
            position: fixed; width: 8px; height: 8px; border-radius: 50%; transform: translate(-50%, -50%);
            backdrop-filter: invert(100%); -webkit-backdrop-filter: invert(100%); background: rgba(255, 255, 255, 0.8);
            will-change: left, top;
        }
        .b-plus { width: 4px; height: 4px; border-radius: 50%; background: rgba(255, 255, 255, 0.4); }
        .b-circle.is-hovering { width: 64px; height: 64px; border-color: rgba(255, 255, 255, 0.4); }
        .b-circle.is-clicking { width: 20px; height: 20px; }

        .t-block {
            position: fixed; width: 4px; height: 4px; background: var(--color-primary); transform: translate(-50%, -50%);
            will-change: left, top; transition: all 0.2s ease-out; box-shadow: 0 0 8px var(--color-primary); border-radius: 1px;
        }
        .t-block::after {
            content: "> SYS_IDLE"; position: absolute; top: 10px; left: 10px; font-family: monospace; font-size: 9px;
            font-weight: bold; color: var(--color-primary); letter-spacing: 1px; white-space: nowrap; opacity: 0.7;
            transition: all 0.2s ease-out; text-shadow: 0 0 4px color-mix(in srgb, var(--color-primary) 50%, transparent);
        }
        .t-block.is-hovering { width: 24px; height: 24px; background: transparent; border: 1.5px solid var(--color-text); box-shadow: 0 0 10px rgba(255, 255, 255, 0.1); }
        .t-block.is-hovering::after { content: "> TARGET_LOCK"; color: var(--color-text); opacity: 1; top: 16px; left: 16px; }
        .t-block.is-clicking { transform: translate(-50%, -50%) scale(0.7); border-color: #ef4444; border-width: 2px; }
        .t-block.is-clicking::after { content: "> EXECUTE()"; color: #ef4444; }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (window.matchMedia("(pointer: coarse)").matches || window.innerWidth <= 768) {
                return;
            }

            const body = document.body;
            let mouseX = window.innerWidth / 2;
            let mouseY = window.innerHeight / 2;

            const container = document.getElementById('custom-cursor-container');
            if (!container) {
                body.setAttribute('data-cursor-theme', 'native');
                return;
            }

            const vDot = document.querySelector('.v-dot');
            const vBox = document.querySelector('.v-box');
            let vBoxX = mouseX, vBoxY = mouseY;

            const bCircle = document.querySelector('.b-circle');
            const bTrail = document.querySelector('.b-trail');
            let bTrailX = mouseX, bTrailY = mouseY;

            const tBlock = document.querySelector('.t-block');

            document.addEventListener('mousemove', (e) => {
                mouseX = e.clientX;
                mouseY = e.clientY;
                const theme = body.getAttribute('data-cursor-theme');

                if (theme === 'viewfinder' && vDot) {
                    vDot.style.left = mouseX + 'px';
                    vDot.style.top = mouseY + 'px';
                } else if (theme === 'blob' && bCircle) {
                    bCircle.style.left = mouseX + 'px';
                    bCircle.style.top = mouseY + 'px';
                } else if (theme === 'terminal' && tBlock) {
                    tBlock.style.left = mouseX + 'px';
                    tBlock.style.top = mouseY + 'px';
                }
            });

            function animateCursor() {
                const theme = body.getAttribute('data-cursor-theme');

                if (theme === 'viewfinder' && vBox) {
                    vBoxX += (mouseX - vBoxX) * 0.15;
                    vBoxY += (mouseY - vBoxY) * 0.15;
                    vBox.style.left = vBoxX + 'px';
                    vBox.style.top = vBoxY + 'px';
                } else if (theme === 'blob' && bTrail) {
                    bTrailX += (mouseX - bTrailX) * 0.18;
                    bTrailY += (mouseY - bTrailY) * 0.18;
                    bTrail.style.left = bTrailX + 'px';
                    bTrail.style.top = bTrailY + 'px';
                }
                requestAnimationFrame(animateCursor);
            }
            animateCursor();

            document.addEventListener('mouseover', (e) => {
                const clickable = e.target.closest('a, button, [role="button"], input, select, textarea, label');
                if (clickable) {
                    if (vDot) vDot.classList.add('is-hovering');
                    if (vBox) vBox.classList.add('is-hovering');
                    if (bCircle) bCircle.classList.add('is-hovering');
                    if (tBlock) tBlock.classList.add('is-hovering');
                } else {
                    if (vDot) vDot.classList.remove('is-hovering');
                    if (vBox) vBox.classList.remove('is-hovering');
                    if (bCircle) bCircle.classList.remove('is-hovering');
                    if (tBlock) tBlock.classList.remove('is-hovering');
                }
            });

            document.addEventListener('mousedown', () => {
                if (vDot) vDot.classList.add('is-clicking');
                if (vBox) vBox.classList.add('is-clicking');
                if (bCircle) bCircle.classList.add('is-clicking');
                if (tBlock) tBlock.classList.add('is-clicking');
            });

            document.addEventListener('mouseup', () => {
                if (vDot) vDot.classList.remove('is-clicking');
                if (vBox) vBox.classList.remove('is-clicking');
                if (bCircle) bCircle.classList.remove('is-clicking');
                if (tBlock) tBlock.classList.remove('is-clicking');
            });
        });
    </script>

    <x-sidebar brand="Fadlan" :menuGroups="[
        'Monitoring' => [
            [
                'label' => 'Overview',
                'href' => route('dashboard.home'),
                'route' => 'dashboard.home',
                'icon' => 'fa-solid fa-house',
            ],
        ],
        'Portfolio' => [
            [
                'label' => 'Project',
                'href' => route('dashboard.projects.index'),
                'route' => 'dashboard.projects.*',
                'icon' => 'fa-solid fa-folder',
            ],
            [
                'label' => 'Skills',
                'href' => route('dashboard.skills.index'),
                'route' => 'dashboard.skills.*',
                'icon' => 'fa-solid fa-code-branch',
            ],
            [
                'label' => 'Contacts',
                'href' => route('dashboard.contacts.index'),
                'route' => 'dashboard.contacts.*',
                'icon' => 'fa-solid fa-satellite-dish',
            ],
        ],
        'System' => [
            [
                'label' => 'Trash',
                'href' => route('dashboard.trash'),
                'route' => 'dashboard.trash',
                'icon' => 'fa-solid fa-trash',
            ],
            [
                'label' => 'Settings',
                'href' => route('dashboard.settings'),
                'route' => 'dashboard.settings',
                'icon' => 'fa-solid fa-gear',
            ],
            [
                'label' => 'Account',
                'href' => route('dashboard.account.edit'),
                'route' => 'dashboard.account.*',
                'icon' => 'fa-solid fa-user-astronaut',
            ],
        ],
    ]" />

    <x-global-modal />
    <x-confirm-modal />

    <main class="relative z-10 flex-1 md:ml-54 min-h-screen">
        @yield('content')
    </main>

    @stack('scripts')
</body>
</html>
