<div class="bg-bg border border-border rounded-2xl p-6">
  <div class="flex items-center gap-4 mb-4">
    <i class="{{ $icon }} text-3xl text-{{ $color }}"></i>
    <div>
      <h4 class="font-semibold text-lg">{{ $title }}</h4>
      <p class="text-sm text-muted">{{ $subtitle }}</p>
    </div>
  </div>

  @if ($badge)
  <div class="mb-4">
    <span class="inline-block text-xs px-2 py-0.5 rounded-full
      bg-{{ $color }}/10 text-{{ $color }}">
      {{ $badge }}
    </span>
  </div>
  @endif

  <ul class="list-disc list-inside text-sm text-muted space-y-1">
    @foreach ($items as $item)
      <li>{{ $item }}</li>
    @endforeach
  </ul>
</div>