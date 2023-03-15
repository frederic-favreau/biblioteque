// Lien de du bouton vers ma modale
let btnLoan = document.getElementById("btn-loan");

// Parent de ma modale
let containerBook = document.getElementById("container-detail-book");

// Parent de ma bg modale
let body = document.querySelector("body");

// Add even and dataset (modale book-page)

btnLoan.addEventListener("click", function (e) {
  e.preventDefault();
  let title = this.dataset.title;
  let pict = this.dataset.pict;
  let idWork = this.dataset.idWork;
  let loc = this.dataset.location;

  document.body.style.overflow = "hidden";

  const modaleBg = document.createElement("div");
  modaleBg.classList.add("bloc-modale");
  body.append(modaleBg);

  const boxLoan = document.createElement("div");
  boxLoan.setAttribute("id", "box-loan");
  boxLoan.classList.add("active-box-loan");
  containerBook.append(boxLoan);

  const confirmation = document.createElement("p");
  confirmation.setAttribute("id", "loan-confimation");
  boxLoan.appendChild(confirmation);
  confirmation.innerText = "Le livre vous attend chez Biblook !";

  const titleBook = document.createElement("p");
  titleBook.setAttribute("id", "book-title-box");
  boxLoan.appendChild(titleBook);
  titleBook.innerHTML = `${title}`;

  const pictBook = document.createElement("img");
  pictBook.setAttribute("id", "pict-book-modale");
  pictBook.setAttribute("alt", `${title}`);
  pictBook.src = `../img/books/${pict}`;
  boxLoan.appendChild(pictBook);

  const location = document.createElement("p");
  boxLoan.append(location);
  location.innerText = "Son emplacement: " + `${loc}`;

  const btnConfirmed = document.createElement("a");
  btnConfirmed.setAttribute("id", "btn-confirmed");
  boxLoan.appendChild(btnConfirmed);
  btnConfirmed.innerHTML = "Fermer";

  btnConfirmed.addEventListener("click", function () {
    boxLoan.remove();
    modaleBg.remove();
    document.body.style.overflow = "auto";
  });
});
