$(document).ready(function () {
  //scroll-up
  var btn = $('#scroll-up');
  $(window).scroll(function() {
    if ($(window).scrollTop() > 300) {
      btn.addClass('show');
    } else {
      btn.removeClass('show');
    }
  });
  btn.on('click', function(e) {
    e.preventDefault();
    $('html, body').animate({scrollTop:0}, '300');
  });

  //navbar
  $(".nav-icon").on("click", function () {
    $(".navbar").toggleClass("open");
  });
  
  //dropdown
  $('.navbar .submenu').click(function () {
    $(this).siblings().removeClass('active')
    $(this).parent().removeClass('active')
    $(this).toggleClass('active')
  })

  //sticky nav
  $("#nav").sticky({
    topSpacing: 0,
  });

  //slider
  var slider = $("#slider")
  slider.owlCarousel({
    rtl:true,
    autoplay: true,
    loop: true,
    nav: true, // Show next and prev buttons
    dots: false,
    // autoplay: true,
    slideSpeed: 2000,
    items: 1,
    navText:['<i class="fa fa-angle-right fa-2x fa-fw" aria-hidden="true"></i>','<i class="fa fa-angle-left fa-2x fa-fw" aria-hidden="true"></i>']
  });

  //trigger animation for every slide (wow js)
  slider.on('changed.owl.carousel', function( event ) {
    var item = event.item.index-2;
    $('.card').removeClass('animated bounceInRight');
    $('.owl-item').not('.cloned').eq(item).find('.card').addClass('animated bounceInRight');
  });
  
});
//add animation to tag (wow js)
new WOW().init();
$('.tag').addClass('wow rotateInUpRight');


