document.addEventListener('DOMContentLoaded', () => {
    const categoryButtons = document.querySelectorAll('.category-btn');
  
    if (categoryButtons.length >= 6) {
      categoryButtons[0].addEventListener('click', () => {
        window.location.href = window.routes.antimicrobials;
      });
      categoryButtons[1].addEventListener('click', () => {
        window.location.href = window.routes.analgesics;
      });
      categoryButtons[2].addEventListener('click', () => {
        window.location.href = window.routes.psychopharmacological;
      });
      categoryButtons[3].addEventListener('click', () => {
        window.location.href = window.routes.cardiovascular;
      });
      categoryButtons[4].addEventListener('click', () => {
        window.location.href = window.routes.gastrointestinal;
      });
      categoryButtons[5].addEventListener('click', () => {
        window.location.href = window.routes.metabolic;
      });
    }
  });
  