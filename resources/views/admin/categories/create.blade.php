@extends('layouts.admin')
@section('content')
<h1>Create Category</h1>
<form action="{{route('categories.store')}}" method="post">
  {{ csrf_field() }}
  <?php if ($errors->any()): ?>
      <div class="text-danger">
        <ul>
          <?php foreach ($errors->all() as $error): ?>
              <li>{{$error}}</li>
          <?php endforeach ?>
        </ul>
      </div>
  <?php endif ?>
  <div class="form-group">
    <label for="">Name *</label>
    <input type="text" name="name" class="form-control" value="{{ old('name') }}" autofocus>
  </div>
  <div class="form-group">
    <label for="">Parent *</label>
    <select class="form-control" name="parent_id">
      <option value="0">Menu</option>
      @foreach($categories as $category)
        <?php 
          $selected = "";
          if (old('parent_id') == $category->id) {
              $selected = "selected";    
          }
        ?>
      <option value="{{$category->id}}" {{$selected}}>{{$category->name}}</option>
      @endforeach
    </select>
  </div>
  <input type="submit" value="Create" class="btn btn-primary">
</form>
@endsection
