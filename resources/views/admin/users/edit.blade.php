@extends('layouts.admin')
@section('content')
<div class="row">
	<div class="col-md-6">
		<form action="{{ route('users.update', $user->id) }}" method="post">
			<fieldset class="form-group">
				 <legend>Edit User</legend>
				{{ csrf_field() }}
				{{ method_field('PUT') }}
				<div class="form-group">
					<label for="">Username</label>
					<input type="text" name="name" value="{{ $user->name }}" class="form-control">
				</div>
				<div class="form-group">
					<label for="">Email</label>
					<input type="email" name="email" value="{{ $user->email }}" class="form-control"> 
				</div>
				<div class="form-group">
					<label for="">Password</label>
					<input type="password" name="password" value="{{ $user->password }}" class="form-control">
				</div>
				<div>
					<label for="">Role</label>
					<select name="role_id" id="" class="form-control">
						@foreach($roles as $role)
							<option value="{{ $role->id }}">{{ $role->name }}</option>
						@endforeach
					</select>
				</div>
				<br>	
				<div class="form-group">
					<input type="submit" value="Update" class="btn btn-primary">
				</div>
			</fieldset>	
		</form>	
	</div>
	<div class="col-md-6"></div>

</div>
@endsection