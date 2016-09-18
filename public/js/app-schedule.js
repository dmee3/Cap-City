$(document).ready(function() {

	//Get next <numEvents> events on schedule
	$.ajax({
		url: 'https://www.googleapis.com/calendar/v3/calendars/capcitypercussion%40gmail.com/events',
		method: 'GET',
		data: {
			maxResults: numEvents,
			orderBy: 'startTime',
			singleEvents: true,
			timeMin: new Date().toISOString(),
			key: apiKey
		}
	})

	//Process response
	.done(function(response) {
		console.log(response);
		var foundNextEvent = 0;

		$.each(response.items, function(i, ev) {

			//Get date string for start time
			var start, evDate;
			if (ev.start.dateTime) {
				start = googleDateToString(ev.start.dateTime, ev.end.dateTime);
				evDate = new Date(ev.start.dateTime);
			} else {
				start = googleDateToString(ev.start.date, ev.end.date);
				evDate = new Date(ev.start.date);
			}

			//Generate DOM objects for the event
			var name = $('<p class="thin"></p>').text(ev.summary);
			var startText = $('<p class="grey-text thin"></p>').text(start);
			var evInfo = $('<div class="event"></div>').append(name).append(startText);
			var evDot = $('<div class="dot cap-black"></div>');
			var li = $('<li></li>');

			//Figure out if this is the next upcoming event
			if (highlightNextEvent === 1 && foundNextEvent === 0) {
				if (evDate > new Date()) {
					foundNextEvent = 1;
					evDot.removeClass('cap-black').addClass('cap-white');
				}
			}

			//Classify the event as either a show or rehearsal
			if (ev.summary.substring(0, 3) === 'OIP' || ev.summary.substring(0, 3) === 'WGI') {
				evDot.addClass('show');
			} else {
				evDot.addClass('rehearsal');
			}

			//Update DOM with constructed element
			li.append(evInfo).append(evDot);
			$('#timeline').append(li);
		});
	})

	//Error message on failure
	.fail(function(response) {
		var err = $('<li class="grey-text thin"></li>').text("Couldn't load schedule items.");
		$('#timeline').append(err);
	});

	function googleDateToString(start, end) {

		//Parse info
		var dateRegex = /^(\d{4})-(\d{2})-(\d{2})/;
		var timeRegex = /T(\d{2}):(\d{2})/;
		var startDateInfo = dateRegex.exec(start);
		var startTimeInfo = timeRegex.exec(start);
		var endDateInfo = dateRegex.exec(end);
		var endTimeInfo = timeRegex.exec(end);

		//If nothing found, return empty
		if (startDateInfo === null || endDateInfo === null) {
			return ' ';
		}

		//Gather date info
		var startDate = new EventDate(+startDateInfo[1], +startDateInfo[2], +startDateInfo[3]);
		var endDate = new EventDate(+endDateInfo[1], +endDateInfo[2], +endDateInfo[3]);

		//If no time info found, just return date(s)
		if (startTimeInfo === null || endTimeInfo === null) {
			if (startDate.toString() === endDate.toString()) {
				return startDate.toString();
			} else {
				return startDate.toString() + ' - ' + endDate.toString();
			}
		}

		//Gather time info
		var startTime = new EventTime(+startTimeInfo[1], +startTimeInfo[2]);
		var endTime = new EventTime(+endTimeInfo[1], +endTimeInfo[2]);

		//Return string
		if (startDate.toString() === endDate.toString()) {
			return startDate.toString() + ' ' + startTime.toString() + ' - ' + endTime.toString();
		} else {
			return startDate.toString() + ' ' + startTime.toString() + ' - ' + endDate.toString() + ' ' + endTime.toString();
		}
	}
});

function EventDate(year, month, day) {
	this.year = year;
	this.month = month;
	this.day = day;
}

function EventTime(hour, minute) {
	this.hour = hour;
	this.minute = minute;
}

EventDate.prototype.toString = function() {
	return this.month + '/' + this.day + '/' + this.year;
};

EventTime.prototype.toString = function() {

	var hour = this.hour.toString();
	var min = this.minute.toString();
	var ampm = 'am';
	if (this.minute < 10) {
		min = '0' + this.minute.toString();
	}
	if (this.hour > 12) {
		hour = (this.hour - 12).toString();
		ampm = 'pm';
	}

	return hour + ':' + min + ' ' + ampm;
}
