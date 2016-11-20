Vue.component('jobs-list', {
	template: '#jobs-template',
	data: function() {
		return { jobs: [] };
	},
	created: function() {
		$.getJSON('/api/admin/jobs', function(response) {
			this.jobs = response;
		}.bind(this));
	}
});

new Vue({
	el: '#jobs'
});
