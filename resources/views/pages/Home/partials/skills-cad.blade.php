@php
    $skillsByCategory = $skills->groupBy('category');
@endphp

<style>
    /* ── Tooltip ── */
    .skt-tip {
        position: fixed;
        z-index: 9999;
        pointer-events: none;
        opacity: 0;
        width: 210px;
        transition: opacity 0.18s ease;
    }

    .skt-tip.show {
        opacity: 1;
    }

    .skt-tip-inner {
        background: rgba(14, 12, 18, 0.97);
        border: 1px solid rgba(200, 185, 155, 0.17);
        box-shadow: 0 0 28px rgba(0, 0, 0, 0.7), 0 0 0 1px rgba(0, 0, 0, 0.5);
        padding: 11px 14px;
        backdrop-filter: blur(18px);
    }

    .skt-tip-cat {
        font-size: 0.5rem;
        font-weight: 700;
        letter-spacing: 0.2em;
        text-transform: uppercase;
        margin-bottom: 3px;
        border-bottom: 1px solid rgba(200, 185, 155, 0.09);
        padding-bottom: 4px;
    }

    .skt-tip-name {
        font-size: 0.9rem;
        font-weight: 700;
        font-family: 'Space Grotesk', sans-serif;
        margin: 4px 0 2px;
    }

    .skt-tip-sub {
        font-size: 0.58rem;
        font-style: italic;
        margin-bottom: 8px;
        color: rgba(200, 185, 155, 0.5);
    }

    .skt-tip-proj {
        font-size: 0.58rem;
        color: rgba(200, 185, 155, 0.65);
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .skt-tip-proj::before {
        content: '▸';
        opacity: 0.6;
    }
</style>

<section id="skills-cad"
    class="py-24 bg-background overflow-hidden relative font-mono text-text selection:bg-primary selection:text-black">
    <div class="absolute inset-0 z-0 opacity-10"
        style="background-image: linear-gradient(var(--color-border) 1px, transparent 1px), linear-gradient(90deg, var(--color-border) 1px, transparent 1px); background-size: 40px 40px;">
    </div>

    <div class="max-w-7xl mx-auto px-6 relative z-10">

        <div
            class="border-t border-b border-text/20 py-2 flex justify-between text-[10px] uppercase tracking-widest mb-16">
            <span>DWG. NO: SKL-2026-X</span>
            <span>SCALE: 1:1</span>
            <span>REV: 05_FOCUS</span>
        </div>

        <div class="grid lg:grid-cols-2 gap-16 items-start">

            <div class="relative sticky top-24">
                <div class="absolute -top-4 -left-4 w-4 h-4 border-t border-l border-primary/50"></div>
                <h3 class="text-5xl md:text-7xl font-bold tracking-tighter uppercase mb-6 leading-[0.9]">
                    <span>Tech</span> <br />
                    <span class="text-transparent border-text" style="-webkit-text-stroke: 1px var(--color-text);">Stack</span>
                </h3>
                <p class="text-xs uppercase leading-relaxed text-muted max-w-sm border-l border-primary/50 pl-4"
                    data-i18n="home.skills_cad.desc">
                    Overview of core technologies and frameworks. Select a category to view detailed skills and tools.
                </p>
            </div>

            <div class="border border-text/20 relative p-8 min-h-[400px]" id="cad-schematic-box">
                <div class="absolute -top-1 -left-1 w-2 h-2 bg-primary"></div>
                <div class="absolute -bottom-1 -right-1 w-2 h-2 bg-primary"></div>
                <div class="absolute top-0 right-4 -translate-y-full text-[9px] py-1 text-muted">WIDTH: 100%</div>

                @php
                    $categories = [
                        [
                            'id' => 'backend',
                            'name' => 'Backend Logic',
                            'sec' => 'Sec_A',
                            'ver' => '8.x',
                            'color' => '#f87171',
                            'sub' => 'Server · Database · API',
                        ],
                        [
                            'id' => 'frontend',
                            'name' => 'Client Interface',
                            'sec' => 'Sec_B',
                            'ver' => '3.x',
                            'color' => '#38bdf8',
                            'sub' => 'UI · Markup · Styling',
                        ],
                        [
                            'id' => 'tools',
                            'name' => 'DevOps & Tools',
                            'sec' => 'Sec_C',
                            'ver' => '1.x',
                            'color' => '#a3e635',
                            'sub' => 'Scripting · DevOps',
                        ],
                    ];
                @endphp

                @foreach ($categories as $cat)
                    {{-- Kategori Block --}}
                    <div class="cad-section mb-10 relative transition-all duration-500" id="sec-{{ $cat['id'] }}">
                        <div class="absolute -left-12 top-2 text-[10px] -rotate-90 text-primary uppercase">
                            {{ $cat['sec'] }}</div>

                        <div class="flex justify-between items-end border-b border-text/30 pb-2 mb-4">
                            <div>
                                <span class="text-sm font-bold uppercase tracking-widest">{{ $cat['name'] }}</span>
                                <span class="text-[10px] text-muted ml-2">VER {{ $cat['ver'] }}</span>
                            </div>
                            {{-- Tombol Expand / Focus --}}
                            <button
                                class="cad-focus-btn text-[10px] uppercase tracking-widest text-primary hover:text-text transition-colors bg-transparent border-none cursor-pointer"
                                onclick="toggleCadFocus('{{ $cat['id'] }}')">
                                [+] ISOLATE
                            </button>
                        </div>

                        {{-- Container Skill (Dengan limit tinggi default) --}}
                        <div class="cad-skill-list flex flex-wrap gap-3 overflow-hidden transition-all duration-700 max-h-[76px]"
                            id="list-{{ $cat['id'] }}">
                            @foreach ($skillsByCategory->get($cat['id'], []) as $skill)
                                <span
                                    class="skt-node px-3 py-1 border border-text/20 text-xs hover:bg-text hover:text-background transition-colors cursor-crosshair"
                                    data-name="{{ $skill->name }}" data-cat="{{ strtoupper($cat['id']) }}"
                                    data-color="{{ $cat['color'] }}" data-sub="{{ $cat['sub'] }}"
                                    data-desc="{{ $skill->description }}" data-proj="{{ $skill->projects_count }}">
                                    {{ $skill->name }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</section>

<div class="skt-tip" id="sktTip2">
    <div class="skt-tip-inner">
        <p class="skt-tip-cat" id="sT2Cat"></p>
        <p class="skt-tip-name" id="sT2Name"></p>
        <p class="skt-tip-sub" id="sT2Sub"></p>
        <p class="skt-tip-desc text-muted mt-2 text-xs leading-relaxed" id="sT2Desc"></p>
        <p class="skt-tip-proj mt-2 pt-2 border-t border-border/50" id="sT2Proj"></p>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const tip = document.getElementById('sktTip2');
        const tipCat = document.getElementById('sT2Cat');
        const tipName = document.getElementById('sT2Name');
        const tipSub = document.getElementById('sT2Sub');
        const tipDesc = document.getElementById('sT2Desc');
        const tipProj = document.getElementById('sT2Proj');

        // Grab all skill nodes generated by blade
        const nodes = document.querySelectorAll('.skt-node');

        function showTip(e) {
            const t = e.target;

            // Extract data
            const cat = t.getAttribute('data-cat') || '';
            const name = t.getAttribute('data-name') || '';
            const color = t.getAttribute('data-color') || '#fbbf24';
            const sub = t.getAttribute('data-sub') || '';
            const desc = t.getAttribute('data-desc') || '';
            const proj = parseInt(t.getAttribute('data-proj') || '0', 10);

            // Update Tooltip DOM
            tipCat.textContent = cat;
            tipCat.style.color = color;

            tipName.textContent = name;
            tipName.style.color = color;

            tipSub.textContent = sub;

            if (desc) {
                tipDesc.textContent = desc;
                tipDesc.style.display = 'block';
            } else {
                tipDesc.style.display = 'none';
            }

            if (proj > 0) {
                tipProj.textContent = proj + (proj === 1 ? ' project' : ' projects');
                tipProj.style.display = 'flex';
            } else {
                tipProj.style.display = 'none';
            }

            moveTip(e);
            tip.classList.add('show');
        }

        function moveTip(e) {
            const TW = 220,
                TH = tip.offsetHeight || 120;
            let tx = e.clientX + 16,
                ty = e.clientY - TH / 2;

            // Screen bounds checking
            if (tx + TW > window.innerWidth) tx = e.clientX - TW - 16;
            if (ty < 6) ty = 6;
            if (ty + TH > window.innerHeight) ty = window.innerHeight - TH - 6;

            tip.style.left = tx + 'px';
            tip.style.top = ty + 'px';
        }

        function hideTip() {
            tip.classList.remove('show');
        }

        // Attach listeners to nodes
        nodes.forEach(node => {
            node.addEventListener('mouseenter', showTip);
            node.addEventListener('mousemove', moveTip);
            node.addEventListener('mouseleave', hideTip);
        });
    });

    // Logika untuk Focus Mode (Isolate View)
    function toggleCadFocus(targetId) {
        const sections = ['backend', 'frontend', 'tools'];
        const targetSec = document.getElementById('sec-' + targetId);
        const isCurrentlyFocused = targetSec.classList.contains('is-focused');

        sections.forEach(id => {
            const sec = document.getElementById('sec-' + id);
            const list = document.getElementById('list-' + id);
            const btn = sec.querySelector('.cad-focus-btn');

            if (!isCurrentlyFocused) {
                // Mau masuk Focus Mode
                if (id === targetId) {
                    sec.style.display = 'block';
                    sec.classList.add('is-focused');
                    list.style.maxHeight = '2000px'; // Buka batas tinggi
                    btn.innerHTML = '[-] RETURN';
                    btn.classList.replace('text-primary',
                        'text-red-500'); // Ganti warna tombol buat indikasi balik
                } else {
                    sec.style.display = 'none'; // Sembunyikan kategori lain
                }
            } else {
                // Mau balik ke mode Normal (Tampil semua)
                sec.style.display = 'block';
                sec.classList.remove('is-focused');
                list.style.maxHeight =
                    '76px'; // Kembalikan batas tinggi (sesuaikan pixel ini dgn kira-kira 2 baris skill)
                btn.innerHTML = '[+] ISOLATE';
                btn.classList.replace('text-red-500', 'text-primary');
            }
        });
    }
</script>