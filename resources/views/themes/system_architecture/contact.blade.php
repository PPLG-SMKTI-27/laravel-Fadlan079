@extends('layouts.main')
@section('title', 'Contact')
@push('head')
    @vite('resources/css/contact.css')
@endpush
@section('content')
@push('head')
    <style>
        .custom-scrollbar::-webkit-scrollbar {
            width: 4px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: transparent;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: color-mix(in srgb, var(--color-primary) 50%, transparent);
        }
        
    </style>
@endpush

<section class="relative min-h-screen bg-background overflow-hidden font-sans">
    <div class="absolute inset-0 pointer-events-none opacity-[0.02] z-0"
        style="background-image: linear-gradient(var(--color-text) 1px, transparent 1px), linear-gradient(90deg, var(--color-text) 1px, transparent 1px); background-size: 64px 64px;">
    </div>

    <section id="contact-hero" class="relative z-10 pt-32 pb-16 max-w-7xl mx-auto px-6 space-y-8">

        <div class="flex items-center gap-2 font-mono text-[10px] uppercase tracking-widest text-primary mb-4">
            <span class="w-2 h-2 bg-primary animate-pulse shadow-[0_0_8px_var(--color-primary)]"></span>
            <span data-i18n="contact.header.label">Saluran Komunikasi Terbuka</span>
        </div>

        <h1
            class="text-[clamp(3.5rem,9vw,7rem)] font-bold font-mono tracking-tighter leading-[1] uppercase flex flex-col md:flex-row md:items-end gap-2 md:gap-6">
            <div>
                <span class="text-text block" data-i18n="contact.hero.title">Mari Berdiskusi</span>
            </div>

            <div class="hidden md:block w-6 h-16 bg-primary animate-pulse mb-3 shadow-[0_0_15px_var(--color-primary)]">
            </div>
        </h1>

        <p class="text-sm md:text-base font-mono text-muted max-w-2xl leading-relaxed border-l-2 border-primary/50 pl-4"
            data-i18n="contact.header.description">
            Punya proyek, pertanyaan, atau kritik dan saran? Silakan kirim pesan Anda di bawah.
        </p>
    </section>

    <section id="request-section" class="relative z-10 max-w-6xl mx-auto px-6 py-20 space-y-12">
        <div class="grid lg:grid-cols-[1fr_320px] gap-10 items-start">

            <div
                class="relative border border-border/50 bg-surface/10 p-1 group hover:border-primary/50 transition-colors">

                <div class="absolute top-0 left-0 w-3 h-3 border-t-2 border-l-2 border-primary/50"></div>
                <div class="absolute bottom-0 right-0 w-3 h-3 border-b-2 border-r-2 border-primary/50"></div>

                <div class="bg-[#050505] p-6 md:p-8 flex flex-col h-full">

                    <div class="flex flex-col sm:flex-row items-stretch sm:items-center justify-between gap-4 border-b border-border/30 pb-4 mb-6">
                        <div class="flex items-center gap-3">
                            <i class="fa-solid fa-terminal text-primary"></i>
                            <span
                                class="text-sm font-mono font-bold uppercase tracking-widest text-text"
                                data-i18n="contact.form.title">Tulis Pesan</span>
                        </div>
                    </div>

                    <form action="{{ route('portofolio.contact.send') }}" method="POST" class="space-y-6">
                        @csrf

                        <div class="space-y-3">
                            <span
                                class="text-[10px] font-mono uppercase tracking-widest text-primary flex items-center gap-2"
                                data-i18n="contact.form.type_label">
                                Jenis Pesan:
                            </span>
                            <div class="grid grid-cols-1 sm:flex sm:flex-wrap gap-2 sm:gap-3">
                                <label class="cursor-pointer relative">
                                    <input type="radio" name="type" value="project" class="peer sr-only"
                                        {{ old('type', 'project') === 'project' ? 'checked' : '' }}>
                                    <div
                                        class="w-full text-center sm:text-left px-3 py-2 sm:px-4 sm:py-2 border border-border/50 bg-surface/20 text-[10px] font-mono uppercase tracking-widest text-muted peer-checked:border-primary peer-checked:bg-primary/10 peer-checked:text-primary transition-colors"
                                        data-i18n="contact.form.type.project">
                                        [ Inisiasi Proyek ]
                                    </div>
                                </label>
                                <label class="cursor-pointer relative">
                                    <input type="radio" name="type" value="collab" class="peer sr-only"
                                        {{ old('type') === 'collab' ? 'checked' : '' }}>
                                    <div
                                        class="w-full text-center sm:text-left px-3 py-2 sm:px-4 sm:py-2 border border-border/50 bg-surface/20 text-[10px] font-mono uppercase tracking-widest text-muted peer-checked:border-primary peer-checked:bg-primary/10 peer-checked:text-primary transition-colors"
                                        data-i18n="contact.form.type.collab">
                                        [ Kolaborasi ]
                                    </div>
                                </label>
                                <label class="cursor-pointer relative">
                                    <input type="radio" name="type" value="inquiry" class="peer sr-only"
                                        {{ old('type') === 'inquiry' ? 'checked' : '' }}>
                                    <div
                                        class="w-full text-center sm:text-left px-3 py-2 sm:px-4 sm:py-2 border border-border/50 bg-surface/20 text-[10px] font-mono uppercase tracking-widest text-muted peer-checked:border-primary peer-checked:bg-primary/10 peer-checked:text-primary transition-colors"
                                        data-i18n="contact.form.type.inquiry">
                                        [ Pertanyaan Umum ]
                                    </div>
                                </label>
                                <label class="cursor-pointer relative">
                                    <input type="radio" name="type" value="feedback" class="peer sr-only"
                                        {{ old('type') === 'feedback' ? 'checked' : '' }}>
                                    <div
                                        class="w-full text-center sm:text-left px-3 py-2 sm:px-4 sm:py-2 border border-border/50 bg-surface/20 text-[10px] font-mono uppercase tracking-widest text-muted peer-checked:border-primary peer-checked:bg-primary/10 peer-checked:text-primary transition-colors"
                                        data-i18n="contact.form.type.feedback">
                                        [ Kritik & Saran ]
                                    </div>
                                </label>
                            </div>
                        </div>

                        <div class="space-y-3 relative group">
                            <label for="input-sender"
                                class="text-[10px] font-mono uppercase tracking-widest text-primary flex items-center gap-2 group-focus-within:text-sky-400 transition-colors"
                                data-i18n="contact.form.sender_label">
                                Dikirim Dari (Email):
                            </label>
                            <div class="relative">
                                <input type="text" name="sender" id="input-sender"
                                    class="w-full bg-surface/30 border border-border/70 px-4 py-3 font-mono text-sm text-text focus:outline-none focus:border-sky-400 focus:bg-sky-400/5 transition-colors placeholder:text-muted/30 {{ $errors->has('sender') ? 'border-red-500' : '' }}"
                                    placeholder="email.anda@domain.com" value="{{ old('sender') }}">
                                <div
                                    class="absolute right-3 top-1/2 -translate-y-1/2 w-1.5 h-4 bg-sky-400/30 group-focus-within:bg-sky-400 group-focus-within:animate-pulse pointer-events-none">
                                </div>
                            </div>
                            @error('sender')
                                <span
                                    class="text-[10px] font-mono text-red-500 bg-red-500/10 px-2 py-1 border border-red-500/30 inline-block mt-1">>
                                    {{ $message }}</span>
                            @enderror
                        </div>

                        <div class="space-y-3 relative group">
                            <label for="input-subject"
                                class="text-[10px] font-mono uppercase tracking-widest text-primary flex items-center gap-2 group-focus-within:text-sky-400 transition-colors"
                                data-i18n="contact.form.subject_label">
                                Judul Pesan:
                            </label>
                            <div class="relative">
                                <input type="text" name="subject" id="input-subject"
                                    class="w-full bg-surface/30 border border-border/70 px-4 py-3 font-mono text-sm text-text focus:outline-none focus:border-sky-400 focus:bg-sky-400/5 transition-colors placeholder:text-muted/30 {{ $errors->has('subject') ? 'border-red-500' : '' }}"
                                    placeholder="Tulis judul pesan di sini..." value="{{ old('subject') }}">
                                <div
                                    class="absolute right-3 top-1/2 -translate-y-1/2 w-1.5 h-4 bg-sky-400/30 group-focus-within:bg-sky-400 group-focus-within:animate-pulse pointer-events-none">
                                </div>
                            </div>
                            @error('subject')
                                <span
                                    class="text-[10px] font-mono text-red-500 bg-red-500/10 px-2 py-1 border border-red-500/30 inline-block mt-1">>
                                    {{ $message }}</span>
                            @enderror
                        </div>

                        <div class="space-y-3 relative group pt-4 border-t border-border/30">
                            <label for="input-message"
                                class="text-[10px] font-mono uppercase tracking-widest text-primary flex items-center gap-2 group-focus-within:text-sky-400 transition-colors"
                                data-i18n="contact.form.message_label">
                                Isi Pesan:
                            </label>
                            <div class="relative">
                                <textarea rows="5" name="message" id="input-message"
                                    class="w-full bg-surface/30 border border-border/70 px-4 py-3 font-mono text-sm text-text focus:outline-none focus:border-sky-400 focus:bg-sky-400/5 transition-colors placeholder:text-muted/30 custom-scrollbar {{ $errors->has('message') ? 'border-red-500' : '' }}"
                                    placeholder="Ceritakan detail kebutuhan atau pertanyaan Anda...">{{ old('message') }}</textarea>
                            </div>
                            @error('message')
                                <span
                                    class="text-[10px] font-mono text-red-500 bg-red-500/10 px-2 py-1 border border-red-500/30 inline-block mt-1">>
                                    {{ $message }}</span>
                            @enderror
                        </div>

                        <div class="pt-6 flex flex-col sm:flex-row items-center justify-between gap-4">
                            <div
                                class="text-[10px] font-mono text-muted uppercase tracking-widest flex items-center gap-2">
                                <i class="fa-solid fa-clock text-primary"></i>
                                <span data-i18n="contact.date_label">Tanggal:</span> {{ now()->format('d M Y') }}
                            </div>

                            <button type="submit"
                                class="w-full sm:w-auto relative group px-8 py-3 bg-primary/10 border border-primary text-primary font-mono text-xs font-bold uppercase tracking-widest hover:bg-primary hover:text-background transition-colors flex items-center justify-center gap-3 shadow-[0_0_15px_rgba(var(--color-primary-rgb),0.15)]">
                                <span data-i18n="contact.submit_button">[ Kirim Pesan ]</span>
                                <i
                                    class="fa-solid fa-paper-plane group-hover:translate-x-1 group-hover:-translate-y-1 transition-transform"></i>
                            </button>
                        </div>

                    </form>
                </div>
            </div>

            <div class="space-y-4">
                @php
                    $siteUser = \App\Models\User::first();
                    $igRaw = $siteUser?->instagram ?? '@fdln007';
                    $igLink = str_starts_with($igRaw, 'http') ? $igRaw : 'https://instagram.com/' . ltrim($igRaw, '@');
                    $ghRaw = $siteUser?->github ?? 'Fadlan079';
                    $ghLink = str_starts_with($ghRaw, 'http') ? $ghRaw : 'https://github.com/' . ltrim($ghRaw, '@');
                    $liRaw = $siteUser?->linkedin ?? 'fadlanfirdaus';
                    $liLink = str_starts_with($liRaw, 'http') ? $liRaw : 'https://linkedin.com/in/' . ltrim($liRaw, '@');
                @endphp

                <p class="text-[10px] font-mono uppercase tracking-widest text-primary border-b border-border/50 pb-2">
                    <i class="fa-solid fa-satellite-dish"></i>
                    <span data-i18n="contact.alternative_network">Jaringan Alternatif</span>
                </p>

                <a href="{{ $ghLink }}" target="_blank"
                class="block border border-border/50 bg-surface/10 p-4 rounded-lg hover:border-primary/40 hover:bg-primary/5 transition group">

                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 flex items-center justify-center rounded-md bg-surface/30 text-muted group-hover:text-primary transition">
                            <i class="fa-brands fa-github text-lg"></i>
                        </div>

                        <div>
                            <p class="text-sm font-mono font-bold text-text">GitHub</p>
                            <p class="text-[10px] font-mono text-muted uppercase" data-i18n="contact.github.description">Lihat Repositori</p>
                        </div>

                        <i class="fa-solid fa-arrow-up-right-from-square ml-auto text-xs text-muted group-hover:text-primary"></i>
                    </div>

                </a>

                <a href="{{ $liLink }}" target="_blank"
                class="block border border-border/50 bg-surface/10 p-4 rounded-lg hover:border-primary/40 hover:bg-primary/5 transition group">

                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 flex items-center justify-center rounded-md bg-surface/30 text-muted group-hover:text-primary transition">
                            <i class="fa-brands fa-linkedin text-lg"></i>
                        </div>

                        <div>
                            <p class="text-sm font-mono font-bold text-text">LinkedIn</p>
                            <p class="text-[10px] font-mono text-muted uppercase" data-i18n="contact.linkedin.description">Koneksi Profesional</p>
                        </div>

                        <i class="fa-solid fa-arrow-up-right-from-square ml-auto text-xs text-muted group-hover:text-primary"></i>
                    </div>

                </a>

                <a href="{{ $igLink }}" target="_blank"
                class="block border border-border/50 bg-surface/10 p-4 rounded-lg hover:border-primary/40 hover:bg-primary/5 transition group">

                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 flex items-center justify-center rounded-md bg-surface/30 text-muted group-hover:text-primary transition">
                            <i class="fa-brands fa-instagram text-lg"></i>
                        </div>

                        <div>
                            <p class="text-sm font-mono font-bold text-text">Instagram</p>
                            <p class="text-[10px] font-mono text-muted uppercase" data-i18n="contact.instagram.description">Log Personal</p>
                        </div>

                        <i class="fa-solid fa-arrow-up-right-from-square ml-auto text-xs text-muted group-hover:text-primary"></i>
                    </div>

                </a>

                <a href="https://wa.me/{{ $waNumber }}?text={{ urlencode('Halo! Saya tertarik berdiskusi tentang proyek Anda.') }}"
                target="_blank"
                class="block border border-border/50 bg-surface/10 p-4 rounded-lg hover:border-primary/40 hover:bg-primary/5 transition group">

                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 flex items-center justify-center rounded-md bg-surface/30 text-muted group-hover:text-primary transition">
                            <i class="fa-brands fa-whatsapp text-lg"></i>
                        </div>

                        <div>
                            <p class="text-sm font-mono font-bold text-text">WhatsApp</p>
                            <p class="text-[10px] font-mono text-muted uppercase" data-i18n="contact.whatsapp.description">Chat Langsung</p>
                        </div>

                        <i class="fa-solid fa-arrow-up-right-from-square ml-auto text-xs text-muted group-hover:text-primary"></i>
                    </div>

                </a>

                <div class="mt-8 bg-container border border-border rounded-xl p-5">

                    <div class="flex items-center gap-2 mb-3">
                        <i class="fa-solid fa-circle-info text-primary text-sm"></i>
                        <p class="text-xs font-bold uppercase tracking-widest text-muted"
                        data-i18n="contact.notes.label">
                            Catatan
                        </p>
                    </div>

                    <p class="text-sm text-muted leading-relaxed"
                    data-i18n="contact.notes.description">
                        Pesan Anda akan dibaca sesegera mungkin. Waktu respons rata-rata adalah 1 hingga 2 hari kerja.
                    </p>

                </div>
            </div>
    </section>

    <section id="contact-end" class="mt-5 py-16 border-t border-border/50 text-center">

        <div class="max-w-4xl mx-auto px-6">

            <h3 class="text-xl font-bold text-muted mb-2"
                data-i18n="contact.footer.text">
                Menunggu pesan Anda
            </h3>
            <div class="w-16 h-1 bg-border mx-auto mt-6"></div>
        </div>

    </section>
</section>
@endsection
