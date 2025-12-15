// assets/js/app.js
document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll(".card").forEach(card => {
        card.style.opacity = 0;
        setTimeout(() => {
            card.style.transition = "0.5s";
            card.style.opacity = 1;
        }, 200);
    });
});
