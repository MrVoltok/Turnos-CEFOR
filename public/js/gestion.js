function iniciarSlider() {
  let current = 0;
  const images = document.querySelectorAll('#slider img');
  setInterval(() => {
    images[current].classList.toggle('hidden');
    current = (current + 1) % images.length;
    images[current].classList.remove('hidden');
  }, 3000);
}

// function refreshWindow() {
//   setInterval(() => {
//     location.reload();
//   }, 60000);
// }

iniciarSlider();
// refreshWindow(1);