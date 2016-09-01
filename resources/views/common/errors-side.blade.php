<div class="col s12 m4 push-m8">
	<div class="card-panel cap-red white-text">
		<h5>Error</h5>
		<ul>
			@foreach ($errors->all() as $e)
				<li>{{ $e }}</li>
			@endforeach
		</ul>
	</div>
</div>
