@extends('layouts.admin')
@section('content')
<div class="container">
	<form action="{{ route('users.update', $user->id) }}" method="post" class="form-edit">
		{{ csrf_field() }}
		{{ method_field('PUT') }}
		<div class="row">
			<div class="col-md-6" class="border-right">
				<h2>Thông tin đăng nhập</h2>
				<hr>
				<div class="from-group required">
					<label for="">Username</label>
					<input type="text" name="username" class="form-control" placeholder="Tên đăng nhập" value="{{ $user->username }}">
					@if ($errors->has('username'))
						<span class="text-danger">{{ $errors->first('username') }}</span>
					@endif
				</div>
			</div>
			<div class="col-md-6">
				<h2>Thông tin cá nhân</h2>
				<hr>
				<div class="from-group required">
					<label for="">Yourname</label>
					<input type="text" name="yourname" class="form-control" placeholder="Họ và tên" value="{{ $user->yourname }}">
					@if ($errors->has('yourname'))
						<span class="text-danger">{{ $errors->first('yourname') }}</span>
					@endif
				</div>
				<div class="from-group required">
					<label for="">Phone</label>
					<input type="text" name="phone" class="form-control" placeholder="Nhập Số điện thoại" value="{{ $user->phone }}">
					@if ($errors->has('phone'))
						<span class="text-danger">{{ $errors->first('phone') }}</span>
					@endif
				</div>
				<div class="from-group required">
					<label for="">Address</label>
					<input type="text" name="address" class="form-control" placeholder="Nhập Địa chỉ" value="{{ $user->address }}">
					@if ($errors->has('address'))
						<span class="text-danger">{{ $errors->first('address') }}</span>
					@endif
				</div>
			</div>
		</div>
		
		<hr>
		<div class="from-group">
			<input type="submit" value="Chỉnh sửa" class="btn btn-primary">
			<a href="{{ route('users.index') }}" class="btn btn-info"><i class="fa fa-hand-o-left">&nbsp;&nbsp;Quay lại</i></a>
		</div>
	</form>
</div>
@endsection