Vue.component('conflict-list', {
	template: '#conflicts-template',
	data: function() {
		return { conflicts: [] };
	},
	created: function() {
		$.getJSON('/api/admin/approved-conflicts', function(response) {

			var list = [];
			for (var i = 0; i < response.length; i++) {

				var c = {
					name: response[i].user.first_name + ' ' + response[i].user.last_name,
					reason: response[i].reason
				}
				var absent = response[i].date_absent;

				var found = false;
				for (var j = 0; j < list.length; j++) {
					if (list[j].date === absent) {
						list[j].conflicts.push(c);
						found = true;
					}
				}

				if (!found) {
					list.push({ date: absent, conflicts: [c] });
				}
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
