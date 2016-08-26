$(document).ready(function() {
	$('select').material_select();

	if (!cookiesEnabled()) {
		$('#cookie-check').show();
	}

	var updateTotals = function() {

		//Enable or disable chipotle options
		if(!$('#audition-register').is(':checked')) {
			$('.chipotle-checkbox').prop('checked', false);
			$('.chipotle-checkbox').prop('disabled', true);
		} else {
			$('.chipotle-checkbox').prop('disabled', false);
		}


		//Calculate payment amount
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

		//Enable or disable submission button
		if (amt > 0) {
			$('#register').prop('disabled', false);
			$('#register').removeClass('cap-black');
			$('#register').addClass('cap-red');
		} else {
			$('#register').prop('disabled', true);
			$('#register').removeClass('cap-red');
			$('#register').addClass('cap-black');
		}

	};

	window.setTimeout(updateTotals, 300);

	$('.filled-in').click(updateTotals);
});

Stripe.setPublishableKey(pub_key);

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
		$('#processing').removeClass('active');

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
		$('#processing').addClass('active');

		//Request a token from Stripe:
		Stripe.card.createToken($form, stripeResponseHandler);

		//Prevent the form from being submitted:
		return false;
  });
});

function cookiesEnabled() {
	var cookieEnabled = (navigator.cookieEnabled) ? true : false;

	if (typeof navigator.cookieEnabled == "undefined" && !cookieEnabled) { 
		document.cookie="testcookie";
		cookieEnabled = (document.cookie.indexOf("testcookie") != -1) ? true : false;
	}

	return (cookieEnabled);
}
