@extends('layouts.frontend')
@section('content')
	@if (session('status'))
        <div class="alert alert-info">{{session('status')}}</div>
    @endif
<div class="main">
    <div class="content">
    	<div class="section group">
			<div class="col span_2_of_3">
			  	<div class="contact-form">
			  		<h2>REGISTER</h2>
			  		<hr>
				    <form class="form-horizontal" method="POST" action="{{ route('users.showregister') }}">
				    	{{ csrf_field() }}
					    <div class="form-group required">
							<span><label for="">Username</label></span>
							<span><input type="text" name="username" class="textbox" placeholder="Tên đăng nhập" value="{{ old('username') }}">
							@if ($errors->has('username'))</span>
						        <span class="text-danger">{{ $errors->first('username') }}</span>
						    @endif
						</div>
						<div class="form-group required">
							<span><label for="">Email</label></span>
							<span><input type="text" name="email" class="textbox" placeholder="Email đăng nhập" value="{{ old('email') }}"></span>
							@if ($errors->has('email'))
						        <span class="text-danger">{{ $errors->first('email') }}</span>
						    @endif
						</div>
						<div class="required">
							<span><label for="">Password</label></span>
							<span><input type="password" name="password" class="textbox" placeholder="Mật khẩu" value="{{ old('password') }}"></span>
							@if ($errors->has('password'))
						        <span class="text-danger">{{ $errors->first('password') }}</span>
						    @endif
						</div>
						<div class="required">
							<span><label for="">Re Password</label></span>
							<span><input type="password" name="confirm_password" class="textbox" placeholder="Mật khẩu" value="{{ old('confirm_password') }}"></span>
							@if ($errors->has('confirm_password'))
						        <span class="text-danger">{{ $errors->first('confirm_password') }}</span>
						    @endif
						</div>
						<div class="required">
							<span><label for="">Yourname</label></span>
							<span><input type="text" name="yourname" class="textbox" placeholder="Họ và tên" value="{{ old('yourname') }}"></span>
							@if ($errors->has('yourname'))
						        <span class="text-danger">{{ $errors->first('yourname') }}</span>
						    @endif
						</div>
						<div class="required">
							<span><label for="">Phone</label></span>
							<span><input type="text" name="phone" class="textbox" placeholder="Số điện thoại" value="{{ old('phone') }}"></span>
							@if ($errors->has('phone'))
						        <span class="text-danger">{{ $errors->first('phone') }}</span>
						    @endif
						</div>
						<div class="required">
							<span><label for="">Address</label></span>
							<span><input type="text" name="address" class="textbox" placeholder="Địa chỉ" value="{{ old('address') }}"></span>
							@if ($errors->has('address'))
						        <span class="text-danger">{{ $errors->first('address') }}</span>
						    @endif
						</div>
<!-- 						<div class="required">
							<span><label for="">Role</label></span>
							<select name="role_id" id=""> 
								<span><option value="2">{{  $role->name }}</option></pan>
							</select>
						</div> -->
						<div>
							<input type="hidden" name="role_id" value="2">
						</div>
					   	<div>
							<input type="submit" class="button" value="Đăng ký">
						</div>
				    </form>
			  	</div>
			</div>
	  	</div>		
    </div>
 </div>
@endsection
