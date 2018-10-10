@extends('layouts.admin')
@section('content')
<div class="app-title">
	<div>
	  <h1><i class="fa fa-comments-o"></i>&nbsp;Quản lý bình luận</h1>
	</div>
	<ul class="app-breadcrumb breadcrumb">
	  <li class="breadcrumb-item"><i class="fa fa-comments-o fa-lg"></i></li>
	  <li class="breadcrumb-item"><a href="{{ route('comments.index') }}">Quản lý bình luận</a></li>
	</ul>
</div>
<div class="container">	
	<div class="row">
        <div class="form-group col-md-2">
          <input class="form-control" type="text" name="search" id="search_comment" placeholder="Search ...">
        </div>
        <div class="col-md-10"></div>
    </div>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>ID</th>
				<th>Tiêu đề</th>
				<th>Tên sản phẩm</th>
				<th>Tên người dùng</th>
				<th>Trạng thái</th>
				<td>Hành động</td>
			</tr>
		</thead>
		@foreach($comments as $key => $comment)
			<tbody>
				<tr>
					@if (session('error'))
				        <div class="alert alert-danger">
					        {{session('error')}}
					    </div>
				    @endif
					<td>{{ $comment->id }}</td>
					<td>{{ $comment->name }}</td>
					<td>{{ $comment->product->name }}</td>
					<td>{{ $comment->user->username }}</td>
					@if(($comment->active === 1))
						<td><i class="fa fa-check btn btn-success" aria-hidden="true"></i></td>		
					@elseif(($comment->active === 2))
						<td><i class="fa fa-times btn btn-danger" aria-hidden="true"></i></td>
					@else
						<td>Đang chờ duyệt</td>	
					@endif 
					<td>
						<a href="{{ route('comments.show', $comment->id) }}" id="show" class="btn btn-info"><i class="fa fa-eye"></i></a>
						<a href="{{ route('comments.approve', $comment->id) }}" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i></a>
						<a href="{{ route('comments.remove', $comment->id) }}" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i></i></a>
					</td>
				</tr>
			</tbody>
		@endforeach
	</table>
	{{ $comments->links() }}
</div>	
@endsection