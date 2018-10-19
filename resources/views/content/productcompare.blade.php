@extends('layouts.frontend')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
@section('content')
<div class="main">
    <div class="content">
        <div class="content_top">
            <div class="back-links">
                <p><a href="{{ route('home.index') }}">Home</a>/<a href="{{ route('home.product', $product->id) }}">Product</a></p>
            </div>
            <div class="clear"></div>
        </div>
        <div class="content_product">
          <h2 class="sosanh">So sánh điện thoại {{$product->name}} và điện thoại {{$product2->name}}</h2>
        </div>
        <div class="section group">
          <div class="images container">
            <div class="row">
              <div class="col-6">
                <div id="products_example">
                  <div id="products" class="border_image">
                    <div class="slides_container">
                      @foreach($product->images as $image)
                      <a href="#" target="_blank"><img src="{{url($image->name)}}" alt="{{$product->name}}" height="300px" /></a>
                      @endforeach      
                    </div>
                    <div class="price price-red">
                      <h3>Điện thoại {{$product->name}}</h3>
                      <p>Giá: <span>{!!number_format($product->price,0,",",".") . 'đ'!!}</span> </p>
                    </div>
                    <div class="add-cart" id="{{$product->id}}" data-name="{{$product->name}}" data-price="{{$product->price}}">                              
                      <h4><a href="#">Add to Cart</a></h4>
                    </div>
                  </div>
                </div>
              </div> 
              <div class="col-6">
                <div id="products_example">
                  <div id="products">
                    <div class="slides_container">
                      @foreach($product2->images as $image)
                      <a href="#" target="_blank"><img src="{{url($image->name)}}" alt="{{$product->name}}" height="300px"/></a>
                      @endforeach      
                    </div>
                    <div class="price price-red">
                      <h3>Điện thoại {{$product2->name}}</h3>
                      <p>Giá: <span>{!!number_format($product2->price,0,",",".") . 'đ'!!}</span> </p>
                    </div>
                    <div class="add-cart" id="{{$product->id}}" data-name="{{$product->name}}" data-price="{{$product->price}}">                              
                      <h4><a href="#">Add to Cart</a></h4>
                    </div>
                  </div>
                </div>
              </div>  
            </div>
          </div>
          <div class="row" id="config">
              <div class="col-12">
              <h2 class="compare-table-title">Cấu hình sản phẩm</h2>
                <div class="desc config" >
                  <ul class="parameter">
                    <li>
                      <span>Màn Hình:</span>
                      <div>{{$product->screen}}</div>
                      <div>{{$product2->screen}}</div>
                    </li>
                    <li>
                      <span>Hệ điều hành:</span>
                      <div>{{$product->system}}</div>
                      <div>{{$product2->system}}</div>
                    </li>
                    <li>
                      <span>Camera sau:</span>
                      <div>{{$product->bcamera}} MB</div>
                      <div>{{$product2->bcamera}} MB</div>
                    </li>
                    <li>
                      <span>Camera trước:</span>
                      <div>{{$product->fcamera}} MB</div>
                      <div>{{$product2->fcamera}} MB</div>
                    </li>
                    <li>
                      <span>CPU:</span>
                      <div>{{$product->cpu}}</div>
                      <div>{{$product2->cpu}}</div>
                    </li>
                    <li>
                      <span>Ram:</span>
                      <div>{{$product->ram}} GB</div>
                      <div>{{$product2->ram}} GB</div>
                    </li>
                    <li>
                      <span>Bộ nhớ trong:</span>
                      <div>{{$product->rom}} GB</div>
                      <div>{{$product2->rom}} GB</div>
                    </li>
                    <li>
                      <span>Thẻ nhớ:</span>
                      <div>Hỗ trợ tối đa {{$product->smenory}} GB</div>
                      <div>Hỗ trợ tối đa {{$product2->smenory}} GB</div>
                    </li>
                    <li>
                      <span>Pin:</span>
                      <div>{{$product->pin}} mAh</div>
                      <div>{{$product2->pin}} mAh</div>
                    </li>
                  </ul>
                  <hr>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection