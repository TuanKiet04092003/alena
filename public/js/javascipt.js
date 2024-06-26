const menu = document.querySelector(".menu");
window.addEventListener("scroll", () => {
    if (window.scrollY - 90 > 0) {
    menu.classList.add("fixed");
    } else {
    menu.classList.remove("fixed");
    }
});



