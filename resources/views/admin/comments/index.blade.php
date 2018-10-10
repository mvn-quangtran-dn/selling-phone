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
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>#</th>
				<th>Tiêu đề</th>
				<th>Nội dung</th>
				<th>Tên sản phẩm</th>
				<th>Tên người dùng</th>
				<th>Trạng thái</th>
				<td>Action</td>
			</tr>
		</thead>
		@foreach($comments as $key => $comment)
			<tbody>
				<tr>
					<td>{{ ++$key }}</td>
					<td>{{ $comment->name }}</td>
					<td>{{ $comment->content }}</td>
					<td>{{ $comment->product->name }}</td>
					<td>{{ $comment->user->username }}</td>
					@if(($comment->active === NULL))
						<td>Đang chờ duyệt</td>
					@else
						<td>{{ $comment->active }}</td>
					@endif	 
					<td>
						<a href="" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i></a>
						<a href="" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i></i></a>
					</td>
				</tr>
			</tbody>
		@endforeach
	</table>
</div>	
@endsection