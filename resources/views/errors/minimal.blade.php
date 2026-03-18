<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @php
        // TANGKAP DATA YIELD KE VARIABEL
        $errCode = trim($__env->yieldContent('code', '500'));
        $errMsg = trim($__env->yieldContent('message', 'SERVER ERROR'));
    @endphp

    <title>Error {{ $errCode }} - Halaman Sobek</title>

    {{-- Tailwind CSS CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        bg: '#E5E4DF',
                        surface: '#FDFCF8',
                        ink: '#1e293b',
                        muted: '#64748b',
                        marginLine: '#f87171',
                        primary: '#A67C52'
                    }
                }
            }
        }
    </script>

    <style>
        body {
            background-color: #E5E4DF;
            /* Pattern meja kayu / tekstur kertas dasar */
            background-image: radial-gradient(#d4d4d8 1px, transparent 1px);
            background-size: 20px 20px;
        }

        /* Garis Buku Tulis */
        .ruled-paper {
            background-image: repeating-linear-gradient(
                transparent,
                transparent 31px,
                #cbd5e1 31px,
                #cbd5e1 32px
            );
            background-position: 0 1rem;
        }

        /* Tinta Mblobor (Ink Bleed) */
        .ink-bleed {
            color: #1e293b;
            text-shadow: 0px 0px 3px rgba(30, 41, 59, 0.4),
                         1px 1px 1px rgba(30, 41, 59, 0.7);
        }

        /* Animasi coretan perlahan */
        @keyframes drawLine {
            from { stroke-dashoffset: 200; }
            to { stroke-dashoffset: 0; }
        }
        .scribble-line {
            stroke-dasharray: 200;
            stroke-dashoffset: 200;
            animation: drawLine 0.6s ease-out 0.3s forwards;
        }
    </style>
</head>
<body class="antialiased font-serif text-ink selection:bg-primary/30 selection:text-ink min-h-screen flex items-center justify-center p-4 md:p-8">

    <div class="w-full max-w-lg relative" style="filter: drop-shadow(2px 10px 15px rgba(0,0,0,0.15));">

        <div class="relative w-full bg-surface ruled-paper pt-12 pb-20 px-6 md:px-10 overflow-hidden"
             style="clip-path: polygon(
                 0% 3%, 5% 0%, 10% 4%, 15% 1%, 20% 5%, 25% 0%, 30% 4%, 35% 1%, 40% 5%, 45% 0%, 50% 4%, 55% 1%, 60% 5%, 65% 0%, 70% 4%, 75% 1%, 80% 5%, 85% 0%, 90% 4%, 95% 1%, 100% 4%,
                 100% 96%, 95% 100%, 90% 95%, 85% 99%, 80% 96%, 75% 100%, 70% 96%, 65% 99%, 60% 95%, 55% 100%, 50% 96%, 45% 99%, 40% 95%, 35% 100%, 30% 96%, 25% 99%, 20% 95%, 15% 100%, 10% 96%, 5% 99%, 0% 95%
             );">

            <div class="absolute top-0 bottom-0 left-8 md:left-12 w-0.5 bg-marginLine/50"></div>
            <div class="absolute top-0 bottom-0 left-[38px] md:left-[54px] w-px bg-marginLine/40"></div>

            <div class="absolute top-20 right-12 w-8 h-8 bg-ink/10 rounded-full blur-[2px] opacity-70 scale-x-125 rotate-45 pointer-events-none"></div>
            <div class="absolute top-24 right-8 w-3 h-3 bg-ink/20 rounded-full blur-[1px] opacity-80 pointer-events-none"></div>
            <div class="absolute bottom-16 left-20 w-12 h-10 bg-primary/10 rounded-full blur-[4px] opacity-50 pointer-events-none"></div>

            <div class="relative z-10 pl-8 md:pl-12 flex flex-col items-center text-center mt-6">

                <div class="relative inline-block mb-4 group cursor-default">
                    <h1 class="text-[6rem] md:text-[8rem] font-bold leading-none ink-bleed italic tracking-tighter mix-blend-multiply">
                        {{ $errCode }}
                    </h1>

                    <svg class="absolute top-1/2 left-[-10%] w-[120%] h-24 -translate-y-1/2 pointer-events-none" viewBox="0 0 200 100" preserveAspectRatio="none">
                        <path d="M10,50 Q50,40 100,55 T190,45" fill="none" stroke="#1e293b" stroke-width="6" class="scribble-line" opacity="0.8"/>
                        <path d="M15,60 Q80,70 185,35" fill="none" stroke="#1e293b" stroke-width="4" class="scribble-line" opacity="0.6"/>
                    </svg>
                </div>

                <div class="mb-10 space-y-1 relative">
                    <p class="text-2xl md:text-3xl font-medium ink-bleed italic -rotate-1">
                        "This page couldn't be written..."
                    </p>
                    <p class="text-sm text-muted font-sans font-medium uppercase tracking-widest mt-4">
                        [ {{ $errMsg }} ]
                    </p>
                </div>

                <div class="flex flex-col sm:flex-row items-center justify-center gap-6 mt-8 w-full font-sans">

                    <button onclick="window.history.back()"
                            class="group relative flex items-center gap-2 text-sm font-bold text-muted hover:text-ink transition-colors">
                        <i class="fa-solid fa-arrow-left-long group-hover:-translate-x-1 transition-transform"></i>
                        <span class="border-b border-dashed border-muted group-hover:border-ink pb-0.5">Balik Halaman</span>
                    </button>

                    <span class="hidden sm:inline text-muted/30">|</span>

                    <a href="/"
                       class="group relative flex items-center gap-2 text-sm font-bold text-ink hover:text-primary transition-colors">
                        <span class="border-b border-dashed border-ink group-hover:border-primary pb-0.5">Ke Halaman Awal</span>
                        <i class="fa-solid fa-pen-nib group-hover:translate-x-1 group-hover:-translate-y-1 transition-transform"></i>
                    </a>

                </div>

            </div>
        </div>
    </div>

</body>
</html>
