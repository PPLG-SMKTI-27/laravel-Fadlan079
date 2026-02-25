@php
$type = session('success') ? 'success'
    : (session('error') ? 'error'
    : (session('warning') ? 'warning'
    : (session('info') ? 'info' : null)));

$message = session($type);

$colors = [
    'success' => 'var(--color-success)',
    'error' => 'var(--color-danger)',
    'warning' => 'orange',
    'info' => 'var(--color-primary)'
];

$icons = [
    'success' => '✓',
    'error' => '✕',
    'warning' => '!',
    'info' => 'i'
];

$titles = [
    'success' => 'Berhasil',
    'error' => 'Terjadi Kesalahan',
    'warning' => 'Peringatan',
    'info' => 'Informasi'
];

$descriptions = [
    'success' => 'Perubahan berhasil diproses dan tersimpan secara aman.',
    'error' => 'Silakan periksa kembali data atau coba beberapa saat lagi.',
    'warning' => 'Harap periksa kembali sebelum melanjutkan.',
    'info' => 'Silakan perhatikan informasi berikut.'
];
@endphp

@if($type)

<div id="global-modal"
    class="fixed inset-0 z-50 flex items-center justify-center">

    <!-- BACKDROP -->
    <div id="modal-backdrop"
        class="absolute inset-0 backdrop-blur-md"
        style="background: rgba(0,0,0,0.55);">
    </div>

    <!-- MODAL BOX -->
    <div id="modal-box"
        class="relative w-[340px] p-8 text-center"
        style="
            opacity: 0;
            transform: scale(0.6) translateY(50px);
            will-change: transform, opacity;
            background: linear-gradient(
                145deg,
                var(--color-surface),
                var(--color-container)
            );
            border: 1px solid var(--color-border);
            border-radius: 24px;
            box-shadow: 0 25px 60px rgba(0,0,0,0.6);
            color: var(--color-text);
        ">

        <!-- ICON -->
        <div class="flex justify-center mb-6">
            <div id="modal-icon"
                class="icon-circle"
                style="background: {{ $colors[$type] }}">
                {{ $icons[$type] }}
            </div>
        </div>

        <!-- TITLE -->
        <h2 id="modal-title"
            class="text-xl font-semibold mb-2"
            style="color: var(--color-primary);">
            {{ $titles[$type] }}
        </h2>

        <!-- MAIN MESSAGE -->
        <p id="modal-message"
            class="text-sm mb-3"
            style="color: var(--color-text);">
            {{ $message }}
        </p>

        <!-- DESCRIPTION -->
        <p id="modal-desc"
            class="text-xs"
            style="color: var(--color-muted);">
            {{ $descriptions[$type] }}
        </p>

    </div>
</div>

<style>
.icon-circle {
    width: 80px;
    height: 80px;
    color: white;
    border-radius: 50%;
    font-size: 34px;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 10px 25px rgba(0,0,0,0.4);
}
</style>

@endif
