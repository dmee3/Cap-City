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
						<li class="collection-item center"><h4>Total: {{ $total }}</h4></li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col s6">
					<ul class="collection">
						<li class="collection-item">Snare<span class="secondary-content">{{ $data['snare'] }}</span></li>
						<li class="collection-item">Tenors<span class="secondary-content">{{ $data['tenors'] }}</span></li>
						<li class="collection-item">Bass<span class="secondary-content">{{ $data['bass'] }}</span></li>
						<li class="collection-item">Cymbals<span class="secondary-content">{{ $data['cymbals'] }}</span></li>
						<li class="collection-item"><b>Total<span class="secondary-content">{{ $data['snare'] + $data['tenors'] + $data['bass'] + $data['cymbals'] }}</span></b></li>
					</ul>
				</div>
				<div class="col s6">
					<ul class="collection">
						<li class="collection-item">Marimba<span class="secondary-content">{{ $data['marimba'] }}</span></li>
						<li class="collection-item">Vibes<span class="secondary-content">{{ $data['vibes'] }}</span></li>
						<li class="collection-item">Xylophone<span class="secondary-content">{{ $data['xylo'] }}</span></li>
						<li class="collection-item">Drumset<span class="secondary-content">{{ $data['drumset'] }}</span></li>
						<li class="collection-item">Synthesizer<span class="secondary-content">{{ $data['synth'] }}</span></li>
						<li class="collection-item">Bass Guitar<span class="secondary-content">{{ $data['guitar'] }}</span></li>
						<li class="collection-item">Auxiliary<span class="secondary-content">{{ $data['aux'] }}</span></li>
						<li class="collection-item"><b>Total<span class="secondary-content">{{ $data['marimba'] + $data['vibes'] + $data['xylo'] + $data['drumset'] + $data['synth'] + $data['guitar'] + $data['aux'] }}</span></b></li>
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
									{{ $a->reason }}
								</div>
								<div class="col s12 m6">
									<h5 class="cap-blue-text">Experience</h5>
									{{ $a->experience }}
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
