// Show and hise filter box for catalog

const showFilters = document.querySelectorAll(".show-filter");

showFilters.forEach((filter) => {
  filter.addEventListener("click", () => {
    const itemFilter = filter.parentElement;
    itemFilter.classList.toggle("active");

    const listFilter = itemFilter.querySelector(".list-filter");
    listFilter.classList.toggle("active");

    const toggleSymbol = filter.querySelector(".toggle-symbol");
    toggleSymbol.textContent = listFilter.classList.contains("active")
      ? "-"
      : "+";
  });
});

// ANIMATION CARD SECTION LAST ARRIVED

const section = document.querySelector("#section-soon-available");
const cards = document.querySelectorAll(".card");
const firstRow = document.querySelectorAll(".card:nth-child(-n+3)");
const secondRow = document.querySelectorAll(
  ".card:nth-child(n+4):nth-child(-n+6)"
);
const thirdRow = document.querySelectorAll(".card:nth-child(n+7)");

const animateRow = (row, animationClass) => {
  row.forEach((card, index) => {
    card.style.setProperty('--card-index', index + 1); // Ajoutez cette ligne ici

    const observer = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            card.classList.add(animationClass);
            observer.unobserve(card);
          }
        });
      },
      { threshold: 0.2 }
    );
    observer.observe(card);
  });
};


animateRow(firstRow, "show-card-row1");
animateRow(secondRow, "show-card-row2");
animateRow(thirdRow, "show-card-row3");

// ANIMATION NAV BAR AND STICKY

const nav = document.getElementById("main-nav-bar");

window.addEventListener("scroll", function () {
  if (window.scrollY > 30) {
    nav.classList.add("anim-nav");
  } else {
    nav.classList.remove("anim-nav");
  }
});

// ANIMATION SECTION HEART

document.addEventListener("DOMContentLoaded", function () {
  const sectionHeart = document.querySelector("#section-heart");

  const observer = new IntersectionObserver(
    function (entries, observer) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          let cards = document.querySelectorAll(".animated-card");

          cards.forEach(function (card, index) {
            card.style.animation = `slideIn 1s ${index * 0.5}s forwards`;
          });

          // Désactive l'observer après l'animation
          observer.disconnect();
        }
      });
    },
    {
      root: null,
      rootMargin: "0px", // Décale la zone d'observation vers le bas de 100 pixels
      threshold: 0.6, // Pourcentage de la section visible avant de déclencher l'animation
    }
  );

  observer.observe(sectionHeart);
});

// Show and hide answer for FAQ

const faqItems = document.querySelectorAll(".item-faq");

faqItems.forEach((item) => {
  item.addEventListener("click", function () {
    item.classList.toggle("active");
  });
});

let btnAvatar = document.getElementById("btn-avatar");

btnAvatar.addEventListener("click", function () {
  let menuAvatar = document.createElement("div");
  menuAvatar.id = "menuAvatar";

  let Avatar = document.getElementById("menuAvatar");
  Avatar.style.height = "100px";
  Avatar.style.width = "100px";
  Avatar.style.color = "red";
  let headerRight = document.getElementById("container-group-btn-connexion");
  headerRight.appendChild(menuAvatar);
});
