$(document).ready(function() {

	var batterySubOptions = ['Snare', 'Tenors', 'Bass', 'Cymbals'];
	var frontSubOptions = ['Marimba', 'Vibes', 'Xylophone', 'Electronics', 'Auxiliary'];

	//Populate section dropdown based on role choice
	$('#role').change(function() {

		//Remove old settings
		$('#role').prop('multiple', false);
		$('#section').empty();
		$('#subsection').empty();

		//Section values that apply to admins, members, and staff
		$('#section').append($('<option></option>').prop('disabled', true).prop('selected', true).text('Choose a sub-section'));
		$('#section').append($('<option></option>').attr('value', 'Battery').text('Battery'));
		$('#section').append($('<option></option>').attr('value', 'Front').text('Front'));

		//Populate section dropdown for staff/admins
		if ($('#role').val() !== 'Members') {
			$('#role').prop('multiple', true);
			$('#section').append($('<option></option>').attr('value', 'Visual').text('Visual'));
			$('#section').append($('<option></option>').attr('value', 'Admin').text('Admin'));
			$('#section').append($('<option></option>').attr('value', 'Design').text('Design'));
		}

	});

	//Populate sub-section dropdown based on section choice
	$('#section').change(function() {

		//Remove old settings
		$('#subsection').empty();
		$('#subsection').append($('<option></option>').prop('disabled', true).prop('selected', true).text('Choose a sub-section'));

		//Populate for front
		if ($('section').val() == 'Front') {

			for (var i = 0; i < batterySubOptions.length; i++) {
				$('#subsection').append($('<option></option>').attr('value', batterySubOptions[i]).text(batterySubOptions[i]));
			}

		//Populate for battery
		} else if ($('section').val() == 'Battery') {

			for (var i = 0; i < frontSubOptions.length; i++) {
				$('#subsection').append($('<option></option>').attr('value', frontSubOptions[i]).text(frontSubOptions[i]));
			}

		}
	});
});