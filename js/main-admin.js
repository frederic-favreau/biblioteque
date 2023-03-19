// CLOSE NOTIFICATION ADD, EDIT AND DELETE ITEM TO BDD
function hideDivConfirmed(divId) {
  document.getElementById(divId).classList.add("hidden");
}

function hideDivNotConfirmed(divId) {
  document.getElementById(divId).classList.add("hidden");
}

//
//
// SIDEBAR LEFT WINDOW
const sidebarWrapper = document.getElementById("sidebar-wrapper");

sidebarWrapper.addEventListener("mouseenter", () => {
  sidebarWrapper.classList.add("active");
});

sidebarWrapper.addEventListener("mouseleave", () => {
  sidebarWrapper.classList.remove("active");
});

//
//
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

//
//
// ADD A BOX OPTION FOR BOOK CRUD
let btnOptionCruds = document.querySelectorAll(".btn-option-crud");
for (const btnOptionCrud of btnOptionCruds) {
  btnOptionCrud.addEventListener("click", function () {
    const parentElement = this.closest(".detail-item-book-crud");
    let idWork = this.getAttribute("data-idWork");
    let titleWork = this.getAttribute("data-title");
    let pictWork = this.getAttribute("data-pict");

    // Remove the previously open box
    const activeBox = document.querySelector(
      ".container-box-option-crud.active"
    );
    if (activeBox) {
      activeBox.remove();
    }

    const newContainerBoxOptionCrud = document.createElement("li");
    newContainerBoxOptionCrud.classList.add(
      "container-box-option-crud",
      "active"
    );

    const BoxOptionCrud = document.createElement("div");
    BoxOptionCrud.classList.add("box-option-crud");

    const h4BoxOption = document.createElement("h4");
    h4BoxOption.innerText = "Options du livre";
    BoxOptionCrud.appendChild(h4BoxOption);

    const listOptionCrud = document.createElement("ul");
    listOptionCrud.classList.add("list-option-crud");

    const editDetailBookCrud = document.createElement("li");
    editDetailBookCrud.setAttribute("id", "more-detail-book-crud");
    listOptionCrud.appendChild(editDetailBookCrud);

    const aEditDataCrud = document.createElement("a");
    aEditDataCrud.setAttribute("id", "btn-confirmed");
    aEditDataCrud.setAttribute("href", "./edit-book.php?id=" + idWork);
    aEditDataCrud.innerHTML = "Editer ses données";

    editDetailBookCrud.appendChild(aEditDataCrud);

    const deleteBookCrud = document.createElement("li");
    deleteBookCrud.setAttribute("id", "delete-book-crud");
    listOptionCrud.appendChild(deleteBookCrud);

    const aDeleteDataCrud = document.createElement("a");
    aDeleteDataCrud.setAttribute("id", "btn-DeleteDataCrud");
    aDeleteDataCrud.dataset.titlework = titleWork;
    aDeleteDataCrud.dataset.pictWork = pictWork;
    aDeleteDataCrud.setAttribute("href", "#" + idWork);
    aDeleteDataCrud.innerHTML = "Supprimer un exemplaire";

    // SHOW BOX DELETE BOOK
    let body = document.querySelector("body");
    let main = document.querySelector("main");
    aDeleteDataCrud.addEventListener("click", function () {
      newContainerBoxOptionCrud.remove();

      document.body.style.overflow = "hidden";

      const modaleBg = document.createElement("div");
      modaleBg.classList.add("bloc-modale");
      body.append(modaleBg);


      const boxDeleteBook = document.createElement("div");
      boxDeleteBook.setAttribute("id", "box-delete-book");
      boxDeleteBook.classList.add("active-box-delete-book");
      main.append(boxDeleteBook);


      const confirmation = document.createElement("p");
      confirmation.setAttribute("id", "txt-box-delete-book");
      boxDeleteBook.appendChild(confirmation);
      confirmation.innerText = "Voulez-vous supprimer un exemplaire du livre suivant ?";

      const titleBook = document.createElement("p");
      titleBook.setAttribute("id", "book-title-delete-box");
      boxDeleteBook.appendChild(titleBook);
      titleBook.innerHTML = `${titleWork}`;

      const pictBook = document.createElement("img");
      pictBook.setAttribute("id", "pict-book-modale-delete-box");
      pictBook.setAttribute("alt", `${titleWork}`);
      pictBook.src = `../img/books/${pictWork}`;
      boxDeleteBook.appendChild(pictBook);

      const btnCancel = document.createElement("a");
      btnCancel.setAttribute("id", "btn-cancel-delete-book");
      boxDeleteBook.appendChild(btnCancel);
      btnCancel.innerHTML = "Annuler";

      const btnConfirmed = document.createElement("a");
      btnConfirmed.setAttribute("id", "btn-confirmed-delete-book");
      btnConfirmed.setAttribute("href", "./delete-book.php?id=" + idWork);
      boxDeleteBook.appendChild(btnConfirmed);
      btnConfirmed.innerHTML = "Confirmer";

      // CLOSE  BOX DELETE BOOK
      btnCancel.addEventListener("click", function () {
        boxDeleteBook.remove();
        modaleBg.remove();
        document.body.style.overflow = "auto";
      });
    });

    deleteBookCrud.appendChild(aDeleteDataCrud);
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
//
//
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
