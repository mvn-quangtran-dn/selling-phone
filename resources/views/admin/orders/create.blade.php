@extends('layouts.app')
@section('content')

    <div class="container">
        <h1>Add New Order</h1>
        <div class="row">
            <form action="{{route('orders.store')}}" method="post">
                {{ csrf_field() }}
                <div class="col-lg-8">
                    <div class="form-group">
                        <label for="">Tên Khách Hàng</label>
                        <select name="user_id" id="user" class="form-control">
                            @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Mã Khuyến mãi</label>
                        <select name="promotion_id" id="" class="form-control">
                            @foreach($promotions as $promotion)
                                <option value="{{$promotion->id}}">{{$promotion->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Order Status</label>
                        <select name="status_id" class="form-control">
                            <option value="">Status</option>
                            @foreach($statuses as $status)
                                <option value="{{$status->id}}">{{$status->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div id="product111111">
                        <div class="form-group">
                            <label for="">Sản Phẩm</label>
                            <select name="product_id" class="form-control">
                                <option value="">Chọn tên sản phẩm</option>
                                @foreach($products as $product)
                                    <option value="{{$product->id}}" id="product" data_id="{{$product->id}}"
                                            data_name="{{$product->name}}" data_price="{{$product->price}}">{{$product->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Số lượng</label>
                            <input type="text" name="quantity" id="qtt" class="form-control" value="1">
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <h3 class="text-center">Order Summary</h3>
                    <table class="table table-bordered" id="table_product">
                        <tr class="text-center">No Items Selected</tr>
                        <tr>
                            <td>Sub Total</td>
                            <td>0</td>
                        </tr>
                        <tr>
                            <td>Total</td>
                            <td>0</td>
                        </tr>
                    </table>
                    <input type="submit" value="Tạo Order" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
    <script type="text/javascript">
        var cart = [];
        var qtt = 0;
        $(document).ready(function () {

            //kiem tra order đả có trong sessionStorage hay chưa
           if (sessionStorage['order'] != null){
               cart = JSON.parse(sessionStorage['order'].toString());
           }
            displayOrder();
            //khi click vào id="product" thì sẽ tạo ra order
            $('#product').on("click", function () {
                var product = $(this);
                var qtt = parseInt($('#qtt').val());
                // alert(qtt);
                var id = product.attr("id");
                var name = product.attr("data_name");
                var price = parseInt(product.attr("data_price"));
                var total = price * qtt;
                var data = {
                    id: id,
                    name: name,
                    price: price,
                    qtt: qtt,
                    total: total
                };
                console.log(data);
                var exists = false;
                if (cart.length > 0) {
                    $.each(cart, function (index, value) {
                        // Nếu mặt hàng đã tồn tại trong giỏ hàng thì chỉ cần tăng số lượng mặt hàng đó trong giỏ hàng.
                        if (value.id == data.id){
                            value.qtt += qtt;
                            exists = true;
                            return false;
                        }
                    })
                }
                // Nếu mặt hàng chưa tồn tại trong giỏ hàng thì bổ sung vào mảng
                if (!exists)
                {
                    cart.push(data);
                }
                sessionStorage['order'] = JSON.stringify(cart);
                displayOrder();
                console.log(cart);
                });
                function displayOrder() {
                    if (sessionStorage['order'] != null) {
                        cart = JSON.parse(sessionStorage['order'].toString());
                        $.each(cart, function () {
                            var html =  "";
                            html += "<tr>" + data.name + "</tr>";
                            html += "<tr>";
                            html += "<td>" + "Sub total" + "</td>";
                            html += "<td>" + data.total + "</td>";
                            html += "</tr>";
                            html += "<tr>";
                            html += "<td>" + "Total" + "</td>";
                            html += "<td>" + data.total + "</td>";
                            html += "</tr>";

                            $("#product").append(html);
                        });
                    }
                }
            });

    </script>
@endsection