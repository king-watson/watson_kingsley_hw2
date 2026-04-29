export function initSkills() {
    const loadMoreButton = document.querySelector("#load-more-btn");
    const skillsGrid = document.querySelector(".skills-grid");
    const originalCards = Array.from(document.querySelectorAll(".skill-card"));

    let showingOriginal = true;

    const replacementItems = [
        { abbr: "HTML", title: "HTML", desc: "Semantic markup & page structure" },
        { abbr: "CSS", title: "CSS", desc: "Styling, layout & animation" },
        { abbr: "JS", title: "JavaScript", desc: "Interactivity & DOM manipulation" },
        { abbr: "Scss", title: "SASS", desc: "CSS preprocessing & variables" },
        { abbr: "GS", title: "Greensock", desc: "Advanced animation & scroll effects" },
        { abbr: "PHP", title: "PHP", desc: "Server-side scripting & databases" }
    ];

    function clearCards() {
        document.querySelectorAll(".skill-card").forEach(function removeCard(card) {
            card.remove();
        });
    }

    function buildCard(item) {
        const card = document.createElement("div");
        card.classList.add("skill-card");
        card.innerHTML = `
            <div class="skill-card__icon">${item.abbr}</div>
            <div class="skill-card__body">
                <h3 class="skill-card__name">${item.title}</h3>
                <p class="skill-card__desc">${item.desc}</p>
            </div>
        `;
        return card;
    }

    function showReplacementSet() {
        clearCards();
        replacementItems.forEach(function appendReplacement(item) {
            skillsGrid.appendChild(buildCard(item));
        });
    }

    function showOriginalSet() {
        clearCards();
        originalCards.forEach(function appendOriginal(card) {
            skillsGrid.appendChild(card);
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