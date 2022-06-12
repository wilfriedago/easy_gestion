// Responsive
const menuBtn = document.querySelector(".nav-menuBtn");
const links = document.querySelector(".nav-links");

menuBtn.addEventListener("click", () => {
  menuBtn.classList.toggle("active");
  links.classList.toggle("active");
});

function modalBoxActivity() {
  const box = document.getElementById("modal-box");
  box.style.visibility =
    box.style.visibility === "visible" ? "visible" : "hidden";
}
