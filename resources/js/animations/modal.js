import { gsap } from "gsap";

export function initmodal() {
    const modal = document.getElementById("global-modal");
    if (!modal) return;

    const tl = gsap.timeline({ defaults: { ease: "power3.out" } });

    // --- ANIMASI MASUK (ENTER) ---
    tl.to("#modal-backdrop", {
        opacity: 1,
        duration: 0.4
    })
    .to("#modal-box", {
        scale: 1,
        opacity: 1,
        y: 0,
        duration: 0.6,
        ease: "back.out(1.4)"
    }, "-=0.3")
    // Animasi Box Ikon Kotak (Putar 90 Derajat seperti mengunci baut)
    .from("#modal-icon-box", {
        scale: 0,
        rotate: -90,
        opacity: 0,
        duration: 0.6,
        ease: "back.out(1.7)"
    }, "-=0.4")
    // Animasi Teks Slide dari kiri ala Terminal
    .from("#modal-title, #modal-message, #modal-desc", {
        opacity: 0,
        x: -15, 
        stagger: 0.1,
        duration: 0.4
    }, "-=0.4");


    // --- FUNGSI ANIMASI KELUAR (EXIT) ---
    const closeModal = () => {
        gsap.timeline({
            onComplete: () => modal.remove() // Hapus elemen dari DOM setelah animasi selesai
        })
        .to("#modal-box", {
            scale: 0.95,
            opacity: 0,
            y: 15,
            duration: 0.3,
            ease: "power2.in"
        })
        .to("#modal-backdrop", {
            opacity: 0,
            duration: 0.3
        }, "-=0.2");
    };

    // --- EVENT LISTENERS UNTUK TOMBOL CLOSE ---
    const closeBtn = document.getElementById("modal-close-btn");
    const backdrop = document.getElementById("modal-backdrop");
    
    if (closeBtn) closeBtn.addEventListener("click", closeModal);
    if (backdrop) backdrop.addEventListener("click", closeModal);


    // --- AUTO CLOSE TIMER ---
    // Diubah menjadi 4 detik agar user sempat membaca (2.3s agak terlalu cepat)
    let autoCloseTimer = setTimeout(() => {
        closeModal();
    }, 1000);

    // Fitur Cerdas: Jika user menyorot (hover) modal, pause auto-closenya agar tidak hilang saat sedang dibaca!
    document.getElementById("modal-box").addEventListener("mouseenter", () => {
        clearTimeout(autoCloseTimer);
    });
}