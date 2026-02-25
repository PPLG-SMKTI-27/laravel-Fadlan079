<style>
.hide-scrollbar {
    -ms-overflow-style: none;
    scrollbar-width: none;
}

.hide-scrollbar::-webkit-scrollbar {
    display: none;
}
</style>

<div id="projectEditModal"
     class="fixed inset-0 z-70 hidden flex items-center justify-center bg-black/60 backdrop-blur-sm p-4">

    <div class="relative bg-surface border border-border
                w-full max-w-3xl
                max-h-[85vh]
                overflow-y-auto hide-scrollbar
                p-6 space-y-6  shadow-lg">

        <button id="editModalClose"
                class="absolute top-4 right-4 text-muted hover:text-text transition">
            ✕
        </button>

        <form id="editForm" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" id="editId">

            <!-- Type + Status -->
            <div class="flex items-center gap-3">
                <select id="editType" name="type"
                        class="px-3 py-1 text-xs uppercase tracking-widest badge-primary font-semibold border border-border focus:ring-1 focus:ring-primary focus:outline-none">
                    <option value="Website">Website</option>
                    <option value="Web App">Web App</option>
                    <option value="Application">Application</option>
                    <option value="Design">Design</option>
                </select>

                <select id="editStatus" name="status"
                        class="px-3 py-1 text-[10px] uppercase tracking-wide border border-border text-muted focus:ring-1 focus:ring-primary focus:outline-none">
                    <option value="Shipped">Shipped</option>
                    <option value="In Progress">In Progress</option>
                    <option value="Prototype">Prototype</option>
                    <option value="Archived">Archived</option>
                </select>
            </div>

            <!-- Title -->
            <div class="space-y-2">
                <label for="editTitle" class="text-sm font-medium text-muted">Title</label>
                <input type="text" name="title" id="editTitle"
                       class="w-full border border-border  px-4 py-2 focus:ring-1 focus:ring-primary focus:outline-none">
            </div>

            <!-- Description -->
            <div class="space-y-2">
                <label for="editDesc" class="text-sm font-medium text-muted">Description</label>
                <textarea name="desc" id="editDesc"
                          class="w-full border border-border px-4 py-2 focus:ring-1 focus:ring-primary focus:outline-none"></textarea>
            </div>

            <!-- Tech Stack -->
            <div class="space-y-2">
                <label for="editTech" class="text-sm font-medium text-muted">Tech Stack (comma separated)</label>
                <input type="text" name="tech" id="editTech"
                       class="w-full border border-border  px-4 py-2 focus:ring-1 focus:ring-primary focus:outline-none">
            </div>

            <!-- Role & Team Size -->
            <div class="grid grid-cols-2 gap-6 text-sm">
                <div>
                    <label for="editRole" class="text-muted uppercase tracking-wide text-xs">Role</label>
                    <input type="text" name="role" id="editRole" class="mt-1 w-full border border-border  px-4 py-2 focus:ring-1 focus:ring-primary focus:outline-none">
                </div>

                <div>
                    <label for="editTeamSize" class="text-muted uppercase tracking-wide text-xs">Team Size</label>
                    <input type="number" name="team_size" id="editTeamSize" class="mt-1 w-full border border-border px-4 py-2 focus:ring-1 focus:ring-primary focus:outline-none">
                </div>
            </div>

            <!-- Responsibilities -->
            <div class="space-y-2">
                <label for="editResponsibilities" class="text-muted uppercase tracking-wide text-xs">Responsibilities</label>
                <textarea name="responsibilities" id="editResponsibilities"
                          class="mt-1 w-full border border-border  px-4 py-2 focus:ring-1 focus:ring-primary focus:outline-none"></textarea>
            </div>

            <div class="h-px bg-border w-full opacity-40"></div>

            <!-- Repo & Live URL -->
            <div class="flex flex-wrap gap-3">
                <input type="text" name="repo" id="editRepo" placeholder="Repository"
                       class="flex-1 border border-border  px-4 py-2 focus:ring-1 focus:ring-primary focus:outline-none">

                <input type="text" name="live_url" id="editLive" placeholder="Live URL"
                       class="flex-1 border border-border px-4 py-2 focus:ring-1 focus:ring-primary focus:outline-none">
            </div>

            <!-- Screenshots -->
            <div class="space-y-2">
                <label class="text-muted uppercase tracking-wide text-xs">Project Screenshots</label>
                <input type="file" name="screenshot[]" multiple
                       class="w-full border border-border px-4 py-2">
            </div>

            <!-- Buttons -->
            <div class="flex flex-wrap gap-3 pt-4">
                <button type="submit"
                        class="px-4 py-2 border border-border text-sm bg-primary text-text hover:bg-primary/90 transition">
                    Save
                </button>

                <button type="button" id="cancelEdit"
                        class="px-4 py-2 border border-border text-sm hover:border-primary transition">
                    Cancel
                </button>
            </div>
        </form>
    </div>
</div>
