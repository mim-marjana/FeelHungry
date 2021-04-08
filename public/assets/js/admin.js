
$('.success-message,.error-message').delay(3000).fadeOut(800);


$('.avatar').click(
  function(){
    $('.reg-ul').slideToggle(100);
});

var mySwiper = new Swiper ('#admin-slider-container', {
  // Optional parameters
  direction: 'horizontal',
  autoplay:3000,
  loop: true,
  pagination:'.swiper-pagination',
  speed:1200,
  paginationType:'bullets',
  paginationClickable:true,
  nextButton: '.swiper-button-next',
  prevButton: '.swiper-button-prev',
  lazyLoading:true,
});

if ($(window).width() > 768) {
  $('.navbar .nav li').hover(
    function(){
        $(this).find('ul').fadeIn(10);
        $(this).find('ul').animate({"top":"100%"},150,"swing");
    },
    function(){
        $(this).find('ul').fadeOut(5);
        $(this).find('ul').animate({"top":"70%"},1);
    }
  );
}else{
  $('.navbar-nav li').click(function(){
      $(this).find('ul').slideToggle(200);
  })
}




// Adding New Dish Category
$('#addCat').click(function(){
	$('#catagory-form').css({"opacity":"1","z-index":"999999",
		"top":"50%","transform":"translateY(-50%)"});
});

$('.close-form').click(function(){
	$(this).parent().css({"opacity":"0","z-index":"-999999",
		"top":"75%","transform":"translateY(-75%)"});
});



// Adding New Dish
$('#add-dish').click(function(){
  $('#add-dish-form').css({"opacity":"1","z-index":"999999",
    "top":"50%","transform":"translateY(-50%)"});
});



// Editing A Dish
$('.editDish').on('click', function(){
  var id = $(this).attr('data-id');

  var form = $('#edit-dish-form');

  $.ajax({
    method:"POST",
    url:editDish,
    data:{id:id,_token:token}
  })
  .done(function(done){
    form.find('.name-heading').html(done['name']);
    form.find('.name').val(done['name']);
    form.find('.price').val(done['price']);
    form.find('.details').val(done['details']);
    form.find('.dish_id').val(done['id']);
    form.css({"opacity":"1","z-index":"999999",
    "top":"50%","transform":"translateY(-50%)"});
  })
});



// View Dish Details
$('.viewDish').on('click', function(){

  var id = $(this).attr('data-id');
  var dishWindow = $('.dish-details');
  var dishPhoto = $('.dish-photo img');

  $.ajax({
    method:"POST",
    url:viewDish,
    data:{id:id,_token:token}
  })
  .done(function(done){
    dishPhoto.attr('src',imageUrl+done['photo']);
    dishWindow.find('.name').html(done['name']);
    dishWindow.find('.category').html(done['category']);
    dishWindow.find('.desc').html(done['details']);
    dishWindow.find('.price').html(done['price']);
    $('.viewDishDetails').css({"top":"30%",'opacity':'1','z-index':'3000'});
  })

});



// Close Dish Details Window
$('.viewDishDetails .details-close').on('click', function(){
  $('.viewDishDetails').css({"top":"40%",'opacity':'0','z-index':'-555'});
})





// Add New Slide
$('.addSlide').on('click', function(){
  $('#add-Slide-form').css({"opacity":"1","z-index":"999999",
    "top":"50%","transform":"translateY(-50%)"});
});


// Editing A Slide
$('.editSlide').on('click', function(){
  $('#edit-Slide-form').css({"opacity":"1","z-index":"999999",
    "top":"50%","transform":"translateY(-50%)"});

  var id = $(this).attr("data-id");

  $.ajax({
    method:"POST",
    url:EditSlide,
    data:{slide_id:id,_token:token}
  })
  .done(function(done){
      $('#edit-Slide-form').find('.heading').val(done['heading']);
      $('#edit-Slide-form').find('.button_text').val(done['button_text']);
      $('#edit-Slide-form').find('.button_link').val(done['button_link']);
      $('#edit-Slide-form').find('.slide_text').val(done['slide_text']);
      $('#edit-Slide-form').find('.slide_id').val(done['slide_id']);
  })

});



// Deleting A Slide
$('.deleteSlide').on('click', function(){
  var id = $(this).attr("data-id");
  var slide = $(this).parent().parent();

  $.ajax({
    method:"POST",
    url:deletSLideRoute,
    data:{slide_id:id,_token:token}
  })
  .done(function(done){
      slide.fadeOut(200);
  })

});




