import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";

gsap.registerPlugin(ScrollTrigger);

export function educationScrollAnimation() {

gsap.fromTo(
    ".education-title",
    { y: 40, opacity: 0 },
    {
        y: 0,
        opacity: 1,
        duration: 0.8,
        ease: "power3.out",
        scrollTrigger: {
            trigger: ".section-education",
            start: "top 75%",
            once: true,
        },
    }
);

    gsap.fromTo(
        ".education-subtitle",
        { y: 20, opacity: 0 },
        {
            y: 0,
            opacity: 1,
            duration: 0.6,
            ease: "power3.out",
            scrollTrigger: {
                trigger: ".section-education",
                start: "top bottom",
                once: true,
            },
        }
    );

    // TIMELINE LINE
    gsap.fromTo(
        ".education-line",
        { scaleY: 0 },
        {
            scaleY: 1,
            transformOrigin: "top",
            duration: 1.2,
            ease: "power3.out",
            scrollTrigger: {
                trigger: ".education-list",
                start: "top bottom",
                once: true,
            },
        }
    );

gsap.utils.toArray(".education-card").forEach((card, i) => {
    gsap.fromTo(
        card,
        {
            y: 60,
            opacity: 0,
        },
        {
            y: 0,
            opacity: 1,
            duration: 0.7,
            ease: "power3.out",
            scrollTrigger: {
                trigger: card,
                start: "top 85%",
                toggleActions: "play none none none",
            },
        }
    );
});

}
