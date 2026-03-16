@extends('layouts.main')
@section('title', 'Contact')
@push('head')
    @vite('resources/css/contact.css')
@endpush
@section('content')

    <div class="relative min-h-screen bg-background overflow-hidden font-sans">
        <div class="absolute inset-0 pointer-events-none opacity-[0.02] z-0"
            style="background-image: linear-gradient(var(--color-text) 1px, transparent 1px), linear-gradient(90deg, var(--color-text) 1px, transparent 1px); background-size: 64px 64px;">
        </div>

        <section id="contact-hero" class="relative z-10 pt-32 pb-16 max-w-7xl mx-auto px-6 space-y-8">

            <div class="flex items-center gap-2 font-mono text-[10px] uppercase tracking-widest text-primary mb-4">
                <span class="w-2 h-2 bg-primary animate-pulse shadow-[0_0_8px_var(--color-primary)]"></span>
                >> SYS_DIR / PUBLIC / SECURE_COMMS
            </div>

            <h1
                class="text-[clamp(3.5rem,9vw,7rem)] font-bold font-mono tracking-tighter leading-[1] uppercase flex flex-col md:flex-row md:items-end gap-2 md:gap-6">
                <div>
                    <span class="text-text block" data-i18n="contact.hero.title">INIT_COMMS</span>
                    <span class="block text-muted/50 text-[clamp(2rem,5vw,4rem)]"
                        data-i18n="contact.hero.subtitle">ESTABLISH_UPLINK</span>
                </div>

                <div class="hidden md:block w-6 h-16 bg-primary animate-pulse mb-3 shadow-[0_0_15px_var(--color-primary)]">
                </div>
            </h1>

            <p class="text-sm md:text-base font-mono text-muted max-w-2xl leading-relaxed border-l-2 border-primary/50 pl-4"
                data-i18n="contact.hero.description">
                Awaiting transmission protocol. Transmit your project parameters, system inquiries, or collaboration
                requests. Channel is encrypted and open.
            </p>
        </section>

        <section id="request-section" class="relative z-10 max-w-6xl mx-auto px-6 py-20 space-y-12">

            <header id="request-header" class="space-y-4 max-w-xl border-b border-border/50 pb-6">
                <p class="text-[10px] font-mono uppercase tracking-widest text-primary"
                    data-i18n="contact.folder.breadcrumb">> DATA_PACKET_CONSTRUCTION</p>
                <h2 class="text-[clamp(2rem,4vw,3rem)] font-bold font-mono tracking-tighter uppercase text-text"
                    data-i18n="contact.folder.title">TRANSMISSION_TERMINAL</h2>
                <p class="text-xs font-mono text-muted leading-relaxed" data-i18n="contact.folder.description">All data
                    strings are stored in secure memory blocks and evaluated individually.</p>
            </header>

            <div class="grid md:grid-cols-[1fr_300px] gap-8 items-start">

                <div
                    class="relative border border-border/50 bg-surface/10 p-1 group hover:border-primary/50 transition-colors">

                    <div class="absolute top-0 left-0 w-3 h-3 border-t-2 border-l-2 border-primary/50"></div>
                    <div class="absolute bottom-0 right-0 w-3 h-3 border-b-2 border-r-2 border-primary/50"></div>

                    <div class="bg-[#050505] p-6 md:p-8 flex flex-col h-full">

                        <div class="flex flex-col sm:flex-row items-stretch sm:items-center justify-between gap-4 border-b border-border/30 pb-4 mb-6">
                            <div class="flex items-center gap-3">
                                <i class="fa-solid fa-terminal text-primary"></i>
                                <span
                                    class="text-sm font-mono font-bold uppercase tracking-widest text-text">COMMS_INTERFACE</span>
                            </div>
                        </div>

                        <form action="{{ route('portofolio.contact.send') }}" method="POST" class="space-y-6">
                            @csrf

                            <div class="space-y-3">
                                <span
                                    class="text-[10px] font-mono uppercase tracking-widest text-primary flex items-center gap-2"
                                    data-i18n="contact.folder.field_type">
                                    > PARAM_01: PAYLOAD_TYPE
                                </span>
                                <div class="grid grid-cols-1 sm:flex sm:flex-wrap gap-2 sm:gap-3">
                                    <label class="cursor-pointer relative">
                                        <input type="radio" name="type" value="project" class="peer sr-only"
                                            {{ old('type', 'project') === 'project' ? 'checked' : '' }}>
                                        <div
                                            class="w-full text-center sm:text-left px-3 py-2 sm:px-4 sm:py-2 border border-border/50 bg-surface/20 text-[10px] font-mono uppercase tracking-widest text-muted peer-checked:border-primary peer-checked:bg-primary/10 peer-checked:text-primary transition-colors">
                                            [ INIT_PROJECT ]
                                        </div>
                                    </label>
                                    <label class="cursor-pointer relative">
                                        <input type="radio" name="type" value="collab" class="peer sr-only"
                                            {{ old('type') === 'collab' ? 'checked' : '' }}>
                                        <div
                                            class="w-full text-center sm:text-left px-3 py-2 sm:px-4 sm:py-2 border border-border/50 bg-surface/20 text-[10px] font-mono uppercase tracking-widest text-muted peer-checked:border-primary peer-checked:bg-primary/10 peer-checked:text-primary transition-colors">
                                            [ COLLAB_SYNC ]
                                        </div>
                                    </label>
                                    <label class="cursor-pointer relative">
                                        <input type="radio" name="type" value="inquiry" class="peer sr-only"
                                            {{ old('type') === 'inquiry' ? 'checked' : '' }}>
                                        <div
                                            class="w-full text-center sm:text-left px-3 py-2 sm:px-4 sm:py-2 border border-border/50 bg-surface/20 text-[10px] font-mono uppercase tracking-widest text-muted peer-checked:border-primary peer-checked:bg-primary/10 peer-checked:text-primary transition-colors">
                                            [ GEN_INQUIRY ]
                                        </div>
                                    </label>
                                    <label class="cursor-pointer relative">
                                        <input type="radio" name="type" value="feedback" class="peer sr-only"
                                            {{ old('type') === 'feedback' ? 'checked' : '' }}>
                                        <div
                                            class="w-full text-center sm:text-left px-3 py-2 sm:px-4 sm:py-2 border border-border/50 bg-surface/20 text-[10px] font-mono uppercase tracking-widest text-muted peer-checked:border-primary peer-checked:bg-primary/10 peer-checked:text-primary transition-colors">
                                            [ FEEDBACK ]
                                        </div>
                                    </label>
                                </div>
                            </div>

                            <div class="space-y-3 relative group">
                                <label for="input-sender"
                                    class="text-[10px] font-mono uppercase tracking-widest text-primary flex items-center gap-2 group-focus-within:text-sky-400 transition-colors"
                                    data-i18n="contact.folder.field_from">
                                    > PARAM_02: ORIGIN_NODE (EMAIL)
                                </label>
                                <div class="relative">
                                    <input type="text" name="sender" id="input-sender"
                                        class="w-full bg-surface/30 border border-border/70 px-4 py-3 font-mono text-sm text-text focus:outline-none focus:border-sky-400 focus:bg-sky-400/5 transition-colors placeholder:text-muted/30 {{ $errors->has('sender') ? 'border-red-500' : '' }}"
                                        placeholder="guest_node@domain.com" value="{{ old('sender') }}"
                                        data-i18n-placeholder="contact.folder.field_from_placeholder">
                                    <div
                                        class="absolute right-3 top-1/2 -translate-y-1/2 w-1.5 h-4 bg-sky-400/30 group-focus-within:bg-sky-400 group-focus-within:animate-pulse pointer-events-none">
                                    </div>
                                </div>
                                @error('sender')
                                    <span
                                        class="text-[10px] font-mono text-red-500 bg-red-500/10 px-2 py-1 border border-red-500/30 inline-block mt-1">>
                                        SYS_ERR: {{ $message }}</span>
                                @enderror
                            </div>

                            <div class="space-y-3 relative group">
                                <label for="input-subject"
                                    class="text-[10px] font-mono uppercase tracking-widest text-primary flex items-center gap-2 group-focus-within:text-sky-400 transition-colors"
                                    data-i18n="contact.folder.field_subject">
                                    > PARAM_03: SUBJECT_IDENTIFIER
                                </label>
                                <div class="relative">
                                    <input type="text" name="subject" id="input-subject"
                                        class="w-full bg-surface/30 border border-border/70 px-4 py-3 font-mono text-sm text-text focus:outline-none focus:border-sky-400 focus:bg-sky-400/5 transition-colors placeholder:text-muted/30 {{ $errors->has('subject') ? 'border-red-500' : '' }}"
                                        placeholder="Input transmission subject..." value="{{ old('subject') }}"
                                        data-i18n-placeholder="contact.folder.field_subject_placeholder">
                                    <div
                                        class="absolute right-3 top-1/2 -translate-y-1/2 w-1.5 h-4 bg-sky-400/30 group-focus-within:bg-sky-400 group-focus-within:animate-pulse pointer-events-none">
                                    </div>
                                </div>
                                @error('subject')
                                    <span
                                        class="text-[10px] font-mono text-red-500 bg-red-500/10 px-2 py-1 border border-red-500/30 inline-block mt-1">>
                                        SYS_ERR: {{ $message }}</span>
                                @enderror
                            </div>

                            <div class="space-y-3 relative group pt-4 border-t border-border/30">
                                <label for="input-message"
                                    class="text-[10px] font-mono uppercase tracking-widest text-primary flex items-center gap-2 group-focus-within:text-sky-400 transition-colors">
                                    > PARAM_04: DATA_PAYLOAD
                                </label>
                                <div class="relative">
                                    <textarea rows="5" name="message" id="input-message"
                                        class="w-full bg-surface/30 border border-border/70 px-4 py-3 font-mono text-sm text-text focus:outline-none focus:border-sky-400 focus:bg-sky-400/5 transition-colors placeholder:text-muted/30 custom-scrollbar {{ $errors->has('message') ? 'border-red-500' : '' }}"
                                        placeholder="Awaiting input stream..." data-i18n-placeholder="contact.folder.field_message_placeholder">{{ old('message') }}</textarea>
                                </div>
                                @error('message')
                                    <span
                                        class="text-[10px] font-mono text-red-500 bg-red-500/10 px-2 py-1 border border-red-500/30 inline-block mt-1">>
                                        SYS_ERR: {{ $message }}</span>
                                @enderror
                            </div>

                            <div class="pt-6 flex flex-col sm:flex-row items-center justify-between gap-4">
                                <div
                                    class="text-[10px] font-mono text-muted uppercase tracking-widest flex items-center gap-2">
                                    <i class="fa-solid fa-clock text-primary"></i> LOG_TIME: {{ now()->format('d M Y') }}
                                </div>

                                <button type="submit"
                                    class="w-full sm:w-auto relative group px-8 py-3 bg-primary/10 border border-primary text-primary font-mono text-xs font-bold uppercase tracking-widest hover:bg-primary hover:text-background transition-colors flex items-center justify-center gap-3 shadow-[0_0_15px_rgba(var(--color-primary-rgb),0.15)]">
                                    <span>[ TRANSMIT_DATA ]</span>
                                    <i
                                        class="fa-solid fa-paper-plane group-hover:translate-x-1 group-hover:-translate-y-1 transition-transform"></i>
                                </button>
                            </div>

                        </form>
                    </div>
                </div>

                <div id="system-note" class="hidden md:flex flex-col gap-4">
                    <div class="border border-border/50 bg-surface/10 p-5 space-y-5">
                        <p class="text-[10px] font-mono uppercase tracking-widest text-primary border-b border-border/50 pb-2 flex items-center gap-2"
                            data-i18n="contact.folder.filed">
                            <i class="fa-solid fa-server"></i> RECENT_LOGS
                        </p>

                        <div class="flex items-start gap-3 group">
                            <div class="w-1.5 h-1.5 bg-green-500 mt-1.5 shadow-[0_0_5px_#22c55e]"></div>
                            <div>
                                <p
                                    class="text-xs font-mono font-bold text-text group-hover:text-primary transition-colors">
                                    TX_REQ_091.DAT</p>
                                <p class="text-[9px] font-mono text-muted mt-1 uppercase"
                                    data-i18n="contact.folder.req_01_status">STATUS: DECRYPTED // JAN_2025</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-3 group">
                            <div class="w-1.5 h-1.5 bg-amber-400 mt-1.5 shadow-[0_0_5px_#fbbf24] animate-pulse"></div>
                            <div>
                                <p
                                    class="text-xs font-mono font-bold text-text group-hover:text-primary transition-colors">
                                    TX_REQ_092.DAT</p>
                                <p class="text-[9px] font-mono text-muted mt-1 uppercase"
                                    data-i18n="contact.folder.req_02_status">STATUS: PROCESSING // FEB_2025</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-3 opacity-50">
                            <div class="w-1.5 h-1.5 bg-border mt-1.5 border border-muted"></div>
                            <div>
                                <p class="text-xs font-mono font-bold text-text">TX_REQ_CURRENT.TMP</p>
                                <p class="text-[9px] font-mono text-muted mt-1 uppercase"
                                    data-i18n="contact.folder.req_new_status">STATUS: AWAITING_INPUT</p>
                            </div>
                        </div>

                        <div class="border-t border-border/50 pt-4 mt-2">
                            <p class="text-[9px] font-mono text-muted leading-relaxed"
                                data-i18n="contact.folder.sidebar_note">
                                > INFO: Terminal accepts limited packet drops to prevent buffer overflow. Avg latency:
                                48-120 hrs.
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <section id="social-section" class="max-w-6xl mx-auto px-6 pb-32 space-y-12">

            <header id="social-header" class="space-y-4 max-w-xl">
                <p class="text-[10px] font-mono uppercase tracking-widest text-primary"
                    data-i18n="contact.social.breadcrumb">
                    > SYS_DIR / PUBLIC / EXT_NODES
                </p>
                <h2 class="text-[clamp(2rem,4vw,3rem)] font-bold font-mono tracking-tighter uppercase text-text"
                    data-i18n="contact.social.title">
                    EXTERNAL_SIGNALS
                </h2>
                <p class="text-xs font-mono text-muted leading-relaxed" data-i18n="contact.social.description">
                    Alternative endpoints for continuous data streams and experimental branches.
                </p>
            </header>

            <div id="social-cards-grid" class="grid md:grid-cols-3 gap-4">

                @php
                    $siteUser = \App\Models\User::first();

                    $igRaw = $siteUser?->instagram ?? '@fdln007';
                    $igLink = str_starts_with($igRaw, 'http') ? $igRaw : 'https://instagram.com/' . ltrim($igRaw, '@');
                    $igLabel = str_starts_with($igRaw, 'http') ? parse_url($igRaw, PHP_URL_PATH) : $igRaw;

                    $ghRaw = $siteUser?->github ?? 'Fadlan079';
                    $ghLink = str_starts_with($ghRaw, 'http') ? $ghRaw : 'https://github.com/' . ltrim($ghRaw, '@');
                    $ghLabel = str_starts_with($ghRaw, 'http') ? parse_url($ghRaw, PHP_URL_PATH) : $ghRaw;

                    $liRaw = $siteUser?->linkedin ?? 'fadlanfirdaus';
                    $liLink = str_starts_with($liRaw, 'http')
                        ? $liRaw
                        : 'https://linkedin.com/in/' . ltrim($liRaw, '@');
                    $liLabel = str_starts_with($liRaw, 'http') ? parse_url($liRaw, PHP_URL_PATH) : $liRaw;
                @endphp

                <a href="{{ $igLink }}" target="_blank" rel="noopener"
                    class="group relative border border-border/50 bg-surface/10 p-6 flex flex-col justify-between min-h-[220px] hover:border-primary/50 transition-all duration-300 hover:bg-primary/5">
                    <div
                        class="absolute top-0 left-0 w-2 h-2 border-t border-l border-primary/30 opacity-0 group-hover:opacity-100 transition-opacity">
                    </div>
                    <div
                        class="absolute bottom-0 right-0 w-2 h-2 border-b border-r border-primary/30 opacity-0 group-hover:opacity-100 transition-opacity">
                    </div>

                    <div class="space-y-2 relative z-10">
                        <div class="flex items-center justify-between mb-4">
                            <span
                                class="text-[9px] font-mono uppercase tracking-widest text-muted border border-border/50 px-2 py-1 bg-surface/30 group-hover:border-primary/30 group-hover:text-primary transition-colors"
                                data-i18n="contact.social.platform">NETWORK_NODE</span>
                            <i
                                class="fa-solid fa-arrow-up-right-from-square text-muted group-hover:text-primary transition-transform duration-300 group-hover:translate-x-1 group-hover:-translate-y-1"></i>
                        </div>
                        <i
                            class="fa-brands fa-instagram text-3xl text-muted group-hover:text-primary transition-colors"></i>
                        <p class="text-[10px] font-mono uppercase tracking-widest font-bold text-text pt-2">
                            Instagram_Protocol</p>
                    </div>
                    <div class="mt-auto pt-6 border-t border-border/30 relative z-10">
                        <p
                            class="text-lg font-mono font-bold tracking-tight text-muted group-hover:text-text transition-colors duration-300">
                            {{ trim($igLabel, '/') }}
                        </p>
                    </div>
                    <div
                        class="absolute inset-0 bg-[repeating-linear-gradient(45deg,transparent,transparent_4px,rgba(var(--color-primary-rgb),0.02)_4px,rgba(var(--color-primary-rgb),0.02)_8px)] opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none">
                    </div>
                </a>

                <a href="{{ $ghLink }}" target="_blank" rel="noopener"
                    class="group relative border border-border/50 bg-surface/10 p-6 flex flex-col justify-between min-h-[220px] hover:border-primary/50 transition-all duration-300 hover:bg-primary/5">
                    <div
                        class="absolute top-0 left-0 w-2 h-2 border-t border-l border-primary/30 opacity-0 group-hover:opacity-100 transition-opacity">
                    </div>
                    <div
                        class="absolute bottom-0 right-0 w-2 h-2 border-b border-r border-primary/30 opacity-0 group-hover:opacity-100 transition-opacity">
                    </div>

                    <div class="space-y-2 relative z-10">
                        <div class="flex items-center justify-between mb-4">
                            <span
                                class="text-[9px] font-mono uppercase tracking-widest text-muted border border-border/50 px-2 py-1 bg-surface/30 group-hover:border-primary/30 group-hover:text-primary transition-colors"
                                data-i18n="contact.social.platform">CODE_REPO</span>
                            <i
                                class="fa-solid fa-arrow-up-right-from-square text-muted group-hover:text-primary transition-transform duration-300 group-hover:translate-x-1 group-hover:-translate-y-1"></i>
                        </div>
                        <i class="fa-brands fa-github text-3xl text-muted group-hover:text-primary transition-colors"></i>
                        <p class="text-[10px] font-mono uppercase tracking-widest font-bold text-text pt-2">GitHub_Matrix
                        </p>
                    </div>
                    <div class="mt-auto pt-6 border-t border-border/30 relative z-10">
                        <p
                            class="text-lg font-mono font-bold tracking-tight text-muted group-hover:text-text transition-colors duration-300">
                            {{ trim($ghLabel, '/') }}
                        </p>
                    </div>
                    <div
                        class="absolute inset-0 bg-[repeating-linear-gradient(45deg,transparent,transparent_4px,rgba(var(--color-primary-rgb),0.02)_4px,rgba(var(--color-primary-rgb),0.02)_8px)] opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none">
                    </div>
                </a>

                <a href="{{ $liLink }}" target="_blank" rel="noopener"
                    class="group relative border border-border/50 bg-surface/10 p-6 flex flex-col justify-between min-h-[220px] hover:border-primary/50 transition-all duration-300 hover:bg-primary/5">
                    <div
                        class="absolute top-0 left-0 w-2 h-2 border-t border-l border-primary/30 opacity-0 group-hover:opacity-100 transition-opacity">
                    </div>
                    <div
                        class="absolute bottom-0 right-0 w-2 h-2 border-b border-r border-primary/30 opacity-0 group-hover:opacity-100 transition-opacity">
                    </div>

                    <div class="space-y-2 relative z-10">
                        <div class="flex items-center justify-between mb-4">
                            <span
                                class="text-[9px] font-mono uppercase tracking-widest text-muted border border-border/50 px-2 py-1 bg-surface/30 group-hover:border-primary/30 group-hover:text-primary transition-colors"
                                data-i18n="contact.social.platform">PROF_NETWORK</span>
                            <i
                                class="fa-solid fa-arrow-up-right-from-square text-muted group-hover:text-primary transition-transform duration-300 group-hover:translate-x-1 group-hover:-translate-y-1"></i>
                        </div>
                        <i
                            class="fa-brands fa-linkedin text-3xl text-muted group-hover:text-primary transition-colors"></i>
                        <p class="text-[10px] font-mono uppercase tracking-widest font-bold text-text pt-2">LinkedIn_Link
                        </p>
                    </div>
                    <div class="mt-auto pt-6 border-t border-border/30 relative z-10">
                        <p
                            class="text-lg font-mono font-bold tracking-tight text-muted group-hover:text-text transition-colors duration-300">
                            {{ trim($liLabel, '/') }}
                        </p>
                    </div>
                    <div
                        class="absolute inset-0 bg-[repeating-linear-gradient(45deg,transparent,transparent_4px,rgba(var(--color-primary-rgb),0.02)_4px,rgba(var(--color-primary-rgb),0.02)_8px)] opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none">
                    </div>
                </a>

            </div>
        </section>

        <section id="contact-end" class="relative py-24 border-t border-border/50 overflow-hidden bg-surface/5">
            <div class="max-w-6xl mx-auto px-6 grid md:grid-cols-[1fr_auto] gap-10 items-end relative z-10">

                <div class="space-y-6">
                    <div class="flex items-center gap-2 text-[10px] font-mono uppercase tracking-widest text-primary mb-4">
                        <span class="w-1.5 h-1.5 bg-primary"></span>
                        SYS_EOF // CONNECTION_CLOSED
                    </div>

                    <h3 class="text-[clamp(2rem,4vw,3rem)] font-bold font-mono tracking-tighter uppercase text-text max-w-2xl leading-tight"
                        data-i18n="contact.end.title">
                        SYSTEM_READY_FOR_NEW_INPUT.
                    </h3>

                    <p class="text-xs font-mono text-muted max-w-xl leading-relaxed border-l border-primary/30 pl-4"
                        data-i18n="contact.end.description">
                        Clear intent, valid parameters, and secure handshake protocols are the foundation of any successful
                        node collaboration.
                    </p>
                </div>

                <div
                    class="hidden md:flex items-center justify-center w-32 h-32 border border-primary/30 rounded-full relative group">
                    <div
                        class="absolute inset-0 rounded-full border border-primary/10 animate-[ping_3s_ease-out_infinite]">
                    </div>
                    <div class="w-2 h-2 rounded-full bg-primary animate-pulse"></div>
                    <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
                        <div class="w-full h-[1px] bg-primary/20 rotate-45"></div>
                        <div class="h-full w-[1px] bg-primary/20 rotate-45 absolute"></div>
                    </div>
                    <div
                        class="absolute -bottom-6 text-[8px] font-mono text-primary uppercase tracking-widest text-center w-full">
                        SCANNING...
                    </div>
                </div>

            </div>
        </section>
    </div>
@endsection

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
