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
		@if ($posts->count() > 0)
		<table class="table">
			<thead>
				<th>image</th>
				<th>title</th>
				<th>category</th>
				<th></th>
			</thead>
			<tbody>
				@foreach ($posts as $item)
					<tr>
						<td> 
							<img src="{{ asset("storage/{$item->image}") }}" width="60px" height="60px" alt=""> 
							
						</td>
						<td> {{ $item->name }} </td>
						<td>  
							<a href="{{ route('categories.edit', $item->category->id) }}" class="btn btn-link">
								{{ $item->category->name }}
							</a>
						</td>
						
						@if ($item->trashed())
							<td>
								<form action="{{ route('restore-posts', $item->id)}}" method="POST">
									@csrf
									@method('PUT')
									<button type="submit" class="btn btn-info btn-sm">restore</button>
								</form>
							</td>
						@else
							<td>
								<a href="{{ route('posts.edit', $item->id) }}" class="btn btn-info btn-sm "> edit </a>
							</td>
						@endif
						<td>
							<form action="{{ route('posts.destroy', $item->id) }}" method="POST">
								@csrf
								@method('DELETE')
								<button type="submit" class="btn btn-danger btn-sm">
									{{ $item->trashed() ? 'del' : 'trash' }}
								</button>
							</form>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		@else
			<h3 class="text-center">No post yet</h3>
		@endif

		
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