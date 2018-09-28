@extends('layouts.admin')
@section('content')
<div class="container">
	<form action="{{ route('users.store') }}" method="post">
		<div class="from-group">
			<label for="">Username</label>
			<input type="text" name="username" class="form-control" placeholder="Tên đăng nhập">
		</div>
		<div class="from-group">
			<label for="">Email</label>
			<input type="email" name="email" class="form-control" placeholder="Email đăng nhập">
		</div>
		<div class="from-group">
			<label for="">Password</label>
			<input type="password" name="password" class="form-control" placeholder="Nhập Mật khẩu">
		</div>
		<div class="from-group">
			<label for="">Yourname</label>
			<input type="text" name="yourname" class="form-control" placeholder="Họ và tên">
		</div>
		<div class="from-group">
			<label for="">Phone</label>
			<input type="text" name="phone" class="form-control" placeholder="Nhập Số điện thoại">
		</div>
		<div class="from-group">
			<label for="">Address</label>
			<input type="text" name="address" class="form-control" placeholder="Nhập Địa chỉ">
		</div>
		<div class="form-group">
			<label for="">Role</label>
			<select name="role_id" id="" class="form-control">
				@foreach($roles as $role)
					<option value="{{ $role->id }}">{{ $role->name }}</option>
				@endforeach	
			</select>
		</div>
		<div class="from-group">
			<input type="submit" value="Đăng ký" class="btn btn-primary">
		</div>
	</form>
</div>
@endsection