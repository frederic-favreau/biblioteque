const sidebarWrapper = document.getElementById("sidebar-wrapper");

sidebarWrapper.addEventListener("mouseenter", () => {
  sidebarWrapper.classList.add("active");
});

sidebarWrapper.addEventListener("mouseleave", () => {
  sidebarWrapper.classList.remove("active");
});