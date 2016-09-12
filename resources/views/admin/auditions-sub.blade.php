<li>
	<div class="collapsible-header">{{ $name }}<span class="secondary-content">{{ count($data) }}</span></div>
	<div class="collapsible-body">
		<ul class="collection">
			@foreach ($data as $i)
				<li class="collection-item">
					{{ $i->first_name . " " . $i->last_name }}
					<span class="secondary-content">
						@if ($i->registered == 'true')
							<i class="material-icons green-text">check_circle</i>
						@else
							<i class="material-icons orange-text">help_outline</i>
						@endif
				</li>
			@endforeach
		</ul>
	</div>
</li>
