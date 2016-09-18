@extends('layouts.admin')

@section('content')

	<div id="payments" class="container">
		<div class="row">
			<div class="col s12 m6">
				<h4 class="cap-blue-text">Battery</h4>
				@foreach($battery as $b)
					<div class="card">
						<div class="card-content">
							<div class="row">
								<h5>{{ $b['name'] }}</h5>
								<ul class="collection">
									@foreach($b['members'] as $m)
										<li class="collection-item">{{ $m->first_name . ' ' . $m->last_name }}</li>
									@endforeach
								</ul>
							</div>
						</div>
					</div>
				@endforeach
			</div>
			<div class="col s12 m6">
				<h4 class="cap-blue-text">Front</h4>
				@foreach($front as $f)
					<div class="card">
						<div class="card-content">
							<div class="row">
								<h5>{{ $f['name'] }}</h5>
								<ul class="collection">
									@foreach($f['members'] as $m)
										<li class="collection-item">{{ $m->first_name . ' ' . $m->last_name }}</li>
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
