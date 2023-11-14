const inputs = document.querySelectorAll('.input-field');
const toggle_btn = document.querySelectorAll('.toggle');
const main = document.querySelector('main');
const images = document.querySelectorAll('.image');

inputs.forEach((inp) => {
  inp.addEventListener('focus', () => {
    inp.classList.add('active');
  });
  inp.addEventListener('blur', () => {
    if (inp.value != '') return;
    inp.classList.remove('active');
  });
});


