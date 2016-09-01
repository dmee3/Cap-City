$(document).ready(function() {
	$(".button-collapse").sideNav();

	$('#cc-logo-circle').hover(function() {

		//Hover in - lighten color
		$(this).addClass('darken-1');

	}, function() {

		//Hover out - back to normal
		$(this).removeClass('darken-1');

	});

	$('.slider').slider({
		full_width: true,
		indicators: true
	});
});
