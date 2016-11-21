Vue.component('jobs-list', {
	template: '#jobs-template',
	data: function() {
		return { jobs: [], members: [] };
	},
	created: function() {
		$.getJSON('/api/admin/jobs', function(response) {
			this.jobs = response;
		}.bind(this));
		$.getJSON('/api/admin/members', function(response) {
			this.members = response;
			window.setTimeout(function() {
				$('select').material_select();
			}, 1000);
		}.bind(this));
	}
});

new Vue({
	el: '#jobs'
});
