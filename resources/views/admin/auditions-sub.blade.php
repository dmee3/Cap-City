<li>
	<div class="collapsible-header">{{ $name }}<span class="secondary-content">{{ count($data) }}</span></div>
	<div class="collapsible-body">
		<ul class="collection">
			@foreach ($data as $i)
				<li class="collection-item">{{ $i->first_name . " " . $i->last_name }}</li>
			@endforeach
		</ul>
	</div>
</li>
