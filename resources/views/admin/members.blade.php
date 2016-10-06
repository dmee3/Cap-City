@extends('layouts.admin')

@section('content')

	<div id="members" class="container">
		<div class="row">
			<div class="col s12">
				<h2 class="cap-blue-text">Members</h2>
				<ul class="collapsible" data-collapsible="accordion">
					@foreach($members as $m)
						<li>
							<div class="collapsible-header">{{ $m->first_name . ' ' . $m->last_name }}<span class="secondary-content">{{ $m->subsection }}</span></div>
							<div class="collapsible-body grey lighten-3">
								<div class="container">
									<div class="row">
										<div id="paid-info" class="col s12 m6 grey-text center">
											<h5>PAID: ${{ $m->paid }}</h5>
											<div id="dues-bar" class="progress z-depth-1 cap-green-fade">
												<div id="dues-progress" class="determinate cap-green" style="width: {{ $m->paid * 100 / $m->dues }}%;"></div>
											</div>
											<h6>TOTAL: ${{ $m->dues }}</h6>
										</div>
										<div id="conflict-info" class="col s12 m6 grey-text center">
											<h5>CONFLICTS: 
												@if ($m->conflicts > 0)
													<span class="cap-red-text">
												@else
													<span class="cap-green-text">
												@endif
													{{ $m->conflicts }}
												</span>
											</h5>
										</div>
									</div>
									<div class="row">
										<div class="col s12 center">
											<a href="#delete-modal" class="modal-trigger btn cap-red" data-name="{{ $m->first_name }}" data-id="{{ $m->id }}">Delete</a>
										</div>
									</div>
								</div>
							</div>
						</li>
					@endforeach
				</ul>
			</div>
		</div>
	</div>

	<div id="delete-modal" class="modal">
		<div class="modal-content center">
			{!! Form::open(['action' => 'MemberController@delete']) !!}
			<p class="center">Are you sure you want to delete <span id="del-name"></span>?</p>
			<br>
			<input type="hidden" name="member-id" id="del-id">
			<button type="submit" class="btn cap-red">Delete</button>
			{!! Form::close() !!}
		</div>
	</div>
@endsection

@section('scripts')

	<script type="text/javascript">
		$(document).ready(function(){
			$('.modal-trigger').leanModal({
				complete: function() {
					$('#del-name').html('');
					$('#del-id').val('');
				}
			});
			$('.collapsible').collapsible();

			$('.modal-trigger').on('click', function() {
				var name = $(this).attr('data-name');
				var id = $(this).attr('data-id');
				$('#del-name').html(name);
				$('#del-id').val(id);
			});
		});
	</script>

@endsection
