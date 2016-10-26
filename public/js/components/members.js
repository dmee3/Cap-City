Vue.component('members-list', {
	template: '#members-template',
	data: function() {
		return {
			members: [],
			currId: -1,
			currName: ''
		};
	},
	created: function() {
		$.getJSON('/api/admin/members', function(response) {
			this.members = response;
		}.bind(this));
	},
	methods: {
		showModal: function(m) {
			this.currId = m.id;
			this.currName = m.first_name + ' ' + m.last_name;
			$('#delete-modal').openModal();
		}
	}
});

Vue.component('delete-confirm', {
	template: '#delete-template',
	props: ['id', 'name']
});
