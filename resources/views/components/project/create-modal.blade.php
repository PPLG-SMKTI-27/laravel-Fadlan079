<div id="createProjectModal"
     class="fixed inset-0 bg-black/60 hidden items-center justify-center z-50">

    <div class="relative bg-surface w-full max-w-2xl rounded-2xl p-8">

        <button id="closeCreateModal"
            class="absolute top-4 right-4 text-gray-400 hover:text-white">
            ✕
        </button>

        <h2 class="text-2xl font-bold mb-6">Create Project</h2>

        <form action="{{ route('projects.store') }}" method="POST" class="space-y-4">
            @csrf

            <input type="text" name="title"
                placeholder="Project Title"
                class="w-full px-3 py-2 rounded-lg bg-dark border border-gray-600"
                required>

            <textarea name="description"
                placeholder="Description"
                class="w-full px-3 py-2 rounded-lg bg-dark border border-gray-600"
                rows="3"
                required></textarea>

            <div class="grid grid-cols-2 gap-4">
                <select name="type"
                    class="w-full px-3 py-2 rounded-lg bg-dark border border-gray-600">
                    <option value="Web">Web</option>
                    <option value="Mobile">Mobile</option>
                </select>

                <select name="status"
                    class="w-full px-3 py-2 rounded-lg bg-dark border border-gray-600">
                    <option value="Active">Active</option>
                    <option value="Completed">Completed</option>
                </select>
            </div>

            <input type="url" name="repo_url"
                placeholder="Repository URL"
                class="w-full px-3 py-2 rounded-lg bg-dark border border-gray-600">

            <div class="flex justify-end gap-3 pt-4">
                <button type="button" id="cancelCreateModal"
                    class="px-4 py-2 border border-gray-600 rounded-lg">
                    Cancel
                </button>

                <button type="submit"
                    class="px-4 py-2 bg-primary text-white rounded-lg">
                    Save
                </button>
            </div>
        </form>
    </div>
</div>
