@extends('layouts.admin')
@section('content')
<table class="table">
	<thead>
		<tr>
			<th>ID</th>
			<th>Tiêu đề</th>
			<th>Nội dung</th>
			<th>Sản phẩm</th>
			<th>Người dùng</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>{{ $comment->id }}</td>
			<td>{{ $comment->name }}</td>
			<td>{{ $comment->content }}</td>
			<td>{{ $comment->product->name }}</td>
			<td>{{ $comment->user->username }}</td>
		</tr>
	</tbody>
</table>
@endsection