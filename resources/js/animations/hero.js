import { gsap } from "gsap";

export function heroAnimation() {
    const tl = gsap.timeline({ defaults: { ease: "power3.out" } });

    tl.from(".hero-badge", {
        y: -30,
        opacity: 0,
        duration: 0.8,
    })

    .from(".hero-title span", {
        y: 40,
        opacity: 0,
        stagger: 0.15,
        duration: 0.8,
    }, "-=0.3")

    .from(".hero-desc", {
        y: 20,
        opacity: 0,
        duration: 0.6,
    }, "-=0.4")

    .from(".hero-buttons a", {
        scale: 0.8,
        opacity: 0,
        stagger: 0.2,
        duration: 0.5,
    }, "-=0.3")

    .from(".hero-social a", {
        y: 20,
        opacity: 0,
        stagger: 0.1,
        duration: 0.4,
    }, "-=0.3");
}
