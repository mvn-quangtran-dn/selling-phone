@extends('layouts.admin')
@section('content')
<div class="container">
	<a href="{{ route('users.index') }}" class="run-back"><i class="fa fa-hand-o-left"> Quay lại</i></a>
	<form action="{{ route('users.update', $user->id) }}" method="post">
		{{ csrf_field() }}
		{{ method_field('PUT') }}
		<h2>Thông tin đăng nhập</h2>
		<div class="from-group">
			<label for="">Username</label>
			<input type="text" name="username" class="form-control" placeholder="Tên đăng nhập" value="{{ $user->username }}">
			@if ($errors->has('username'))
				<span class="text-danger">{{ $errors->first('username') }}</span>
			@endif
		</div>
		<div class="from-group">
			<label for="">Email</label>
			<input type="email" name="e	mail" class="form-control" placeholder="Email đăng nhập" value="{{ $user->email }}">
			@if ($errors->has('email'))
				<span class="text-danger">{{ $errors->first('email') }}</span>
			@endif
		</div>
		<div class="from-group">
			<label for="">Password</label>
			<input type="password" name="password" class="form-control" placeholder="Nhập Mật khẩu" value="{{ $user->password }}">
			@if ($errors->has('password'))
				<span class="text-danger">{{ $errors->first('password') }}</span>
			@endif
		</div>
		<h2>Thông tin cá nhân</h2>
		<div class="from-group">
			<label for="">Yourname</label>
			<input type="text" name="yourname" class="form-control" placeholder="Họ và tên" value="{{ $user->yourname }}">
			@if ($errors->has('yourname'))
				<span class="text-danger">{{ $errors->first('yourname') }}</span>
			@endif
		</div>
		<div class="from-group">
			<label for="">Phone</label>
			<input type="text" name="phone" class="form-control" placeholder="Nhập Số điện thoại" value="{{ $user->phone }}">
			@if ($errors->has('phone'))
				<span class="text-danger">{{ $errors->first('phone') }}</span>
			@endif
		</div>
		<div class="from-group">
			<label for="">Address</label>
			<input type="text" name="address" class="form-control" placeholder="Nhập Địa chỉ" value="{{ $user->address }}">
			@if ($errors->has('address'))
				<span class="text-danger">{{ $errors->first('address') }}</span>
			@endif
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
			<input type="submit" value="Chỉnh sửa" class="btn btn-primary">
		</div>
	</form>
</div>
@endsection