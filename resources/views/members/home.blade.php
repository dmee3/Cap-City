@extends('layouts.members')

@section('content')

	<div id="hero" class="section {{ strtolower($member['subsection']) }}">
		<div id="name">
			<h4 class="white-text center">{{ $user->first_name . " " . $user->last_name }}</h4>
			<h5 class="white-text center thin">{{ $member['subsection'] }}</h5>
		</div>
	</div>

	<br>

	<div id="home" class="container row">

		@if ($member['dues'] > 0)
			<div class="col s12 m10 offset-m1 l4">
				<div id="payments" class="card white">
					<div class="card-content">
						<div class="row">
							<div class="col s9">
								<h4 class="cap-black-text">Dues</h4>
							</div>
							<div class="col s3">
								<a id="payment-modal-trigger" class="modal-trigger btn-floating btn-large waves-effect waves-light cap-green right" href="#payment-modal"><i class="material-icons">add</i></a>
							</div>
						</div>
						<div id="paid-info" class="row grey-text center ">
							<h5>PAID: ${{ $paid }}</h5>
							<div id="dues-bar" class="progress z-depth-1 cap-green-fade">
								<div id="dues-progress" class="determinate cap-green" style="width: {{ $paid * 100 / $member['dues'] }}%;"></div>
							</div>
							<h6>TOTAL: ${{ $member['dues'] }}</h6>
						</div>
						@if ($payments->count() > 0)
							<div class="row">
								<ul class="collection">
									@foreach($payments as $p)
										<li class="collection-item">
											@if ($p->type == 'cash')
												<span class="collection-icon"><i class="material-icons cap-black-text">attach_money</i></span>
											@elseif ($p->type == 'check')
												<span class="collection-icon"><i class="material-icons cap-black-text">account_balance</i></span>
											@elseif ($p->type == 'stripe')
												<span class="collection-icon"><i class="material-icons cap-black-text">credit_card</i></span>
											@endif
											${{ $p->amount }}
											<span class="secondary-content cap-blue-text">{{ date('n/j/Y', strtotime($p->date_paid)) }}</span>
										</li>
									@endforeach
								</ul>
							</div>
						@endif
					</div>
				</div>
			</div>
		@endif

		@if ($member['dues'] > 0)
			<div class="col s12 m10 offset-m1 l4">
		@else
			<div class="col s12 m10 offset-m1 l6">
		@endif
			<a href="/full-schedule">
				<div id="schedule" class="card cap-black white-text hoverable">
					<div class="card-content">
						<div class="row">
							<div class="col s12">
								<h4>Coming Soon</h4>
							</div>
						</div>
						<div class="row">
							<ul id="timeline">
							</ul>
						</div>
					</div>
				</div>
			</a>

			<pay-schedule></pay-schedule>
		</div>

		@if ($member['dues'] > 0)
			<div class="col s12 m10 offset-m1 l4">
		@else
			<div class="col s12 m10 offset-m1 l6">
		@endif
			<div id="conflicts" class="card white">
				<div class="card-content">
					<div class="row">
						<div class="col s9">
							<h4 class="cap-black-text">Conflicts</h4>
						</div>
						<div class="col s3">
							<a id="conflict-modal-trigger" class="modal-trigger btn-floating btn-large waves-effect waves-light cap-red right" href="#conflict-modal"><i class="material-icons">add</i></a>
						</div>
					</div>
					<div class="row">
						@if ($conflicts->count() > 0)
							<ul class="collection">
								@foreach ($conflicts as $c)
									<li class="collection-item">{{ date('n/j/Y', strtotime($c->date_absent)) }}</li>
								@endforeach
							</ul>
						@else
							<div class="col s12">
								<h5 class="cap-black-text thin">None!</h5>
							</div>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="payment-modal" class="modal modal-fixed-footer">
		{!! Form::open(['action' => 'PaymentController@newStripePayment', 'id' => 'dues-form']) !!}
			<div class="modal-content cap-black-text">
				<input type="hidden" id="charge-amount" name="charge_amount">
				<h4>Make Payment</h4>
				<div class="payment-errors cap-red-text"></div>
				<div class="row">
					<div class="input-field hl-black col s12 m6">
						<input id="pay-amount-input" name="duesAmt" type="number" min="10" step="0.01" class="pay-info">
						<label for="pay-amount-input">Amount</label>
					</div>
					<div class="col s12 m6">
						<p>Amount: <span id="payment-amount" class="right"></span></p>
						<p class="thin">Processing Fee: <span id="processing-fee" class="right"></span></p>
						<p>Total: <span id="payment-total" class="right"></span></p>
					</div>
				</div>
				<div class="row">
					<div class="input-field hl-black col s12 m8 offset-m2">
						<input type="text" size="20" data-stripe="number" id="stripe-number" class="pay-info">
						<label for="stripe-number" class="">Card Number</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field hl-black col s6 m4 offset-m2">
						<input type="text" placeholder="MM" size="2" data-stripe="exp_month" id="stripe-month" class="pay-info">
						<label for="stripe-month" class="active">Expiration Month</label>
					</div>
					<div class="input-field hl-black col s6 m4">
						<input type="text" placeholder="YY" size="2" data-stripe="exp_year" id="stripe-year" class="pay-info">
						<label for="stripe-year" class="active">Expiration Year</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field hl-black col s4 offset-s4">
						<input type="text" size="4" data-stripe="cvc" id="stripe-cvc" class="pay-info">
						<label for="stripe-cvc">CVC</label>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<input type="submit" id="submit-pay" class="waves-effect waves-green btn-flat"></input>
				<a href="#!" id="cancel-pay" class="modal-action modal-close waves-effect waves-red btn-flat">Cancel</a>
			</div>
		{!! Form::close() !!}
	</div>

	<div id="conflict-modal" class="modal modal-fixed-footer">
		{!! Form::open(['url' => '/add-conflict']) !!}
			<div class="modal-content cap-black-text">
				<h4>Add Conflict</h4>
				<div class="row">
					<div class="input-field col s12">
						<input id="conflict-date" type="date" name="conflict_date">
						<label for="conflict-date" class="active">Date</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<textarea name="conflict_reason" id="conflict-reason" class="materialize-textarea"></textarea>
						<label for="conflict-reason">Reason</label>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<input type="submit" class="waves-effect waves-green btn-flat"></input>
				<a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat">Cancel</a>
			</div>
		{!! Form::close() !!}
	</div>

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
					<p class="white-text center">*Last payment amount varies based on membership status</p>
				</div>
			</div>
		</div>
	</template>


