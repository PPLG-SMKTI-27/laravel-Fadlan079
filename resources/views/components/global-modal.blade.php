@php
$type = session('success') ? 'success'
    : (session('error') ? 'error'
    : (session('warning') ? 'warning'
    : (session('info') ? 'info' : null)));

$message = session($type);

// Penyesuaian warna ala terminal/system
$colors = [
    'success' => '#10b981', // Emerald
    'error'   => '#ef4444', // Red
    'warning' => '#f59e0b', // Amber
    'info'    => 'var(--color-primary)'
];

// Menggunakan FontAwesome Icons
$icons = [
    'success' => 'fa-solid fa-check',
    'error'   => 'fa-solid fa-triangle-exclamation',
    'warning' => 'fa-solid fa-radiation',
    'info'    => 'fa-solid fa-info'
];

$titles = [
    'success' => 'Process_Success',
    'error'   => 'System_Fault',
    'warning' => 'Warning_Alert',
    'info'    => 'System_Info'
];

$descriptions = [
    'success' => 'Perubahan berhasil diproses dan tersimpan secara aman.',
    'error'   => 'Silakan periksa kembali data atau coba beberapa saat lagi.',
    'warning' => 'Harap periksa kembali sebelum melanjutkan eksekusi.',
    'info'    => 'Silakan perhatikan log informasi berikut.'
];
@endphp

@if($type)
<div id="global-modal" class="fixed inset-0 z-[99999] flex items-center justify-center font-sans px-4">

    <div id="modal-backdrop" class="absolute inset-0 bg-[#0a0a0a]/80 backdrop-blur-sm cursor-pointer" style="opacity: 0;"></div>

    <div id="modal-box" 
         class="relative w-full max-w-[400px] bg-background border border-border shadow-[0_0_50px_rgba(0,0,0,0.8)] overflow-hidden"
         style="border-top-color: {{ $colors[$type] }}; border-top-width: 2px; opacity: 0; transform: scale(0.9) translateY(30px);">

        <div class="flex justify-between items-center px-4 py-2 border-b border-border/50 bg-surface/50">
            <div class="flex items-center gap-2 font-mono text-[10px] uppercase tracking-widest text-muted">
                <span class="w-2 h-2 rounded-full animate-pulse" style="background: {{ $colors[$type] }}; box-shadow: 0 0 8px {{ $colors[$type] }};"></span>
                SYS.DIALOG // {{ strtoupper($type) }}
            </div>
            
            <button id="modal-close-btn" class="text-muted hover:text-text hover:bg-red-500/20 transition-colors w-6 h-6 flex items-center justify-center rounded-sm">
                <i class="fa-solid fa-xmark text-sm"></i>
            </button>
        </div>

        <div class="p-6 md:p-8 flex items-start gap-5">
            
            <div id="modal-icon-box" class="shrink-0 w-12 h-12 flex items-center justify-center border bg-surface/30 mt-1 relative"
                 style="border-color: {{ $colors[$type] }}40; color: {{ $colors[$type] }};">
                 <div class="absolute top-0 left-0 w-1.5 h-1.5 border-t border-l" style="border-color: {{ $colors[$type] }};"></div>
                 <div class="absolute bottom-0 right-0 w-1.5 h-1.5 border-b border-r" style="border-color: {{ $colors[$type] }};"></div>
                 <i class="{{ $icons[$type] }} text-xl"></i>
            </div>

            <div class="flex-1">
                <h2 id="modal-title" class="text-lg md:text-xl font-bold uppercase tracking-wide mb-1 font-mono" style="color: {{ $colors[$type] }};">
                    {{ $titles[$type] }}
                </h2>
                
                <p id="modal-message" class="text-sm text-text leading-relaxed font-sans opacity-90">
                    {{ $message }}
                </p>
                
                <div id="modal-desc" class="mt-4 pt-4 border-t border-border/40 font-mono">
                    <p class="text-[10px] text-muted uppercase tracking-widest leading-relaxed">
                        <span style="color: {{ $colors[$type] }};">>_</span> {{ $descriptions[$type] }}
                    </p>
                </div>
            </div>
            
        </div>

        <div class="absolute bottom-1 right-1 w-4 h-4 border-b border-r border-border/50 pointer-events-none"></div>

    </div>
</div>
@endif