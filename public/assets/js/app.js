

$(".menu-open").click(function(){
    $("#menu-navigation").animate({
      "right": "0px"
    });
    $(".menu-close").fadeIn(500);
    $(this).fadeOut(100);

});

$(".menu-close").click(function(){
    $("#menu-navigation").animate({
      "right": "-255px"
    });
    $(".menu-open").fadeIn(500);
    $(this).fadeOut(100);
});

$("#menu-navigation ul li").click(function(){
    $("#menu-navigation").animate({
      "right": "-255px"
    });
    $(".menu-open").fadeIn(500);
    $(".menu-close").fadeOut(100);
});



$('#datepicker').datepicker({
    language: 'en',
    minDate: new Date()
});



$('.user-nav').click(function(){
  $('.user-nav ul').slideToggle(100);
});

$('#main').click(function(){
  $('.user-nav ul').slideUp(100);
});


if ($(window).width() >767) {
   $(window).scroll(function(){
    var wScroll = $(this).scrollTop();
     if (wScroll >=300) {
         $(".navbar").addClass("navbar-dark");
     } else {
         $(".navbar").removeClass("navbar-dark");
     }

 });
}


$(window).scroll(function(){
    var wScroll = $(this).scrollTop();
    $('.carousel-slide .content').css({
        'transform' : 'translate(0px,'+ wScroll/6 +'%)'
    });
    $('.top-header h1').css({
        'transform' : 'translate(0px,'+ wScroll/.4 +'%)'
    });
 });


$('#openReview').click(function(){
  //alert("hello");
  $('#full-review').css({"z-index":"4000","opacity":"1","transform":"scale(1)"});
});

$('#closeReview').click(function(){
  $('#full-review').css({"z-index":"-4000","opacity":"0","transform":"scale(1.3)"});
});


var mySwiper = new Swiper ('#main-slider', {
  // Optional parameters
  direction: 'horizontal',
  autoplay:4000000,
  allowSlidePrev:false,
  allowSlideNext:false,
  loop: true,
  pagination:'.swiper-pagination',
  speed:1200,
  paginationType:'bullets',
  paginationClickable:true,
  nextButton: '.swiper-button-next',
  prevButton: '.swiper-button-prev',
  lazyLoading:true,
});


$('#option-card').click(function(){
  $('#form-card').slideDown(500);
  $('#form-bkash').slideUp(300);
  $('#form-cod').slideUp(300);
});


$('#option-bkash').click(function(){
  $('#form-bkash').slideDown(500);
  $('#form-card').slideUp(300);
  $('#form-cod').slideUp(300);

  $('#option-card').removeClass('selected');
});


$('#option-cod').click(function(){
  $('#form-cod').slideDown(500);
  $('#form-card').slideUp(300);
  $('#form-bkash').slideUp(300);

  $('#option-card').removeClass('selected');
});



// Jquery LightBox
var $thumbs = $('.lightbox a');
$thumbs.simpleLightbox();


// Review Form Open
$('#psotReview').click(function(){
  $('#review-form').css({"opacity":"1","z-index":"4000",
    "top":"50%","transform":"translateY(-50%)"});
});

// Review Form Close
$('#close-rev-form').click(function(){
  $('#review-form').css({"opacity":"0","z-index":"-1",
    "top":"30%","transform":"translateY(-30%)"});
});
