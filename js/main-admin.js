// SIDEBAR LEFT WINDOW

const sidebarWrapper = document.getElementById("sidebar-wrapper");

sidebarWrapper.addEventListener("mouseenter", () => {
  sidebarWrapper.classList.add("active");
});

sidebarWrapper.addEventListener("mouseleave", () => {
  sidebarWrapper.classList.remove("active");
});

// VIEW ALL DETAIL OF WORK CRUD
let linkDetailcrud = document.getElementById("more-detail-book-crud");
let btnAllDetailCb = document.getElementById("btn-all-detail");

btnAllDetailCb.addEventListener("click", function () {
  let boxDetailCbs = document.querySelectorAll(
    ".container-complete-detail-info-book"
  );
  for (const boxDetailCb of boxDetailCbs) {
    boxDetailCb.classList.toggle("active");
  }
});

// ADD A BOX OPTION FOR BOOK CRUD
let btnOptionCruds = document.querySelectorAll(".btn-option-crud");
for (const btnOptionCrud of btnOptionCruds) {
  btnOptionCrud.addEventListener("click", function () {
    const parentElement = this.closest(".detail-item-book-crud");
    let idWork = this.getAttribute("data-idWork");
    
    // Remove the previously open box
    const activeBox = document.querySelector(".container-box-option-crud.active");
    if (activeBox) {
      activeBox.remove();
    }

    const newContainerBoxOptionCrud = document.createElement("li");
    newContainerBoxOptionCrud.classList.add("container-box-option-crud", "active");

    const BoxOptionCrud = document.createElement("div");
    BoxOptionCrud.classList.add("box-option-crud");

    const h4BoxOption = document.createElement("h4");
    h4BoxOption.innerText = "Options du livre";
    BoxOptionCrud.appendChild(h4BoxOption);

    const listOptionCrud = document.createElement("ul");
    listOptionCrud.classList.add("list-option-crud");

    const moreDetailBookCrud = document.createElement("li");
    moreDetailBookCrud.setAttribute("id", "more-detail-book-crud");
    listOptionCrud.appendChild(moreDetailBookCrud);

    const aEditDataCrud = document.createElement("a");
    aEditDataCrud.setAttribute("id", "btn-confirmed");
    aEditDataCrud.setAttribute("href", "#dashboard-page-book-edit?id=" + idWork);
    aEditDataCrud.innerHTML = "Editer ses données";

    moreDetailBookCrud.appendChild(aEditDataCrud);

    const li = document.createElement("li");
    li.innerText = "Supprimer cet ouvrage";
    listOptionCrud.appendChild(li);

    BoxOptionCrud.appendChild(listOptionCrud);

    newContainerBoxOptionCrud.appendChild(BoxOptionCrud);

    parentElement.appendChild(newContainerBoxOptionCrud);

    // add close button to the tool box
    let btnCloseOptionBox = document.createElement("button");
    btnCloseOptionBox.classList.add("btn-close-option-box");
    btnCloseOptionBox.innerHTML = "x";
    BoxOptionCrud.appendChild(btnCloseOptionBox);

    // add event listener to close button
    btnCloseOptionBox.addEventListener("click", function () {
      newContainerBoxOptionCrud.remove();
    });
  });
}


// ACTIVE BOX TEMPORAL

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
  imageCentree.onclick = function () {
    this.remove();
    document.body.style.overflow = "auto";
  };
}
