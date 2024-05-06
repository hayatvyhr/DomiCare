const imageSelectorInput = document.querySelector(".image-selector-input");
const imageIcon = document.querySelector(".image-icon");

const citiesList = document.querySelector(".cities-list");
const cityIcon = document.querySelector(".city-icon");

imageSelectorInput.addEventListener("change", () => {
    imageIcon.classList.add("text-primary");
    imageSelectorInput.classList.add("text-black");
    imageSelectorInput.parentNode.classList.add("border-primary");
});

citiesList.addEventListener("click", () => {
    cityIcon.classList.add("text-primary");
    citiesList.classList.add("text-black");
    citiesList.parentNode.classList.add("border-primary");
});