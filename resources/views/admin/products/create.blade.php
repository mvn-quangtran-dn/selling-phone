@extends('layouts.admin')
@section('content')
<div class="container">
  <h1>Create Product</h1>
  <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group">
      <label for="">Name</label>
      <input type="text" name="name" class="form-control" value="">
      @if($errors->has('name'))
        <p class="text-danger">{{$errors->first('name')}}</p>
      @endif
    </div>
    <div class="form-group">
      <label for="">CPU</label>
      <input type="text" name="cpu" class="form-control" value="">
      @if($errors->has('cpu'))
        <p class="text-danger">{{$errors->first('cpu')}}</p>
      @endif
    </div>
    <div class="form-group">
      <label for="">Màn Hình</label>
      <input type="text" name="screen" class="form-control" value="">
      @if($errors->has('screen'))
        <p class="text-danger">{{$errors->first('screen')}}</p>
      @endif
    </div>
    <div class="form-group">
      <label for="">Hệ điều hành</label>
      <input type="text" name="system" class="form-control" value="">
      @if($errors->has('system'))
        <p class="text-danger">{{$errors->first('system')}}</p>
      @endif
    </div>
    <div class="form-group">
      <label for="">Camera sau</label>
      <input type="text" name="bcamera" class="form-control" value="">
      @if($errors->has('bcamera'))
        <p class="text-danger">{{$errors->first('bcamera')}}</p>
      @endif
    </div>
    <div class="form-group">
      <label for="">Camera trước</label>
      <input type="text" name="fcamera" class="form-control" value="">
      @if($errors->has('fcamera'))
        <p class="text-danger">{{$errors->first('fcamera')}}</p>
      @endif
    </div>
    <div class="form-group">
      <label for="">Ram</label>
      <input type="text" name="ram" class="form-control" value="">
      @if($errors->has('ram'))
        <p class="text-danger">{{$errors->first('ram')}}</p>
      @endif
    </div>
    <div class="form-group">
      <label for="">Bộ nhớ trong</label>
      <input type="text" name="rom" class="form-control" value="">
      @if($errors->has('rom'))
        <p class="text-danger">{{$errors->first('rom')}}</p>
      @endif
    </div>
    <div class="form-group">
      <label for="">Thẻ nhớ ngoài</label>
      <input type="text" name="smemory" class="form-control" value="">
      @if($errors->has('smemory'))
        <p class="text-danger">{{$errors->first('smemory')}}</p>
      @endif
    </div>
    <div class="form-group">
      <label for="">Dung lượng pin</label>
      <input type="text" name="pin" class="form-control" value="">
      @if($errors->has('pin'))
        <p class="text-danger">{{$errors->first('pin')}}</p>
      @endif
    </div>
    <div class="form-group">
      <label for="">Số lượng</label>
      <input type="text" name="quantity" class="form-control" value="">
      @if($errors->has('quantity'))
        <p class="text-danger">{{$errors->first('quantity')}}</p>
      @endif
    </div>

    <div class="form-group">
      <label for="">Price</label>
      <input type="text" name="price" class="form-control" value="">
      @if($errors->has('price'))
        <p class="text-danger">{{$errors->first('price')}}</p>
      @endif
    </div>
    <div class="form-group">
      <label for="">Description</label>
      <input type="text" name="description" class="form-control" value="">
      @if($errors->has('description'))
        <p class="text-danger">{{$errors->first('description')}}</p>
      @endif
    </div>
    <div class="form-group">
      <label for="">Category</label>
      <select class="form-control" name="category_id">
        @foreach($categories as $category)
        <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
      </select>
      @if($errors->has('category_id'))
        <p class="text-danger">{{$errors->first('category_id')}}</p>
      @endif
    </div>
    <div class="form-group">
      <input type="file" name="images[]" multiple value="">
      @if($errors->has('image'))
        <p class="text-danger">{{$errors->first('image')}}</p>
      @endif
    </div>
    <input type="submit" value="Create" class="btn btn-primary">
  </form>
</div>
@endsection
