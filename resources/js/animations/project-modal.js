import { gsap } from "gsap";

export function projectModalAnimation() {

    /* =====================================================
       PROJECT DETAIL MODAL (SUDAH ADA PUNYA LU)
    ===================================================== */

    const detailModal = document.getElementById('projectDetailModal');
    const lightbox = document.getElementById('imageLightbox');
    const lightboxImg = document.getElementById('lightboxImage');

    if (detailModal) {

        const modalBox = detailModal.querySelector('.relative');
        const detailCloseBtn = document.getElementById('detailModalClose');

        window.openProjectModal = function () {

            detailModal.classList.remove('hidden');
            detailModal.style.display = 'flex';
            document.body.classList.add('overflow-hidden');

            gsap.set(modalBox, { y: 40, scale: 0.96, opacity: 0 });
            gsap.set(detailModal, { opacity: 0 });

            gsap.timeline()
                .to(detailModal, {
                    opacity: 1,
                    duration: 0.25,
                    ease: "power2.out"
                })
                .to(modalBox, {
                    y: 0,
                    scale: 1,
                    opacity: 1,
                    duration: 0.45,
                    ease: "power3.out"
                }, "-=0.1");
        };

        const detailEditBtn = document.getElementById('detailEditBtn');


        detailEditBtn?.addEventListener('click', () => {

            const d = detailModal.dataset;

            const project = {
                id: d.id,
                tech: d.tech,
                type: d.type,
                status: d.status,
                visibility: d.visibility,
                title: d.title,
                desc: d.desc,
                role: d.role !== 'undefined' ? d.role : '',
                team_size: d.team !== 'undefined' ? d.team : '',
                responsibilities: d.responsibilities !== 'undefined' ? d.responsibilities : '',
                repo: d.repo !== 'undefined' ? d.repo : '',
                live: d.live !== 'undefined' ? d.live : '',
                screenshot: d.screenshot
            };

            window.openEditModal(project);
            window.closeProjectModal();
        });


        window.closeProjectModal = function () {

            gsap.timeline({
                onComplete: () => {
                    detailModal.classList.add('hidden');
                    detailModal.style.display = '';
                    document.body.classList.remove('overflow-hidden');
                }
            })
                .to(modalBox, {
                    y: 30,
                    scale: 0.97,
                    opacity: 0,
                    duration: 0.35,
                    ease: "power3.in"
                })
                .to(detailModal, {
                    opacity: 0,
                    duration: 0.2,
                    ease: "power2.in"
                }, "-=0.2");
        };

        // tombol X
        detailCloseBtn?.addEventListener('click', window.closeProjectModal);

        // klik luar modal
        detailModal.addEventListener('click', (e) => {
            if (e.target === detailModal) {
                window.closeProjectModal();
            }
        });
    }


    /* =====================================================
       CREATE PROJECT MODAL (BARU)
    ===================================================== */

    const createModal = document.getElementById('createProjectModal');
    const openCreateBtns = document.querySelectorAll('.open-create-modal');
    const closeCreateBtn = document.getElementById('closeCreateModal');
    const cancelCreateBtn = document.getElementById('cancelCreateModal');

    if (createModal) {

        const createBox = createModal.querySelector('.relative');

        window.openCreateModal = function () {

            createModal.classList.remove('hidden');
            createModal.style.display = 'flex';
            document.body.classList.add('overflow-hidden');

            gsap.set(createBox, { y: 40, scale: 0.95, opacity: 0 });
            gsap.set(createModal, { opacity: 0 });

            gsap.timeline()
                .to(createModal, {
                    opacity: 1,
                    duration: 0.25,
                    ease: "power2.out"
                })
                .to(createBox, {
                    y: 0,
                    scale: 1,
                    opacity: 1,
                    duration: 0.45,
                    ease: "power3.out"
                }, "-=0.1");
        };

        window.closeCreateModal = function () {

            gsap.timeline({
                onComplete: () => {
                    createModal.classList.add('hidden');
                    createModal.style.display = '';
                    document.body.classList.remove('overflow-hidden');
                }
            })
                .to(createBox, {
                    y: 30,
                    scale: 0.96,
                    opacity: 0,
                    duration: 0.35,
                    ease: "power3.in"
                })
                .to(createModal, {
                    opacity: 0,
                    duration: 0.2,
                    ease: "power2.in"
                }, "-=0.2");
        };

        // BUTTON EVENTS
        openCreateBtns.forEach(btn => {
            btn.addEventListener('click', window.openCreateModal);
        });
        closeCreateBtn?.addEventListener('click', window.closeCreateModal);
        cancelCreateBtn?.addEventListener('click', window.closeCreateModal);

        // CLICK OUTSIDE CLOSE
        createModal.addEventListener('click', (e) => {
            if (e.target === createModal) {
                window.closeCreateModal();
            }
        });
    }


    /* =====================================================
       LIGHTBOX (SUDAH ADA PUNYA LU)
    ===================================================== */

    if (lightbox) {

        window.openLightbox = function (src) {

            lightboxImg.src = src;

            lightbox.classList.remove('hidden');
            lightbox.style.display = 'flex';

            detailModal.style.pointerEvents = "none";

            gsap.set(lightbox, { opacity: 0 });
            gsap.set(lightboxImg, { scale: 0.9, opacity: 0, y: 30 });

            gsap.timeline()
                .to(lightbox, {
                    opacity: 1,
                    duration: 0.25,
                    ease: "power2.out"
                })
                .to(lightboxImg, {
                    scale: 1,
                    opacity: 1,
                    y: 0,
                    duration: 0.4,
                    ease: "power3.out"
                }, "-=0.1");
        };

        window.closeLightbox = function () {

            gsap.timeline({
                onComplete: () => {
                    lightbox.classList.add('hidden');
                    lightbox.style.display = '';
                    detailModal.style.pointerEvents = "auto";
                }
            })
                .to(lightboxImg, {
                    scale: 0.92,
                    opacity: 0,
                    y: 20,
                    duration: 0.3,
                    ease: "power3.in"
                })
                .to(lightbox, {
                    opacity: 0,
                    duration: 0.2,
                    ease: "power2.in"
                }, "-=0.15");
        };
    }
}

