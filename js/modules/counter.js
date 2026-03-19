export class Counter {

    constructor(selector, initialValue = 0) {
        this.count = initialValue;
        this.selector = selector;
        this.mount();
    }

    mount() {
        const container = document.querySelector(this.selector);

        this.display = document.createElement("div");
        this.display.classList.add("counter-display");

        const btnWrap = document.createElement("div");
        btnWrap.classList.add("counter-btns");

        this.button  = document.createElement("button");
        this.button2 = document.createElement("button");
        this.button3 = document.createElement("button");

        this.button.textContent  = "Increment";
        this.button2.textContent = "Decrement";
        this.button3.textContent = "Reset";

        this.button.classList.add("btn-inc");
        this.button2.classList.add("btn-dec");
        this.button3.classList.add("btn-reset");

        container.appendChild(this.display);
        btnWrap.appendChild(this.button);
        btnWrap.appendChild(this.button2);
        btnWrap.appendChild(this.button3);
        container.appendChild(btnWrap);

        this.button.addEventListener("click",  () => this.increment());
        this.button2.addEventListener("click", () => this.decrement());
        this.button3.addEventListener("click", () => this.reset());

        this.toggleInactive();
        this.update();
    }

    toggleInactive() {
        if (this.count === 0) {
            this.button2.classList.add("inactive");
            this.button3.classList.add("inactive");
            this.button2.disabled = true;
            this.button3.disabled = true;
        } else {
            this.button2.classList.remove("inactive");
            this.button3.classList.remove("inactive");
            this.button2.disabled = false;
            this.button3.disabled = false;
        }
    }

    increment() {
        this.count++;
        this.update();
        this.toggleInactive();
    }

    decrement() {
        if (this.count > 0) {
            this.count--;
            this.update();
            this.toggleInactive();
        }
    }

    reset() {
        console.log("Reset Activated!!!");
        this.count = 0;
        this.update();
        this.toggleInactive();
    }

    update() {
        this.display.textContent = `Count: ${this.count}`;
    }
}

export class StepCounter extends Counter {

    constructor(selector, initialValue = 0, step = 1) {
        super(selector, initialValue);
        this.step = step;
        this.update();
    }

    increment() {
        this.count = this.count + this.step;
        this.update();
        this.toggleInactive();
    }

    decrement() {
        if (this.count > 0) {
            this.count = Math.max(0, this.count - this.step);
            this.update();
            this.toggleInactive();
        }
    }

    update() {
        this.display.textContent = `Count: ${this.count} (step: ${this.step})`;
    }
}