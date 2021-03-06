@extends('layouts.app')

@section('content')

<div class="card card-default">
	<div class="card-header">
		{{ isset($tag) ? 'edit' : 'create' }}
	</div>
	<div class="card-body">
		@include('partials.error')
		<form 
			action="{{ isset($tag) ? route('tags.update', $tag->id) : route('tags.store') }}" 
			method="POST">
			@csrf
			@if (isset($tag))
				@method('PUT')
			@endif

			<div class="form-group">
				<label for="name">name</label>
				<input type="text" class="form-control" name="name" value="{{ isset($tag) ? $tag->name : '' }}">
			</div>
			<div class="form-group">
				<button class="btn btn-success float-right">{{ isset($tag) ? 'update' : 'save' }}</button>
			</div>
		</form>
	</div>
</div>
@endsection