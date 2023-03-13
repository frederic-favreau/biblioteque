let btnOptionCruds = document.querySelectorAll(".btn-option-crud");

for (const btnOptionCrud of btnOptionCruds) {
  btnOptionCrud.addEventListener("click", function () {
    let title = this.dataset.title;
    let pict = this.dataset.pict;
    let bookItem = this.closest(".item-book-crud"); // find the closest ancestor element with class "item-book-crud"
    let boxOptionCrud = bookItem.querySelector(".box-option-crud"); // find the corresponding tool box element

    // remove "active" class from all tool box elements
    let boxOptionCruds = document.querySelectorAll(".box-option-crud");
    for (const box of boxOptionCruds) {
      box.classList.remove("active");
    }

    // add "active" class only to the corresponding tool box element
    boxOptionCrud.classList.add("active");

    // création de la box option

  


    // add close button to the tool box
    let btnCloseOptionBox = document.createElement("button");
    btnCloseOptionBox.classList.add("btn-close-option-box");
    btnCloseOptionBox.innerHTML = "x";
    newBoxOptionCrud.appendChild(btnCloseOptionBox);


    //  add "Voir les détails" button to the tool box
    let btnDetailOptionBox = boxOptionCrud.querySelector(".btn-detail-option-box");
    if (!btnDetailOptionBox) {
      btnDetailOptionBox = document.createElement("button");
      btnDetailOptionBox.classList.add("btn-detail-option-box");
      btnDetailOptionBox.innerHTML = "Voir les détails";
      listOptionCrud.appendChild(btnDetailOptionBox);
    }


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

// Create the options box once
const containerBoxOptionCrud = document.createElement("li");
containerBoxOptionCrud.classList.add("container-box-option-crud");

const BoxOptionCrud = document.createElement("div");
BoxOptionCrud.classList.add("box-option-crud");

const h4BoxOption = document.createElement("h4");
h4BoxOption.innerText = "Options du livre";
BoxOptionCrud.appendChild(h4BoxOption);

const listOptionCrud = document.createElement("ul");
listOptionCrud.classList.add("list-option-crud");

const editDataBookCrud = document.createElement("li");
editDataBookCrud.setAttribute("id", "btn-edit-book-crud");
listOptionCrud.appendChild(editDataBookCrud);

btnDetailOptionBox = document.createElement("button");
btnDetailOptionBox.classList.add("btn-detail-option-box");
btnDetailOptionBox.innerHTML = "Voir les détails";
listOptionCrud.appendChild(btnDetailOptionBox);

const moreDetailBookCrud = document.createElement("li");
moreDetailBookCrud.setAttribute("id", "more-detail-book-crud");
listOptionCrud.appendChild(moreDetailBookCrud);

const aEditDataCrud = document.createElement("a");
aEditDataCrud.setAttribute("id", "btn-confirmed");
aEditDataCrud.setAttribute("href", "#dashboard-page-book-edit");
aEditDataCrud.innerHTML = "Editer ses données";

moreDetailBookCrud.appendChild(aEditDataCrud);

const li = document.createElement("li");
li.innerText = "Supprimer cet ouvrage";
listOptionCrud.appendChild(li);

BoxOptionCrud.appendChild(listOptionCrud);

containerBoxOptionCrud.appendChild(BoxOptionCrud);

const parentElement = document.querySelector(".detail-item-book-crud");
parentElement.appendChild(containerBoxOptionCrud);

// add close button to the tool box
let btnCloseOptionBox = document.createElement("button");
btnCloseOptionBox.classList.add("btn-close-option-box");
btnCloseOptionBox.innerHTML = "x";
BoxOptionCrud.appendChild(btnCloseOptionBox);

// add event listener to close button
btnCloseOptionBox.addEventListener("click", function () {
  BoxOptionCrud.classList.remove("active");
});

// Attach click event listener to all buttons
let btnOptionCruds = document.querySelectorAll(".btn-option-crud");
for (const btnOptionCrud of btnOptionCruds) {
  btnOptionCrud.addEventListener("click", function () {
    BoxOptionCrud.classList.add("active");
    let title = this.dataset.title;
    let pict = this.dataset.pict;
    let bookItem = this.closest(".item-book-crud"); // find the closest ancestor element with class "item-book-crud"
    let boxOptionCrud = bookItem.querySelector(".box-option-crud"); // find the corresponding tool box element
  });
}


// ADD A BOX OPTION FOR BOOK CRUD
let btnOptionCruds = document.querySelectorAll(".btn-option-crud");
for (const btnOptionCrud of btnOptionCruds) {
  btnOptionCrud.addEventListener("click", function () {
    const containerBoxOptionCrud = document.createElement("li");
    containerBoxOptionCrud.classList.add("container-box-option-crud");

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
    aEditDataCrud.setAttribute("href", "#dashboard-page-book-edit");
    aEditDataCrud.innerHTML = "Editer ses données";

    aEditDataCrud.addEventListener("click", function () {
      BoxOptionCrud.remove();
    });

    moreDetailBookCrud.appendChild(aEditDataCrud);

    console.log(aEditDataCrud);

    const li = document.createElement("li");
    li.innerText = "Supprimer cet ouvrage";
    listOptionCrud.appendChild(li);

    BoxOptionCrud.appendChild(listOptionCrud);

    containerBoxOptionCrud.appendChild(BoxOptionCrud);

    const parentElement = document.querySelector(".detail-item-book-crud");
    parentElement.appendChild(containerBoxOptionCrud);

    // add close button to the tool box
    let btnCloseOptionBox = document.createElement("button");
    btnCloseOptionBox.classList.add("btn-close-option-box");
    btnCloseOptionBox.innerHTML = "x";
    BoxOptionCrud.appendChild(btnCloseOptionBox);

    // add event listener to close button
    btnCloseOptionBox.addEventListener("click", function () {
      BoxOptionCrud.remove("active");
    });
  });
}