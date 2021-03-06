@extends('layouts.admin')

@section('content')

	<div id="dues" class="container">

		<div class="row">
			<dues-list name="Battery"></dues-list>
			<dues-list name="Front"></dues-list>

			<div class="col s12 m8 offset-m2">
				<pay-schedule></pay-schedule>
			</div>
		</div>

		<div id="new-payment-modal" class="modal">
			{!! Form::open(['action' => 'PaymentController@store']) !!}
				<input type="hidden" name="user_id" class="user_id">
				<div class="modal-content">
					<h3 class="new-modal-name"></h3>
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
								<input name="amount" id="amount" type="number" step=".01" required>
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
			<br>
			<div class="card cap-white cap-grey-text">
				<div class="card-content">
					<h5>Paid:<span class="right cap-green-text">$@{{ totalPaid }}</span></h5>
					<h5>Left:<span class="right cap-green-text">$@{{ totalRemaining }}</span></h5>
				</div>
			</div>
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
			<payments-list :section="name" :name="currName" :id="currId" :payments="currPayments" :paid="currPaid" :remaining="currRemaining" :plan="paymentPlan"></payments-list>
		</div>
	</template>

	<template id="payments-template">
		<div v-bind:id="section + '-payments-modal'" class="modal">
			<div class="modal-content">
				<a class="btn-floating btn-large waves-effect waves-light right green" v-on:click="newPaymentModal()"><i class="material-icons">add</i></a>
				<h3>@{{ name }}</h3>
				<br>
				<ul id="modal-payments" class="collapsible">
					<li v-for="p in payments">
						<div class="collapsible-header"><i class="material-icons">@{{ p.icon }}</i> $@{{ p.amount }}<span class="secondary-content">@{{ p.date_paid }}</span></div>
						<div class="collapsible-body"><p>@{{ p.info }}</p></div>
					</li>
				</ul>
				<div class="col s12 m6">
					<div class="card cap-white cap-green-text">
						<div class="card-content center">
							<p>$@{{ paid }} Paid</p>
						</div>
					</div>
				</div>
				<div class="col s12 m6">
					<div class="card cap-white cap-red-text">
						<div class="card-content center">
							<p>$@{{ remaining }} Remaining</p>
						</div>
					</div>
				</div>
				{!! Form::open(['url' => '/admin/set-payment-plan', 'class' => 'col s12']) !!}
					<h5>Payment Plan</h5>
					<input type="hidden" name="user_id" v-bind:value="id">
					<div class="input-field">
						<textarea name="payment_plan" class="materialize-textarea">@{{ plan }}</textarea>
					</div>
					<div class="center">
						<input type="submit" class="btn cap-green" value="UPDATE PLAN">
					</div>
				{!! Form::close() !!}
			</div>
			<div class="modal-footer">
				<a href="#" class=" modal-action modal-close waves-effect waves-red btn-flat">Close</a>
			</div>
		</div>
	</template>

	<template id="pay-schedule-template">
		<div class="card cap-blue">
			<div class="card-content">
				<div class="row white-text">
					<div class="col s12">
						<h4>Pay Schedule</h4>
					</div>
				</div>
				<div class="row black-text">
					<ul class="collection">
						<li v-for="p in payments" class="collection-item">@{{ p.due_date }}<span class="cap-grey-text"> - $@{{ p.due }}</span><span class="secondary-content">$@{{ p.total_due }}</span></li>
					</ul>
					<p class="white-text center">*Last payment varies based on membership status</p>
				</div>
			</div>
		</div>
	</template>

@endsection

@section('scripts')

	<script type="text/javascript" src="/js/vue.js"></script>
	<script type="text/javascript" src="/js/components/dues.js"></script>
	<script type="text/javascript" src="/js/components/pay-schedule.js"></script>
	<script type="text/javascript">

		new Vue({
			el: '#dues'
		});
	</script>

@endsection
