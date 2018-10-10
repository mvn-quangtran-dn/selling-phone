@extends('layouts.admin')
@section('content')
@if(session("success"))
  <div class="success">
      <p class="text-success">{{session("success")}}</p>
  </div>
@elseif(session("fails"))
  <div class="fails">
      {{session("fails")}}
  </div>
@endif
<h1>List Category</h1>
<a id="create" class="btn btn-info">Create</a>
<div class="searchForm">
  <input type="search" name="q" {{ old('q') }} id="q" autofocus>  
</div>
<div class="bg-danger text-white" id="showerror">
  
</div>
<input type="hidden" id="cid" name="cid" value="{{$category->id}}">
<table class="table table-light table-striped" id="category" style="width:100%">
  <thead>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>
  
  </tbody>
</table>
<!-- Modal tao -->
<div id="modalcreate" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thêm danh mục</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" id="category_form" >
        <div class="modal-body">
          <div id="errorms">
            
          </div>
          <div class="form-group">
            <label>Tên danh mục</label>
            <input type="text" name="name" id="name" class="form-control">
          </div>
          <div class="form-group">
            <select id="parent" name="parent_id" class="form-control">
              
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <input type="hidden" name="button_action" id="button_action" value="create">
          <input type="hidden" name="id" id="category_id" value="">
          <input type="submit" class="btn btn-primary" id="action" value="create">
          <button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    var token = $('meta[name="csrf-token"]').attr('content');
    search();
    //khi search sẽ làm
    function search(name = "") {
      var cid = $('#cid').val();
      console.log(cid);
      $.ajax({
          url: "{{route('categories.search')}}",
          type: 'get',
          dataType:'json',
          data:{query:name,cid:cid},
          success: function(result){
            console.log(result);
            $('tbody').html(result.table_data);
            console.log(result.categories);
            display_select(result.categories, "");
          },
        })
    }
    
    // Khi keyup sẽ thực hiện chạy ajax search
    $("#q").on('keyup', function(event) {
      event.preventDefault();
      console.log('da click');
      var query = $(this).val();
      console.log(query);
      search(query);
    });
    //khi click vao id=category để xóa danh muc
    $('#category').on('click', 'button', function() {
        var id = $(this).attr('data-id');
        if (confirm("Bạn có chắc chắn muốn xóa danh mục này") == true) {
          console.log('đã đến');
          $.ajax({
            url: "{{route('categories.remote')}}",
            type: 'get',
            dataType: 'json',
            data: {id: id},
            success: function(data) {
              alert(data);
              search();
             }
          })
        }         
    });
    //in ra man hinh 1 select khi tạo danh mục
    function display_select(data, cid = "") {
      var html = '';
      
      $.each(data, function(index, value) {
        var sl = '';
        if(value.id == cid) {
          sl = "selected";
        }
        console.log(sl);
        html +=
          "<option value=\""+value.id+"\" "+sl+">"+value.name+'</option>';
      });
          $('#parent').html(html);
    }
    //Khi click vao id=create để hiện popup 
    $('#create').on('click', function(event) {
      $('#modalcreate').modal('show');
      $('#category_form')[0].reset();
      $('#errorms').html('');
      $('#button_action').val('create');
      $('#action').val('create');
    });
    $('#category_form').on('submit', function(event) {
      event.preventDefault();
      /* Act on the event */
      console.log('da submit')
      var form_data = $(this).serialize(); //lấy giá trị của form
      console.log(form_data);
      //xử lý ajax
      $.ajax({
        url: "{{ route('categories.createpost') }}",
        type: 'post',
        dataType: 'json',
        data: form_data,
        success: function(data) {
          console.log(data.update);
            if (data.errors.length > 0) {
              var error_html = '';
              error_html += '<div class="alert alert-danger">'+data.errors+'</div>';
              $('#errorms').html(error_html);
            } else {
              $('#errorms').html(data.success);
              $('#category_form')[0].reset();
              $('#action').val('create');
              search(); 
            }       
        }
      })
    });
    // Khi click vào class update thi hiện ra khung popup update
    $(document).on('click', '.update', function(event) {
        event.preventDefault();
        var id = $(this).attr('id');
        $('#errorms').html('');
        $.ajax({
          url: "{{ route('categories.printfe') }}",
          type: 'get',
          dataType: 'json',
          data: {id: id},
          success:function(data) {
            console.log(data.parent_id);
            $('#name').val(data.name);
            $('#modalcreate').modal('show');
            display_select(data.categories, data.parent_id);
            $('#category_id').val(data.cid);
            $('#button_action').val('update');
            $('.modal-title').text('Sửa danh mục'); // đổi tên popup create thành edit
            $('#action').val('Edit'); // đổi tên button create thanh edit
          }
        })    
    });
    // click vào đê phân trang
    $(document).on('click', '.pagination a', function(event) {
      event.preventDefault();
      var page = $(this).attr('href').split('page=')[1];
      console.log(page);
      phantrang(page);
    });
    // ajax phan trang
    function phantrang(page) {
      $.ajax({
        url: "{{ route('categories.phantrang') }}",
        type: 'get',
        dataType: 'json',
        data: {page: page},
        success: function(data) {
          console.log(data.data);
          print_screen(data.data);
        }
      })      
    }
    function print_screen(data) {
      var html = '';
      $.each(data, function(index, value) {
        html += 
          '<tr>'
            + '<td>' + value.id + '</td>'
            + '<td>' + value.name + '</td>'
            + '<td>' + "<a href=\""+value.id+"/edit"+"\" class='update' id=\""+value.id+"\">"+'<i class="ace-icon fa fa-pencil bigger-120"></i>'+'</a>'+'</td>'
            + '<td>'+"<button class=\"btn btn-danger\" data-id=\""+value.id+"\" id=\"remote"+value.id+"\" title=\"Xóa sản phẩm\">"+'<i class="fa fa-trash-o">'+'</i>'+'</button>'+'</td>'
          +'</tr>';
      });
      $('tbody').html(html);
    }
  });
</script>
@endsection
