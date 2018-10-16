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
<div class="container">
<div class="app-title">
  <div>
    <h1><i class="fa fa-cube"></i>&nbsp;Quản lý thông tin sản phẩm</h1>
  </div>
  <ul class="app-breadcrumb breadcrumb">
    <li class="breadcrumb-item"><i class="fa fa-cube fa-lg"></i></li>
    <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Quản lý sản phẩm</a></li>
  </ul>
</div>
  <a href="{{route('products.create')}}" class="btn btn-primary">Create</a>
  <div class="bg-danger text-white" id="showerror">
    </div>
    <div class="timkiem">
      <input type="text" id="q">
      <button ><i class="fa fa-search btn btn-info" id="search"></i></button>
    </div>
  <table class="table table-light table-striped" id="timkiem" style="width:100%">
    <thead>
      <tr>
        <th>Hình ảnh</th>
        <th>Name</th>
        <th>Kho</th>
        <th>Giá</th>
        <th>Category</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
      
    </tbody>
    @foreach($products as $product)
    @endforeach
  </table>
</div>
<div class="modal modal-danger fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Xóa sản phẩm</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p class="text-center">
            Bạn chắc chắn muốn xóa người dùng này?
          </p>
              <input type="hidden" name="user_id" id="user_id" value="">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-success" data-dismiss="modal">Không, quay lại</button>
            <button type="submit" class="btn btn-warning" id="xoasanpham">Có</button>
        </div>
      </div>
    </div>
  </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="{{url('js/confirm/jquery-confirm.js')}}"></script>
<script type="text/javascript">
$(document).ready(function() {

  var token = $('meta[name="csrf-token"]').attr('content');
  //load ra màn hình tất cả sản phẩm
  load_products();
  //khi click vào search sẽ chạy ajax
  $('#search').click(function() {
    console.log('đả click');
    var query = $('#q').val();
    console.log(query);
    load_products(query);
  });
  //code ajax search
  function load_products(query = "") {
    console.log(query);
    $.ajax({
      url: "{{route('products.search')}}",
      type: 'GET',
      dataType: 'json',
      data: {query:query},
      success: function(result) {
        console.log(result);
        //display_product(result);
        $('tbody').html(result.table_product);
       }
    })
  }
  $('#timkiem').on('click','#delete0', function() {
      var product = $(this);
      var id = product.attr("data-id");
      $('#delete').modal('toggle');
      $('#xoasanpham').click(function() {
        console.log('da click vao xoa');
        console.log(id);
        $('#delete').modal('hide');
        $.ajax({
          url: "{{ route('products.remote') }}",
          type: 'get',
          dataType: 'json',
          data: {id:id},
          success: function(data) {
          console.log(data);
          alert(data);
          load_products();
        }
      })
          console.log("da xoa thanh cong");
        });
  });
});
</script>

@endsection