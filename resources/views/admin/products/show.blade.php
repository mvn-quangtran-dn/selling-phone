@extends('layouts.admin')
@section('content')
<div class="showProduct">
	<h1>Điện thoại {{$product->name}}</h1>
	<div class="images">
       @foreach($images as $image)
        <img src="{{ url($image->name) }}" alt="{{$product->name}}">
        @endforeach 
    </div>
    <h3>Cấu hình sản phẩm</h3>
    <div class="cauhinh">
    	<p><strong>Màn hình:</strong> {{$product->screen}} inch</p>
    	<p><strong>Hệ Điều Hành:</strong> {{$product->system}} inch</p>
    	<p><strong>Camera sau:</strong> {{$product->bcamera}} MB</p>
    	<p><strong>Camera trước:</strong> {{$product->fcamera}} MB</p>
    	<p><strong>CPU:</strong> {{$product->cpu}}</p>
    	<p><strong>RAM:</strong> {{$product->ram}} GB</p>
    	<p><strong>Bộ nhớ trong:</strong> {{$product->rom}} GB</p>
    	<p><strong>Thẻ nhớ:</strong> {{$product->smenory}} GB</p>
    	<p><strong>Dung lượng pin:</strong> {{$product->pin}} mAh</p>
    </div>
    <h3>Mô tả sản phẩm</h3>
    <div class="mota">
    	{{$product->description}}
    </div>
</div>
@endsection