import './modules/hamburger.js';
import './modules/animations.js';
import { Counter, StepCounter } from './modules/counter.js';

const navLinks = document.querySelectorAll("#menu a, #desktopMenu a");

function handleNavClick(e) {
    e.preventDefault();
    const target = e.currentTarget.getAttribute("href");
    gsap.to(window, {
        duration: 1,
        scrollTo: target,
        ease: "power2.inOut"
    });
}

navLinks.forEach(function addScrollListener(link) {
    link.addEventListener("click", handleNavClick);
});

const counter1 = new Counter("#counter-container1", 10);
const counter2 = new Counter("#counter-container2");
const counter3 = new Counter("#counter-container3");
const counter4 = new StepCounter("#counter-container4", 10, 5);