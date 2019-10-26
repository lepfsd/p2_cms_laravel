@extends('layouts.app')

@section('content')

<div class="card card-default">
	<div class="card-header">
		{{ isset($category) ? 'edit' : 'create' }}
	</div>
	<div class="card-body">
		@include('partials.error')
		<form 
			action="{{ isset($category) ? route('categories.update', $category->id) : route('categories.store') }}" 
			method="POST">
			@csrf
			@if (isset($category))
				@method('PUT')
			@endif

			<div class="form-group">
				<label for="name">name</label>
				<input type="text" class="form-control" name="name" value="{{ isset($category) ? $category->name : '' }}">
			</div>
			<div class="form-group">
				<button class="btn btn-success float-right">{{ isset($category) ? 'update' : 'save' }}</button>
			</div>
		</form>
	</div>
</div>
@endsection