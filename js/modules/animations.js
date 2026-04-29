// Register ScrollTrigger and ScrollToPlugin
gsap.registerPlugin(ScrollTrigger, ScrollToPlugin);

/**
 * Entry point for all GSAP animations
 */
export function initAnimations() {
    initHero();
    initTicker();
    initScrollReveals();
    initStatsCounter();
    initHoverEffects();
}

/**
 * Hero Section Entry Animation
 */
function initHero() {
    const tl = gsap.timeline({ defaults: { ease: "power4.out", duration: 1.2 } });

    tl.from(".hero-title", { y: 80, opacity: 0, delay: 0.2 })
      .from(".hero-desc", { y: 40, opacity: 0 }, "-=0.9")
      .from(".hero-actions", { y: 30, opacity: 0 }, "-=0.9")
      .from(".photo-wrapper", { scale: 0.9, opacity: 0, duration: 1.5 }, "-=1.2")
      .from(".badge-circle", { rotation: -90, scale: 0, opacity: 0 }, "-=1");
}

/**
 * Infinite Scrolling Ticker
 */
function initTicker() {
    const track = document.querySelector(".ticker-track");
    if (!track) return;

    // Use xPercent -50 for seamless looping (assuming the content repeats)
    gsap.to(track, {
        xPercent: -50,
        repeat: -1,
        duration: 25,
        ease: "none"
    });
}

/**
 * Scroll-based reveal animations
 */
function initScrollReveals() {
    // Featured Work Cards
    gsap.from(".work-box", {
        scrollTrigger: {
            trigger: ".work-inner",
            start: "top 85%",
        },
        y: 60,
        opacity: 0,
        stagger: 0.2,
        duration: 1,
        ease: "power3.out"
    });

    // About Me Cards
    gsap.from(".overview-card", {
        scrollTrigger: {
            trigger: ".overview-cards",
            start: "top 90%",
        },
        x: -30,
        opacity: 0,
        stagger: 0.1,
        duration: 0.8,
        ease: "back.out(1.4)"
    });

    // Skills Grid
    gsap.from(".skill-card", {
        scrollTrigger: {
            trigger: ".skills-grid",
            start: "top 90%",
        },
        opacity: 0,
        scale: 0.9,
        y: 20,
        stagger: {
            amount: 0.6,
            grid: "auto"
        }
    });
}

/**
 * Animated Number Counters
 */
function initStatsCounter() {
    const stats = document.querySelectorAll(".stat-num");
    
    stats.forEach(stat => {
        const value = parseInt(stat.innerText);
        gsap.from(stat, {
            scrollTrigger: {
                trigger: stat,
                start: "top 95%",
            },
            innerText: 0,
            duration: 2,
            snap: { innerText: 1 },
            ease: "power2.out"
        });
    });
}

/**
 * Micro-interactions (Button/Badge Hovers)
 */
function initHoverEffects() {
    const contactBadge = document.querySelector(".contact-badge");
    if (contactBadge) {
        contactBadge.addEventListener("mouseenter", () => {
            gsap.to(".contact-badge__circle", { rotation: 45, scale: 1.1, duration: 0.3 });
        });
        contactBadge.addEventListener("mouseleave", () => {
            gsap.to(".contact-badge__circle", { rotation: 0, scale: 1, duration: 0.3 });
        });
    }
}