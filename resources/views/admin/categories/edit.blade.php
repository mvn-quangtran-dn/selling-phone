@extends('layouts.admin')
@section('content')
<h1>Edit Category</h1>
<form action="{{route('categories.update', $category->id)}}" method="post">
  {{ csrf_field() }}
  <input type="hidden" name="_method" value="put">
  <div class="form-group">
    <label for="">Name</label>
    <input type="text" name="name" class="form-control" value="{{$category->name}}">
  </div>
  <div class="form-group">
    <label for="">Parent</label>
    <select class="form-control" name="parent_id">
      <option value="0">Menu</option>
      @foreach($categories as $category)
      <option value="{{$category->id}}">{{$category->name}}</option>
      @endforeach
    </select>
  </div>
  <input type="submit" value="Edit" class="btn btn-primary">
</form>
@endsection
