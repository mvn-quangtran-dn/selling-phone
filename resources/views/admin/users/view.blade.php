@extends('layouts.admin')
@section('content')
<div class="container">
	<h2>Thông tin người dùng {{ $user->yourname }}</h2>
	<table class="table table-dark table-striped">
		<tr>
			<td class="text-center"><h2>Thông tin đăng nhập</h2></td>
			<td></td>
		</tr>
		<tr>
			<td><b>Tên đăng nhập</b></td>
			<td>{{ $user->username }}</td>
		</tr>
		<tr>
			<td><b>Email đăng nhập</b></td>
			<td>{{ $user->email }}</td>
		</tr>
		<tr>
			<td><b>Mật khẩu</b></td>
			<td>{{ $user->password }}</td>
		</tr>
		<tr>
			<td class="text-center"><h2>Thông tin cá nhân</h2></td>
			<td></td>
		</tr>
		<tr>
			<td><b>Họ và tên</b></td>
			<td>{{ $user->yourname }}</td>
		</tr>
		<tr>
			<td><b>Số điện thoại</b></td>
			<td>{{ $user->phone }}</td>
		</tr>
		<tr>
			<td><b>Địa chỉ</b></td>
			<td>{{ $user->address }}</td>
		</tr>
		<tr>
			<td><b>Quyền Truy cập</b></td>
			<td>{{ $user->role->name }}</td>
		</tr>
	</table>
	<a href="{{ route('users.index') }}" class="run-back"><i class="fa fa-hand-o-left"> Quay lại</i></a>
</div>
@endsection