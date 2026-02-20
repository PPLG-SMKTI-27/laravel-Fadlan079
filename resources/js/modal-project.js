document.addEventListener('DOMContentLoaded', () => {

/* =========================================
   SEARCH + FILTER
========================================= */

const searchInput = document.getElementById('project-search');
const filterButtons = document.querySelectorAll('.filter-btn');
const params = new URLSearchParams(window.location.search);

if (searchInput) {
    searchInput.value = params.get('search') ?? '';

    searchInput.addEventListener('keydown', e => {
        if (e.key === 'Enter') {
            params.set('search', searchInput.value);
            params.delete('page');
            window.location.search = params.toString();
        }
    });
}

filterButtons.forEach(btn => {
    if (btn.dataset.filter === (params.get('type') ?? 'all')) {
        btn.classList.add('border-primary');
    }

    btn.addEventListener('click', () => {
        const filter = btn.dataset.filter;

        if (filter === 'all') {
            params.delete('type');
        } else {
            params.set('type', filter);
        }

        params.delete('page');
        window.location.search = params.toString();
    });
});

/* =========================================
   PROJECT MODAL
========================================= */

const modal = document.getElementById('projectModal');
const modalClose = document.getElementById('modalClose');
const modalCloseBottom = document.getElementById('modalCloseBottom');

const modalTitle = document.getElementById('modalTitle');
const modalDesc = document.getElementById('modalDesc');
const modalType = document.getElementById('modalType');
const modalStatus = document.getElementById('modalStatus');
const modalCreated = document.getElementById('modalCreated');
const modalUpdated = document.getElementById('modalUpdated');
const modalRepo = document.getElementById('modalRepo');
const modalLive = document.getElementById('modalLive');

const modalRole = document.getElementById('modalRole');
const modalTeamSize = document.getElementById('modalTeamSize');
const modalResponsibilities = document.getElementById('modalResponsibilities');

const modalImage = document.getElementById('modalImage');
const modalImageWrapper = document.getElementById('modalImageWrapper');
const modalTech = document.getElementById('modalTech');

const modalEditBtn = document.getElementById('modalEditBtn');

// EDIT FORM
const editForm = document.getElementById('modalEditForm');
const editId = document.getElementById('editId');
const editTitle = document.getElementById('editTitle');
const editDesc = document.getElementById('editDesc');
const editType = document.getElementById('editType');
const editStatus = document.getElementById('editStatus');
const editRepo = document.getElementById('editRepo');
const editRole = document.getElementById('editRole');
const editTeamSize = document.getElementById('editTeamSize');
const editResponsibilities = document.getElementById('editResponsibilities');
const editLive = document.getElementById('editLive');

const cancelEdit = document.getElementById('cancelEdit');

const detailSection = modal.querySelector('.space-y-4');

/* =========================================
   OPEN DETAIL MODAL
========================================= */

document.querySelectorAll('.project-open').forEach(card => {

    card.addEventListener('click', () => {

        const id = card.dataset.id;

        // Basic Info
        modalTitle.textContent = card.dataset.title;
        modalDesc.textContent = card.dataset.desc;
        modalType.textContent = card.dataset.type;
        modalStatus.textContent = card.dataset.status;
        modalCreated.textContent = card.dataset.created;
        modalUpdated.textContent = card.dataset.updated;

        // Role & Team
        modalRole.textContent = card.dataset.role || '-';
        modalTeamSize.textContent = card.dataset.team || '-';
        modalResponsibilities.textContent = card.dataset.responsibilities || '-';

        // Repository
        if (card.dataset.repo) {
            modalRepo.href = card.dataset.repo;
            modalRepo.classList.remove('hidden');
        } else {
            modalRepo.classList.add('hidden');
        }

        // Live URL
        if (card.dataset.live) {
            modalLive.href = card.dataset.live;
            modalLive.classList.remove('hidden');
        } else {
            modalLive.classList.add('hidden');
        }

        // Screenshot
const modalScreenshotsWrapper = document.getElementById('modalScreenshotsWrapper');
const modalScreenshots = document.getElementById('modalScreenshots');

modalScreenshots.innerHTML = '';

if (card.dataset.screenshot) {

    try {

        const images = JSON.parse(card.dataset.screenshot);

        images.forEach(img => {
            modalScreenshots.innerHTML += `
                <div class="aspect-square border border-border overflow-hidden group cursor-pointer">
                    <img src="/storage/${img}"
                         class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                </div>
            `;
        });

        modalScreenshotsWrapper.classList.remove('hidden');

    } catch (e) {
        console.error('Invalid screenshot JSON');
    }

} else {
    modalScreenshotsWrapper.classList.add('hidden');
}


        // Tech Stack
        modalTech.innerHTML = '';
        if (card.dataset.tech) {
            try {
                JSON.parse(card.dataset.tech).forEach(tech => {
                    modalTech.innerHTML += `
                        <span class="px-2 py-1 border border-border text-xs">
                            ${tech}
                        </span>
                    `;
                });
            } catch (e) {
                console.error('Invalid tech JSON');
            }
        }

        // Store ID
        modalEditBtn.dataset.id = id;

        // Reset edit mode
        editForm.classList.add('hidden');
        detailSection.classList.remove('hidden');

        modal.classList.remove('hidden');
        modal.classList.add('flex');
    });

});

/* =========================================
   EDIT MODE
========================================= */

modalEditBtn.addEventListener('click', () => {

    const id = modalEditBtn.dataset.id;

    editId.value = id;
    editTitle.value = modalTitle.textContent;
    editDesc.value = modalDesc.textContent;
    editType.value = modalType.textContent;
    editStatus.value = modalStatus.textContent;
    editRepo.value = modalRepo.href;
    editRole.value = modalRole.textContent;
    editTeamSize.value = modalTeamSize.textContent;
    editResponsibilities.value = modalResponsibilities.textContent;
    editLive.value = modalLive.href;

    editForm.action = `/dashboard/projects/${id}`;

    detailSection.classList.add('hidden');
    editForm.classList.remove('hidden');
});

/* =========================================
   CANCEL EDIT
========================================= */

cancelEdit.addEventListener('click', () => {
    editForm.classList.add('hidden');
    detailSection.classList.remove('hidden');
});

/* =========================================
   CLOSE MODAL
========================================= */

function closeModal() {
    modal.classList.add('hidden');
    modal.classList.remove('flex');

    editForm.classList.add('hidden');
    detailSection.classList.remove('hidden');
}

modalClose.addEventListener('click', closeModal);
modalCloseBottom.addEventListener('click', closeModal);

modal.addEventListener('click', (e) => {
    if (e.target === modal) {
        closeModal();
    }
});

});

/* =========================================
   CREATE PROJECT MODAL
========================================= */

const createModal = document.getElementById('createProjectModal');
const openCreate = document.getElementById('openCreateModal');
const closeCreate = document.getElementById('closeCreateModal');
const cancelCreate = document.getElementById('cancelCreateModal');

if (openCreate) {
    openCreate.addEventListener('click', () => {
        createModal.classList.remove('hidden');
        createModal.classList.add('flex');
    });
}

function closeCreateModal() {
    createModal.classList.add('hidden');
    createModal.classList.remove('flex');
}

if (closeCreate) closeCreate.addEventListener('click', closeCreateModal);
if (cancelCreate) cancelCreate.addEventListener('click', closeCreateModal);

if (createModal) {
    createModal.addEventListener('click', (e) => {
        if (e.target === createModal) {
            closeCreateModal();
        }
    });
}
