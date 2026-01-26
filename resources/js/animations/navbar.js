import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";
gsap.registerPlugin(ScrollTrigger);

export function navbarFloatAnimation() {
  const nav = document.querySelector(".nav-float");

  gsap.set(nav, {
    scaleX: 0.2,
    scaleY: 0.2,
    y: -40,
    opacity: 0,
    borderRadius: "999px",
  });

  gsap.to(nav, {
    scaleX: 1,
    scaleY: 1,
    y: 0,
    opacity: 1,
    duration: 1.5,
    ease: "elastic.out(1, 0.6)",
  });

  gsap.from(".nav-float > div", {
  opacity: 0,
  y: -10,
  duration: 0.4,
  delay: 0.6
});
}

export function navbarScrollEffect() {
  const nav = document.querySelector(".nav-float");

  ScrollTrigger.create({
    start: 0,
    onUpdate(self) {
      gsap.to(nav, {
        scale: self.direction === 1 ? 0.9 : 1,
        y: self.direction === 1 ? -10 : 0,
        duration: 0.25,
        ease: "power2.out",
      });
    }
  });
}
