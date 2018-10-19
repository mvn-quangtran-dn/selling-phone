@extends('layouts.admin')
@section('content')
<div class="container">
  <h1>Edit Product</h1>
  <form action="{{route('products.update', $product->id)}}" method="post" enctype="multipart/form-data">
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
    <input type="hidden" name="_method" value="put">
    <input type="hidden" name="id" value="{{$product->id}}">
    <div class="form-group required">
      <label for="">Name</label>
      <input type="text" name="name" class="form-control" value="{{$product->name}}">
      @if($errors->has('name'))
        <p class="text-danger">{{$errors->first('name')}}</p>
      @endif
    </div>
    <div class="form-group required">
      <label for="">CPU</label>
      <input type="text" name="cpu" class="form-control" value="{{$product->cpu}}">
      @if($errors->has('cpu'))
        <p class="text-danger">{{$errors->first('cpu')}}</p>
      @endif
    </div>
    <div class="form-group required">
      <label for="">Màn Hình</label>
      <input type="text" name="screen" class="form-control" value="{{$product->screen}}">
      @if($errors->has('screen'))
        <p class="text-danger">{{$errors->first('screen')}}</p>
      @endif
    </div>
    <div class="form-group required">
      <label for="">Hệ điều hành</label>
      <input type="text" name="system" class="form-control" value="{{$product->system}}">
      @if($errors->has('system'))
        <p class="text-danger">{{$errors->first('system')}}</p>
      @endif
    </div>
    <div class="form-group required">
      <label for="">Camera sau</label>
      <input type="text" name="bcamera" class="form-control" value="{{$product->bcamera}}">
      @if($errors->has('bcamera'))
        <p class="text-danger">{{$errors->first('bcamera')}}</p>
      @endif
    </div>
    <div class="form-group required">
      <label for="">Camera trước</label>
      <input type="text" name="fcamera" class="form-control" value="{{$product->fcamera}}">
      @if($errors->has('fcamera'))
        <p class="text-danger">{{$errors->first('fcamera')}}</p>
      @endif
    </div>
    <div class="form-group required">
      <label for="">Ram</label>
      <input type="text" name="ram" class="form-control" value="{{$product->ram}}">
      @if($errors->has('ram'))
        <p class="text-danger">{{$errors->first('ram')}}</p>
      @endif
    </div>
    <div class="form-group required">
      <label for="">Bộ nhớ trong</label>
      <input type="text" name="rom" class="form-control" value="{{$product->rom}}">
      @if($errors->has('rom'))
        <p class="text-danger">{{$errors->first('rom')}}</p>
      @endif
    </div>
    <div class="form-group required">
      <label for="">Thẻ nhớ ngoài</label>
      <input type="text" name="smenory" class="form-control" value="{{$product->smenory}}">
      @if($errors->has('smenory'))
        <p class="text-danger">{{$errors->first('smenory')}}</p>
      @endif
    </div>
    <div class="form-group required">
      <label for="">Dung lượng pin</label>
      <input type="text" name="pin" class="form-control" value="{{$product->pin}}">
      @if($errors->has('pin'))
        <p class="text-danger">{{$errors->first('pin')}}</p>
      @endif
    </div>
    <div class="form-group required">
      <label for="">Số lượng</label>
      <input type="text" name="quantity" class="form-control" value="{{$product->quantity}}">
       @if($errors->has('quantity'))
        <p class="text-danger">{{$errors->first('quantity')}}</p>
      @endif
    </div>

    <div class="form-group required">
      <label for="">Price</label>
      <input type="text" name="price" class="form-control" value="{{$product->price}}">
      @if($errors->has('price'))
        <p class="text-danger">{{$errors->first('price')}}</p>
      @endif
    </div>
    <div class="form-group required">
      <label for="">Description</label>
      <input type="text" name="description" class="form-control" value="{{$product->description}}">
      @if($errors->has('description'))
        <p class="text-danger">{{$errors->first('description')}}</p>
      @endif
    </div>
    <div class="form-group required">
      <label for="">Category</label>
      <select class="form-control" name="category_id">
        @foreach($categories as $category)
          <?php
              $selected = '';
              if ($category->id == $product->category_id){
                  $selected = 'selected';
              }
          ?>
        <option value="{{$category->id}}" {{$selected}}>{{$category->name}}</option>
        @endforeach
      </select>
      @if($errors->has('category_id'))
        <p class="text-danger">{{$errors->first('category_id')}}</p>
      @endif
    </div>
    <div class="form-group">
      @foreach($images as $image)
        <img src="{{url($image->name)}}" alt="{{$product->name}}" width="150px" height="200px">
        <input type="file" name="images[]" multiple value="{{url($image->name)}}">
      @endforeach
      
      @if($errors->has('image'))
        <p class="text-danger">{{$errors->first('image')}}</p>
      @endif
    </div>
    <input type="submit" value="Edit" class="btn btn-primary">
  </form>
</div>
  {{$selected}}
@endsection
