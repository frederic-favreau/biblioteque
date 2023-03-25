//
//
// Show and hide filter box for catalog

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

//
//
// SHOW AND HIDE SEARCH TOP BAR MOBILE VIEW
document.addEventListener("DOMContentLoaded", function () {
  const showImgBzrBtn = document.getElementById("show-search-bar");
  const leftArrowBtn = document.getElementById("left-arrow");
  const arrowContainer = document.getElementById("arrow-container");
  const containerGroupLogo = document.getElementById("container-group-logo");
  const containerGroupSearchNavTop = document.getElementById("container-group-search-nav-top");
  const containerBoxindexLogout = document.getElementById("container-box-index-logout");
  const containerBtnSignup = document.getElementById("btn-sign-up");

  showImgBzrBtn.addEventListener("click", function () {
    if (window.innerWidth <= 650) {
      arrowContainer.style.display = "block";
      containerGroupLogo.style.display = "none";
      containerGroupSearchNavTop.style.width = "95%";
      containerGroupSearchNavTop.style.display = "block";
      showImgBzrBtn.style.display = "none";
      containerBoxindexLogout.style.display = "none";
      containerBtnSignup.style.display = "none";
    }
  });

  leftArrowBtn.addEventListener("click", function () {
    if (window.innerWidth <= 650) {
      arrowContainer.style.display = "none";
      containerGroupLogo.style.display = "flex";
      containerGroupSearchNavTop.style.width = "auto";
      containerGroupSearchNavTop.style.display = "none";
      showImgBzrBtn.style.display = "block";
      containerBoxindexLogout.style.display = "block";
      containerBtnSignup.style.display = "block";
    }
  });
});

function resetStyles() {
  if (window.innerWidth > 650) {
    containerGroupLogo.style.display = "flex";
    containerGroupSearchNavTop.style.width = "auto";
    containerGroupSearchNavTop.style.display = "block";
    containerBoxindexLogout.style.display = "block";
    containerBtnSignup.style.display = "none";
  }
}

window.addEventListener("resize", resetStyles);

//
//
// CYCLE CHANGE WORD SUB-TITLE HERO
const words = ["imaginer", "rêver", "découvrir", "s'évader"];
const animatedWord = document.getElementById("animated-word");
let currentIndex = 0;

function changeWord() {
  animatedWord.classList.remove("smoke-effect");
  animatedWord.style.opacity = 0;

  setTimeout(() => {
    currentIndex = (currentIndex + 1) % words.length;
    animatedWord.textContent = words[currentIndex];
    animatedWord.style.opacity = 1;
    animatedWord.classList.add("smoke-effect");
  }, 300);
}

setInterval(changeWord, 3000);

//
//
// CYCLE CHANGE PICT HERO
const images = {
  fille: ["fille-livre-1.jpg", "fille-livre-2.jpg", "fille-livre-3.jpg"],
  ado: ["ado-livre-1.jpg", "ado-livre-2.jpg", "ado-livre-3.jpg"],
  senior: ["senior-livre-1.jpg", "senior-livre-2.jpg", "senior-livre-3.jpg"],
};

const pictReaderHero = document.querySelector(".pict-reader-hero");
const pictHeroFille = document.getElementById("pict-hero-fille");
const pictHeroAdo = document.getElementById("pict-hero-ado");
const pictHeroAdulte = document.getElementById("pict-hero-adulte");

let currentImages = images.fille;
let imageIndex = 0;

function changeImage() {
  imageIndex = (imageIndex + 1) % currentImages.length;
  pictReaderHero.setAttribute("src", `./img/hero/${currentImages[imageIndex]}`);
  pictReaderHero.setAttribute("alt", `Fille ${imageIndex + 1}`);
}

function updateImages(category) {
  currentImages = images[category];
  imageIndex = -1;
  changeImage();
}

pictHeroFille.addEventListener("click", () => updateImages("fille"));
pictHeroAdo.addEventListener("click", () => updateImages("ado"));
pictHeroAdulte.addEventListener("click", () => updateImages("senior"));

setInterval(changeImage, 3000);

//
//
// ROTATION CYCLE CARDS SECTION NEWS
document.addEventListener("DOMContentLoaded", () => {
  const sectionNews = document.querySelector("#section-news");
  const flips = document.querySelectorAll(".flip");
  let currentIndex = 0;
  const duration = 70 * 100;
  let cardHovered = false;

  function rotateCards() {
    if (!cardHovered) {
      flips[currentIndex].classList.remove("auto-flip");

      currentIndex++;
      if (currentIndex >= flips.length) {
        currentIndex = 0;
      }

      flips[currentIndex].classList.add("auto-flip");
    }

    setTimeout(rotateCards, duration);
  }

  function handleIntersection(entries, observer) {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        observer.unobserve(entry.target);
        rotateCards();
      }
    });
  }

  const observer = new IntersectionObserver(handleIntersection, {
    root: null,
    threshold: 0.1,
  });

  observer.observe(sectionNews);

  flips.forEach((flip) => {
    flip.addEventListener("mouseover", () => {
      const index = parseInt(flip.dataset.index);
      if (index !== currentIndex) {
        flip.classList.add("manual-flip");
        cardHovered = true; // Mettre à jour la variable lorsque la souris est sur la carte
      }
    });

    flip.addEventListener("mouseout", () => {
      flip.classList.remove("manual-flip");
      cardHovered = false; // Mettre à jour la variable lorsque la souris quitte la carte
    });
  });
});

//
//
// BTN BACK TO TOP
$(document).ready(function () {
  // Affiche ou masque le bouton en fonction du défilement
  $(window).scroll(function () {
    if ($(this).scrollTop() > $(window).height()) {
      $("#back-to-top").fadeIn();
    } else {
      $("#back-to-top").fadeOut();
    }
  });

  // Animer le défilement vers le haut lors du clic sur le bouton
  $("#back-to-top").click(function () {
    $("html, body").animate({ scrollTop: 0 }, 1000);
    return false;
  });
});

//
//
// ANIMATION SLOW-RETOURN SINCE LINK PAGE-BOTTOM
$(document).ready(function () {
  $("a.slow-return").on("click", function (event) {
    event.preventDefault(); // Empêche le comportement par défaut du lien

    // Récupère la cible de la section
    var target = $($(this).attr("href"));

    if (target.length) {
      // Animer le défilement jusqu'à la section cible
      $("html, body").animate(
        {
          scrollTop: target.offset().top,
        },
        1000
      ); // Durée de l'animation en millisecondes
    }
  });
});

//
//
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
    card.style.setProperty("--card-index", index + 1);

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

//
//
// ANIMATION NAV BAR AND STICKY

const nav = document.getElementById("main-nav-bar");

window.addEventListener("scroll", function () {
  if (window.scrollY > 30) {
    nav.classList.add("anim-nav");
  } else {
    nav.classList.remove("anim-nav");
  }
});

//
//
// ANIMATION SECTION HEART

document.addEventListener("DOMContentLoaded", function () {
  const sectionHeart = document.querySelector("#section-heart");

  const observer = new IntersectionObserver(
    function (entries, observer) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          let cards = document.querySelectorAll(".animated-card");

          cards.forEach(function (card, index) {
            card.style.animation = `slideIn 0.3s ${index * 0.3}s forwards`;
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

//
//
// Show and hide answer for FAQ

const faqItems = document.querySelectorAll(".item-faq");

faqItems.forEach((item) => {
  item.addEventListener("click", function () {
    item.classList.toggle("active");
  });
});

