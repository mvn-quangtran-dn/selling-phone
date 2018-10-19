@extends('layouts.frontend')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
@section('content')
<div class="main">
    <div class="content">
        <div class="content_top">
            <div class="back-links">
                <p><a href="{{ route('home.index') }}">Home</a>/<a href="{{ route('home.checkorder') }}">List Order</a></p>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>
	<h1>List Order:</h1>
	<hr>
	<table class="table table-bordered table-striped">
		<thead>
			<tr>
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
		<br>
		@if(Auth::check()) 
		<a href="{{route('users.cart', Auth::user()->id)}}" class="btn btn-info">Tiến hành thanh toán</a>
		@else
		Bạn cần phải đăng nhập thì mới thanh toán được đơn hàng
		@endif
	</div>
	<script type="text/javascript" src="{{ url('frontend/js/checkoutcart.js') }}"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('.table').on('change', '#soluong', function() {
				html = '';
				var id = $(this).attr('data-id');
				var qtt = parseInt($('#qtt').val());
				var endqtt = parseInt($(this).attr('data-product'));
				var totalqtt = qtt + endqtt;
				console.log(qtt);
				$.ajax({
					url: "{{route('orders.checkqtt')}}",
					type: 'get',
					dataType: 'json',
					data: {id: id},
				success: function(data) {
					console.log(data);
					if (totalqtt < 1 || totalqtt > data ) {
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
						localStorage.setItem('cart', JSON.stringify(cart));
    					printorder(cart);
						}
					}
				})
			});
		});
	</script>

@endsection
