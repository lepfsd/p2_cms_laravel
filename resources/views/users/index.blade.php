@extends('layouts.app')

@section('content')

<div class="card card-default">
	<div class="card-header">
		users
	</div>
	<div class="card-body">
		@if ($users->count() > 0)
		<table class="table">
			<thead>
				<th>image</th>
				<th>name</th>
				<th>email</th>
				<th>role</th>
				<th></th>
			</thead>
			<tbody>
				@foreach ($users as $user)
					<tr>	
						<td><img src="{{ Gravatar::src($user->email) }}" alt="" width="40px" height="40px" style="border-radius: 50%"></td>
						<td>{{ $user->name }}</td>
						<td>{{ $user->email }}</td>
						<td>{{ $user->role }}</td>
						<td class="float-right">
							@if (!$user->isAdmin())
								<form action="{{ route('users.make-admin', $user->id) }}" method="POST">
									@csrf
									<button class="btn btn-warning btn-sm" type="submit">make admin</button>
								</form>
							@endif
						</td>
						
					</tr>
				@endforeach
			</tbody>
		</table>
		@else
			<h3 class="text-center">No users yet</h3>
		@endif

		
	</div>
</div>
@endsection

