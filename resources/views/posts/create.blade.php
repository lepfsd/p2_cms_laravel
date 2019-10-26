@extends('layouts.app')

@section('content')
	<div class="card card-default">
		<div class="card-header">
			{{ isset($post) ? 'edit' : 'create' }}
		</div>
		<div class="card-body">
			@include('partials.error')
			<form action="{{ isset($post) ? route('posts.update', $post->id) : route('posts.store') }}" method="POST" enctype="multipart/form-data">
				@csrf
				@if (isset($post))
					@method('PUT')
				@endif
				<div class="form-group">
					<label for="name">title</label>
					<input type="text" class="form-control" name="name" value="{{ isset($post->name) ? $post->name : '' }}">
				</div>
				<div class="form-group">
					<label for="description">description</label>
					<textarea name="description" id="description" cols="4" rows="2" class="form-control">{{ isset($post->description) ? $post->description : '' }}</textarea>
				</div>
				<div class="form-group">
					<label for="content">content</label>
					<input id="content" type="hidden" name="content" value="{{ isset($post->content) ? $post->content : '' }}">
  					<trix-editor input="content"></trix-editor>
				</div>
				<div class="form-group">
					<label for="category">category</label>
					<select name="category" id="" class="form-control">
						@foreach ($categories as $category)
							<option value="{{ $category->id }}"
									{{--@if ($category->id === $post->category_id)
										selected
									@endif --}}
							>
								{{ $category->name }}
							</option>
						@endforeach
					</select>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="published_at">published at</label>
							<input type="text" class="form-control" name="published_at" id="published_at" value="{{ isset($post->published_at) ? $post->published_at : '' }}">
						</div>
					</div>	
					<div class="col-md-6">
						<div class="form-group">
							<label for="image">image</label>
							<input type="file" class="form-control" name="image" id="image">
						</div>
					</div>
				</div>
				@if (isset($post))
					<div class="form-group">
					<img src="{{ asset($post->image)}}" alt="" style="width: 100%">
					</div>
				@endif
				<div class="form-group">
					<button class="btn btn-success float-right" type="submit">{{ isset($post) ? 'update' : 'create'}}</button>
				</div>
			</form>
		</div>
	</div>
@endsection

@section('css')
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

@endsection

@section('scripts')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
	<script>
		flatpickr("#published_at", {
			enableTime: true
		});
	</script>
@endsection