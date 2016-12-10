//ZA SCROLL DUGMICE FUNKCIJA
$(function() {
  $('a[href*=#]:not([href=#])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });
});


var $body = $('body');

// =========================================================
// Stvari koje se dogode odmah kad se DOM ucita.
// =========================================================
jQuery(document).ready(function() {

  // Listen for modal open
  $('.portfolio-list li img').on('click', openModal);
  $('#close-modal').on('click', closeModal);
  
  // LIBRARY
  function openModal() {
    var html = $(this).parent().children('textarea').text();
    $('#curtain aside').empty().append($(html));
    $('#curtain').fadeIn(500);
    $body.addClass('modal-open');
  }
  function closeModal() {
    $('#curtain').fadeOut(500);
    $('#curtain aside').empty();
    $body.removeClass('modal-open');
  }






});









