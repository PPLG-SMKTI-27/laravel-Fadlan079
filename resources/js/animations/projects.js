import gsap from "gsap";
import ScrollTrigger from "gsap/ScrollTrigger";

gsap.registerPlugin(ScrollTrigger);

document.querySelectorAll(".cta-btn").forEach(btn => {
    const bubble = btn.querySelector(".cta-bubble");
    const text = btn.querySelector(".cta-text");

    const tl = gsap.timeline({ paused: true });

    tl.to(bubble, {
        scale: 1,
        y: "-35%",
        duration: 0.55,
        ease: "power4.out"
    });

    btn.addEventListener("mouseenter", () => tl.play());
    btn.addEventListener("mouseleave", () => tl.reverse());
});

export function projectScrollAnimation() {

  const section = document.querySelector(".project-row-top")?.parentElement;
  if (!section) return;

  const mm = gsap.matchMedia();

  mm.add("(min-width: 1024px)", () => {

    gsap.to(".project-row-top", {
      xPercent: 30,
      ease: "none",
      scrollTrigger: {
        trigger: section,
        start: "top bottom",
        end: "bottom top",
        scrub: true,
      }
    });

    gsap.to(".project-row-bottom", {
      xPercent: -30,
      ease: "none",
      scrollTrigger: {
        trigger: section,
        start: "top bottom",
        end: "bottom top",
        scrub: true,
      }
    });

  });

  mm.add("(max-width: 1023px)", () => {
    gsap.set(".project-row-top, .project-row-bottom", {
      xPercent: 0
    });
  });
}
