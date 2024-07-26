
//employee-user login
const btns = document.querySelectorAll('.btns');
const authsection = document.querySelectorAll('.authsection');

var slideNav = function (manual) {
  btns.forEach((btn) => {
    btn.classList.remove('active');
  });
  authsection.forEach((slide) => {
    slide.classList.remove('active');
  });

  btns[manual].classList.add('active');
  authsection[manual].classList.add('active');
};

btns.forEach((btn, i) => {
  btn.addEventListener('click', () => {
    slideNav(i);
  });
});