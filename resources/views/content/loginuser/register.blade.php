@extends('layouts.frontend')
@section('content')
	@if (session('status'))
        <div class="alert alert-info">{{session('status')}}</div>
    @endif
<div class="panel panel-default" style="background:#f1f1f1">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<br>
			<h3 class="panel-heading">Đăng ký tài khoản</h3>
			<hr>
			<form class="form-horizontal" method="POST" action="{{ route('users.showregister') }}">
		        {{ csrf_field() }}
				<div class="form-group">
					<label for="">Username</label>
					<input type="text" name="username" class="form-control" placeholder="Tên đăng nhập" value="{{ old('username') }}">
					@if ($errors->has('username'))
				        <span class="text-danger">{{ $errors->first('username') }}</span>
				    @endif
				</div>
				<div class="form-group">
					<label for="">Email</label>
					<input type="text" name="email" class="form-control" placeholder="Email đăng nhập" value="{{ old('email') }}">
					@if ($errors->has('email'))
				        <span class="text-danger">{{ $errors->first('email') }}</span>
				    @endif
				</div>
				<div class="form-group">
					<label for="">Password</label>
					<input type="password" name="password" class="form-control" placeholder="Mật khẩu" value="{{ old('password') }}">
					@if ($errors->has('password'))
				        <span class="text-danger">{{ $errors->first('password') }}</span>
				    @endif
				</div>
				<div class="form-group">
					<label for="">Re Password</label>
					<input type="password" name="confirm_password" class="form-control" placeholder="Mật khẩu" value="{{ old('confirm_password') }}">
					@if ($errors->has('confirm_password'))
				        <span class="text-danger">{{ $errors->first('confirm_password') }}</span>
				    @endif
				</div>
				<div class="form-group">
					<label for="">Yourname</label>
					<input type="text" name="yourname" class="form-control" placeholder="Họ và tên" value="{{ old('yourname') }}">
					@if ($errors->has('yourname'))
				        <span class="text-danger">{{ $errors->first('yourname') }}</span>
				    @endif
				</div>
				<div class="form-group">
					<label for="">Phone</label>
					<input type="text" name="phone" class="form-control" placeholder="Số điện thoại" value="{{ old('phone') }}">
					@if ($errors->has('phone'))
				        <span class="text-danger">{{ $errors->first('phone') }}</span>
				    @endif
				</div>
				<div class="form-group">
					<label for="">Address</label>
					<input type="text" name="address" class="form-control" placeholder="Địa chỉ" value="{{ old('address') }}">
					@if ($errors->has('address'))
				        <span class="text-danger">{{ $errors->first('address') }}</span>
				    @endif
				</div>
				<div class="form-group">
					<label for="">Role</label>
					<select name="role_id" id="" class="form-control"> 
						<option value="2">{{  $role->name}}</option>
					</select>
				</div>
				<div class="for-group">
					<input type="submit" class="btn btn-primary" value="Đăng ký">
				</div>
		    </form>     
		</div>
		<div class="col-md-2"></div>
	</div>   	
</div>
@endsection
