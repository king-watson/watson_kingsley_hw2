// js/modules/hamburger.js

const hamburger = document.querySelector("#hamburger");
const closeButton = document.querySelector("#close");
const menuOverlay = document.querySelector("#overlay");
const menuLinks = document.querySelectorAll("#menu ul li a");

function toggleMenu() {
    if (!menuOverlay) return;
    const isActive = menuOverlay.classList.contains("active");

    if (!isActive) {
        menuOverlay.classList.add("active");
        document.body.classList.add("no-scroll");

        gsap.fromTo("#menu li", 
            { y: 50, opacity: 0 }, 
            { y: 0, opacity: 1, duration: 0.4, stagger: 0.1, ease: "power2.out", delay: 0.2 }
        );
    } else {
        closeMenu();
    }
}

function closeMenu(e) {
    if (!menuOverlay || window.innerWidth >= 768) return;

    // Check if the link clicked is an internal anchor (#)
    const href = e?.currentTarget?.getAttribute("href");
    
    // If it's a real page (like contact.php), DON'T prevent default.
    // If it's an anchor (#), we can close the menu and let GSAP scroll.
    if (href && !href.startsWith("#")) {
        return; 
    }

    gsap.to("#menu li", {
        opacity: 0,
        y: -20,
        duration: 0.2,
        onComplete: () => {
            menuOverlay.classList.remove("active");
            document.body.classList.remove("no-scroll");
        }
    });
}

if (hamburger) hamburger.addEventListener("click", toggleMenu);
if (closeButton) closeButton.addEventListener("click", toggleMenu);

menuLinks.forEach(link => {
    link.addEventListener("click", (e) => closeMenu(e));
});

export { toggleMenu, closeMenu };