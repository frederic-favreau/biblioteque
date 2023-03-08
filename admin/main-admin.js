const boxFormPersonal = document.getElementById('container-profil-tabs');
const btnProfil = document.getElementById('profil-pict');

let isBoxVisible = false;

btnProfil.addEventListener('click', function(){
    if (isBoxVisible) {
        boxFormPersonal.style.display = "none";
        isBoxVisible = false;
    } else {
        boxFormPersonal.style.display = "block";
        isBoxVisible = true;
    }
});



const sidebarWrapper = document.getElementById("sidebar-wrapper");

sidebarWrapper.addEventListener("mouseenter", () => {
  sidebarWrapper.classList.add("active");
});

sidebarWrapper.addEventListener("mouseleave", () => {
  sidebarWrapper.classList.remove("active");
});
