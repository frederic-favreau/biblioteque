let linkDetailcrud = document.getElementById("more-detail-book-crud");
let btnAllDetailCb = document.getElementById("btn-all-detail");
let listOptionCrud = document.querySelector('.list-option-crud')

btnAllDetailCb.addEventListener("click", function () {
  let boxDetailCbs = document.querySelectorAll(
    ".container-complete-detail-info-book"
  );
  for (const boxDetailCb of boxDetailCbs) {
    boxDetailCb.classList.toggle("active");
  }
});

let btnOptionCruds = document.querySelectorAll(".btn-option-crud");
let boxOptionCruds = document.querySelectorAll(".box-option-crud");

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

    // add "Voir les détails" button to the tool box
    // let btnDetailOptionBox = boxOptionCrud.querySelector(".btn-detail-option-box");
    // if (!btnDetailOptionBox) {
    //   btnDetailOptionBox = document.createElement("button");
    //   btnDetailOptionBox.classList.add("btn-detail-option-box");
    //   btnDetailOptionBox.innerHTML = "Voir les détails";
    //   listOptionCrud.appendChild(btnDetailOptionBox);
    // }

    // add event listener to "Voir les détails" button
    let boxDetailCbs = document.querySelectorAll(
      ".container-complete-detail-info-book"
    );
    btnDetailOptionBox.addEventListener("click", function () {
      let bookItem = this.closest(".item-book-crud"); // find the closest ancestor element with class "item-book-crud"
      let boxDetailCb = bookItem.querySelector(
        ".container-complete-detail-info-book"
      ); // find the corresponding detail box element

      // remove "active" class from all other detail box elements
      for (const otherBoxDetailCb of boxDetailCbs) {
        if (otherBoxDetailCb !== boxDetailCb) {
          otherBoxDetailCb.classList.remove("active");
        }
      }

      // add "active" class only to the corresponding detail box element
      boxDetailCb.classList.add("active");
    });

    // remove "active" class from all detail box elements
    for (const boxDetailCb of boxDetailCbs) {
      boxDetailCb.classList.remove("active");
    }
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
  imageCentree.onclick = function () {
    this.remove();
    document.body.style.overflow = "auto";
  };
}
