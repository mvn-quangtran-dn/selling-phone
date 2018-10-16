@extends('layouts.frontend')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
@section('content')
	<h1>List Order</h1>
	<table class="table table-bordered table-striped">
		<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Price</th>
				<th>Số lượng</th>
				<th>Sub Total</th>
				<th>Remove</th>
			</tr>
		</thead>
		<tbody>
			
		</tbody>
	</table>
	<div>
		<span class="text-danger">Total: </span>
		<span id="totalcheckout"></span>
	</div>
	
	<div id="orderError">
		
	</div>
	<div id="checkout">
		<a href="{{route('users.cart')}}" class="btn btn-info">Tiến hành thanh toán</a>
	</div>
	<script type="text/javascript" src="{{ url('frontend/js/checkoutcart.js') }}"></script>

@endsection
