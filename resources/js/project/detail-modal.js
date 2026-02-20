const detailModal = document.getElementById('projectDetailModal');
const detailClose = document.getElementById('detailModalClose');

document.querySelectorAll('.project-open').forEach(card => {

    card.addEventListener('click', () => {

        // Basic
        document.getElementById('detailType').textContent = card.dataset.type;
        document.getElementById('detailStatus').textContent = card.dataset.status;
        document.getElementById('detailTitle').textContent = card.dataset.title;
        document.getElementById('detailDesc').textContent = card.dataset.desc;
        document.getElementById('detailRole').textContent = card.dataset.role || '-';
        document.getElementById('detailTeamSize').textContent = card.dataset.team || '-';
        document.getElementById('detailResponsibilities').textContent =
            card.dataset.responsibilities || '-';
        document.getElementById('detailCreated').textContent = card.dataset.created;
        document.getElementById('detailUpdated').textContent = card.dataset.updated;

        // Tech stack
        const techContainer = document.getElementById('detailTech');
        techContainer.innerHTML = '';

        if (card.dataset.tech) {
            try {
                const techs = JSON.parse(card.dataset.tech);

                techs.forEach(t => {
                    techContainer.innerHTML += `
                        <span class="px-2 py-1 text-xs border border-border">
                            ${t}
                        </span>
                    `;
                });
            } catch (e) {
                techContainer.innerHTML = '-';
            }
        }

        // Screenshots
        const wrapper = document.getElementById('detailScreenshotsWrapper');
        const container = document.getElementById('detailScreenshots');
        container.innerHTML = '';

        if (card.dataset.screenshot) {
try {
    const images = JSON.parse(card.dataset.screenshot || "[]");

    if (images.length > 0) {
        images.forEach(img => {
            container.innerHTML += `
            <div class="aspect-video overflow-hidden border border-border/50 bg-surface/40 group">
                <img src="${img}"
                    class="w-full h-full object-cover transition duration-500 group-hover:scale-105">
            </div>
            `;
        });

        wrapper.classList.remove('hidden');
    } else {
        wrapper.classList.add('hidden');
    }

} catch (e) {
    wrapper.classList.add('hidden');
}
        } else {
            wrapper.classList.add('hidden');
        }

        // Live & Repo
        const live = document.getElementById('detailLive');
        const repo = document.getElementById('detailRepo');

        if (card.dataset.live) {
            live.href = card.dataset.live;
            live.classList.remove('hidden');
        } else {
            live.classList.add('hidden');
        }

        if (card.dataset.repo) {
            repo.href = card.dataset.repo;
            repo.classList.remove('hidden');
        } else {
            repo.classList.add('hidden');
        }

        detailModal.classList.remove('hidden');
        detailModal.classList.add('flex');
        document.body.classList.add('overflow-hidden');
    });

});

// EDIT BUTTON HANDLER
const editBtn = document.getElementById('detailEditBtn');

if (editBtn) {

    editBtn.onclick = () => {

        const project = JSON.parse(detailModal.dataset.project);

        closeDetailModal();

        openEditModal({
            id: project.id,
            title: project.title,
            desc: project.desc,
            repo: project.repo,
            live: project.live
        });

    };

}


function closeDetailModal() {
    detailModal.classList.add('hidden');
    detailModal.classList.remove('flex');
    document.body.classList.remove('overflow-hidden');
}

detailClose.addEventListener('click', closeDetailModal);

detailModal.addEventListener('click', (e) => {
    if (e.target === detailModal) closeDetailModal();
});

// LIGHTBOX
const lightbox = document.getElementById('imageLightbox');
const lightboxImg = document.getElementById('lightboxImage');
const lightboxClose = document.getElementById('lightboxClose');

// pakai event delegation karena gambar dibuat dynamic
document.addEventListener('click', function (e) {

    if (e.target.matches('#detailScreenshots img')) {
        lightboxImg.src = e.target.src;
        lightbox.classList.remove('hidden');
        lightbox.classList.add('flex');
        document.body.classList.add('overflow-hidden');
    }

});

function closeLightbox() {
    lightbox.classList.add('hidden');
    lightbox.classList.remove('flex');
    document.body.classList.remove('overflow-hidden');
}

lightboxClose.addEventListener('click', closeLightbox);

lightbox.addEventListener('click', (e) => {
    if (e.target === lightbox) closeLightbox();
});
