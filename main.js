// Show and hide answer for FAQ

const faqItems = document.querySelectorAll(".item-faq");

faqItems.forEach((item) => {
  item.addEventListener("click", () => {
    item.classList.toggle("active");
  });
});


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


// Return home with group-logo

document.getElementById("container-group-logo").addEventListener("click", function() {
  window.location.href = "#section-news";
});

document.getElementById("group-logo").addEventListener("click", function() {
  window.location.href = "#section-news";
});


