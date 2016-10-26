Vue.component('staff-list', {
	template: '#staff-template',
	data: function() {
		return {
			staff: []
		};
	},
	created: function() {
		$.getJSON('/api/admin/staff', function(response) {
			this.staff = response;
		}.bind(this));
	}
});
