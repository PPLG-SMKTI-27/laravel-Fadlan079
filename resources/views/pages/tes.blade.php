@extends('layouts.dashboard')
@section('title', 'System Node // Event Logs')

@section('content')

{{-- ========================================== --}}
{{-- DUMMY DATA GENERATOR (PHP BLOCK)           --}}
{{-- ========================================== --}}
@php
    $dummyLogs = [
        ['time' => '2026-03-07 19:45:02', 'level' => 'CRITICAL', 'module' => 'AUTH_NODE', 'msg' => 'Multiple failed login attempts detected. Possible brute force sequence.', 'ip' => '192.168.1.105'],
        ['time' => '2026-03-07 19:30:15', 'level' => 'ERROR', 'module' => 'DB_CONN', 'msg' => 'Connection timeout to replica DB_02. Retrying handshake...', 'ip' => '10.0.0.4'],
        ['time' => '2026-03-07 19:15:00', 'level' => 'WARN', 'module' => 'STORAGE', 'msg' => 'Disk space on Volume_C reaching 85% capacity limit.', 'ip' => 'SYS_LOCAL'],
        ['time' => '2026-03-07 18:50:22', 'level' => 'INFO', 'module' => 'PROJECT_CTRL', 'msg' => 'New project node "Cyber_UI_V2" initialized and committed to matrix.', 'ip' => '114.120.45.2'],
        ['time' => '2026-03-07 18:45:10', 'level' => 'INFO', 'module' => 'SYS_CORE', 'msg' => 'Automated system backup completed successfully (Payload: 4.2GB).', 'ip' => 'SYS_LOCAL'],
        ['time' => '2026-03-07 17:20:05', 'level' => 'WARN', 'module' => 'API_GATEWAY', 'msg' => 'High latency detected on endpoint /api/v1/skills (Response: 1200ms).', 'ip' => '10.0.0.8'],
        ['time' => '2026-03-07 16:10:00', 'level' => 'INFO', 'module' => 'AUTH_NODE', 'msg' => 'Administrator session terminated (Secure Logout).', 'ip' => '114.120.45.2'],
        ['time' => '2026-03-07 14:05:33', 'level' => 'INFO', 'module' => 'TRASH_BIN', 'msg' => 'Executed purge protocol. 12 soft-deleted nodes permanently eradicated.', 'ip' => '114.120.45.2'],
        ['time' => '2026-03-07 11:22:11', 'level' => 'ERROR', 'module' => 'MAIL_SMTP', 'msg' => 'Failed to transmit payload to guest_node@domain.com. Connection refused.', 'ip' => 'SYS_LOCAL'],
        ['time' => '2026-03-07 09:00:01', 'level' => 'INFO', 'module' => 'SYS_CORE', 'msg' => 'Daily cron tasks executed successfully.', 'ip' => 'SYS_LOCAL'],
    ];
@endphp

