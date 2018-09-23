@extends('layouts.admin')
@section('content')
    <h1 class="text-info">List Orders</h1>
    <table class="table">
        <tr>
            <th>ID</th>
            <th>Date</th>
            <th>Tên Khách Hàng</th>
            <th>Total</th>
            <th>Payment Status</th>
            <th>Status</th>
        </tr>
        @foreach($orders as $order)
            <tr>
                <td>{{$order->id}}</td>
                <td>{{$order->created_at}}</td>
                <td>{{$order->user['name']}}</td>
                <td>{{$order->total}}</td>
                <td>{{$order->paymentstatus['name']}}</td>
                <td>{{$order->status['name']}}</td>
            </tr>
        @endforeach
    </table>
    <a href="{{route('orders.create')}}" class="btn btn-primary">Create Order</a>
@endsection