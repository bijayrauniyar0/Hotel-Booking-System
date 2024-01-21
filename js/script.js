document.addEventListener("DOMContentLoaded", function () {
  // Get the "Login" menu item and its submenu
  var loginMenu = document.getElementById("products");
  var loginSubmenu = loginMenu.querySelector("ul");

  // Show submenu with slide-in animation on mouseenter for both parent and submenu
  loginMenu.addEventListener("mouseenter", function () {
    loginSubmenu.style.opacity = 1;
    loginSubmenu.style.height = loginSubmenu.scrollHeight + "px";
  });

  // Keep submenu visible when mouse is over the submenu
  loginSubmenu.addEventListener("mouseenter", function () {
    loginSubmenu.style.opacity = 1;
    loginSubmenu.style.height = loginSubmenu.scrollHeight + "px";
  });

  // Hide submenu on mouseleave for both parent and submenu
  loginMenu.addEventListener("mouseleave", function () {
    hideSubmenu();
  });

  // Hide submenu when mouse leaves the submenu
  loginSubmenu.addEventListener("mouseleave", function () {
    hideSubmenu();
  });

  // Function to hide the submenu
  function hideSubmenu() {
    loginSubmenu.style.opacity = 0;
    loginSubmenu.style.height = 0;
  }
});


//slide show of images
document.addEventListener("DOMContentLoaded", function () {
  var slideIndex = 0;

  showSlides();

  function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");

    for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
    }

    slideIndex++;

    if (slideIndex > slides.length) {
      slideIndex = 1;
    }

    slides[slideIndex - 1].style.display = "block";

    setTimeout(showSlides, 2000); // Change slide every 2 seconds
  }
});



function validateEmail(email) {
  // Regular expression for basic email validation
  var email_check = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return email_check.test(email);
}


//contact scrolling effect
document.addEventListener("DOMContentLoaded", function () {
  // Get all links with the data-target attribute
  var scrollLinks = document.querySelectorAll('[data-target]');

  // Add click event listeners to the links
  scrollLinks.forEach(function (link) {
    link.addEventListener("click", function (e) {
      e.preventDefault();

      // Get the target element's ID from the data-target attribute
      var targetId = this.getAttribute("data-target");

      // Scroll smoothly to the target element
      document.getElementById(targetId).scrollIntoView({
        behavior: "smooth",
        block: "start",
      });
    });
  });
});