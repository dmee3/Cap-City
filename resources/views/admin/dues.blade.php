@extends('layouts.admin')

@section('content')

	<div id="payments" class="container">
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
									<li class="collection-item payment-list-item pay-{{ $m->pay_color }}" style="background-size: {{ $m->paid * 100 / $m->member->dues }}%;">
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
								<ul class="collection">
								@foreach ($members as $m)
									<li class="collection-item payment-list-item pay-{{ $m->pay_color }}" style="background-size: {{ $m->paid * 100 / $m->member->dues }}%;">
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
		</div>
	</div>

@endsection
