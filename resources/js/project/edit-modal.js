function closeEditModal() {
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
