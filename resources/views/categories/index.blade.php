@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-end">
	<a href="{{ route('categories.create') }}" class="btn btn-success float-right mb-2">add</a>
</div>
<div class="card card-default">
	<div class="card-header">
		categories
	</div>
	<div class="card-body">
		<table class="table">
			<thead>
				<th>name</th>
			</thead>
			<tbody>
				@foreach ($categories as $item)
					<tr>
						<td>{{ $item->name }}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection