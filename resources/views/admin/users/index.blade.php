@extends('layouts.admin')
@section('content')
<div class="app-title">
	<div>
	  <h1><i class="fa fa-user"></i>&nbsp;Quản lý thông tin người dùng</h1>
	</div>
	<ul class="app-breadcrumb breadcrumb">
	  <li class="breadcrumb-item"><i class="fa fa-user fa-lg"></i></li>
	  <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Quản lý người dùng</a></li>
	</ul>
	</div>
<div class="container">	
	@if (session('status'))
        <div class="alert alert-info">{{session('status')}}</div>
    @endif
    <div class="">
      <div class="tile">
        <div class="tile-body">
			<div class="row">
				<div class="col-md-4">
					<a href="{{ route('users.create') }}" class="btn btn-xs btn-info" title="Xem thông tin"><i class="ace-icon fa fa-user-plus bigger-120">&nbsp; &nbsp;Thêm người dùng</i></a>
					<a href="{{ route('users.index'	) }}" class="btn btn-success"><i class="fa fa-refresh" aria-hidden="true"></i>&nbsp; &nbsp;Refresh</a>
				</div>
				<div class="col-md-4"></div>
				<div class="col-md-4">
						<div class="row">
				            <div class="form-group col-md-12">
				              <input class="form-control" type="text" name="search" id="search_user" placeholder="Search ...">
				            </div>
			            </div>
			        </form>
				</div>
			</div>
	        
        </div>
      </div>
    </div>
	<table class="table table-light table-striped">
		<thead>
			<tr>
				<th>#</th>
				<th>UserName</th>
				<th>Email</th>
				<th>Role</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($users as $key => $user)
				<tr>
					<td>{{ ++$key }}</td>
					<td>{{ $user->username }}</td>
					<td>{{ $user->email }}</td>
					<td>{{ $user->role->name }}</td>
					<td class="hidden-sm hidden-xs btn-group">
						<a href="{{ route('users.show', $user) }}" class="btn btn-xs btn-success" title="Xem thông tin"><i class="ace-icon fa fa-eye bigger-120"></i></a>
						
				        <a href="{{ route('users.edit', $user) }}" class="btn btn-xs btn-info" title="Chỉnh sửa thông tin"><i class="ace-icon fa fa-pencil bigger-120"></i></a>
				        
						<button class="btn btn-danger" data-userid={{ $user->id }} data-toggle="modal" data-target="#delete" title="Xóa người dùng"><i class="fa fa-trash-o"></i></button>
					</td> 
				</tr>
				
			@endforeach	

		</tbody>
	</table>
	{{ $users->links() }}
	<!-- Button trigger modal -->
	<!-- Modal -->
	<div class="modal modal-danger fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Xóa người dùng</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <form action="{{route('users.destroy','test')}}" method="post">
	      		{{method_field('delete')}}
	      		{{csrf_field()}}
		      <div class="modal-body">
					<p class="text-center">
						Bạn chắc chắn muốn xóa người dùng này?
					</p>
		      		<input type="hidden" name="user_id" id="user_id" value="">
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