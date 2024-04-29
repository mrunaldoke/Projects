window.addEventListener('scroll', function() {
  var navbar = document.getElementById('navbar');
  if (window.scrollY > 50) { // Change 50 to the desired scroll position
    navbar.style.backgroundColor = 'black'; // Change background color when scrolled
  } else {
    navbar.style.backgroundColor = 'transparent'; // Change back to transparent when scrolled back up
  }
});
