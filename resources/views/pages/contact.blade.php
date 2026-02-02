@extends('layouts.main')

@section('title', 'Contact')

<style>
.input {
  background: transparent;
  border-bottom: 1px solid var(--color-border);
  padding: 0.75rem 0;
  width: 100%;
  outline: none;
}

.input:focus {
  border-color: var(--color-primary);
}

.card-outline {
  border: 1px solid var(--color-border);
  transition: all .3s ease;
}

.card-outline:hover {
  border-color: var(--color-primary);
  transform: translateY(-4px);
}

.text-outline-thin {
  color: transparent;
  -webkit-text-stroke: 1px var(--color-text);
}

</style>


@section('content')

<section id="contact-hero" class="h-[100vh] flex items-center px-6">
  <div class="max-w-6xl mx-auto leading-[0.95] space-y-4">
    <h1 class="text-[clamp(4rem,12vw,10rem)] font-semibold text-outline">LET’S</h1>
    <h1 class="text-[clamp(4rem,12vw,10rem)] font-semibold">START</h1>
    <h1 class="text-[clamp(4rem,12vw,10rem)] font-semibold">SOMETHING</h1>
    <h2 class="text-[clamp(2rem,5vw,3.5rem)] text-outline-thin tracking-wider pt-6">
      TOGETHER
    </h2>
  </div>
</section>

<section class="max-w-5xl mx-auto px-6 py-32 grid md:grid-cols-12 gap-12">

  <div class="md:col-span-4">
    <p class="uppercase text-sm tracking-widest text-muted">
      Contact
    </p>
  </div>

  <form class="md:col-span-8 space-y-12">
    <div class="grid md:grid-cols-2 gap-8">
      <input class="input" placeholder="Your name" />
      <input class="input" placeholder="Email address" />
    </div>

    <input class="input" placeholder="Subject" />

    <textarea class="input h-32 resize-none"
      placeholder="Tell me about your idea"></textarea>

    <button
      class="inline-flex items-center gap-4 text-lg group">
      <span>Send message</span>
      <span class="group-hover:translate-x-2 transition">→</span>
    </button>
  </form>

</section>

<section class="max-w-6xl mx-auto px-6 pb-40">

  <div class="grid md:grid-cols-3 gap-6">

    <a href="#" class="card-outline p-8">
      <p class="text-sm uppercase tracking-widest text-muted">Instagram</p>
      <h3 class="text-2xl mt-4">@yourhandle</h3>
    </a>

    <a href="#" class="card-outline p-8">
      <p class="text-sm uppercase tracking-widest text-muted">GitHub</p>
      <h3 class="text-2xl mt-4">github.com/you</h3>
    </a>

    <a href="#" class="card-outline p-8">
      <p class="text-sm uppercase tracking-widest text-muted">LinkedIn</p>
      <h3 class="text-2xl mt-4">in/yourname</h3>
    </a>

  </div>

</section>
@endsection