<div class="min-h-screen bg-background pt-12 pb-32 px-4 md:px-6 relative overflow-hidden font-sans">

    {{-- Global Faint Grid --}}
    <div class="absolute inset-0 pointer-events-none opacity-[0.02] z-0"
         style="background-image: linear-gradient(var(--color-text) 1px, transparent 1px), linear-gradient(90deg, var(--color-text) 1px, transparent 1px); background-size: 64px 64px;">
    </div>

    <section class="max-w-7xl mx-auto relative z-10 space-y-8">

        {{-- ========================================== --}}
        {{-- 1. HEADER MODULE                           --}}
        {{-- ========================================== --}}
        <header class="relative space-y-6 border-b border-border/50 pb-8 mt-4 md:mt-8">
            <div class="absolute top-0 right-0 w-1/3 h-[1px] bg-gradient-to-r from-transparent to-primary/50 pointer-events-none"></div>

            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                <div class="flex items-center gap-2 font-mono text-[10px] uppercase tracking-widest text-primary">
                    <i class="fa-solid fa-list-ul"></i>
                    >> SYS_DIR / DASHBOARD / ACTIVITY_LOGS
                </div>
                
                {{-- Live Feed Status --}}
                <div class="flex items-center gap-3 font-mono text-[10px] uppercase tracking-widest text-green-500 border border-green-500/30 px-3 py-1.5 bg-green-500/5 w-max">
                    <span class="w-2 h-2 rounded-full bg-green-500 animate-pulse shadow-[0_0_8px_#22c55e]"></span>
                    STREAM: ACTIVE_SYNC
                </div>
            </div>

            <div class="flex items-end gap-3 pt-2">
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold font-mono tracking-tighter uppercase text-text leading-none">
                    System_Logs
                </h1>
                <div class="w-3 md:w-4 h-8 md:h-12 bg-primary animate-pulse mb-1 shadow-[0_0_10px_var(--color-primary)]"></div>
            </div>
            
            <p class="text-sm font-mono text-muted tracking-wide max-w-2xl leading-relaxed">
                <span class="text-primary">></span> Continuous chronological record of system events, errors, and administrator actions.
            </p>
        </header>

        {{-- ========================================== --}}
        {{-- 2. LOG METRICS                             --}}
        {{-- ========================================== --}}
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6">
            {{-- Total Events --}}
            <div class="relative border border-border/50 bg-surface/20 p-4 md:p-5 group">
                <div class="absolute top-0 left-0 w-2 h-2 border-t border-l border-primary/50"></div>
                <p class="text-[9px] font-mono uppercase tracking-widest text-muted mb-2 flex items-center gap-2">
                    <i class="fa-solid fa-database text-primary"></i> Total_Events (24H)
                </p>
                <h3 class="text-3xl font-mono font-bold text-text">1,024</h3>
            </div>

            {{-- Info/Success --}}
            <div class="relative border border-border/50 bg-surface/20 p-4 md:p-5 group">
                <div class="absolute top-0 right-0 w-2 h-2 border-t border-r border-sky-400/50"></div>
                <p class="text-[9px] font-mono uppercase tracking-widest text-muted mb-2 flex items-center gap-2">
                    <i class="fa-solid fa-circle-check text-sky-400"></i> Routine_Logs
                </p>
                <h3 class="text-3xl font-mono font-bold text-sky-400">980</h3>
            </div>

            {{-- Warnings --}}
            <div class="relative border border-border/50 bg-surface/20 p-4 md:p-5 group">
                <div class="absolute bottom-0 left-0 w-2 h-2 border-b border-l border-amber-400/50"></div>
                <p class="text-[9px] font-mono uppercase tracking-widest text-muted mb-2 flex items-center gap-2">
                    <i class="fa-solid fa-triangle-exclamation text-amber-400"></i> Sys_Warnings
                </p>
                <h3 class="text-3xl font-mono font-bold text-amber-400">41</h3>
            </div>

            {{-- Critical/Errors --}}
            <div class="relative border border-red-500/30 bg-red-500/5 p-4 md:p-5 group overflow-hidden">
                <div class="absolute inset-0 bg-[repeating-linear-gradient(45deg,transparent,transparent_4px,rgba(239,68,68,0.03)_4px,rgba(239,68,68,0.03)_8px)] pointer-events-none"></div>
                <div class="absolute bottom-0 right-0 w-2 h-2 border-b border-r border-red-500"></div>
                <p class="text-[9px] font-mono uppercase tracking-widest text-red-500 mb-2 flex items-center gap-2 relative z-10">
                    <i class="fa-solid fa-skull animate-pulse"></i> Crit_Errors
                </p>
                <h3 class="text-3xl font-mono font-bold text-red-500 relative z-10">03</h3>
            </div>
        </div>

        {{-- ========================================== --}}
        {{-- 3. COMMAND FILTER PANEL                    --}}
        {{-- ========================================== --}}
        <div class="relative border border-border/50 bg-surface/10 p-4 space-y-4">
            <div class="flex flex-col md:flex-row items-stretch md:items-center justify-between gap-4">
                
                {{-- Search Terminal --}}
                <div class="relative w-full md:w-[40%] group">
                    <div class="absolute left-4 top-1/2 -translate-y-1/2 font-mono text-primary text-sm">></div>
                    <input
                        type="text"
                        placeholder="GREP_LOG_MESSAGE_"
                        class="w-full border border-border/70 bg-surface/30 px-4 py-2.5 pl-8 font-mono text-[10px] sm:text-xs uppercase tracking-widest text-text placeholder:text-muted/50 focus:outline-none focus:border-primary focus:bg-primary/5 transition-colors"
                    />
                    <div class="absolute right-4 top-1/2 -translate-y-1/2 w-1.5 h-3 bg-primary/30 group-focus-within:bg-primary group-focus-within:animate-pulse pointer-events-none"></div>
                </div>

                <div class="flex flex-wrap items-center gap-2 md:gap-3">
                    {{-- Severity Filter --}}
                    <div class="relative">
                        <select class="appearance-none border border-border/70 bg-surface/30 px-6 py-2.5 pr-10 font-mono text-[10px] sm:text-xs uppercase tracking-widest text-muted hover:text-text focus:outline-none focus:border-primary transition-colors cursor-pointer">
                            <option value="ALL">SEVERITY: ALL</option>
                            <option value="INFO">SEVERITY: INFO</option>
                            <option value="WARN">SEVERITY: WARN</option>
                            <option value="ERROR">SEVERITY: ERROR</option>
                            <option value="CRITICAL">SEVERITY: CRITICAL</option>
                        </select>
                        <i class="fa-solid fa-filter absolute right-4 top-1/2 -translate-y-1/2 text-muted text-[10px] pointer-events-none"></i>
                    </div>

                    {{-- Actions --}}
                    <button type="button" class="px-4 py-2.5 border border-border/70 bg-surface/30 font-mono text-[10px] sm:text-xs font-bold uppercase tracking-widest text-muted hover:border-primary hover:text-primary transition-colors">
                        [ EXPORT_CSV ]
                    </button>
                    <button type="button" class="px-4 py-2.5 border border-red-500/30 bg-red-500/5 font-mono text-[10px] sm:text-xs font-bold uppercase tracking-widest text-red-500 hover:bg-red-500 hover:text-white transition-colors">
                        [ FLUSH ]
                    </button>
                </div>
            </div>
        </div>

        {{-- ========================================== --}}
        {{-- 4. DATA STREAM / LOG TABLE                 --}}
        {{-- ========================================== --}}
        <div class="relative border border-border/50 bg-[#030303] overflow-x-auto custom-scrollbar shadow-2xl">
            
            {{-- Table Header --}}
            <div class="min-w-[800px] flex items-center gap-4 px-6 py-3 border-b border-border/50 bg-surface/40 font-mono text-[9px] uppercase tracking-widest text-muted font-bold">
                <div class="w-[140px] shrink-0">TIME_STAMP</div>
                <div class="w-[90px] shrink-0">SEVERITY</div>
                <div class="w-[120px] shrink-0">SOURCE_NODE</div>
                <div class="flex-1">EVENT_PAYLOAD</div>
                <div class="w-[120px] shrink-0 text-right">ORIGIN_IP</div>
            </div>

            {{-- Table Body (Logs) --}}
            <div class="min-w-[800px] font-mono text-[10px] sm:text-[11px] leading-relaxed flex flex-col">
                
                @foreach ($dummyLogs as $log)
                    @php
                        // Logika Style berdasarkan Severity Level
                        $levelStyle = match($log['level']) {
                            'CRITICAL' => ['text' => 'text-red-500 font-bold', 'bg' => 'bg-red-500/10 border-l-2 border-red-500', 'icon' => 'animate-pulse'],
                            'ERROR'    => ['text' => 'text-red-400', 'bg' => 'hover:bg-surface/20 border-l-2 border-transparent hover:border-red-400/50', 'icon' => ''],
                            'WARN'     => ['text' => 'text-amber-400', 'bg' => 'hover:bg-surface/20 border-l-2 border-transparent hover:border-amber-400/50', 'icon' => ''],
                            'INFO'     => ['text' => 'text-sky-400', 'bg' => 'hover:bg-surface/20 border-l-2 border-transparent hover:border-primary/50', 'icon' => ''],
                            default    => ['text' => 'text-muted', 'bg' => 'hover:bg-surface/20 border-l-2 border-transparent', 'icon' => ''],
                        };
                    @endphp

                    <div class="flex items-start gap-4 px-6 py-3 border-b border-border/20 transition-colors {{ $levelStyle['bg'] }} group">
                        
                        {{-- Timestamp --}}
                        <div class="w-[140px] shrink-0 text-muted group-hover:text-text transition-colors">
                            [{{ $log['time'] }}]
                        </div>
                        
                        {{-- Severity Level --}}
                        <div class="w-[90px] shrink-0 {{ $levelStyle['text'] }} {{ $levelStyle['icon'] }}">
                            [{{ $log['level'] }}]
                        </div>
                        
                        {{-- Source Module --}}
                        <div class="w-[120px] shrink-0 text-primary/70 group-hover:text-primary transition-colors">
                            {{ $log['module'] }}
                        </div>
                        
                        {{-- Message --}}
                        <div class="flex-1 text-text/90 group-hover:text-text transition-colors pr-4">
                            <span class="text-muted/50 mr-1">></span> {{ $log['msg'] }}
                        </div>
                        
                        {{-- IP Address --}}
                        <div class="w-[120px] shrink-0 text-right text-muted/60">
                            {{ $log['ip'] }}
                        </div>

                    </div>
                @endforeach

                {{-- End of File Marker --}}
                <div class="flex items-center justify-center gap-4 px-6 py-6 text-[10px] font-mono text-muted/50 uppercase tracking-widest bg-surface/5">
                    <div class="h-[1px] flex-1 bg-border/30"></div>
                    <span>SYS_EOF // AWAITING_NEW_EVENTS...</span>
                    <div class="w-1.5 h-3 bg-muted/30 animate-pulse"></div>
                    <div class="h-[1px] flex-1 bg-border/30"></div>
                </div>

            </div>
        </div>

        {{-- HUD PAGINATION (STATIC DUMMY) --}}
        <div class="flex justify-center pt-8">
            <nav class="flex items-center gap-2 font-mono text-[10px] uppercase tracking-widest">
                <span class="px-4 py-2 text-muted border border-border/50 bg-surface/30 opacity-50 cursor-not-allowed">[ PREV ]</span>
                <span class="px-4 py-2 border border-primary bg-primary/5 text-primary font-bold">PG_01 / 15</span>
                <a href="#" class="px-4 py-2 border border-border text-muted hover:border-primary hover:text-primary transition-colors">[ NEXT ]</a>
            </nav>
        </div>

    </section>
</div>

@endsection

@push('head')
<style>
    /* Custom Scrollbar for Terminal Data Stream */
    .custom-scrollbar::-webkit-scrollbar { height: 6px; width: 6px; }
    .custom-scrollbar::-webkit-scrollbar-track { background: rgba(0,0,0,0.2); }
    .custom-scrollbar::-webkit-scrollbar-thumb { background: color-mix(in srgb, var(--color-primary) 30%, transparent); border-radius: 0; }
    .custom-scrollbar::-webkit-scrollbar-thumb:hover { background: var(--color-primary); }
</style>
@endpush