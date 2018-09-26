@extends('layouts.admin')

@section('content')
<div class="container">
  <h1>List Product</h1>
  <table class="table" style="width:100%">
    <tr>
      <th>Name</th>
      <th>Mã sản phẩm</th>
      <th>Kho</th>
      <th>Giá</th>
      <th>Category</th>
      <th>Ngày tạo</th>
    </tr>
    @foreach($products as $product)
    <tr id="product{{$product->id}}">
      <td><a href="{{route('products.edit', $product->id)}}">{{$product->name}}</a>
        <div class="product-hidden" id="showid">
          <span>ID {{$product->id}}</span>
          <span><a href="{{route('products.edit', $product->id)}}">Chỉnh sửa</a></span>
          <span>
            <form action="{{route('products.destroy', $product->id)}}" method="post">
              {{ csrf_field() }}
              <input type="hidden" name="_method" value="delete">
              <input type="submit" class="text-danger" value="Delete">
            </form>
          </span>
        </div>
      </td>
      <td>{{$product->code_product}}</td>
      <td>{{$product->quantity}}</td>
      <td>{{$product->price}}</td>
      <td>{{$product->category_id}}</td>
      <td>{{$product->created_at}}</td>
    </tr>
      <script src="{{ url('js/jquery-3.2.1.min.js') }}"></script>
      <script type="text/javascript">
        $(document).ready(function() {
          $("#product{{$product->id}}").hover(function() {
            $("#showid").show();
          });
        });
      </script>
    @endforeach
  </table>
  <a href="{{route('products.create')}}" class="btn btn-primary">Create</a>
</div>
@endsection
