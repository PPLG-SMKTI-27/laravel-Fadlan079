@extends('layouts.main')
@section('title', __('projects'))
@section('content')
<x-navbar
brand="Fadlan"
:menus="[
    ['key' => 'nav.home', 'href' => '/'],
]"
/>

<header class="pt-32 pb-16 text-center">
  <h1 class="text-4xl md:text-5xl font-extrabold mb-4"> 
    Projects <span class="text-primary">{{$nama}}</span>
  </h1>
  <p class="text-muted max-w-2xl mx-auto">
    Kumpulan project yang pernah saya kerjakan sebagai
    <strong>Full Stack Developer</strong>
  </p>
</header>

<section class="pb-10">
  <div class="max-w-6xl mx-auto px-6 flex justify-center gap-4 flex-wrap">
    <button class="px-4 py-2 bg-primary text-white rounded-lg text-sm">All</button>
    <button class="px-4 py-2 bg-surface border border-border rounded-lg text-sm hover:text-primary">Backend</button>
    <button class="px-4 py-2 bg-surface border border-border rounded-lg text-sm hover:text-primary">Frontend</button>
    <button class="px-4 py-2 bg-surface border border-border rounded-lg text-sm hover:text-primary">API</button>
  </div>
</section>

<section class="pb-20">
  <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-3 gap-8">
    @foreach ($list as $l)
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
</section>

<x-footer
brand="Fadlan"
description="Full Stack Developer yang membangun aplikasi web modern dengan antarmuka responsif, backend yang terstruktur, dan pengelolaan data yang rapi."
:links="[
    ['key' => 'nav.home', 'href' => '/'],
]"
:socials="[
    ['icon' => 'fa-brands fa-github', 'href' => 'https://github.com/Fadlan079'],
    ['icon' => 'fa-brands fa-linkedin', 'href' => 'https://www.linkedin.com/in/fadlan-firdaus-148344386/'],
    ['icon' => 'fa-brands fa-instagram', 'href' => 'https://instagram.com/fdln007'],
    ['icon' => 'fa-solid fa-envelope', 'href' => 'mailto:fadlanfirdaus220@gmail.com'],
    ['icon' => 'fa-brands fa-whatsapp', 'href' => 'https://wa.me/6282210732928'],
]"
/>
@endsection
