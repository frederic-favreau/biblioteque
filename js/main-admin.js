



let btnOptionCruds = document.querySelectorAll(".btn-option-crud");
let boxOptionCruds = document.querySelectorAll(".box-option-crud");
let linkDetailcrud = document.getElementById("more-detail-book-crud");

for (const btnOptionCrud of btnOptionCruds) {
  btnOptionCrud.addEventListener("click", function () {
    let title = this.dataset.title;
    let pict = this.dataset.pict;
    let bookItem = this.closest(".item-book-crud"); // find the closest ancestor element with class "item-book-crud"
    let boxOptionCrud = bookItem.querySelector(".box-option-crud"); // find the corresponding tool box element

    // remove "active" class from all tool box elements
    for (const box of boxOptionCruds) {
      box.classList.remove("active");
    }

    // add "active" class only to the corresponding tool box element
    boxOptionCrud.classList.add("active");

    // add close button to the tool box
    let btnCloseOptionBox = document.createElement("button");
    btnCloseOptionBox.classList.add("btn-close-option-box");
    btnCloseOptionBox.innerHTML = "x";
    boxOptionCrud.appendChild(btnCloseOptionBox);

    // add event listener to close button
    btnCloseOptionBox.addEventListener("click", function () {
      boxOptionCrud.classList.remove("active");
      this.remove(); // remove close button from the tool box
    });

    linkDetailcrud.addEventListener("click", function () {

      const modaleBg = document.createElement("div");
      modaleBg.classList.add("bloc-modale");
      body.append(modaleBg);
      console.log(modaleBg);
    });
  });
}


const boxFormPersonal = document.getElementById("container-profil-tabs");
const boxHome = document.getElementById("container-home-tabs");
const btnProfil = document.getElementById("profil-pict");
const btnHome = document.getElementById("btn-home");

let isBoxVisible = false;

btnProfil.addEventListener("click", function () {
  if (isBoxVisible) {
    boxFormPersonal.style.display = "none";
    isBoxVisible = false;
  } else {
    boxFormPersonal.style.display = "block";
    boxHome.style.display = "none";
    isBoxVisible = true;
  }
});

btnHome.addEventListener("click", function () {
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




// SIDEBAR LEFT WINDOW


const sidebarWrapper = document.getElementById("sidebar-wrapper");

sidebarWrapper.addEventListener("mouseenter", () => {
  sidebarWrapper.classList.add("active");
});

sidebarWrapper.addEventListener("mouseleave", () => {
  sidebarWrapper.classList.remove("active");
});


// ZOOM PICTURE BOX CRUD

function centrerImage(img) {
  let imageCentree = document.querySelector("#image-centree");
  if (imageCentree) {
    imageCentree.remove();
    document.body.style.overflow = "auto";
  }
  imageCentree = document.createElement("img");
  imageCentree.src = img.src;
  imageCentree.alt = img.alt;
  imageCentree.id = "image-centree";
  document.body.appendChild(imageCentree);
  document.body.style.overflow = "hidden";
  imageCentree.onclick = function() {
    this.remove();
    document.body.style.overflow = "auto";
  };
}
