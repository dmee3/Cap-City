@if (count($errors) > 0)

	<div class="col s12 m8 offset-m2">
		<div class="card-panel cap-black cap-red-text center">
			<h5>Please fill out all fields.</h5>
			<!--<ul>-->
				@foreach ($errors->all() as $e)
					<!--<li>{{ $e }}</li>-->
				@endforeach
			<!--</ul>-->
		</div>
	</div>

@endif
