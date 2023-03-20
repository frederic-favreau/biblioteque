document.addEventListener("DOMContentLoaded", function () {
  const pictRightElements = document.querySelectorAll(".pict-right");
  const pictLeftElements = document.querySelectorAll(".pict-left");

  function handleIntersection(entries, observer) {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.style.animationPlayState = "running";
      } else {
        entry.target.style.animationPlayState = "paused";
      }
    });
  }

  const observerOptions = {
    root: null,
    rootMargin: "0px",
    threshold: 0.3
  };

  const observer = new IntersectionObserver(handleIntersection, observerOptions);

  pictRightElements.forEach(element => {
    observer.observe(element);
  });

  pictLeftElements.forEach(element => {
    observer.observe(element);
  });
});

//
//
// ROTATION CYCLE CARDS HERO
document.addEventListener("DOMContentLoaded", () => {
  const sectionNews = document.querySelector("#section-news");
  const flips = document.querySelectorAll(".flip");
  let currentIndex = 0;
  const duration = 70 * 100; // 30 secondes
  let cardHovered = false; // Ajout d'une variable pour vérifier si une carte est survolée

  function rotateCards() {
    if (!cardHovered) { // Vérifie si aucune carte n'est survolée
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
$(document).ready(function() {
  // Affiche ou masque le bouton en fonction du défilement
  $(window).scroll(function() {
    if ($(this).scrollTop() > $(window).height()) {
      $('#back-to-top').fadeIn();
    } else {
      $('#back-to-top').fadeOut();
    }
  });

  // Animer le défilement vers le haut lors du clic sur le bouton
  $('#back-to-top').click(function() {
    $('html, body').animate({ scrollTop: 0 }, 1000);
    return false;
  });
});


//
//
// ANIMATION SLOW-RETOURN SINCE LINK PAGE-BOTTOM
$(document).ready(function() {
  $('a.slow-return').on('click', function(event) {
    event.preventDefault(); // Empêche le comportement par défaut du lien

    // Récupère la cible de la section
    var target = $($(this).attr('href'));

    if (target.length) {
      // Animer le défilement jusqu'à la section cible
      $('html, body').animate({
        scrollTop: target.offset().top
      }, 1000); // Durée de l'animation en millisecondes
    }
  });
});


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


