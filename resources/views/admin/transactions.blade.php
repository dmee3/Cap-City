@extends('layouts.admin')

@section('content')

	<div class="container">
		<div class="row">
			<div class="col s10">
				<h2 class="cap-blue-text">Transactions</h2>
			</div>
			<div class="col s2">
				<br>
				<a id="txn-modal-trigger" href="#new-txn-modal" class="modal-trigger btn-floating btn-large waves-effect waves-light right green"><i class="material-icons">add</i></a>
			</div>
			<div class="col s12">
				<ul class="collapsible" data-accordion="collapsible">
					@foreach($transactions as $t)
						<li>
							<div class="collapsible-header">${{ $t->amount }} - {{ $t->title }}<span class="secondary-content hide-on-small-only">{{ $t->date_paid }}</span></div>
							<div class="collapsible-body">
								<div class="container">
									<div class="row">
										<div class="col s12">
											<p>
												${{ $t->amount . " paid for " . $t->title . " on " . $t->date_paid }}
												<br>
												<br>
												{{ $t->notes }}
											</p>
										</div>
									</div>
								</div>
							</div>
						</li>
					@endforeach
				</ul>
			</div>
		</div>
	</div>


	<div id="new-txn-modal" class="modal">
		{!! Form::open(['action' => 'TransactionController@create']) !!}
			<div class="modal-content">
				<h3>New Transaction</h3>
				<br>
				<div class="container">
					<div class="row">
						<div class="input-field col s12">
							<input type="text" name="title">
							<label for="title">Title</label>
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
							<textarea name="notes" class="materialize-textarea"></textarea>
							<label for="notes">Notes</label>
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

@endsection

@section('scripts')

	<script type="text/javascript">
		$(document).ready(function() {
			$('#txn-modal-trigger').leanModal();
		});
	</script>

@endsection
