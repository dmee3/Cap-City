Vue.component('pay-schedule', {
	template: '#pay-schedule-template',
	data: function() {
		return { payments: [] };
	},
	created: function() {
		$.getJSON('/api/admin/pay-schedule', function(response) {
			this.payments = response;
			this.payments[this.payments.length-1].due = '230.00';
			this.payments[this.payments.length-1].total_due = '1450.00';
		}.bind(this));
	}
});
