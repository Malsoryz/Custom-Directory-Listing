const themebtn = document.getElementById('theme-btn');
const body = document.body;
themebtn.addEventListener('click', function() {
  if (body.classList.contains('theme-light')){
    body.classList.remove('theme-light');
    body.classList.add('theme-dark');
  } else {
    body.classList.remove('theme-dark');
    body.classList.add('theme-light');
  }
});