Vue.component('conflict-list', {
	template: '#conflicts-template',
	data: function() {
		return { conflicts: [] };
	},
	created: function() {
		$.getJSON('/api/admin/conflicts', function(response) {

			var list = {};
			for (var i = 0; i < response.length; i++) {
				var c = {
					name: response[i].user.first_name + ' ' + response[i].user.last_name,
					reason: response[i].reason
				}

				var absent = response[i].date_absent;
				if (!list[absent]) {
					list[absent] = [];
				}
				list[absent].push(c);
			}

			this.conflicts = list;

		}.bind(this));
	},
	updated: function() {
		$('.collapsible').collapsible();
	}
});

new Vue({
	el: '#conflicts',
});
