// Show and hise filter box for catalog

const showFilters = document.querySelectorAll(".show-filter");

showFilters.forEach((filter) => {
  filter.addEventListener("click", () => {

    const itemFilter = filter.parentElement;
    itemFilter.classList.toggle("active");

    const listFilter = itemFilter.querySelector(".list-filter");
    listFilter.classList.toggle("active");

    const toggleSymbol = filter.querySelector(".toggle-symbol");
    toggleSymbol.textContent = listFilter.classList.contains("active") ? "-" : "+";
  });
});


// ANIMATION CARD SECTION LAST ARRIVED

const section = document.querySelector('#section-soon-available');
const cards = document.querySelectorAll('.card');
const firstRow = document.querySelectorAll('.card:nth-child(-n+3)');
const secondRow = document.querySelectorAll('.card:nth-child(n+4):nth-child(-n+6)');
const thirdRow = document.querySelectorAll('.card:nth-child(n+7)');
const observer = new IntersectionObserver(entries => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      cards.forEach(card => {
        card.classList.add('show-card');
      });
      observer.unobserve(section);
    }
  });
});
const observerFirstRow = new IntersectionObserver(entries => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      firstRow.forEach(card => {
        card.classList.add('show-card-row1');
      });
      observerFirstRow.unobserve(section);
    }
  });
});
const observerSecondRow = new IntersectionObserver(entries => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      secondRow.forEach(card => {
        card.classList.add('show-card-row2');
      });
      observerSecondRow.unobserve(section);
    }
  });
});
const observerThirdRow = new IntersectionObserver(entries => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      thirdRow.forEach(card => {
        card.classList.add('show-card-row3');
      });
      observerThirdRow.unobserve(section);
    }
  });
});

observer.observe(section);
observerFirstRow.observe(section);
observerSecondRow.observe(section);
observerThirdRow.observe(section);



// ANIMATION NAV BAR AND STICKY

const nav = document.getElementById('main-nav-bar');

window.addEventListener('scroll', function () {

    if(window.scrollY > 30) {
        nav.classList.add('anim-nav');
    } else {
        nav.classList.remove('anim-nav');
    }

})

// ANIMATION SECTION HEART

document.addEventListener("DOMContentLoaded", function () {
  const sectionHeart = document.querySelector('#section-heart');

  const observer = new IntersectionObserver(function (entries, observer) {
    entries.forEach(function (entry) {
      if (entry.isIntersecting) {
        var leftCards = document.querySelectorAll('.left-card');
        var rightCards = document.querySelectorAll('.right-card');

        leftCards.forEach(function (card) {
          card.style.transform = 'translateX(0)';
        });

        rightCards.forEach(function (card) {
          card.style.transform = 'translateX(0)';
        });

        // Désactive l'observer après l'animation
        observer.disconnect();
      }
    });
  }, {
    root: null,
    rootMargin: '0px',
    threshold: 0.1 // Pourcentage de la section visible avant de déclencher l'animation
  });

  observer.observe(sectionHeart);
});



// Show and hide answer for FAQ

const faqItems = document.querySelectorAll(".item-faq");

faqItems.forEach((item) => {
  item.addEventListener("click", () => {
    item.classList.toggle("active");
  });
});



