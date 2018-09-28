@extends('layouts.admin')
@section('content')
<div class="container">
	<a href="{{ route('users.create') }}"><i class="fa fa-user-plus">Thêm người dùng</i></a>
	<table class="table table-dark table-striped">
		<thead>
			<tr>
				<th>ID</th>
				<th>UserName</th>
				<th>Email</th>
				<th>Password</th>
				<th>Role</th>
				<th>Show</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
			@foreach($users as $user)
				<tr>
					<td>{{ $user->id }}</td>
					<td>{{ $user->username }}</td>
					<td>{{ $user->email }}</td>
					<td>{{ $user->password }}</td>
					<td>{{ $user->role->name }}</td>
					<td><a href="{{ route('users.show', $user->id) }}" class="btn btn-success">Show</a></td>
					<td><a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">Edit</a></td>
					<td>
						<form action="{{ route('users.destroy', $user->id) }}">
							{{ csrf_field() }}
							{{ method_field('DELETE') }}
							<input type="submit" class="btn btn-danger" value="Delete">
						</form>
					</td>

				</tr>
			@endforeach	
		</tbody>
	</table>
</div>
@endsection