@extends('layouts.app')

@section('content')
	<div class="card card-default">
		<div class="card-header">
			create
		</div>
		<div class="card-body">
			<form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
				@csrf
				<div class="form-group">
					<label for="name">title</label>
					<input type="text" class="form-control" name="name">
				</div>
				<div class="form-group">
					<label for="description">description</label>
					<textarea name="description" id="description" cols="4" rows="2" class="form-control"></textarea>
				</div>
				<div class="form-group">
					<label for="content">content</label>
					<textarea name="content" id="content" cols="5" rows="5" class="form-control"></textarea>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="published_at">published at</label>
							<input type="text" class="form-control" name="published_at">
						</div>
					</div>	
					<div class="col-md-6">
						<div class="form-group">
							<label for="image">image</label>
							<input type="file" class="form-control" name="image" id="image">
						</div>
					</div>
				</div>
				<div class="form-group">
					<button class="btn btn-success float-right" type="submit">save</button>
				</div>
			</form>
		</div>
	</div>
@endsection