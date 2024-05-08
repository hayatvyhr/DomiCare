const overlay = document.querySelector(".overlay");
const commentaireForms = document.querySelectorAll(".commentaire-form");
const closeBtns = document.querySelectorAll(".close-btn");

function enableScroll() {
    document.body.classList.remove("remove-scrolling");
}

function closeForm() {
    overlay.classList.add("hidden");
    commentaireForms.forEach((form) => {
        form.classList.add("hidden");
    });
    enableScroll();
}

overlay.addEventListener("click", closeForm);
closeBtns.forEach((btn) => {
    btn.addEventListener("click", closeForm);
});
