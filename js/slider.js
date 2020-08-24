/* global wp, jQuery */

( function( $ ) {

var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}


function showSlides(n) {
  var i;
  var dots = document.getElementsByClassName("dot");
  var slides = document.getElementsByClassName("mySlides");
  if (n > slides.length) {slideIndex = 1}
    if (n < 1) {slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
      slides[i].className = slides[i].className.replace(" active-slide", "");
    }
  slides[slideIndex-1].style.display = "block";
  slides[slideIndex-1].className += " active-slide";
  dots[slideIndex-1].className += " active";
}



  if(document.getElementsByClassName("mySlides").length > 1) {
    setInterval(function(){ plusSlides(1); }, 5000);
  }

  $('.prev').on('click', function() {plusSlides(-1)});
  $('.next').on('click', function() {plusSlides(1)});
  $('.dot').on('click', function() {currentSlide($(this).index() + 1)});
}( jQuery ) );
