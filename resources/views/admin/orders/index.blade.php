@extends('layouts.admin')
@section('content')

@if(session("success"))
<div class="success">
    <p class="bg-success text-white">{{session("success")}}</p>
</div>
@elseif(session("fails"))
<div class="fails">
    <p class="bg-danger text-white">{{session("fails")}}</p> 
</div>
@endif
<h1 class="text-info">List Orders</h1>
<a href="{{route('orders.create')}}" class="btn btn-primary">Create Order</a>
<table class="table">
    <tr>
        <th>ID</th>
        <th>Tên Khách Hàng</th>
        <th>Total</th>
        <th>Payment Status</th>
        <th>Status</th>
        <th>Action</th>
        <th>Delete</th>
    </tr>
    @foreach($orders as $order)
        <tr>
            <td><a href="{{route('orders.edit', $order->id)}}">{{$order->id}}</a></td>
            <td>{{$order->user['yourname']}}</td>
            <td>{{$order->total}}</td>
            <td>{{$order->paymentstatus['name']}}</td>
            <td>{{$order->status['name']}}</td>
            <td><?php if ($order->payment_id != 1): ?>
                    <a href="{{route('orders.payment',$order->id)}}"class="btn btn-info">Active Payment</a>
                <?php endif ?>
                <?php if ($order->status_id != 1): ?>
                    <a href="{{route('orders.active',$order->id)}}"class="btn btn-success">Active Status</a></td><?php endif ?>                
            <td><button class="btn btn-danger" data-id="{{$order->id}}" title="Xóa người dùng"><i class="fa fa-trash-o"></i></button>
            </td>
        </tr>
    @endforeach
</table>
<div class="modal modal-danger fade" id="delete" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Xóa Đơn Hàng</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="{{route('orders.destroy', 'test')}}" method="post">
                {{method_field('delete')}}
                {{csrf_field()}}
              <div class="modal-body">
                    <p class="text-center">
                        Bạn chắc chắn muốn xóa đơn hàng này?
                    </p>
                    <input type="hidden" name="id" id="order_id" value="">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Không, quay lại</button>
                <input type="submit" value="Có" class="btn btn-danger">
              </div>
          </form>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('button').on('click' ,function(event) {
            event.preventDefault();
            var id = $(this).attr('data-id');
            console.log(id);
            $('#delete').modal('show');
            $('#order_id').val(id);
        });
    });
</script>
@endsection
