import {gsap} from 'gsap';
import {ScrollTrigger} from 'gsap/ScrollTrigger';

// Register the plugin
gsap.registerPlugin(ScrollTrigger);

// Optional config (suppress warnings, force 3D for smoother rendering)
gsap.config({
  nullTargetWarn: false,
  trialWarn: false,
  force3D: true,
});

// Global defaults for all GSAP animations
gsap.defaults({
  overwrite: 'auto',
  ease: 'power2.out',
});

export function generalPageAnimation() {
  // --- Fade-up elements
  
  ScrollTrigger.batch('.animation-fade-me-up', {
    batchMax: 5,
    onEnter: (batch) => {
      gsap.fromTo(batch, {opacity:0, y:100}, {
        y: 0,
        opacity: 1,
        duration: .5,
        stagger: 0.2,
        ease: 'power2.out',
      });
    },
    onEnterBack: (batch) => {
      gsap.fromTo(batch, {opacity:0, y:100}, {
        y: 0,
        opacity: 1,
        duration: .5,
        stagger: 0.2,
        ease: 'power2.out',
      });
    },
    start: 'top 80%',
    once: true,
  });
  gsap.set('.animation-fade-me-up', {opacity: 0})
  
  // --- Scale elements
  ScrollTrigger.batch('.animation-scale-me', {
    batchMax: 5,
    onEnter: (batch) => {
      gsap.fromTo(
          batch,
          {scale: 0, opacity: 0, immediateRender: false},
          {
            scale: 1,
            opacity: 1,
            duration: 0.8,
            stagger: 0.2,
          },
      );
    },
    start: 'top 70%',
    once: true,
  });
  
  // --- Move-right elements
  ScrollTrigger.batch('.animation-move-me-right', {
    batchMax: 5,
    onEnter: (batch) => {
      gsap.fromTo(
          batch,
          {x: 100, opacity: 0, immediateRender: false},
          {
            x: 0,
            opacity: 1,
            duration: 0.8,
            stagger: 0.2,
          },
      );
    },
    start: 'top 70%',
    once: true,
  });
  
  // --- Move-left elements
  ScrollTrigger.batch('.animation-move-me-left', {
    batchMax: 5,
    onEnter: (batch) => {
      gsap.fromTo(
          batch,
          {x: -100, opacity: 0, immediateRender: false},
          {
            x: 0,
            opacity: 1,
            duration: 0.8,
            stagger: 0.2,
          },
      );
    },
    start: 'top 70%',
    once: true,
  });
  
  
  ScrollTrigger.batch('.main-title', {
    batchMax: 5,
    onEnter: (batch) => {
      batch.map(el=>el.classList.add('active'))
    },
    onEnterBack: (batch) => {
      batch.map(el=>el.classList.add('active'))
    },
    start: 'top 80%',
    once: true,
  });
  
}
