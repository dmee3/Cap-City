$(document).ready(function() {
	$(".button-collapse").sideNav();

	$('#cc-logo-circle').hover(function() {

		//Hover in - lighten color
		$(this).removeClass('cap-red');
		$(this).addClass('cap-red-darken');

	}, function() {

		//Hover out - back to normal
		$(this).removeClass('cap-red-darken');
		$(this).addClass('cap-red');

	});

	$('.slider').slider({
		full_width: true,
		indicators: true
	});
});
