export function initSkills() {
    const loadMoreButton = document.querySelector("#load-more-btn");
    const howtoContainer = document.querySelector("#how2use .grid-con");
    const loadMoreWrapper = document.querySelector(".howto-load-more");
    const howtoSteps = Array.from(document.querySelectorAll(".howto-step"));

    let showingOriginal = true;

    const replacementItems = [
        { image: "images/html-logo.svg", title: "HTML" },
        { image: "images/css-logo.svg", title: "CSS" },
        { image: "images/js-logo.svg", title: "JavaScript" },
        { image: "images/sass-logo.svg", title: "SASS" },
        { image: "images/gsap-logo.svg", title: "Greensock" },
        { image: "images/php-logo.svg", title: "PHP" }
    ];

    function showReplacementSet() {
        document.querySelectorAll(".howto-step").forEach(step => step.remove());
        replacementItems.forEach(function buildItem(item) {
            const newStep = document.createElement("div");
            newStep.classList.add("howto-step", "col-span-full", "m-col-span-4", "l-col-span-4");
            newStep.innerHTML = `
                <img src="${item.image}" alt="${item.title}">
                <h3>${item.title}</h3>
            `;
            howtoContainer.insertBefore(newStep, loadMoreWrapper);
        });
    }

    function showOriginalSet() {
        document.querySelectorAll(".howto-step").forEach(step => step.remove());
        howtoSteps.forEach(function appendStep(step) {
            howtoContainer.insertBefore(step, loadMoreWrapper);
        });
    }

    function handleToggleView() {
        if (showingOriginal) {
            showReplacementSet();
            loadMoreButton.textContent = "Go back...";
            showingOriginal = false;
        } else {
            showOriginalSet();
            loadMoreButton.textContent = "See more...";
            showingOriginal = true;
        }
    }

    loadMoreButton.addEventListener("click", handleToggleView);
}