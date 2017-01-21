Vue.component('dues-list', {
	template: '#section-template',
	props: ['name'],
	data: function() {
		return {
			sections: [],
			currName: '',
			currId: '',
			currPayments: [],
			currPaid: 0,
			currRemaining: 0,
			totalPaid: 0,
			totalRemaining: 0
		};
	},
	created: function() {
		$.getJSON('/api/admin/' + this.name.toLowerCase() + '-dues-payments', function(response) {
			this.sections = response.sections;
			this.totalPaid = response.totalPaid;
			this.totalRemaining = response.totalRemaining;
		}.bind(this));
	},
	methods: {
		showModal: function(m) {
			this.currName = m.first_name + ' ' + m.last_name;
			this.currId = m.id;

			this.currPayments = [];
			for (var i = 0; i < m.payments.length; i++) {

				var p = m.payments[i];
				p.icon = '';
				if (p.type === 'cash') {
					p.icon = 'attach_money';
				} else if (p.type === 'check') {
					p.icon = 'account_balance';
				} else if (p.type === 'stripe') {
					p.icon = 'credit_card';
				}
				this.currPayments.push(p);
			}
			this.currPaid = m.paid;
			this.currRemaining = m.member.dues - this.currPaid;

			$('#' + this.name + '-payments-modal').openModal();
			$('.collapsible').collapsible();
		}
	}
});

Vue.component('payments-list', {
	template: '#payments-template',
	props: ['section', 'name', 'id', 'payments', 'paid', 'remaining'],
	methods: {
		newPaymentModal: function() {

			$('.modal').closeModal();
			$('.new-modal-name').html(this.name);
			$('.user_id').val(this.id);

			window.setTimeout(function() {
				$('#new-payment-modal').openModal();
			}, 500);
		}
	}
});
