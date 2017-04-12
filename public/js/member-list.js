Member = function(first, last, pic) {
	this.first = first;
	this.last = last;
	if (pic)
		this.pic = '/img/members/' + first + '-' + last + '.jpg';
	else
		this.pic = '/img/members/Placeholder.jpg';
}

var members = new Vue({
	el: '#members',
	data: {
		snare: [
			new Member('JJ', 'Frederico', true),
			new Member('Danny', 'Groh', true),
			new Member('Colton', 'Jones', true),
			new Member('Doug', 'Lamont', true),
			new Member('Alex', 'Pribie', true),
			new Member('Andrew', 'Rieser', true),
			new Member('John', 'Trygier', true)
		],
		tenor: [
			new Member('Collin', 'Flischel', true),
			new Member('Tyler', 'Frye', true),
			new Member('Christian', 'Rozanek', true),
			new Member('Nick', 'Stazzone', true)
		],
		bass: [
			new Member('Tanner', 'Catalogna', true),
			new Member('Jacob', 'Cerino', true),
			new Member('Marshall', 'Harless', true),
			new Member('Gavin', 'Nagy', true),
			new Member('Andrew', 'Stretch', true)
		],
		cymbals: [
			new Member('Ashley', 'Blatchford', true),
			new Member('Morgan', 'Gebert', true),
			new Member('Lucas', 'Hunt', true),
			new Member('Evan', 'Pliska', true),
			new Member('Will', 'Shriver', true)
		],
		marimba: [
			new Member('Stew', 'LeVan', true),
			new Member('Kait', 'Long', true),
			new Member('Justin', 'Lunney', true),
			new Member('Jake', 'Prus', true)
		],
		vibes: [
			new Member('Dalton', 'Carney', true),
			new Member('Megan', 'Hansen', true),
			new Member('Garrett', 'Lind', true),
			new Member('Taylor', 'Wiley', true)
		],
		xylophone: [
			new Member('Hunter', 'Mays', true)
		],
		auxiliary: [
			new Member('Nicholas', 'Beaty', false),
			new Member('Thomas', 'Donovan', true),
			new Member('Tyler', 'Hall', true),
			new Member('Nick', 'Kutskill', true)
		],
		kit: [
			new Member('Anthony', 'Pickens', true)
		],
		electronics: [
			new Member('Brittney', 'Hamrick', true),
			new Member('Sarah', 'Hickey', true),
			new Member('Joe', 'Lansinger', true)
		],
		visual: [
			new Member('Gail', 'Olsen', false)
		]
	}
});
