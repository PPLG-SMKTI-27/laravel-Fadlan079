const editModal   = document.getElementById('projectEditModal');
const editClose   = document.getElementById('editModalClose');
const cancelEdit  = document.getElementById('cancelEdit');
const editForm    = document.getElementById('editForm');

/*
|--------------------------------------------------------------------------
| OPEN EDIT MODAL
|--------------------------------------------------------------------------
| Dipanggil dari detail modal:
| openEditModal(projectData)
*/

window.openEditModal = function(project) {

    // Set Form Action (IMPORTANT)
    editForm.action = `/dashboard/projects/${project.id}`;

    // Fill Inputs
    document.getElementById('editId').value    = project.id;
    document.getElementById('editTitle').value = project.title || '';
    document.getElementById('editDesc').value  = project.desc || '';
    document.getElementById('editRepo').value  = project.repo || '';
    document.getElementById('editLive').value  = project.live || '';

    // Show modal
    editModal.classList.remove('hidden');
    editModal.classList.add('flex');

    document.body.classList.add('overflow-hidden');
};


/*
|--------------------------------------------------------------------------
| CLOSE EDIT MODAL
|--------------------------------------------------------------------------
*/

function closeEditModal() {

    editModal.classList.add('hidden');
    editModal.classList.remove('flex');

    document.body.classList.remove('overflow-hidden');

    // Reset file input (optional clean)
    editForm.reset();
}

editClose.addEventListener('click', closeEditModal);
cancelEdit.addEventListener('click', closeEditModal);

editModal.addEventListener('click', (e) => {
    if (e.target === editModal) closeEditModal();
});

document.addEventListener('keydown', (e) => {
    if (e.key === "Escape" && !editModal.classList.contains('hidden')) {
        closeEditModal();
    }
});
