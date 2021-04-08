

// Checkout With Card
Stripe.setPublishableKey('pk_test_U3MJQ7bu3u0ZjKoGhvVbgF3P');

var $form = $("#form-card");
$form.submit(function(event){

    $('.card-error').addClass('hidden');
    $form.find('.btn1').prop('disabled', true);
    $('.co-loading').fadeIn(300);

    Stripe.card.createToken({
        number : $('#card-number').val(),
        exp_month : $('#card-expire-month').val(),
        exp_year : $('#card-expiry-year').val(),
        cvc : $('#card-cvc').val(),
        name : $('#card-name').val()
    },stripeResponseHandler);
    return false;
});

function stripeResponseHandler(status,response){
    if(response.error){
        $form.find('.btn1').prop('disabled', false);
        $('.card-error').removeClass('hidden');
        $('.card-error').text(response.error.message);
        $('.co-loading').fadeOut(200);
        
    }else{
        var token = response.id;
        $form.append($('<input type="hidden" name="stripeToken" />').val(token));
        $form.get(0).submit();
    }
};