@extends('layouts.main')
@section('title', 'Contact')
@section('content')

{{-- HERO --}}
<section id="contact-hero" class="py-34 max-w-7xl mx-auto px-6 space-y-10 overflow-hidden">
    <p class="text-xs uppercase tracking-widest text-muted">
        index / contact
    </p>

    <h1 class="text-[clamp(3.5rem,9vw,7rem)] font-semibold leading-[1.1]">
        <span>Contact</span>
        <span class="block text-muted font-normal">Let’s talk.</span>
    </h1>

    <p class="text-muted max-w-xl leading-relaxed">
        Whether you have a project in mind, a question, or just want to say hi,
        feel free to reach out. I’m always open to new conversations.
    </p>
</section>

<section class="max-w-6xl mx-auto px-6 py-32 space-y-16">


    {{-- HEADER --}}
    <header class="space-y-4 max-w-xl">
        <p class="text-xs uppercase tracking-widest text-muted">
            index / request
        </p>

        <h2 class="text-[clamp(2rem,4vw,3rem)] font-semibold leading-tight">
            Request folder
        </h2>

        <p class="text-muted leading-relaxed">
            Each message is stored as a request file and reviewed individually.
        </p>
    </header>
      <div class="grid md:grid-cols-2 gap-6 items-start">

    {{-- FOLDER --}}
    <div class="relative border border-border bg-surface p-6 pt-12">

        {{-- TAB --}}
        <div class="absolute top-0 left-6 -translate-y-1/2 flex gap-2">
            <span class="px-4 py-1 text-xs uppercase tracking-widest badge-primary font-semibold">
                Request
            </span>
            <span class="px-3 py-1 text-[10px] uppercase tracking-wide border border-border text-muted">
                New
            </span>
        </div>

                            <span class="file"></span>
                    <span class="file"></span>

        {{-- FILE --}}
        <div class="border border-border bg-surface p-6 space-y-8">

            <div>
                <p class="text-xs uppercase tracking-widest text-muted">
                    File type
                </p>
                <p class="mt-2 text-sm">
                    New project / Collaboration / Inquiry
                </p>
            </div>

            <div>
                <p class="text-xs uppercase tracking-widest text-muted">
                    Sender
                </p>
                <input
                    class="contact-input mt-2"
                    placeholder="email@domain.com">
            </div>

            <div>
                <p class="text-xs uppercase tracking-widest text-muted">
                    Message
                </p>
                <textarea
                    rows="4"
                    class="contact-input mt-2 resize-none"
                    placeholder="Describe your request..."></textarea>
            </div>

            <div class="flex justify-end pt-2">
                <button
                    class="px-6 py-3 border border-border text-xs uppercase tracking-widest hover:border-primary transition">
                    Save file
                </button>
            </div>

        </div>

    </div>
            {{-- SYSTEM NOTE --}}
        <div class="hidden md:flex items-end text-sm text-muted leading-relaxed">
            This folder accepts limited requests.
            Responses may take time depending on workload.
        </div>
</div>
</section>





<section class="max-w-6xl mx-auto px-6 pb-40 space-y-10">

    {{-- HEADER --}}
    <header class="space-y-4 max-w-xl">
        <p class="text-xs uppercase tracking-widest text-muted">
            index / social
        </p>

        <h2 class="text-[clamp(2rem,4vw,3rem)] font-semibold leading-tight">
            Find me elsewhere
        </h2>

        <p class="text-muted leading-relaxed">
            Other places where I share work, thoughts, and ongoing experiments.
        </p>
    </header>

    <div class="grid md:grid-cols-3 gap-6">

        <a href="#" class="card-outline p-8 group border border-border">
            <p class="text-sm uppercase tracking-widest text-muted ">
                Instagram
            </p>
            <h3 class="text-2xl mt-4 group-hover:underline">
                @fdln007
            </h3>
        </a>

        <a href="#" class="card-outline p-8 group border border-border">
            <p class="text-sm uppercase tracking-widest text-muted">
                GitHub
            </p>
            <h3 class="text-2xl mt-4 group-hover:underline">
                github.com/Fadlan079
            </h3>
        </a>

        <a href="#" class="card-outline p-8 group border border-border">
            <p class="text-sm uppercase tracking-widest text-muted">
                LinkedIn
            </p>
            <h3 class="text-2xl mt-4 group-hover:underline">
                in/fadlanfirdaus
            </h3>
        </a>

    </div>

</section>


{{-- END --}}
<section id="contact-end" class="py-32 border-t border-border overflow-hidden">
    <div class="max-w-6xl mx-auto px-6 space-y-10">

        <p class="text-xs uppercase tracking-widest text-muted">
            index / end
        </p>

        <h3 class="text-[clamp(2rem,5vw,3rem)] font-semibold leading-tight max-w-2xl">
            Good conversations start with a simple message.
        </h3>

        <p class="text-muted max-w-xl leading-relaxed">
            Clear intent, honest communication, and mutual respect are the
            foundation of any meaningful collaboration.
        </p>

    </div>
</section>

@endsection
