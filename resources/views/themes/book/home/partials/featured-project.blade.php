<section id="featured-projects" class="py-16 md:py-24 px-5 max-w-7xl mx-auto relative z-10 border-t border-border/50">

    <div class="absolute inset-0 z-0 opacity-[0.03]"
        style="background-image: linear-gradient(var(--color-text) 1px, transparent 1px), linear-gradient(90deg, var(--color-text) 1px, transparent 1px); background-size: 40px 40px;">
    </div>

    <div class="relative z-10" x-data="{
        currentProject: 0,
        totalProjects: {{ count($recentProjects) }},
        deviceView: 'desktop',
        timer: null,
        init() { this.startAuto(); },
        startAuto() {
            this.stopAuto();
            this.timer = setInterval(() => {
                this.currentProject = (this.currentProject + 1) % this.totalProjects;
            }, 5000);
        },
        stopAuto() { clearInterval(this.timer); },
        setDevice(type) {
            this.deviceView = type;
            this.stopAuto();
        }
        }">

        <div class="grid lg:grid-cols-12 gap-12 lg:gap-20 items-center">

            <div class="order-1 lg:order-2 lg:col-span-5 flex flex-col justify-center" @mouseenter="stopAuto()" @mouseleave="startAuto()">
                <div class="flex justify-between items-end mb-8 border-b border-border/50 pb-4">
                    <div>
                        <h3 class="text-xs font-black uppercase tracking-[0.3em] text-muted mb-4" data-i18n="home.featured_project.label">
                            Karya Unggulan
                        </h3>
                        <h2 class="text-3xl md:text-5xl font-bold tracking-tight text-text leading-tight mb-4" data-i18n="home.featured_project.title">
                            Daftar Proyek.
                        </h2>
                        <p class="text-zinc-600 text-base md:text-lg leading-relaxed mb-8" data-i18n="home.featured_project.description">
                            Beberapa proyek pilihan yang menampilkan karya dan pengalaman pengembangan yang pernah saya buat.
                        </p>
                    </div>
                    <div class="flex gap-4 items-center mt-4">
                        <button @click="currentProject = currentProject > 0 ? currentProject - 1 : totalProjects - 1"
                            class="group flex items-center justify-center gap-2 px-4 py-2 bg-[#fcfbf7] border-2 border-stone-800 text-stone-800 font-mono text-sm font-bold tracking-widest uppercase transition-all duration-300 transform -rotate-2 hover:rotate-0 shadow-[3px_3px_0px_rgba(41,37,36,1)] active:shadow-[0px_0px_0px_rgba(41,37,36,1)] active:translate-y-[3px] active:translate-x-[3px]">
                            <i class="fa-solid fa-arrow-left-long transition-transform group-hover:-translate-x-1"></i>
                        </button>

                        <button @click="currentProject = currentProject < totalProjects - 1 ? currentProject + 1 : 0"
                            class="group flex items-center justify-center gap-2 px-4 py-2 bg-[#fcfbf7] border-2 border-stone-800 text-stone-800 font-mono text-sm font-bold tracking-widest uppercase transition-all duration-300 transform rotate-2 hover:rotate-0 shadow-[3px_3px_0px_rgba(41,37,36,1)] active:shadow-[0px_0px_0px_rgba(41,37,36,1)] active:translate-y-[3px] active:translate-x-[3px]">
                            <i class="fa-solid fa-arrow-right-long transition-transform group-hover:translate-x-1"></i>
                        </button>
                    </div>
                </div>

                <div class="relative w-full aspect-[4/3] md:aspect-square lg:aspect-auto lg:h-[350px]">
                    @forelse($recentProjects as $index => $project)
                        <div x-show="currentProject === {{ $index }}"
                            x-transition:enter="transition ease-out duration-500 transform"
                            x-transition:enter-start="opacity-0 translate-x-12"
                            x-transition:enter-end="opacity-100 translate-x-0"
                            x-transition:leave="transition ease-in duration-300 transform"
                            x-transition:leave-start="opacity-100 translate-x-0"
                            x-transition:leave-end="opacity-0 -translate-x-12"
                            class="absolute inset-0 w-full h-full">

                            <div class="bg-white border border-[#e5e0d8] p-6 md:p-8 shadow-xl relative h-full flex flex-col justify-between overflow-hidden">
                                <div class="absolute top-0 left-0 bottom-0 w-1 bg-warning/50"></div>
                                <div class="absolute top-0 left-2 bottom-0 w-[0.5px] bg-[#e5e0d8]"></div>

                                <div class="relative z-10">
                                    <div class="flex justify-between items-start mb-4">
                                        <span class="px-3 py-1 text-[10px] font-bold uppercase tracking-widest bg-warning text-yellow-900 border border-yellow-500 shadow-sm -rotate-1">
                                            {{ $project->type }}
                                        </span>
                                        <span class="text-[9px] font-mono text-muted uppercase italic">{{ $project->status }}</span>
                                    </div>

                                    <h3 class="text-2xl font-bold mb-4 text-stone-800">{{ $project->title }}</h3>
                                    <p class="text-sm text-stone-600 line-clamp-4 leading-relaxed mb-6 italic font-serif">
                                        "{{ $project->desc }}"
                                    </p>
                                </div>

                                <div class="relative z-10 flex items-center justify-between mt-auto pt-6 border-t border-stone-100">
                                    <a href="{{ route('portofolio.projects', ['search' => $project->title]) }}"
                                       class="text-xs font-bold uppercase tracking-widest text-warning hover:text-yellow-700 flex items-center gap-2 group/btn">
                                        Read Case Study
                                        <i class="fa-solid fa-arrow-right group-hover/btn:translate-x-1 transition-transform"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="flex items-center justify-center w-full h-full border-2 border-dashed border-[#e5e0d8] bg-[#fcfbf7] rounded-sm text-muted font-mono text-xs uppercase tracking-widest p-8 text-center italic">
                            [ null_collection : archive_empty ]
                        </div>
                    @endforelse
                </div>

                <div class="flex justify-start items-center mt-10 gap-3">
                    @foreach ($recentProjects as $index => $project)
                        <button @click="currentProject = {{ $index }}"
                            class="h-1.5 transition-all duration-300 rounded-full"
                            :class="currentProject === {{ $index }} ? 'bg-warning w-8 shadow-sm' : 'bg-[#e5e0d8] hover:bg-warning/50 w-2.5'">
                        </button>
                    @endforeach
                </div>
            </div>

            <div class="order-2 lg:order-1 lg:col-span-7 flex flex-col items-center w-full" @mouseenter="stopAuto()" @mouseleave="startAuto()">

                <div class="relative w-full bg-[#fcfbf7] border border-[#e5e0d8] shadow-2xl p-5 md:p-10 overflow-hidden rounded-r-3xl border-l-[20px] border-l-stone-800"
                    style="background-image: radial-gradient(#d1d5db 1px, transparent 1px); background-size: 24px 24px;">

                    <div class="relative mx-auto transition-all duration-700 ease-in-out"
                        :class="{
                            'w-full aspect-[16/9] scale-100': deviceView === 'desktop',
                            'w-full max-w-[420px] aspect-[3/4] scale-100': deviceView === 'tablet',
                            'w-full max-w-[280px] aspect-[9/16] scale-100': deviceView === 'mobile'
                        }">

                        <div class="absolute -top-6 left-1/2 -translate-x-1/2 w-32 h-8 bg-warning/40 border border-yellow-600/10 shadow-sm backdrop-blur-[1px] -rotate-3 z-40 flex items-center justify-center">
                             <div class="w-full h-px bg-yellow-600/5 rotate-12"></div>
                        </div>

                        <div class="w-full h-full bg-white p-2 md:p-3 shadow-[10px_10px_30px_rgba(0,0,0,0.1)] border border-gray-100 relative group">

                            <div class="relative w-full h-full bg-[#121212] overflow-hidden border border-gray-200">
                                @foreach ($recentProjects as $index => $project)
                                    <div class="absolute inset-0 w-full h-full overflow-y-auto overflow-x-hidden custom-scrollbar bg-background"
                                        x-show="currentProject === {{ $index }}"
                                        x-transition:enter="duration-700 ease-out"
                                        x-transition:enter-start="opacity-0 scale-105"
                                        x-transition:enter-end="opacity-100 scale-100"
                                        x-transition:leave="duration-300 ease-in"
                                        x-transition:leave-start="opacity-100"
                                        x-transition:leave-end="opacity-0">

                                        <img :src="{
                                            'desktop': '{{ $project->image_desktop ? asset('storage/' . $project->image_desktop) : 'https://via.placeholder.com/1280x2500/121212/38bdf8?text=DESKTOP+LAYOUT' }}',
                                            'tablet': '{{ $project->image_tablet ? asset('storage/' . $project->image_tablet) : 'https://via.placeholder.com/768x2500/121212/a3e635?text=TABLET+LAYOUT' }}',
                                            'mobile': '{{ $project->image_mobile ? asset('storage/' . $project->image_mobile) : 'https://via.placeholder.com/375x2500/121212/f87171?text=MOBILE+LAYOUT' }}'
                                        }[deviceView]"
                                            alt="{{ $project->title }}"
                                            class="w-full h-auto block object-top">
                                    </div>
                                @endforeach
                            </div>

                            <div class="absolute bottom-6 left-0 w-full text-center pointer-events-none">
                                <span class="bg-stone-800/90 text-white text-[9px] px-3 py-1 font-mono tracking-widest uppercase shadow-lg"
                                      x-text="deviceView + ' view'"></span>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="flex items-center justify-center mt-6 gap-3 md:gap-4 flex-wrap relative z-20">
                    @foreach(['desktop' => 'fa-display', 'tablet' => 'fa-tablet-screen-button', 'mobile' => 'fa-mobile-screen'] as $view => $icon)
                        <button @click="setDevice('{{ $view }}')"
                            class="px-3 py-1.5 transition-all duration-300 transform hover:-translate-y-1 font-mono text-[10px] md:text-xs uppercase tracking-[0.2em] font-black border-2"
                            :class="deviceView === '{{ $view }}' ? 'bg-warning text-stone-900 border-stone-900 shadow-[4px_4px_0px_rgba(42,42,42,1)] -rotate-1' : 'bg-white text-stone-400 border-stone-200 hover:border-stone-400 hover:text-stone-600'">
                            <i class="fa-solid {{ $icon }} mr-2"></i> {{ $view }}
                        </button>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</section>
