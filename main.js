const faqItems = document.querySelectorAll('.item-faq');

faqItems.forEach((item) => {
  item.addEventListener('click', () => {
    item.classList.toggle('active');
  });
});

const filterItems = document.querySelectorAll('.item-filter');

filterItems.forEach(filterItem => {
  const toggleSymbol = filterItem.querySelector('.toggle-symbol');
  const filterList = filterItem.querySelector('ul');

  toggleSymbol.addEventListener('click', () => {
    filterList.classList.toggle('hide');
  });
});


