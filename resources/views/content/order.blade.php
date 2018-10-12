@extends('layouts.frontend')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
@section('content')
	<h1>List Order</h1>
	<table class="table table-bordered table-striped">
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Price</th>
			<th>Số lượng</th>
			<th>Remove</th>
		</tr>
		@foreach($cart as $item)
		<tr>
			<td>{{$item->id}}</td>
			<td>{{$item->name}}</td>
			<td>{{$item->price}}</td>
			<td>{{$item->qty}}</td>
			<td><a href="{{route('home.remove')}}" class="btn btn-default">Remove</a></td>
		</tr>
		@endforeach
	</table>
@endsection