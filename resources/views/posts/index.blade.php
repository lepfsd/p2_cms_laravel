@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-end">
	<a href="{{ route('posts.create') }}" class="btn btn-success float-right mb-2">add </a>
</div>
<div class="card card-default">
	<div class="card-header">
		posts
	</div>
	<div class="card-body">
		<table class="table">
			<thead>
				<th>image</th>
				<th>title</th>
				<th>description</th>
				
				<th></th>
			</thead>
			<tbody>
				@foreach ($posts as $item)
					<tr>
						<td> <img src="{{ asset($item->image) }}" width="60px" height="60px" alt=""> </td>
						<td> {{ $item->name }} </td>
						<td> {{ $item->description }} </td>
						<td class="float-right">
							<a href="#" class="btn btn-primary btn-sm "> edit </a>
							<button class="btn btn-danger btn-sm " onclick="">delete</button>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>

		<!-- Modal -->
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<form action="" method="POST" id="deleteCategoryForm">
					@method('DELETE')
					@csrf
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">delete this category ?</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">no, go back</button>
							<button type="submit" class="btn btn-danger">yes, delete</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection

@section('scripts')
	<script>
		/*function handleDelete(id) {
			var form = document.getElementById('deleteCategoryForm');
			form.action = '/categories/' + id;
			$('#exampleModal').modal('show');
		}*/
	</script>
@endsection