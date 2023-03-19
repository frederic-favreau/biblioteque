const avatarProfil = document.getElementById("container-box-index-logout"); //parent de la boxIndexLogout
const btnIndexSession = document.getElementById("btn-index-session"); //btn de déclenchement de la boxIndexLogout

btnIndexSession.addEventListener('click', function (event) {
  event.preventDefault();
  const boxIndexLogout = document.createElement("div");
  boxIndexLogout.id = "box-index-logout";

  const ulBoxIndexLogout = document.createElement("ul");
  const liBoxIndexLogout = document.createElement("li");

  const greetingsLink = document.createElement("a");
  greetingsLink.innerHTML = `Ravi de vous revoir`;
  liBoxIndexLogout.appendChild(greetingsLink);

  const dashboardLink = document.createElement("a");
  dashboardLink.href = "./admin/dashboard.php";
  dashboardLink.textContent = "Mon tableau de bord";
  liBoxIndexLogout.appendChild(dashboardLink);

  const loansLink = document.createElement("a");
  loansLink.href = "./admin/dashboard.php#box-loan";
  loansLink.textContent = "Mes emprunts";
  liBoxIndexLogout.appendChild(loansLink);

  const wishlistLink = document.createElement("a");
  wishlistLink.href = "./admin/dashboard.php#box-whish-list";
  wishlistLink.textContent = "Ma lite d'envies";
  liBoxIndexLogout.appendChild(wishlistLink);

  ulBoxIndexLogout.appendChild(liBoxIndexLogout);
  boxIndexLogout.appendChild(ulBoxIndexLogout);

  const logoutBtn = document.createElement("a");
  logoutBtn.id = "btn-index-logout";
  logoutBtn.href = "./admin/logout.php";
  logoutBtn.textContent = "se déconnecter";
  boxIndexLogout.appendChild(logoutBtn);

  avatarProfil.appendChild(boxIndexLogout);
});