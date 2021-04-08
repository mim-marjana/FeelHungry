

$('.addToCart').click(function(){
	var dishId =$(this).val();
	$.ajax({
    method:'POST',
    url:postAddress,
    data:{dishId:dishId,_token:token}
  })
  .done(function(msg){
    $('#cartQty').text(msg['cartQty']);
  });
})


/*Updating Cart Quantity*/

var $qtyForm = $('.qtyForm');
$qtyForm.submit( function(e){
    var dishQty = $(this).find('.qtyInput').val(); 
    var dishId = $(this).find('.dishId').val();
    var dishTotalPrice = $(this).parent().siblings('.dishTotalPrice');
    var dishPrice = $(this).parent().siblings('.dishPrice').text();
    $.ajax({
        method:"POST",
        url:updateCart,
        data:{dishId:dishId,dishQty:dishQty,_token:token}
     })
     .done(function(done){
        $('#cartQty').text(done['cartQty']);
        $('.cartTotal').text(done['cartTotal']);
        $('.cartSubTotal').text(done['cartTotal']);
        dishTotalPrice.text(dishPrice * dishQty);
     });
    e.preventDefault();
});

/*Remove Dish From Cart*/

$(".deleteDish").click(function(){
  var dishRowId = $(this).siblings('.dishRowId').text();
  var parent = $(this).parent().parent();

  $.ajax({
    method:"POST",
    url:deleteFromCart,
    data:{dishId:dishRowId,_token:token}
  })
  .done(function(done){
        $('#cartQty').text(done['cartQty']);
        $('.cartTotal').text(done['cartTotal']);
        $('.cartSubTotal').text(done['cartTotal']);
        parent.fadeOut(200);
  });
});
