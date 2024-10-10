function changetheme() {
  const body = document.body;
  if (body.classList.contains('theme-light')){
    body.classList.remove('theme-light');
    body.classList.add('theme-dark');
  } else {
    body.classList.remove('theme-dark');
    body.classList.add('theme-light');
  }
}
const themebtn = document.getElementById('theme-btn');
themebtn.addEventListener('click', changetheme);