<div class="max-w-7xl mx-auto px-6">
    <h3 class="text-3xl font-bold text-center mb-4 text-primary" data-i18n="projects"></h3>
    <p class="text-muted text-center mb-12" data-i18n="subtitle.projects"></p>

    <div class="grid md:grid-cols-3 gap-8">
       @foreach ($featuredProjects as $l)
        <div class="bg-surface border border-border rounded-2xl p-6 hover:-translate-y-2 transition">
            <div class="flex justify-between items-center mb-3">
                <h4 class="text-xl font-semibold">{{$l['title']}}</h4>
                <span class="text-xs px-2 py-1 rounded bg-{{$l['statusColor']}}/20 text-{{$l['statusColor']}}">
                {{$l['status']}}
                </span>
            </div>

            <p class="text-muted text-sm mb-4">{{$l['desc']}}</p>

            <div class="flex flex-wrap gap-2 text-xs mb-4">
                @foreach ($l['tech'] as $tech)
                    <span class="px-2 py-1 bg-bg border border-border rounded">
                        {{ $tech }}
                    </span>
                @endforeach
            </div>

            <a href="{{$l['repo']}}" class="text-primary text-sm font-semibold hover:underline">
                Lihat Detail →
            </a>
        </div>
         @endforeach
    </div>
    <div class="mt-16 flex justify-center">
        <a
            href="project"
            class="px-8 py-3 rounded-2xl
                bg-primary text-white font-semibold
                hover:bg-primary/90 transition
                shadow-lg shadow-primary/20"
        >
            Lihat Project Lebih Lengkap →
        </a>
    </div>
</div>
