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
	<script type="text/javascript">
		$(document).ready(function() {
			$('.table').on('change', '#soluong', function() {
				html = '';
				var id = $(this).attr('data-id');
				var qtt = parseInt($('#qtt').val());
				var endqtt = $(this).attr('data-product');
				$.ajax({
					url: "{{route('orders.checkqtt')}}",
					type: 'get',
					dataType: 'json',
					data: {id: id},
				success: function(data) {
					console.log(data);
					if (qtt < 1 || qtt > data ) {
						alert("Số lượng không được nhỏ hơn 0 hoặc lơn hơn "+data);
						$('#qtt').val(endqtt);
					} else {
						$.each(cart, function(index, val) {
		 					if (val.id == id) {
		 						console.log('cong qtt len ' ,qtt);
		 						val.qtt += qtt;
		 						val.subtotal = val.qtt * val.price;
		 					}
						});
						console.log(cart);
						localStorage.setItem('cart', JSON.stringify(cart));
    					printorder(cart);
						}
						}
				})
			.done(function() {
		console.log("success");
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		console.log("complete");
	});
	
	console.log(qtt);
	
});
		});
	</script>

@endsection
