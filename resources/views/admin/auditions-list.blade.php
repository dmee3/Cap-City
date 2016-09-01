@extends ('layouts.master')

@section('content')

	<div class="section cap-blue">
		<div class="container row cap-blue cap-white-text">
			<div class="col s12">
				<h1>2017 Registrations</h1>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col s12">
					<ul class="collection">
						<li class="collection-item center"><h4>Total: {{ count($auditions) }}</h4></li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col s6">
					<ul class="collapsible">
						@include('app.auditions-sub', ['name' => 'Snare', 'data' => $data['snare']])
						@include('app.auditions-sub', ['name' => 'Tenors', 'data' => $data['tenors']])
						@include('app.auditions-sub', ['name' => 'Bass', 'data' => $data['bass']])
						@include('app.auditions-sub', ['name' => 'Cymbals', 'data' => $data['cymbals']])
						<li><div class="collapsible-header"><b>Total<span class="secondary-content">{{ count($data['snare']) + count($data['tenors']) + count($data['bass']) + count($data['cymbals']) }}</span></b></div></li>
					</ul>
				</div>
				<div class="col s6">
					<ul class="collapsible">
						@include('app.auditions-sub', ['name' => 'Marimba', 'data' => $data['marimba']])
						@include('app.auditions-sub', ['name' => 'Vibes', 'data' => $data['vibes']])
						@include('app.auditions-sub', ['name' => 'Xylophone', 'data' => $data['xylo']])
						@include('app.auditions-sub', ['name' => 'Drum Set', 'data' => $data['drumset']])
						@include('app.auditions-sub', ['name' => 'Synthesizer', 'data' => $data['synth']])
						@include('app.auditions-sub', ['name' => 'Bass Guitar', 'data' => $data['guitar']])
						@include('app.auditions-sub', ['name' => 'Auxiliary', 'data' => $data['aux']])
						<li><div class="collapsible-header"><b>Total<span class="secondary-content">{{ count($data['marimba']) + count($data['vibes']) + count($data['xylo']) + count($data['drumset']) + count($data['synth']) + count($data['guitar']) + count($data['aux']) }}</span></b></div></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="container row cap-blue">
			<ul class="collapsible popout" data-collapsible="accordion">
				@foreach ($auditions as $a)
					<li>
						<div class="collapsible-header white">
							<div class="col s9">{{ $a->first_name . " " . $a->last_name }}</div>
							<div class="col s3">{{ $a->instr1 }}</div>
						</div>
						<div class="collapsible-body white">
							<div class="row" style="padding: 0 30px 0 30px;">
								<div class="col s12 m8 l9">
									<h4 class="cap-red-text">{{ $a->first_name . " " . $a->last_name }}</h4>
									<h5>{{ $a->email }}</h5>
								</div>
								<br>
								<div class="col s12 m4 l3 thin">
									<div class="card-panel cap-black white-text">
										<ul>
											@if ($a->packet == 'true')
												<li><i class="material-icons green-text">done</i>Packet Only</li>
											@endif
											@if ($a->registered == 'true')
												<li><i class="material-icons green-text">done</i>Registered</li>
											@endif
											@if ($a->chipotle1 == 'true')
												<li><i class="material-icons green-text">done</i>Chipotle 9/25</li>
											@endif
											@if ($a->chipotle2 == 'true')
												<li><i class="material-icons green-text">done</i>Chipotle 10/2</li>
											@endif
										<ul>
									</div>
								</div>
								<div class="col s6 thin">
									<ul>
										<li>{{ $a->address1 }}</li>
										@if ($a->address2 != '')
											<li>{{ $a->address2 }}</li>
										@endif
										<li>{{ $a->city }}, {{ $a->state }} {{ $a->zip }}</li>
									</ul>
								</div>
								<div class="col s6">
									<ul>
										<li>{{ $a->instr1 }}</li>
										<li>{{ $a->instr2 }}</li>
										<li>{{ $a->instr3 }}</li>
									</ul>
								</div>
							</div>
							<div class="row" style="padding: 0 30px 0 30px;">
								<div class="col s12 m6">
									<h5 class="cap-blue-text">Reason</h5>
									{!! nl2br(e($a->reason)) !!}
								</div>
								<div class="col s12 m6">
									<h5 class="cap-blue-text">Experience</h5>
									{!! nl2br(e($a->experience)) !!}
								</div>
							</div>
						</div>
					</li>
				@endforeach
			</ul>
		</div>
	</div>

@endsection

@section('scripts')

	<script type="text/javascript">
		$(document).ready(function(){
			$('.collapsible').collapsible();
		});
	</script>

@endsection
