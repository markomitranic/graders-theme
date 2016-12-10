var $body = jQuery('body');
var $document = jQuery(document);
var $window = jQuery(window);
var mobile = false;
// =========================================================
// Stvari koje se dogode odmah kad se DOM ucita.
// =========================================================
$document.ready(function() {

  $window.on('resize', onResize);
  function onResize() {
      if (window.innerWidth <= 768) {
        mobile = true;
      }
  }
  onResize();

  // //ZA SCROLL DUGMICE FUNKCIJA
  var $goTop = $('.middleboxwrap a');
  $goTop.on('click', goTop);
  function goTop(e) {
    e.preventDefault();
    $body.animate({ scrollTop: 0 }, "slow");
  }

  var $hamburgerBtn = $('#hamburger-button');
  var $mobileHeaderMenu = $('#mobile-menu');
  // GLOBAL LISTENERS
  $hamburgerBtn.on('click', toggleMobileMenu);

  // MOBILE MAIN MENU 
  function toggleMobileMenu() {
      if ($hamburgerBtn.hasClass('checked')) {
          $hamburgerBtn.removeClass('checked');
          $mobileHeaderMenu.slideUp('slow');
          $body.removeClass('no-scroll');
      } else {
          $hamburgerBtn.addClass('checked');
          $mobileHeaderMenu.slideDown('slow');
          $body.addClass('no-scroll');
      }
  }

  // HEADER MENU TOGGLE
  var $menu = $('.header-menu-wrapper');
  var $nav = $menu.closest('nav');

  toggleMenu();
  $document.on('scroll', toggleMenu);
  function toggleMenu() {
      var scrollTop = $document.scrollTop();
      if (scrollTop <= 150 && mobile === false) {
          $menu.slideDown('slow');
          $nav.removeClass('menu-hidden');
          $hamburgerBtn.hide();
      } else if (scrollTop > 150 || mobile) {
          $menu.slideUp('slow');
          $nav.addClass('menu-hidden');
          $hamburgerBtn.show();
      }
  }



  var $curtain = $('#curtain');
  var $closeModalButton = $('#close-modal');
  var $content = $('#curtain aside');
  var $buttons = $('.portfolio-list li img');

  // Listen for modal open
  $buttons.on('click', openModal);
  $closeModalButton.on('click', closeModal);
  $curtain.on('click', closeModal);
  
  // LIBRARY
  function openModal() {
    var html = $(this).parent().children('textarea').text();
    $content.empty().append($(html));
    $curtain.fadeIn(500);
    $body.addClass('modal-open');
    document.addEventListener("keydown", keyDown, false);
  }
  function closeModal() {
    $curtain.fadeOut(500);
    $content.empty();
    $body.removeClass('modal-open');
    document.removeEventListener("keydown", keyDown, false);
  }
  function keyDown(e) {
    var keyCode = e.keyCode;
    if(keyCode==27) {
      closeModal();
    }
  }


});









