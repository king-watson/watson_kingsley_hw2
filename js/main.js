import './modules/hamburger.js';
import { initAnimations } from './modules/animations.js';
import { Counter, StepCounter } from './modules/counter.js';
import { initSkills } from "./modules/skills.js";
import { initVideoPlayer } from './modules/video.js';

// 1. Initialize site-wide modules
initAnimations();
initSkills();
initVideoPlayer();

// 2. Initialize Counters (Check for existence to prevent errors)
const counterContainer = document.querySelector('#counter-container1');
if (counterContainer) {
    new Counter("#counter-container1", 10);
    new Counter("#counter-container2");
    new Counter("#counter-container3");
    new StepCounter("#counter-container4", 10, 5);
}

// 3. Smooth Scrolling Logic for Anchor Links
const navLinks = document.querySelectorAll("#menu a, .nav-cta a, .hero-actions a, .contact-badge");

const handleNavClick = (e) => {
    const href = e.currentTarget.getAttribute("href");

    // Only intercept if it's an internal anchor (starts with #)
    if (href && href.startsWith("#")) {
        const targetElement = document.querySelector(href);
        
        if (targetElement) {
            e.preventDefault();

            gsap.to(window, {
                duration: 1.2,
                scrollTo: {
                    y: href,
                    offsetY: 80 // Header height offset
                },
                ease: "power4.inOut"
            });

            // Close mobile menu overlay if it's open
            const overlay = document.querySelector('#overlay');
            if (overlay && overlay.classList.contains('open')) {
                overlay.classList.remove('open');
            }
        }
    }
};

// Attach listeners
navLinks.forEach(link => link.addEventListener("click", handleNavClick));