@extends('layouts.admin')
@section('content')
<div class="row">
	<div class="col-md-6">
		<form action="{{ route('users.store') }}" method="post">
			{{ csrf_field() }}
			<fieldset>
				<legend>Add User</legend>
				<div class="form-group">
					<label for="">Username</label>
					<input type="text" name="name" placeholder="Ho ten" class="form-control">
				</div>
				<div class="form-group">
					<label for="">Email</label>
					<input type="email" name="email" placeholder="Email" class="form-control"> 
				</div>
				<div class="form-group">
					<label for="">Password</label>
					<input type="password" name="password" placeholder="Password" class="form-control">
				</div>
				<div>
					<label for="">Role</label>
					<select name="role_id" id="" class="form-control">
						@foreach($roles as $role)
							<option value="{{ $role->id }}">{{ $role->name }}</option>
						@endforeach
					</select>
				</div>	<br>
				<div class="form-group">
					<input type="submit" value="Create" class="btn btn-primary">
				</div>
			</fieldset>	
		</form>
		
	</div>
	<div class="col-md-6"></div>
</div>

@endsection