@extends('layouts.staff')

@section('content')

	<div id="hero" class="section {{ strtolower($staff['conflict_section']) }}">
		<div id="name">
			<h4 class="white-text center">{{ $user->first_name . " " . $user->last_name }}</h4>
			<h5 class="white-text center thin">{{ $staff['position'] }}</h5>
		</div>
	</div>

	<br>

	<div class="container row">

		@if ($staff['pay'] > 0)
			<div class="col s12 m10 offset-m1 l4">
				<div id="payments" class="card white">
					<div class="card-content">
						<div class="row">
							<div class="col s12">
								<h4 class="cap-black-text">Pay</h4>
							</div>
						</div>
						<div id="paid-info" class="row grey-text center">
							<h5>PAID: ${{ $paid }}</h5>
							<div id="dues-bar" class="progress z-depth-1">
								<div id="dues-progress" class="determinate cap-green" style="width: {{ $paid * 100 / $staff['pay'] }}%;"></div>
							</div>
							<h6>TOTAL: ${{ $staff['pay'] }}</h6>
						</div>
						@if ($payments->count() > 0)
							<div class="row">
								<ul class="collection">
									@foreach($payments as $p)
										<li class="collection-item">${{ $p->amount }}<span class="secondary-content cap-blue-text">{{ $p->date_paid }}</span></li>
									@endforeach
								</ul>
							</div>
						@endif
					</div>
				</div>
			</div>
		@endif

		@if ($staff['pay'] > 0)
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
		</div>

		@if ($staff['pay'] > 0)
			<div class="col s12 m10 offset-m1 l4">
		@else
			<div class="col s12 m10 offset-m1 l6">
		@endif
			<div id="conflicts" class="card white">
				<div class="card-content">
					<div class="row">
						<div class="col s12">
							<h4 class="cap-black-text">Conflicts</h4>
							<p class="thin">(next month)</p>
						</div>
					</div>
					<div class="row">
						@if ($conflicts->count() > 0)
							<ul class="collection">
								@foreach ($conflicts as $c)
									<li class="collection-item">{{ $c->user->first_name . ' ' . $c->user->last_name }}<span class="secondary-content cap-blue-text">{{ date('n/j/Y', strtotime($c->date_absent)) }}</span></li>
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


@endsection

@section('scripts')

	<script type="text/javascript">
		var apiKey = "{{ env('GOOGLE_API_KEY') }}";
		var clientId = "{{ env('GOOGLE_CALENDAR_CLIENT_ID') }}";
		var numEvents = 3;
		var highlightNextEvent = 0;
	</script>
	<script type="text/javascript" src="/js/app-schedule.js"></script>

@endsection
