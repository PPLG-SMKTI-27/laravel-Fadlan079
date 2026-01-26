<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flag-icons@7.2.1/css/flag-icons.min.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;600;700&display=swap" rel="stylesheet">
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
        background: linear-gradient(
            180deg,
            color-mix(in srgb, var(--color-primary) 90%, white),
            var(--color-primary)
        );
        border-radius: 999px;
        border: 2px solid transparent;
        background-clip: content-box;
        }

        ::-webkit-scrollbar-thumb:hover {
        background: linear-gradient(
            180deg,
            color-mix(in srgb, var(--color-primary) 70%, white),
            color-mix(in srgb, var(--color-primary) 90%, black)
        );
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
        .project-card {
        scroll-snap-align: start;
        }
    </style>
</head>
<body class="bg-bg text-text overflow-x-hidden">

    @if (session('success'))
    <div
        id="success-alert"
        class="fixed top-6 right-6 z-50
            flex items-center gap-3
            px-4 py-3
            max-w-sm
            bg-success text-text
            shadow-lg backdrop-blur
            text-sm
            animate-slide-in">
        <span class="font-medium">
            {{ session('success') }}
        </span>

        <button
            onclick="closeAlert()"
            class="ml-auto text-white/80 hover:text-white">
            ✕
        </button>
    </div>

    <script>
        const alertEl = document.getElementById('success-alert');

        function closeAlert() {
            alertEl.classList.add('opacity-0', 'translate-x-4');
            setTimeout(() => alertEl.remove(), 300);
        }

        setTimeout(closeAlert, 3000);
    </script>

    <style>
    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateX(16px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    .animate-slide-in {
        animation: slideIn 0.4s ease-out;
    }
    </style>
    @endif

    <main>
        @yield('content')
    </main>


    @yield('script')
    @vite(['resources/js/app.js'])
</body>
</html>
