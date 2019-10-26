@if ($errors->any())
	<div class="alert alert-info alert-dismissible fade show" role="alert">
		<ul class="list-group">
			@foreach ($errors->all() as $item)
				<li class="list-group-item text-danger">{{ $item }}</li>
			@endforeach
		</ul>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
@endif