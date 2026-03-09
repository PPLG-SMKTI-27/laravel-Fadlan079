@extends('layouts.dashboard') {{-- Sesuaikan dengan layout yang kamu pakai (main/dashboard) --}}
@section('title', 'SYS_NODE // GitHub Matrix')

@section('content')

<div class="min-h-screen bg-background pt-24 pb-32 px-4 md:px-6 relative overflow-hidden font-sans"
     x-data="githubData()" 
     x-init="fetchProfile()">

    {{-- Global Faint Grid --}}
    <div class="absolute inset-0 pointer-events-none opacity-[0.02] z-0"
         style="background-image: linear-gradient(var(--color-text) 1px, transparent 1px), linear-gradient(90deg, var(--color-text) 1px, transparent 1px); background-size: 64px 64px;">
    </div>

    <section class="max-w-6xl mx-auto relative z-10 space-y-8">

        {{-- ========================================== --}}
        {{-- 1. HEADER MODULE                           --}}
        {{-- ========================================== --}}
        <header class="relative space-y-6 border-b border-border/50 pb-8 mt-4">
            <div class="absolute top-0 right-0 w-1/3 h-[1px] bg-gradient-to-r from-transparent to-primary/50 pointer-events-none"></div>

            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                <div class="flex items-center gap-2 font-mono text-[10px] uppercase tracking-widest text-primary">
                    <i class="fa-brands fa-github"></i>
                    >> SYS_DIR / PUBLIC / GITHUB_MATRIX
                </div>
                
                {{-- Connection Status --}}
                <div class="flex items-center gap-3 font-mono text-[10px] uppercase tracking-widest border px-3 py-1.5"
                     :class="loading ? 'border-amber-400/50 text-amber-400 bg-amber-400/5' : 'border-green-500/30 text-green-500 bg-green-500/5'">
                    <span class="w-2 h-2 rounded-full animate-pulse shadow-[0_0_8px]" 
                          :class="loading ? 'bg-amber-400 shadow-amber-400' : 'bg-green-500 shadow-green-500'"></span>
                    <span x-text="loading ? 'SYNCING_WITH_OCTOCAT...' : 'API_LINK_ESTABLISHED'"></span>
                </div>
            </div>

            <div class="flex items-end gap-3 pt-2">
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold font-mono tracking-tighter uppercase text-text leading-none">
                    Code_Repository
                </h1>
                <div class="w-3 md:w-4 h-8 md:h-12 bg-primary animate-pulse mb-1 shadow-[0_0_10px_var(--color-primary)]"></div>
            </div>
            
            <p class="text-sm font-mono text-muted tracking-wide max-w-2xl leading-relaxed">
                <span class="text-primary">></span> Real-time extraction of version control metrics, contribution history, and language dominance from user: <span class="text-text font-bold">@Fadlan079</span>.
            </p>
        </header>

        {{-- ========================================== --}}
        {{-- 2. PROFILE TARGET MODULE                   --}}
        {{-- ========================================== --}}
        <div class="relative border border-border/50 bg-surface/10 p-6 md:p-8 flex flex-col md:flex-row items-start md:items-center gap-6 group hover:border-primary/30 transition-colors">
            {{-- HUD Corners --}}
            <div class="absolute top-0 left-0 w-3 h-3 border-t-2 border-l-2 border-primary/50"></div>
            <div class="absolute bottom-0 right-0 w-3 h-3 border-b-2 border-r-2 border-primary/50"></div>

            {{-- Avatar Container --}}
            <div class="relative w-24 h-24 md:w-32 md:h-32 shrink-0 border border-primary/30 bg-[#050505] p-1">
                <img :src="profile.avatar_url" alt="GitHub Avatar" class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-500 opacity-0" :class="profile.avatar_url ? 'opacity-100' : ''">
                <div class="absolute inset-0 bg-primary/10 pointer-events-none group-hover:bg-transparent transition-colors"></div>
                <div class="absolute -right-2 -top-2 w-4 h-4 border-t border-r border-primary/50"></div>
                <div class="absolute -left-2 -bottom-2 w-4 h-4 border-b border-l border-primary/50"></div>
            </div>

            {{-- Profile Data --}}
            <div class="flex-1 min-w-0 space-y-3">
                <h2 class="text-2xl font-bold font-mono tracking-tighter uppercase text-text" x-text="profile.name || 'TARGET_NAME_UNKNOWN'"></h2>
                <p class="text-sm font-mono text-primary uppercase tracking-widest" x-text="'@' + (profile.login || 'Fadlan079')"></p>
                <p class="text-xs font-mono text-muted leading-relaxed max-w-xl" x-text="profile.bio || 'Retrieving bio payload...'"></p>
                
                {{-- Quick Metrics --}}
                <div class="flex flex-wrap gap-4 pt-2">
                    <div class="border border-border/50 bg-surface/30 px-4 py-2">
                        <p class="text-[9px] font-mono text-muted uppercase tracking-widest">Public_Repos</p>
                        <p class="text-lg font-bold font-mono text-text" x-text="profile.public_repos || '0'"></p>
                    </div>
                    <div class="border border-border/50 bg-surface/30 px-4 py-2">
                        <p class="text-[9px] font-mono text-muted uppercase tracking-widest">Followers</p>
                        <p class="text-lg font-bold font-mono text-sky-400" x-text="profile.followers || '0'"></p>
                    </div>
                    <div class="border border-border/50 bg-surface/30 px-4 py-2">
                        <p class="text-[9px] font-mono text-muted uppercase tracking-widest">Following</p>
                        <p class="text-lg font-bold font-mono text-amber-400" x-text="profile.following || '0'"></p>
                    </div>
                </div>
            </div>

            {{-- Action --}}
            <a :href="profile.html_url" target="_blank" class="shrink-0 mt-4 md:mt-0 px-6 py-3 border border-primary/50 bg-primary/5 font-mono text-[10px] font-bold uppercase tracking-widest text-primary hover:bg-primary hover:text-background transition-colors flex items-center gap-2">
                [ OPEN_IN_GITHUB ] <i class="fa-solid fa-arrow-up-right-from-square"></i>
            </a>
        </div>

        {{-- ========================================== --}}
        {{-- 3. ACTIVITY GRAPH MATRIX                   --}}
        {{-- ========================================== --}}
        <div class="relative border border-border/50 bg-[#030303] p-4 md:p-6 group">
            <h3 class="text-[10px] font-mono uppercase tracking-widest text-primary flex items-center gap-2 mb-6 border-b border-border/30 pb-3">
                <i class="fa-solid fa-chart-line"></i> > CONTRIBUTION_FREQUENCY_GRAPH
            </h3>
            
            <div class="w-full overflow-x-auto custom-scrollbar pb-2">
                {{-- SVG Activity Graph --}}
                <img src="https://github-readme-activity-graph.vercel.app/graph?username=Fadlan079&bg_color=030303&color=a855f7&line=a855f7&point=f4f4f5&area=true&hide_border=true&title_color=71717a" 
                     alt="GitHub Activity Graph" 
                     class="min-w-[800px] w-full h-auto opacity-90 group-hover:opacity-100 transition-opacity filter drop-shadow-[0_0_15px_rgba(168,85,247,0.15)]">
            </div>
        </div>

        {{-- ========================================== --}}
        {{-- 4. STATS & LANGUAGE DISTRIBUTION           --}}
        {{-- ========================================== --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            
            {{-- General Stats --}}
            <div class="relative border border-border/50 bg-[#030303] p-4 group hover:border-primary/30 transition-colors">
                <h3 class="text-[10px] font-mono uppercase tracking-widest text-primary flex items-center gap-2 mb-4 border-b border-border/30 pb-2">
                    <i class="fa-solid fa-server"></i> > GLOBAL_STATISTICS
                </h3>
                <div class="flex justify-center">
                    <img src="https://github-readme-stats.vercel.app/api?username=Fadlan079&show_icons=true&bg_color=030303&title_color=a855f7&text_color=71717a&icon_color=38bdf8&border_color=2a2a2a&hide_border=true" 
                        alt="GitHub Stats" 
                        class="w-full max-w-sm"
                        onerror="this.outerHTML='<div class=\'w-full max-w-sm h-32 flex flex-col items-center justify-center border border-red-500/50 bg-red-500/10 text-red-500 font-mono text-[10px] uppercase tracking-widest text-center p-4\'><i class=\'fa-solid fa-satellite-dish mb-2 text-lg animate-pulse\'></i><span>[ERR_503] PING_TIMEOUT</span><span class=\'text-[8px] text-red-400 mt-1\'>EXTERNAL_METRICS_SERVER_UNREACHABLE</span></div>'">
                </div>
            </div>

            {{-- Top Languages --}}
            <div class="relative border border-border/50 bg-[#030303] p-4 group hover:border-sky-400/30 transition-colors">
                <h3 class="text-[10px] font-mono uppercase tracking-widest text-sky-400 flex items-center gap-2 mb-4 border-b border-border/30 pb-2">
                    <i class="fa-solid fa-code"></i> > DOMINANT_LANGUAGES
                </h3>
                <div class="flex justify-center">
                    <img src="https://github-readme-stats.vercel.app/api/top-langs/?username=Fadlan079&layout=compact&bg_color=030303&title_color=38bdf8&text_color=71717a&border_color=2a2a2a&hide_border=true" 
                        alt="Top Languages" 
                        class="w-full max-w-sm"
                        onerror="this.outerHTML='<div class=\'w-full max-w-sm h-32 flex flex-col items-center justify-center border border-red-500/50 bg-red-500/10 text-red-500 font-mono text-[10px] uppercase tracking-widest text-center p-4\'><i class=\'fa-solid fa-satellite-dish mb-2 text-lg animate-pulse\'></i><span>[ERR_503] PING_TIMEOUT</span><span class=\'text-[8px] text-red-400 mt-1\'>EXTERNAL_METRICS_SERVER_UNREACHABLE</span></div>'">
                </div>
            </div>

            {{-- Streak Stats --}}
            <div class="relative border border-border/50 bg-[#030303] p-4 group md:col-span-2 hover:border-amber-400/30 transition-colors">
                <h3 class="text-[10px] font-mono uppercase tracking-widest text-amber-400 flex items-center gap-2 mb-4 border-b border-border/30 pb-2">
                    <i class="fa-solid fa-fire-flame-curved"></i> > COMMIT_STREAK_ANALYSIS
                </h3>
                <div class="flex justify-center">
                    <img src="https://github-readme-streak-stats.herokuapp.com/?user=Fadlan079&theme=transparent&background=030303&ring=a855f7&fire=fbbf24&currStreakNum=f4f4f5&currStreakLabel=71717a&sideNums=f4f4f5&sideLabels=71717a&dates=71717a&hide_border=true" 
                         alt="GitHub Streak" class="w-full max-w-xl">
                </div>
            </div>

        </div>

    </section>
</div>

@endsection

@push('head')
<style>
    .custom-scrollbar::-webkit-scrollbar { height: 6px; width: 6px; }
    .custom-scrollbar::-webkit-scrollbar-track { background: rgba(0,0,0,0.2); }
    .custom-scrollbar::-webkit-scrollbar-thumb { background: color-mix(in srgb, var(--color-primary) 30%, transparent); border-radius: 0; }
    .custom-scrollbar::-webkit-scrollbar-thumb:hover { background: var(--color-primary); }
</style>

{{-- Script untuk mengambil data Profil asli via API GitHub --}}
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
<script>
    function githubData() {
        return {
            loading: true,
            profile: {},
            username: 'Fadlan079', // Username kamu
            
            async fetchProfile() {
                try {
                    const response = await fetch(`https://api.github.com/users/${this.username}`);
                    if (!response.ok) throw new Error('API Sync Failed');
                    const data = await response.json();
                    
                    this.profile = data;
                    setTimeout(() => { this.loading = false; }, 800); // Simulasi decrypt delay
                } catch (error) {
                    console.error('Error fetching GitHub data:', error);
                    this.loading = false;
                }
            }
        }
    }
</script>
@endpush