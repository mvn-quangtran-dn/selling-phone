@extends('layouts.frontend')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
@section('content')
	<div class="container">
		<div id="title">
			<h1>Kiểm tra thông tin</h1>
			<p>Vui lòng nhập thông tin cá nhân và thông tin thanh toán của bạn để thanh toán.</p>
		</div>
		<form action="{{route('home.orderdetail')}}" method="post" id="formcheckout">
			{{ csrf_field() }}
			<div id="infouser">
				<div id="subheading">
					<span>Thông tin khách hàng</span>
				</div>
				<div class="row">
					<input type="hidden" name="user_id" value="{{$user->id}}">
					<div class="col-sm-6 form-group">
						<input type="text" name="yourname" value="{{$user->yourname}}" class="form-control">
					</div>
					<div class="col-sm-6 form-group">
						<input type="email" name="email" value="{{$user->email}}" class="form-control">
					</div>				
					<div class="col-sm-6 form-group">
						<input type="phone" name="phone" value="{{$user->phone}}" class="form-control">
					</div>
					<div class="col-sm-6 form-group">
						<input type="text" name="address" value="{{$user->address}}" class="form-control">
					</div>
				</div>
			</div>
			<div id="paymentdetail">
				<div id="subheading">
					<span>Thông tin giỏ hàng</span>
				</div>
				<div id="table">
					<table class="table table-bordered table-striped">
						<thead>
							<th>Tên Sản Phẩm</th>
							<th>Số lượng</th>
							<th>Giá</th>
						</thead>
						<tbody>
							
						</tbody>
					</table>
					<div id="error_order_detail">
						
					</div>
				</div>
				<div id="payment" >
					<span class="text-danger">Total: </span>
					<span id="totalcheckout"></span>
					<sup> đ</sup>
					<input type="hidden" name="total" id="totaldetail" value="">
				</div>
			</div>
			<div class="text-center">
				<input type="submit" value="Đồng ý đặt hàng" class="btn btn-primary" id="submit">
			</div>			
		</form>
	</div>
<script type="text/javascript" src="{{ url('frontend/js/orderdetail.js') }}"></script>
@endsection
