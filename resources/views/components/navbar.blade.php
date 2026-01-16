<nav class="fixed top-0 left-0 right-0 bg-bg/80 backdrop-blur border-b border-border z-50">
  <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

    <h1 class="text-xl font-bold text-primary">
      {{ $brand ?? 'App' }}
    </h1>

    <ul class="hidden md:flex gap-6 text-sm">
      @foreach ($menus as $menu)
        <li class="relative group">
          <a href="{{ $menu['href'] }}"
             class="{{ request()->is(ltrim($menu['href'], '/')) ? 'text-primary' : 'hover:text-primary' }}">
            {{ $menu['label'] }}
          </a>
          <span class="absolute left-0 -bottom-1 h-0.5 w-0 bg-primary transition-all group-hover:w-full"></span>
        </li>
      @endforeach
    </ul>

    <div class="flex items-center gap-2">
      <button onclick="toggleTheme()"
        class="w-10 h-10 rounded-lg border border-border bg-surface
               flex items-center justify-center hover:bg-bg transition">
        <i id="themeIcon" class="fa-solid fa-moon"></i>
      </button>

      <button id="mobileMenuBtn"
        class="md:hidden w-10 h-10 rounded-lg border border-border bg-surface
               flex items-center justify-center">
        <i class="fa-solid fa-bars"></i>
      </button>
    </div>

  </div>
</nav>

<div id="mobileOverlay"
  class="fixed inset-0 bg-black/40 z-40 opacity-0 pointer-events-none transition">
</div>

<aside id="mobileSidebar"
  class="fixed top-0 left-0 h-full w-72 bg-bg border-r border-border
         z-50 -translate-x-full pointer-events-none
         transition-transform duration-300 rounded-r-2xl">

  <div class="p-6 flex justify-between items-center border-b border-border">
    <span class="font-bold text-lg text-primary">
      {{ $brand ?? 'App' }}
    </span>

    <button id="mobileCloseBtn" class="text-xl">
      <i class="fa-solid fa-xmark"></i>
    </button>
  </div>

  <nav class="p-6 flex flex-col gap-4 text-sm">
    @foreach ($menus as $menu)
      <a href="{{ $menu['href'] }}"
        class="block py-2 px-3 rounded-lg
        {{ request()->is(ltrim($menu['href'], '/')) ? 'bg-primary text-primary font-semibold' : 'hover:bg-bg' }}">
        {{ $menu['label'] }}
      </a>
    @endforeach
  </nav>
</aside>

<script>
document.addEventListener('DOMContentLoaded', () => {
  const openBtn  = document.getElementById('mobileMenuBtn');
  const closeBtn = document.getElementById('mobileCloseBtn');
  const sidebar  = document.getElementById('mobileSidebar');
  const overlay  = document.getElementById('mobileOverlay');

  function openSidebar() {
    sidebar.classList.remove('-translate-x-full','pointer-events-none');
    overlay.classList.remove('opacity-0','pointer-events-none');
  }

  function closeSidebar() {
    sidebar.classList.add('-translate-x-full','pointer-events-none');
    overlay.classList.add('opacity-0','pointer-events-none');
  }

  openBtn?.addEventListener('click', openSidebar);
  closeBtn?.addEventListener('click', closeSidebar);
  overlay?.addEventListener('click', closeSidebar);
});
</script>