// Editing Short Navigation
$('.editShortNav').on('click', function(){
  var form = $('#edit-short-nav-form');
  var id = $(this).attr("data-id");
  $.ajax({
    method:"POST",
    url:EditNav,
    data:{id:id,_token:token}
  })
  .done(function(done){
    form.find('.heading').val(done['heading']);
    form.find('.link').val(done['link']);
    form.find('.id').val(done['nav_id']);
    form.css({"opacity":"1","z-index":"999999",
    "top":"50%","transform":"translateY(-50%)"});
  })
})







// Add dish to Most Loveddish list
$('.addLovedDish').on('click', function(){
  $('#add-loved-dish-form').css({"opacity":"1","z-index":"999999",
    "top":"50%","transform":"translateY(-50%)"});
});

// Add dish to Chef Special list
$('.addChefDish').on('click', function(){
  $('#add-chef-dish-form').css({"opacity":"1","z-index":"999999",
    "top":"50%","transform":"translateY(-50%)"});
});



// Delete Review
$('.deleteReview').on('click', function(){
  var id = $(this).attr("data-id");
  var review = $(this).parent().parent();
   $.ajax({
     method:"POST",
     url:deleteReview,
     data:{review_id:id,_token:token}
    })
   .done(function(done){
      review.fadeOut(800);
  })

});




// Add dish to Chef Special list
$('.addNewMember').on('click', function(){
  $('#add-member-form').css({"opacity":"1","z-index":"999999",
    "top":"50%","transform":"translateY(-50%)"});
})

// Add dish to Chef Special list
$('.editMember').on('click', function(){
  $('#edit-member-form').css({"opacity":"1","z-index":"999999",
    "top":"50%","transform":"translateY(-50%)"});

  var id = $(this).attr("data-id");

  $.ajax({
    method:"POST",
    url:editTeamMember,
    data:{team_id:id,_token:token}
  })
  .done(function(done){
      $('#edit-member-form').find('.name').val(done['name']);
      $('#edit-member-form').find('.designation').val(done['designation']);
      $('#edit-member-form').find('.photo').val(done['photo']);
      $('#edit-member-form').find('.member_id').val(done['member_id']);
  })

})




// Edit Photo From the Gallery
$('.editPhoto').click(function(){
	$('#photo-edit-form').css({"opacity":"1","z-index":"999999",
		"top":"50%","transform":"translateY(-50%)"});

  var id = $(this).attr("data-id");

  $.ajax({
    method:"POST",
    url:editPhoto,
    data:{photo_id:id,_token:token}
  })
  .done(function(done){
      $('#photo-edit-form').find('.caption').val(done['caption']);
      $('#photo-edit-form').find('.id').val(done['id']);
  })
});






// Add New Photo to the Gallery
$('#addPhoto').click(function(){
	$('#add-photo-form').css({"opacity":"1","z-index":"999999",
		"top":"50%","transform":"translateY(-50%)"});
});






// Edit Dish Category
$('.edit-cat').click(function(){

  var id = $(this).attr('data-id');
  var form = $('#edit-catagory-form');

  $.ajax({
    method:"POST",
    url:editDishCategory,
    data:{id:id,_token:token}
  })
  .done(function(done){
    form.find('.name').val(done['name']);
    form.find('.id').val(done['id']);
    form.css({"opacity":"1","z-index":"999999",
    "top":"50%","transform":"translateY(-50%)"});
  })

});


$('#resDate').datepicker({
    language: 'en'
});


// Display Individual Message
$('.message-header').on('click', function(){
  var id = $(this).attr('data-id');

  var message = $('#DisplayMessage');

  $.ajax({
    method:"POST",
    url:messageURL,
    data:{id:id,_token:token}
  })
  .done(function(done){
    message.find('.m-name').html(done['name']);
    message.find('.m-btn-name').html(done['name']);
    message.find('.m-email').html(done['email']);
    message.find('.m-date').html(done['date']);
    message.find('.mail-text').html(done['message']);
    message.find('.mail-link').attr('href','mailto:'+done['email']);
  })
});


// Print Invoice
function printDiv(divID) {
    var divElements = document.getElementById(divID).innerHTML;
    var oldPage = document.body.innerHTML;
    document.body.innerHTML = 
      "<html><head><title></title></head><body>" + 
      divElements + "</body>";
    window.print();
    document.body.innerHTML = oldPage;
}