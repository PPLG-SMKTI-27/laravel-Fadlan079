<style>
    /* Hide Scrollbar Elegant */
.hide-scrollbar {
    -ms-overflow-style: none;
    scrollbar-width: none;
}

.hide-scrollbar::-webkit-scrollbar {
    display: none;
}

</style>

<!-- PROJECT DETAIL MODAL -->
<div id="projectDetailModal"
     class="fixed inset-0 z-50 hidden items-center justify-center bg-black/60 backdrop-blur-sm p-4">

    <div class="relative bg-surface border border-border
                w-full max-w-3xl
                max-h-[85vh]
                overflow-y-auto hide-scrollbar
                p-6
                space-y-6">

        <!-- Close Button -->
        <button id="detailModalClose"
                class="absolute top-4 right-4 text-muted hover:text-text transition">
            ✕
        </button>

        <!-- HEADER -->
        <div class="space-y-4">

            <div class="flex items-center gap-3">
                <span id="detailType"
                      class="px-3 py-1 text-xs uppercase tracking-widest badge-primary font-semibold"></span>

                <span id="detailStatus"
                      class="px-3 py-1 text-[10px] uppercase tracking-wide border border-border text-muted"></span>
            </div>

            <h2 id="detailTitle"
                class="text-2xl font-semibold leading-tight"></h2>

            <p id="detailDesc"
               class="text-muted leading-relaxed text-sm"></p>

            <div>
                <p class="text-muted uppercase tracking-wide text-xs mb-2">Tech Stack</p>
                <div id="detailTech" class="flex flex-wrap gap-2"></div>
            </div>

        </div>

        <!-- ROLE & TEAM -->
        <div class="grid grid-cols-2 gap-6 text-sm">
            <div>
                <p class="text-muted uppercase tracking-wide text-xs">Role</p>
                <p id="detailRole" class="mt-1 font-medium"></p>
            </div>

            <div>
                <p class="text-muted uppercase tracking-wide text-xs">Team Size</p>
                <p id="detailTeamSize" class="mt-1 font-medium"></p>
            </div>
        </div>

        <!-- RESPONSIBILITIES -->
        <div>
            <p class="text-muted uppercase tracking-wide text-xs">Responsibilities</p>
            <p id="detailResponsibilities"
               class="mt-1 text-muted leading-relaxed text-sm"></p>
        </div>

        <div class="h-px bg-border w-full opacity-40"></div>

        <!-- META -->
        <div class="grid grid-cols-2 gap-6 text-sm">
            <div>
                <p class="text-muted uppercase tracking-wide text-xs">Created</p>
                <p id="detailCreated" class="mt-1 font-medium"></p>
            </div>

            <div>
                <p class="text-muted uppercase tracking-wide text-xs">Last Update</p>
                <p id="detailUpdated" class="mt-1 font-medium"></p>
            </div>
        </div>

        <!-- PROJECT FILES -->
        <div id="detailScreenshotsWrapper" class="hidden space-y-3">
            <p class="text-muted uppercase tracking-wide text-xs">Project Files</p>

            <div id="detailScreenshots"
                 class="grid grid-cols-2 md:grid-cols-4 gap-3">

                <!-- Example Item (JS will generate this dynamically) -->
                <!--
                <div class="aspect-square overflow-hidden border border-border/50 bg-surface/40 group">
                    <img src="..."
                         class="w-full h-full object-cover transition duration-500 group-hover:scale-105">
                </div>
                -->

            </div>
        </div>

        <!-- ACTIONS -->
        <div class="flex flex-wrap gap-3 pt-4">

            <a id="detailLive"
               target="_blank"
               class="px-4 py-2 border border-border text-sm hover:border-primary transition">
                Live Preview
            </a>

            <a id="detailRepo"
               target="_blank"
               class="px-4 py-2 border border-border text-sm hover:border-primary transition">
                View Repository
            </a>

            @auth
                <button id="detailEditBtn"
                        class="px-4 py-2 border border-border text-sm hover:border-primary transition">
                    Edit Project
                </button>
            @endauth

        </div>

    </div>
</div>

<div id="imageLightbox"
     class="fixed inset-0 z-60 hidden items-center justify-center bg-black/80 backdrop-blur-sm p-6">

    <button id="lightboxClose"
            class="absolute top-6 right-6 text-white text-2xl">
        ✕
    </button>

    <img id="lightboxImage"
         class="max-h-[90vh] max-w-[90vw] object-contain shadow-2xl">
</div>
