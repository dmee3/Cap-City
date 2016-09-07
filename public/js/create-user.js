$(document).ready(function() {

	var batterySubOptions = ['Snare', 'Tenors', 'Bass', 'Cymbals'];
	var frontSubOptions = ['Marimba', 'Vibes', 'Xylophone', 'Electronics', 'Auxiliary'];

	//Populate section dropdown based on role choice
	$(document).on('change', '#role', function() {

		$('#member-info').hide();
		$('#staff-info').hide();

		//Show / hide member and staff-specific info
		if ($('#role').val() === 'Staff') {
			$('#staff-info').show();
		} else if ($('#role').val() === 'Member') {
			$('#member-info').show();
		}

		//Update materialize select options
		$('select').material_select();
	});

	//Populate sub-section dropdown based on section choice
	$(document).on('change', '#section', function() {

		//Remove old settings
		$('#subsection').empty();
		$('#subsection').append($('<option></option>').prop('disabled', true).prop('selected', true).text('Choose a sub-section'));

		//Populate for front
		if ($('#section').val() === 'Front') {

			for (var i = 0; i < frontSubOptions.length; i++) {
				$('#subsection').append($('<option></option>').attr('value', frontSubOptions[i]).text(frontSubOptions[i]));
			}

		//Populate for battery
		} else if ($('#section').val() === 'Battery') {

			for (var i = 0; i < batterySubOptions.length; i++) {
				$('#subsection').append($('<option></option>').attr('value', batterySubOptions[i]).text(batterySubOptions[i]));
			}

		//Disable if neither battery nor front is chosen
		} else {

			$('#subsection').empty();
			$('#subsection').append($('<option></option>').prop('disabled', true).prop('selected', true).text('Please choose  a section first'));
		}

		//Update materialize select options
		$('select').material_select();
	});

});
