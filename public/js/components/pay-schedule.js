Vue.component('pay-schedule', {
	template: '#pay-schedule-template',
	data: function() {
		return { payments: [] };
	},
	created: function() {
		$.getJSON('/api/admin/pay-schedule', function(response) {
			this.payments = response;
		}.bind(this));
	}
});
