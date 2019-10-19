@extends('layouts.app')

@section('content')

<div class="card card-default">
	<div class="card-header">
		create category
	</div>
	<div class="card-body">
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
		<form action="{{ route('categories.store') }}" method="POST">
			@csrf
			<div class="form-group">
				<label for="name">name</label>
				<input type="text" class="form-control" name="name">
			</div>
			<div class="form-group">
				<button class="btn btn-success float-right">save</button>
			</div>
		</form>
	</div>
</div>
@endsection