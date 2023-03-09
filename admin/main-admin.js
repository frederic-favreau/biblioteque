const boxFormPersonal = document.getElementById('container-profil-tabs');
const boxHome = document.getElementById('container-home-tabs');
const btnProfil = document.getElementById('profil-pict');
const btnHome = document.getElementById('btn-home');

let isBoxVisible = false;

btnProfil.addEventListener('click', function(){
    if (isBoxVisible) {
        boxFormPersonal.style.display = "none";
        isBoxVisible = false;
    } else {
        boxFormPersonal.style.display = "block";
        boxHome.style.display = "none";
        isBoxVisible = true;
    }
});

btnHome.addEventListener('click', function(){
    if (isBoxVisible) {
        boxFormPersonal.style.display = "none";
        boxHome.style.display = "none";
        isBoxVisible = false;
    } else {
        boxFormPersonal.style.display = "none";
        boxHome.style.display = "block";
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
