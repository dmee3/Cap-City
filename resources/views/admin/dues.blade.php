@extends('layouts.admin')

@section('content')

	<div id="dues" class="container">
		<div class="row">
			<div class="col s12 m6">
				<h4 class="cap-blue-text">Battery</h4>
				@foreach($battery as $section => $members)
					<div class="card">
						<div class="card-content">
							<div class="row">
								<h5>{{ $section }}</h5>
								<ul class="collection">
								@foreach ($members as $m)
									<li class="collection-item payment-list-item pay-{{ $m->pay_color }}" style="background-size: {{ $m->pay_width }}%;">
										{{ $m->first_name . " " . $m->last_name }}
										<span class="secondary-content black-text">${{ number_format($m->paid, 2, ".", "") }} / ${{ $m->member->dues }}</span>
									</li>
								@endforeach
								</ul>
							</div>
						</div>
					</div>
				@endforeach
			</div>
			<div class="col s12 m6">
				<h4 class="cap-blue-text">Front</h4>
				@foreach($front as $section => $members)
					<div class="card">
						<div class="card-content">
							<div class="row">
								<h5>{{ $section }}</h5>
								<div class="collection">
								@foreach ($members as $m)
									<a href="#payment-modal" class="modal-trigger collection-item payment-list-item pay-{{ $m->pay_color }}" style="background-size: {{ $m->pay_width }}%;" data-userid="{{ $m->id }}">
										<span class="black-text">{{ $m->first_name . " " . $m->last_name }}</span>
										<span class="secondary-content black-text">${{ number_format($m->paid, 2, ".", "") }} / ${{ $m->member->dues }}</span>
									</a>
								@endforeach
								</div>
							</div>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</div>

	<div id="payment-modal" class="modal">
		<div class="modal-content">
			<h3 id="modal-name"></h3>
		</div>
		<div class="modal-footer">
			<a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Close</a>
		</div>
	</div>

@endsection

@section('scripts')

	<script type="text/javascript">
		$(document).ready(function() {
			$('.modal-trigger').leanModal();
		});
	</script>

@endsection
