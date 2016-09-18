@extends('layouts.staff')

@section('content')

	<div class="section">
		<div class="container">
			<div class="card cap-black">
				<div class="card-content white-text">
					<div class="row">
						<div class="col s12">
							<h2>Schedule</h2>
						</div>
					</div>
					<div class="row">
						<ul id="timeline">
						</ul>
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
		var numEvents = 250;
		var highlightNextEvent = 1;
	</script>
	<script type="text/javascript" src="/js/app-schedule.js"></script>

@endsection