@endsection

@section('scripts')

	<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
	<script type="text/javascript" src="/js/vue.js"></script>
	<script type="text/javascript" src="/js/components/pay-schedule.js"></script>
	<script type="text/javascript">
		Stripe.setPublishableKey("{{ env('STRIPE_PUBLIC') }}");

		var apiKey = "{{ env('GOOGLE_API_KEY') }}";
		var clientId = "{{ env('GOOGLE_CALENDAR_CLIENT_ID') }}";
		var numEvents = 3;
		var highlightNextEvent = 0;

		new Vue({
			el: '#home',
		});

		$(document).ready(function() {

			$('#conflict-modal-trigger').leanModal();

			//Stripe payment modal
			$('#payment-modal-trigger').leanModal({
				ready: function() {
					$('#submit-pay').prop('disabled', false);
				},
				complete: function() {
					$('#submit-pay').prop('disabled', true);
					$('#charge-amount').val('');
					$('.pay-info').val('');
					$('#payment-amount').text('');
					$('#processing-fee').text('');
					$('#payment-total').text('');
				}
			});

			//Update payment fields when payment amount changed
			$('#pay-amount-input').on('change keyup', function() {
				var duesAmt = (Number($('#pay-amount-input').val())).toFixed(2);
				var procFee = (Number(duesAmt) * 0.029 + 0.3).toFixed(2);
				var totalCharge = (Number(duesAmt) + Number(procFee)).toFixed(2);

				$('#payment-amount').text('$' + duesAmt);
				$('#processing-fee').text('$' + procFee);
				$('#payment-total').text('$' + totalCharge);

				$('#charge-amount').val(totalCharge);
			});

			//Handle token response from Stripe
			function stripeResponseHandler(status, response) {

				var $form = $('#dues-form');

				//Handle errors
				if (response.error) {

					//Show the errors on the form and re-enable submission
					$form.find('.payment-errors').text(response.error.message);
					$('#submit-pay').prop('disabled', false);

				//Handle success
				} else {
					debugger;
					var payAmt = $('#pay-amount-input').val();
					if (+payAmt < 10) {
						$('#submit-pay').prop('disabled', false);
						$form.find('.payment-errors').text('The minimum dues payment is $10.');
						return;
					}

					$form.append($('<input type="hidden" name="stripeToken">').val(response.id));
					$form.get(0).submit();
				}
			};

			//Redirect dues form submission to get Stripe token
			$('#dues-form').on('submit', function(ev) {
				Stripe.card.createToken($('#dues-form'), stripeResponseHandler);
				$('#submit-pay').prop('disabled', true);
				return false;
		  });

		});
	</script>
	<script type="text/javascript" src="/js/app-schedule.js"></script>

@endsection
