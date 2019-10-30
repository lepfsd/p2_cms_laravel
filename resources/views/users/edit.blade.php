@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
		<div class="card-header">my profile</div>
		
		<div class="card-body">
			@include('partials.error')
			<form action="{{ route('users.update-profile') }}" method="POST">
				@csrf
				@method('PUT')
				<div class="form-group">
					<label for="name">name</label>
					<input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}">
				</div>
				<div class="form-group">
					<label for="name">about</label>
					<textarea name="about" id="about" cols="30" rows="10" class="form-control">{{ $user->about }}</textarea>
				</div>
				<button type="submit" class="btn btn-success">update</button>
			</form>
		</div>
	</div>
</div>
@endsection
