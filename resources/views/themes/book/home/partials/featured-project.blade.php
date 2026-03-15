<section id="featured-projects" class="py-24 px-5 max-w-6xl mx-auto relative z-10 border-t border-border/50">

    <div class="mb-12 flex flex-col md:flex-row md:items-end justify-between gap-6">
        <div>
            <h3 class="text-xs font-black uppercase tracking-[0.3em] text-muted mb-4">
                Karya Unggulan
            </h3>
            <h2 class="text-4xl md:text-5xl font-bold tracking-tight text-text leading-tight">
                Daftar Proyek.
            </h2>
            <p class="text-zinc-600 text-lg mt-3 max-w-2xl leading-relaxed">
                Beberapa proyek pilihan yang menampilkan karya dan pengalaman pengembangan yang pernah saya buat.
            </p>
        </div>

        <a href="{{ route('portofolio.projects') }}"
        class="group relative inline-flex items-center gap-4 py-1 pl-14 pr-12 text-yellow-900 font-serif font-bold transition-all duration-300 w-max shrink-0 hover:-translate-y-1 hover:rotate-2"
        style="filter: drop-shadow(4px 4px 6px rgba(0,0,0,0.08));">

            <div class="absolute inset-0 bg-warning border border-yellow-500 rounded-l-md"
                style="clip-path: polygon(0 0, 100% 0, 90% 50%, 100% 100%, 0 100%);">
            </div>

            <div class="absolute top-1/2 -left-8 w-10 h-[2.5px] bg-[#8B0000]/80 -translate-y-[calc(50%+1px)] origin-right -rotate-12 group-hover:-rotate-6 transition-transform duration-300 rounded-l-full z-0"></div>
            <div class="absolute top-1/2 -left-7 w-9 h-[2.5px] bg-[#B22222]/80 -translate-y-[calc(50%-1px)] origin-right rotate-12 group-hover:rotate-6 transition-transform duration-300 rounded-l-full z-0"></div>

            <div class="absolute left-5 top-1/2 -translate-y-1/2 w-4 h-4 rounded-full bg-surface shadow-[inset_1px_1px_4px_rgba(0,0,0,0.3)] border border-yellow-700/30 z-10"></div>

            <span class="relative z-10 tracking-wide text-lg">Lihat Semua Proyek</span>
            <i class="fa-solid fa-arrow-right text-sm relative z-10 group-hover:translate-x-1.5 transition-transform duration-300"></i>
        </a>
    </div>

   <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

        @forelse($recentProjects as $index => $project)
            @php
                $rotation = $index % 2 === 0 ? 'rotate-1' : '-rotate-1';
            @endphp

            <div class="group relative p-4 pt-12 shadow-inner bg-container rounded-xl {{ $rotation }} hover:rotate-0 transition-transform duration-500">

                <div class="absolute top-4 left-6 z-20">
                    <span class="px-4 py-1.5 text-[10px] font-black tracking-widest bg-warning text-yellow-900 border-l-4 border-yellow-500 shadow-md rotate-[-3deg] inline-block uppercase">
                        {{ $project->status }}
                    </span>
                </div>

                <div class="bg-surface p-4 shadow-[0_10px_30px_-10px_rgba(0,0,0,0.15)] border border-border">

                    <a href="{{ route('portofolio.projects', ['search' => $project->title]) }}"
                       class="project-open block"
                       data-id="{{ $project->id }}"
                       data-title="{{ $project->title }}"
                       data-desc="{{ $project->desc }}"
                       data-type="{{ $project->type }}"
                       data-status="{{ $project->status }}"
                       data-created="{{ $project->created_at->format('d M Y') }}"
                       data-updated="{{ $project->updated_at->format('d M Y') }}"
                       data-repo="{{ $project->repo }}"
                       data-role="{{ $project->role }}"
                       data-team="{{ $project->team_size }}"
                       data-responsibilities="{{ $project->responsibilities }}"
                       data-live="{{ $project->live_url }}"
                       data-screenshot='@json($project->screenshot ? collect($project->screenshot)->map(fn($img) => asset("storage/" . $img))->values() : [])'
                       data-tech='@json($project->tech)'>

                        <div class="aspect-video w-full bg-bg overflow-hidden mb-5 border border-border shadow-inner relative">
                            <div class="absolute inset-0 opacity-[0.03] pointer-events-none z-10" style="background-image: radial-gradient(var(--color-text) 0.5px, transparent 0.5px); background-size: 8px 8px;"></div>

                            <div class="relative w-full h-full overflow-hidden project-slider">

                                @if(!empty($project->screenshot) && count($project->screenshot) > 0)
                                    @foreach($project->screenshot as $i => $shot)
                                        <img
                                            src="{{ asset('storage/' . $shot) }}"
                                            onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';"
                                            class="slide absolute inset-0 w-full h-full object-cover transition-all duration-500 {{ $i === 0 ? 'opacity-100 grayscale-[0.3] group-hover:grayscale-0' : 'opacity-0 grayscale-0' }} group-hover:scale-105"
                                            alt="{{ $project->title }} screenshot {{ $i+1 }}"
                                        >
                                        <div style="display:none;" class="flex-col items-center justify-center w-full h-full text-muted p-4 text-center bg-surface">
                                            <i class="fa-regular fa-image text-3xl opacity-30 mb-2"></i>
                                            <span class="text-[9px] uppercase tracking-widest font-bold">Kliping Kosong</span>
                                        </div>
                                    @endforeach
                                @else
                                    <img
                                        src="https://via.placeholder.com/600x400/E5E4DF/52525B?text=Preview+Tidak+Tersedia"
                                        class="w-full h-full object-cover grayscale-[0.3] group-hover:grayscale-0 transition-all duration-500 group-hover:scale-105"
                                        alt="preview"
                                    >
                                @endif

                            </div>
                        </div>

                        <div class="px-1 pb-1">
                            <div class="flex justify-between items-start mb-1">
                                <span class="text-[9px] font-bold text-muted uppercase tracking-widest">{{ $project->type }}</span>
                            </div>

                            <h3 class="text-xl font-bold text-text leading-tight mb-3 group-hover:text-primary transition-colors line-clamp-1">
                                {{ $project->title }}
                            </h3>

                            <p class="text-sm text-muted line-clamp-3">
                                {{ $project->desc }}
                            </p>

                            <div class="pt-3 border-t border-border/50 flex justify-between items-center mt-4">
                                <span class="text-[10px] font-medium text-muted italic">
                                    Diarsipkan: {{ $project->created_at->format('Y') }}
                                </span>

                                <div class="w-8 h-8 rounded-full bg-bg flex items-center justify-center text-muted group-hover:bg-primary group-hover:text-white transition-all border border-border group-hover:border-primary shadow-sm">
                                    <i class="fa-solid fa-arrow-right-long text-xs transform group-hover:translate-x-0.5 transition-transform"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

        @empty
            <div class="col-span-full py-20 px-6 flex flex-col items-center justify-center text-center bg-[#fdfcf5] border border-[#e5e0d0] rounded-xl shadow-[4px_4px_0px_rgba(0,0,0,0.05)] relative font-sans overflow-hidden">

                <div class="absolute inset-0 z-0 opacity-30" style="background-image: repeating-linear-gradient(transparent, transparent 24px, #e5e0d0 24px, #e5e0d0 25px);"></div>

                <div class="absolute top-0 left-10 bottom-0 w-0.5 bg-red-300 z-10 opacity-60"></div>

                <div class="absolute bottom-4 right-6 text-3xl text-muted/50 rotate-12 z-10">
                    <i class="fa-solid fa-pencil-alt relative -right-2 top-1"></i>
                    <i class="fa-solid fa-pen-nib relative -rotate-12"></i>
                </div>

                <div class="relative z-20 space-y-3">
                    <h3 class="text-3xl font-medium text-black font-handwriting tracking-wide">
                        Arsip Kosong
                    </h3>

                    <p class="text-sm text-muted max-w-sm mx-auto italic font-serif opacity-90">
                        Belum ada proyek yang disorot untuk saat ini.
                    </p>
                </div>

            </div>
        @endforelse

    </div>

</section>

@push('script')
<script>
document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.project-slider').forEach(slider => {

        const slides = slider.querySelectorAll('.slide');
        if (slides.length <= 1) return;

        let index = 0;
        let interval = null;

        function showSlide(i) {
            slides.forEach((slide, k) => {
                slide.classList.toggle('opacity-100', k === i);
                slide.classList.toggle('opacity-0', k !== i);
            });
        }

        function startSlider() {
            if (interval) return;

            interval = setInterval(() => {
                index = (index + 1) % slides.length;
                showSlide(index);
            }, 1500);
        }

        function stopSlider() {
            clearInterval(interval);
            interval = null;

            index = 0;
            showSlide(index);
        }

        slider.addEventListener('mouseenter', startSlider);
        slider.addEventListener('mouseleave', stopSlider);

    });
});
</script>
@endpush
