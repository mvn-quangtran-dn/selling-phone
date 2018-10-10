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
<h1>List Category</h1>
<a href="{{route('categories.create')}}" class="btn btn-primary">Create</a>
<table class="table table-light table-striped" style="width:100%">
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Edit</th>
    <th>Delete</th>
  </tr>
  @foreach($categories as $category)
  <tr>
    <td>{{$category->id}}</td>
    <td><a href="{{route('categories.show', $category->id)}}">{{$category->name}}</a></td>
    <td><a href="{{route('categories.edit', $category->id)}}" class="btn btn-warning">
      <i class="ace-icon fa fa-pencil bigger-120"></i></a> </td>
    <td>
      <button class="btn btn-danger" data-category={{ $category->id }} data-toggle="modal" data-target="#delete" 
        title="Xóa người dùng"><i class="fa fa-trash-o"></i></button>
    </td>
  </tr>
  @endforeach
</table>

  <div class="modal modal-danger fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Xóa người dùng</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
         <form action="{{route('categories.destroy', $category->id)}}" method="post">
        {{ csrf_field() }}
          <input type="hidden" name="_method" value="delete">
          <div class="modal-body">
            <p class="text-center">
            Bạn chắc chắn muốn xóa "Danh mục" này?
            </p>
              <input type="hidden" name="category->id" id="category->id" value="">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" data-dismiss="modal">Không, quay lại</button>
            <button type="submit" class="btn btn-warning">Có</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
