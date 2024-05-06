flatpickr(".calendar", {
    inline: true,
    enableTime: true,
    altInput: true,
    altFormat: "F j, Y (h:S K)",
});

const bookingForm = document.querySelector(".booking-form");
const bookingBtn = document.querySelector(".booking-btn");
const closeBtn = document.querySelector(".close-btn");
const cancelBtn = document.querySelector(".cancel-btn");
const overlay = document.querySelector(".overlay");

function disableScroll() {
    document.body.classList.add("remove-scrolling");
}

function enableScroll() {
    document.body.classList.remove("remove-scrolling");
}

function openSidebar() {
    bookingForm.classList.add("translate-x-[-380px]");
    overlay.classList.remove("hidden");
    disableScroll();
}

function closeSidebar() {
    bookingForm.classList.remove("translate-x-[-380px]");
    overlay.classList.add("hidden");
    enableScroll();
}

bookingBtn.addEventListener("click", openSidebar);
closeBtn.addEventListener("click", closeSidebar);
overlay.addEventListener("click", closeSidebar);
cancelBtn.addEventListener("click", closeSidebar);
