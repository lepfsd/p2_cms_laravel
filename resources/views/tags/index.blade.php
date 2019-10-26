@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-end">
	<a href="{{ route('tags.create') }}" class="btn btn-success float-right mb-2">add</a>
</div>
<div class="card card-default">
	<div class="card-header">
		tags
	</div>
	<div class="card-body">
		@if ($tags->count() > 0)
		<table class="table">
			<thead>
				<th>name</th>
				<th>posts</th>
				<th></th>
			</thead>
			<tbody>
				@foreach ($tags as $item)
					<tr>
						<td>{{ $item->name }}</td>
						<td>{{ $item->posts->count() }}</td>
						<td class="float-right">
							<a href="{{ route('tags.edit', $item->id)}}" class="btn btn-primary btn-sm "> edit </a>
							<button class="btn btn-danger btn-sm " onclick="handleDelete({{ $item->id }})">delete</button>
						</td>
						
					</tr>
				@endforeach
			</tbody>
		</table>
		@else
			<h3 class="text-center">No tags yet</h3>
		@endif

		<!-- Modal -->
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<form action="" method="POST" id="deleteCategoryForm">
					@method('DELETE')
					@csrf
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">delete this tag ?</h5>
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
		function handleDelete(id) {
			var form = document.getElementById('deleteCategoryForm');
			form.action = '/tags/' + id;
			$('#exampleModal').modal('show');
		}
	</script>
@endsection