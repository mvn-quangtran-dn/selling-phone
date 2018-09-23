@extends('layouts.admin')
@section('content')
<h1>List Category</h1>
<table class="table" style="width:100%">
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Parent</th>
    <th>Edit</th>
    <th>Delete</th>
  </tr>
  @foreach($categories as $category)
  <tr>
    <td>{{$category->id}}</td>
    <td>{{$category->name}}</td>
    <td>{{$category->parent_id}}</td>
    <td><a href="{{route('categories.edit', $category->id)}}" class="btn btn-warning">Edit</a> </td>
    <td>
      <form action="{{route('categories.destroy', $category->id)}}" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="delete">
        <input type="submit" class="btn btn-danger" value="Delete">
      </form>
    </td>
  </tr>
  @endforeach
</table>
<a href="{{route('categories.create')}}" class="btn btn-primary">Create</a>
@endsection
