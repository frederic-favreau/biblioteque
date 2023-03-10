// fond d'ecran noir
const modaleBox = document.querySelector(".bloc-modale");

// Lien de du bouton vers ma modale
let btnLoan = document.getElementById("btn-loan");

// Parent de ma modale
let containerBook = document.getElementById("container-detail-book");

btnLoan.addEventListener("click", function (e) {
  e.preventDefault();
  let title = this.dataset.title;
  let idWork = this.dataset.idWork;
  let idCopy = this.dataset.idCopy;
  let pict = this.dataset.pict;
  let location = this.dataset.location;
  modaleBox.style.display = "block";

  const boxLoan = document.createElement("div");
  boxLoan.setAttribute("id", "box-loan");
  boxLoan.classList.add("active-box-loan");
  containerBook.append(boxLoan);
  console.log(boxLoan);

  const confirmation = document.createElement("p");
  boxLoan.appendChild(confirmation);
  confirmation.innerText = "Votre livre vous attend chez Biblook !";

  const titleBook = document.createElement("p");
  titleBook.setAttribute("class", "article-title-box");
  boxLoan.appendChild(titleBook);
  titleBook.innerHTML = `" ${title} "`;
});
// const contBtn = document.createElement("div");
// titleBook.append(contBtn);

// const btnCancel = document.createElement("a");
// btnCancel.setAttribute("id", "btn-cancel");
// contBtn.appendChild(btnCancel);
// btnCancel.innerHTML = "Annuler";

// const btnConfirmed = document.createElement("a");
// btnConfirmed.setAttribute("id", "btn-confirmed");
// btnConfirmed.setAttribute("href", "./delete.php?id=" + id);
// contBtn.appendChild(btnConfirmed);
// btnConfirmed.innerHTML = "Confirmer";

// btnCancel.addEventListener("click", function () {
//   boxDelete.remove();
//   modaleBox.style.display = "none";
// });
