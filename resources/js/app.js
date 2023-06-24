import "./bootstrap";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.store("data", {
    gift: "",
    cution: false,
    runner: false,
    discount: false,
    cutionFun() {
        this.gift = "Cushion";
        this.cution = true;
    },
    runnerFun() {
        this.gift = "Runner";
        this.runner = true;
    },
    discountFun() {
        this.gift = "Discount UP TO";
        this.discount = true;
    },
});

Alpine.start();

import ConfettiGenerator from "confetti-js";

let confettiSettings = { target: "my-canvas", rotate: true, max: 400 };
let confetti = new ConfettiGenerator(confettiSettings);
confetti.render();
