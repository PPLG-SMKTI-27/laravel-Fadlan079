<div id="confirm-modal"
    class="fixed inset-0 z-[90] flex items-center justify-center pointer-events-none opacity-0">

    <!-- BACKDROP -->
    <div id="confirm-backdrop"
        class="absolute inset-0 backdrop-blur-md bg-black/60">
    </div>

    <!-- BOX -->
    <div id="confirm-box"
        class="relative w-[380px] p-8 text-center
               bg-surface border border-border rounded-2xl shadow-2xl">

        <div class="mb-5">
            <div id="confirm-icon"
                class="w-16 h-16 mx-auto flex items-center justify-center
                       rounded-full bg-red-500 text-white text-2xl shadow-lg">
                !
            </div>
        </div>

        <h2 class="text-lg font-semibold mb-2">
            Confirm Action
        </h2>

        <p id="confirm-message"
            class="text-sm text-muted mb-6">
            Are you sure?
        </p>

        <div class="flex justify-center gap-4">
            <button id="confirm-cancel"
                class="px-4 py-2 border border-border text-sm">
                Cancel
            </button>

            <button id="confirm-yes"
                class="px-4 py-2 border border-red-500 text-red-400 text-sm">
                Yes, Continue
            </button>
        </div>

    </div>
</div>
