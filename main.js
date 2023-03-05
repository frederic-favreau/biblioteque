const faqItems = document.querySelectorAll('.item-faq');

faqItems.forEach((item) => {
  item.addEventListener('click', () => {
    item.classList.toggle('active');
  });
});

