document.addEventListener('DOMContentLoaded', function () {
    const avatarProfil = document.getElementById("container-box-index-logout"); //parent de la boxIndexLogout
    const btnIndexSession = document.getElementById("btn-index-session"); //btn de déclenchement de la boxIndexLogout
    let body = document.querySelector("body");
  
    function removeBoxAndBgModal() {
      const existingBox = document.getElementById("box-index-logout");
      const modaleBg = document.querySelector(".bloc-modale");
  
      if (existingBox) {
        avatarProfil.removeChild(existingBox);
      }
  
      if (modaleBg) {
        modaleBg.remove();
      }
  
      document.body.style.overflow = "auto";
    }
  
    btnIndexSession.addEventListener('click', function (event) {
      event.preventDefault();
  
      // Recherche de la box existante
      const existingBox = document.getElementById("box-index-logout");
  
      // Si la box existe, la supprimer
      if (existingBox) {
        removeBoxAndBgModal();
        return;
      }
  
      document.body.style.overflow = "hidden";
  
      const modaleBg = document.createElement("div");
      modaleBg.classList.add("bloc-modale");
      body.append(modaleBg);
      modaleBg.addEventListener('click', removeBoxAndBgModal);
  
      // Sinon, créer et ajouter la box
      const boxIndexLogout = document.createElement("div");
      boxIndexLogout.id = "box-index-logout";
  
      const ulBoxIndexLogout = document.createElement("ul");
  
      const liGreetings = document.createElement("li");
      liGreetings.innerHTML = `Votre menu`;
      ulBoxIndexLogout.appendChild(liGreetings);
  
      const liDashboard = document.createElement("li");
      const dashboardLink = document.createElement("a");
      dashboardLink.href = "./admin/dashboard.php";
      dashboardLink.textContent = "Mon tableau de bord";
      liDashboard.appendChild(dashboardLink);
      ulBoxIndexLogout.appendChild(liDashboard);
  
      const liLoans = document.createElement("li");
      const loansLink = document.createElement("a");
      loansLink.href = "./admin/dashboard.php#box-loan";
      loansLink.textContent = "Mes emprunts";
      liLoans.appendChild(loansLink);
      ulBoxIndexLogout.appendChild(liLoans);
  
      const liWishlist = document.createElement("li");
      const wishlistLink = document.createElement("a");
      wishlistLink.href = "./admin/dashboard.php#box-whish-list";
      wishlistLink.textContent = "Ma lite d'envies";
      liWishlist.appendChild(wishlistLink);
      ulBoxIndexLogout.appendChild(liWishlist);
  
      boxIndexLogout.appendChild(ulBoxIndexLogout);
  
      const liLogout = document.createElement("li");
      const logoutBtn = document.createElement("a");
      logoutBtn.id = "btn-index-logout";
      logoutBtn.href = "./admin/logout.php";
      logoutBtn.textContent = "Se déconnecter";
      liLogout.appendChild(logoutBtn);
      ulBoxIndexLogout.appendChild(liLogout);
  
      avatarProfil.appendChild(boxIndexLogout);
    });
  });
  