gsap.registerPlugin(ScrollTrigger, ScrollToPlugin);

function heroAnimation() {
    gsap.from(".hero-line", {
        opacity: 0,
        y: 60,
        duration: 0.8,
        stagger: 0.15,
        ease: "power3.out"
    });

    gsap.from(".hero-tag", {
        opacity: 0,
        y: -20,
        duration: 0.5,
        stagger: 0.1,
        ease: "power2.out",
        delay: 0.3
    });

    gsap.from(".hero-desc", {
        opacity: 0,
        y: 30,
        duration: 0.6,
        ease: "power2.out",
        delay: 0.6
    });

    gsap.from(".hero-actions", {
        opacity: 0,
        y: 30,
        duration: 0.6,
        ease: "power2.out",
        delay: 0.8
    });

    gsap.from(".hero-img", {
        opacity: 0,
        x: 60,
        duration: 0.8,
        ease: "power3.out",
        delay: 0.4
    });
}

function overviewAnimation() {
    gsap.from(".overview-header", {
        scrollTrigger: {
            trigger: ".overview-header",
            start: "top 85%",
            toggleActions: "play none none none"
        },
        opacity: 0,
        y: 40,
        duration: 0.7,
        ease: "power2.out"
    });

    gsap.from(".overview-intro", {
        scrollTrigger: {
            trigger: ".overview-intro",
            start: "top 85%",
            toggleActions: "play none none none"
        },
        opacity: 0,
        y: 30,
        duration: 0.6,
        ease: "power2.out"
    });

    gsap.from(".overview-card", {
        scrollTrigger: {
            trigger: ".overview-card",
            start: "top 85%",
            toggleActions: "play none none none"
        },
        opacity: 0,
        y: 50,
        duration: 0.6,
        stagger: 0.15,
        ease: "power2.out"
    });

    gsap.from(".problem-inner", {
        scrollTrigger: {
            trigger: ".problem-inner",
            start: "top 85%",
            toggleActions: "play none none none"
        },
        opacity: 0,
        y: 40,
        duration: 0.7,
        ease: "power2.out"
    });
}

function howtoAnimation() {
    gsap.from(".howto-header", {
        scrollTrigger: {
            trigger: ".howto-header",
            start: "top 85%",
            toggleActions: "play none none none"
        },
        opacity: 0,
        y: 40,
        duration: 0.7,
        ease: "power2.out"
    });

    gsap.from(".howto-step", {
        scrollTrigger: {
            trigger: ".howto-step",
            start: "top 85%",
            toggleActions: "play none none none"
        },
        opacity: 0,
        y: 50,
        duration: 0.6,
        stagger: 0.15,
        ease: "power2.out"
    });

    gsap.from(".code-block", {
        scrollTrigger: {
            trigger: ".code-block",
            start: "top 85%",
            toggleActions: "play none none none"
        },
        opacity: 0,
        y: 30,
        duration: 0.6,
        stagger: 0.2,
        ease: "power2.out"
    });

    gsap.from(".howtobox", {
        scrollTrigger: {
            trigger: ".howtobox",
            start: "top 85%",
            toggleActions: "play none none none"
        },
        opacity: 0,
        y: 30,
        duration: 0.6,
        stagger: 0.15,
        ease: "power2.out"
    });
}

function demoAnimation() {
    gsap.from(".demo-header", {
        scrollTrigger: {
            trigger: ".demo-header",
            start: "top 85%",
            toggleActions: "play none none none"
        },
        opacity: 0,
        y: 40,
        duration: 0.7,
        ease: "power2.out"
    });

    gsap.from(".counter-wrapper", {
        scrollTrigger: {
            trigger: ".counter-wrapper",
            start: "top 85%",
            toggleActions: "play none none none"
        },
        opacity: 0,
        y: 50,
        duration: 0.6,
        stagger: 0.15,
        ease: "power2.out"
    });
}

heroAnimation();
overviewAnimation();
howtoAnimation();
demoAnimation();