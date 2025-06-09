export function headerSticky() {
  // header sticky
  let lastScrollY = window.scrollY;
  const header = document.querySelector('header');
  const fireSticky = function () {
    const currentScrollY = window.scrollY;
    const isScrollingDown = currentScrollY > lastScrollY;
    const isPastThreshold = currentScrollY > 100;
  
    header.classList.toggle('hide', isScrollingDown && isPastThreshold);
    header.classList.toggle('sticky', isPastThreshold);
  
    lastScrollY = currentScrollY;

  };
  window.addEventListener('scroll', fireSticky);
  if (document.readyState === 'complete') {
    fireSticky();
  }
}
