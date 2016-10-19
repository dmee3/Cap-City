@extends('layouts.admin')

@section('content')

	<div id="dues" class="container">

		<div class="row">
			<dues-list name="Battery"></dues-list>
			<dues-list name="Front"></dues-list>
		</div>

		<div id="payment-modal" class="modal">
			<div class="modal-content">
				<a id="add-payment-btn" class="btn-floating btn-large waves-effect waves-light right green"><i class="material-icons">add</i></a>
				<h3 id="modal-name"></h3>
				<br>
				<ul id="modal-payments" class="collapsible"></ul>
			</div>
			<div class="modal-footer">
				<a href="#" class=" modal-action modal-close waves-effect waves-red btn-flat">Close</a>
			</div>
		</div>

		<div id="new-payment-modal" class="modal">
			{!! Form::open(['action' => 'PaymentController@store']) !!}
				<input type="hidden" name="user_id" id="user_id">
				<div class="modal-content">
					<h3 id="new-modal-name"></h3>
					<br>
					<div class="container">
						<div class="row">
							<div class="input-field col s12">
								<select name="type">
									<option value="cash">Cash</option>
									<option value="check">Check</option>
									<option value="other">Other</option>
								</select>
								<label>Payment Type</label>
							</div>
							<div class="input-field col s12 m6">
								<input name="amount" id="amount" type="number" required>
								<label for="amount">Amount</label>
							</div>
							<div class="input-field col s12 m6">
								<input name="date_paid" id="date_paid" type="date" required>
								<label for="date_paid" class="active">Date Paid</label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s12">
								<textarea name="info" id="info" class="materialize-textarea"></textarea>
								<label for="info">Notes</label>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<input type="submit" class="modal-action waves-effect waves-green btn-flat" value="Submit">
					<a href="#" class="modal-action modal-close waves-effect waves-red btn-flat">Cancel</a>
				</div>
			{!! Form::close() !!}
		</div>

	</div>

	<template id="section-template">
		<div class="col s12 m6">
			<h4 class="cap-blue-text">@{{ name }}</h4>
			<div class="card" v-for="s in sections">
				<div class="card-content">
					<div class="row">
						<h5>@{{ s.name }}</h5>
						<div class="collection">
							<a  v-bind:class="'collection-item payment-list-item black-text pay-' + m.pay_color" v-for="m in s.members" v-bind:style="'background-size: ' + m.pay_width + '%;'" v-on:click="showModal(m)">
								@{{ m.first_name + " " + m.last_name }}
								<span class="secondary-content black-text">$@{{ m.paid.toFixed(2) }} / $@{{ m.member.dues }}</span>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</template>

@endsection

@section('scripts')

	<script type="text/javascript" src="/js/vue.min.js"></script>
	<script type="text/javascript">

		$(document).ready(function() {

			$('#add-payment-btn').on('click', function() {

				$('#payment-modal').closeModal();
				$('new-modal-name').html($(this).data('name'));

				$('#new-payment-modal').openModal();
			});
		});

		Vue.component('dues-list', {
			template: '#section-template',
			props: ['name'],
			data: function() {
				return { sections: [] };
			},
			created: function() {
				$.getJSON('/api/admin/' + this.name.toLowerCase() + '-dues-payments', function(response) {
					this.sections = response;
				}.bind(this));
			},
			methods: {
				showModal: function(m) {

					var name = m.first_name + ' ' + m.last_name;
					$('#new-modal-name').html(name);
					$('#user_id').val(m.id);
					$('#modal-name').html(name);
					$('#modal-payments').html('');

					for (var i = 0; i < m.payments.length; i++) {

						var p = m.payments[i];
						var amt = '$' + p.amount;
						var paid = p.date_paid;

						var icon = '';
						if (p.type === 'cash') {
							icon = '<i class="material-icons">attach_money</i>';
						} else if (p.type === 'check') {
							icon = '<i class="material-icons">account_balance</i>';
						} else if (p.type === 'stripe') {
							icon = '<i class="material-icons">credit_card</i>';
						}

						var header = $('<div class="collapsible-header">' + icon + amt + '<span class="secondary-content">' + paid + '</span></div>');
						var body = $('<div class="collapsible-body"><p>' + p.info + '</p></div>');

						var item = $('<li></li>').append(header).append(body);
						$('#modal-payments').append(item);
					}

					$('#payment-modal').openModal();
					$('.collapsible').collapsible();
				}

			}
		});

		var dues = new Vue({
			el: '#dues'
		});
	</script>

@endsection
