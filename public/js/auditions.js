$(document).ready(function() {
	$('select').material_select();

	var updateTotals = function() {
		if(!$('#audition-register').is(':checked')) {
			$('.chipotle-checkbox').prop('checked', false);
			$('.chipotle-checkbox').prop('disabled', true);
		} else {
			$('.chipotle-checkbox').prop('disabled', false);
		}

		var amt = 0;
		if ($('#audition-packet').is(':checked')) amt += 15;
		if ($('#audition-register').is(':checked')) amt += 65;
		if ($('#audition-chipotle1').is(':checked')) amt += 12;
		if ($('#audition-chipotle2').is(':checked')) amt += 12;
		if (amt > 0) {
			amt += 3;
			$('#processing-fee').prop('checked', true);
		} else {
			$('#processing-fee').prop('checked', false);
		}
		$('#payment-total').html('$' + amt);
	};

	updateTotals;

	$('.filled-in').click(updateTotals);
});

Stripe.setPublishableKey('pk_live_NaA3DEeypr9dPa8YzfN0nnaa');

function stripeResponseHandler(status, response) {

	//Grab the form
	var $form = $('#audition-form');

	//Handle errors
	if (response.error) {

		//Show the errors on the form and re-enable submission
		$form.find('.payment-errors').text(response.error.message);
		$('#register').prop('disabled', false);
		$('#register').removeClass('cap-black');
		$('#register').addClass('cap-red');

	//Handle success
	} else {

		//Get the token ID
		var token = response.id;

		//Insert the token ID into the form so it gets submitted to the server
		$form.append($('<input type="hidden" name="stripeToken">').val(token));

		//Submit the form:
		$form.get(0).submit();
	}
};

$(function() {
	var $form = $('#audition-form');
	$form.submit(function(event) {

		//Disable the submit button to prevent repeated clicks:
		$('#register').prop('disabled', true);
		$('#register').removeClass('cap-red');
		$('#register').addClass('cap-black');

		//Request a token from Stripe:
		Stripe.card.createToken($form, stripeResponseHandler);

		//Prevent the form from being submitted:
		return false;
  });
});
