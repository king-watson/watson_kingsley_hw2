const hamburger = document.querySelector("#hamburger");
const closeButton = document.querySelector("#close");
const menuOverlay = document.querySelector("#overlay");
const menuLinks = document.querySelectorAll("#menu ul li a");

function toggleMenu() {
    menuOverlay.classList.toggle("open");
    document.body.classList.toggle("no-scroll");
}

function closeOnNavClick(link) {
    link.addEventListener("click", toggleMenu);
}

hamburger.addEventListener("click", toggleMenu);
closeButton.addEventListener("click", toggleMenu);
menuLinks.forEach(closeOnNavClick);

export { toggleMenu };