<div id="projectEditModal"
     class="fixed inset-0 z-50 hidden flex items-center justify-center bg-black/60 backdrop-blur-sm p-4">

    <div class="relative bg-surface border border-border
                w-full max-w-2xl
                max-h-[85vh]
                overflow-y-auto
                p-6 space-y-6">

        <button id="editModalClose"
                class="absolute top-4 right-4 text-muted hover:text-text">
            ✕
        </button>

        <h2 class="text-xl font-semibold">Edit Project</h2>

        <form id="editForm"
              method="POST"
              enctype="multipart/form-data"
              class="space-y-4">

            @csrf
            @method('PUT')

            <input type="hidden" name="id" id="editId">

            <input type="text" name="title" id="editTitle"
                   class="w-full border border-border px-4 py-2">

            <textarea name="desc" id="editDesc"
                      class="w-full border border-border px-4 py-2"></textarea>

            <input type="text" name="repo" id="editRepo"
                   class="w-full border border-border px-4 py-2">

            <input type="text" name="live_url" id="editLive"
                   class="w-full border border-border px-4 py-2">

            <input type="file" name="screenshot[]" multiple>

            <div class="flex gap-4">
                <button type="submit"
                        class="px-4 py-2 bg-primary text-text border border-border">
                    Save
                </button>

                <button type="button"
                        id="cancelEdit"
                        class="px-4 py-2 border border-border">
                    Cancel
                </button>
            </div>

        </form>

    </div>
</div>
