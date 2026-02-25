import { gsap } from "gsap";

export function initmodal() {

    const modal = document.getElementById("global-modal");
    if (!modal) return;

    const tl = gsap.timeline({ defaults: { ease: "power3.out" } });

    tl.to("#modal-box", {
        scale: 1,
        opacity: 1,
        y: 0,
        duration: 0.7,
        ease: "back.out(1.6)"
    })
    .from("#modal-icon", {
        scale: 0,
        rotate: -180,
        duration: 0.7,
        ease: "elastic.out(1, 0.6)"
    }, "-=0.4")
    .from("#modal-title, #modal-message, #modal-desc", {
        opacity: 0,
        y: 15,
        stagger: 0.1,
        duration: 0.4
    }, "-=0.4");

    // Auto Close Smooth Exit
    setTimeout(() => {
        gsap.timeline({
            onComplete: () => modal.remove()
        })
        .to("#modal-box", {
            scale: 0.9,
            opacity: 0,
            y: 20,
            duration: 0.4,
            ease: "power2.in"
        })
        .to("#modal-backdrop", {
            opacity: 0,
            duration: 0.4
        }, "-=0.3");

    }, 2300);
}