/* =====================================================
   EDIT PROJECT MODAL (ANIMATED)
===================================================== */

const editModal = document.getElementById('projectEditModal');

if (editModal) {

    const editBox = editModal.querySelector('.relative');
    const editCloseBtn = document.getElementById('editModalClose');
    const cancelEditBtn = document.getElementById('cancelEdit');

    window.openEditModal = function (project) {

        window.currentEditTech = project.tech;

        setTimeout(() => {
            const els = document.querySelectorAll('#projectEditModal [x-data]');
            if (els[0] && els[0]._x_dataStack) {
                try {
                    els[0]._x_dataStack[0].tags = JSON.parse(project.tech);
                } catch (e) {
                    els[0]._x_dataStack[0].tags = [];
                }
            }
            if (els[1] && els[1]._x_dataStack && project.screenshot) {
                try {
                    const images = JSON.parse(project.screenshot);
                    els[1]._x_dataStack[0].existingImages = images;
                    els[1]._x_dataStack[0].newImages = [];
                    els[1]._x_dataStack[0].deletedImages = [];
                } catch (e) {
                    els[1]._x_dataStack[0].existingImages = [];
                }
            }
        }, 50);

        const editForm = document.getElementById('editForm');

        // SET FORM ACTION
        editForm.action = `/dashboard/projects/${project.id}`;

        // FILL DATA
        document.getElementById('editId').value = project.id;
        document.getElementById('editType').value = project.type || 'Website';
        document.getElementById('editStatus').value = project.status || 'Shipped';
        document.getElementById('editVisibility').value = project.visibility || 'draft';
        document.getElementById('editTitle').value = project.title || '';
        document.getElementById('editDesc').value = project.desc || '';
        document.getElementById('editRepo').value = project.repo || '';
        document.getElementById('editLive').value = project.live || '';

        document.getElementById('editRole').value = project.role || '';
        document.getElementById('editTeamSize').value = project.team_size || '';
        document.getElementById('editResponsibilities').value = project.responsibilities || '';

        // SHOW MODAL
        editModal.classList.remove('hidden');
        editModal.style.display = 'flex';
        document.body.classList.add('overflow-hidden');

        // ANIMATION
        gsap.set(editBox, { y: 40, scale: 0.95, opacity: 0 });
        gsap.set(editModal, { opacity: 0 });

        gsap.timeline()
            .to(editModal, {
                opacity: 1,
                duration: 0.25,
                ease: "power2.out"
            })
            .to(editBox, {
                y: 0,
                scale: 1,
                opacity: 1,
                duration: 0.45,
                ease: "power3.out"
            }, "-=0.1");
    };

    window.closeEditModal = function () {

        const editForm = document.getElementById('editForm');

        gsap.timeline({
            onComplete: () => {
                editModal.classList.add('hidden');
                editModal.style.display = '';
                document.body.classList.remove('overflow-hidden');
                editForm.reset();
            }
        })
            .to(editBox, {
                y: 30,
                scale: 0.96,
                opacity: 0,
                duration: 0.35,
                ease: "power3.in"
            })
            .to(editModal, {
                opacity: 0,
                duration: 0.2,
                ease: "power2.in"
            }, "-=0.2");
    };

    // BUTTON EVENTS
    editCloseBtn?.addEventListener('click', window.closeEditModal);
    cancelEditBtn?.addEventListener('click', window.closeEditModal);

    // CLICK OUTSIDE
    editModal.addEventListener('click', (e) => {
        if (e.target === editModal) {
            window.closeEditModal();
        }
    });

    // ESC CLOSE
    document.addEventListener('keydown', (e) => {
        if (e.key === "Escape" && !editModal.classList.contains('hidden')) {
            window.closeEditModal();
        }
    });
}
