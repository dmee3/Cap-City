$(document).ready(function() {
	$(".button-collapse").sideNav();

	$('#cc-logo-circle').hover(function() {

		//Hover in - lighten color
		$(this).addClass('lighten-1');

	}, function() {

		//Hover out - back to normal
		$(this).removeClass('lighten-1');

	});

	$('.slider').slider({
		full_width: true,
		indicators: true
	});
});
