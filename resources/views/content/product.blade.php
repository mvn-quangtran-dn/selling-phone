@extends('layouts.frontend')
@section('content')
<div class="main">
    <div class="content">
        <div class="content_top">
            <div class="back-links">
                <p><a href="{{ route('home.index') }}">Home</a>/<a href="{{ route('home.product', $product->id) }}">Product</a></p>
            </div>
            <div class="clear"></div>
        </div>
        <div class="section group">
            <div class="cont-desc span_1_of_2">
                <div class="product-details">
                    <div class="grid images_3_of_2">
                        <div id="container">
                            <div id="products_example">
                                <div id="products">
                                    <div class="slides_container">
                                        @foreach($product->images as $image)
                                        <a href="#" target="_blank"><img src="{{url($image->name)}}" alt=" " /></a>
                                        @endforeach      
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="desc span_3_of_2">
                        <h2>{{$product->name}}</h2>
                        <p>{{$product->description}}</p>
                        <div class="price price-red">
                            <p>Price: <span>{{$product->price}}đ</span></p>
                        </div>
                        <div class="share-desc">
                            <!-- <div class="share">
                                <p>Share Product :</p>
                                <ul>
                                    <li><a href="#"><img src="images/facebook.png" alt="" /></a></li>
                                    <li><a href="#"><img src="images/twitter.png" alt="" /></a></li>
                                </ul>
                            </div> -->
                            <div class="button"><span><a href="#">Add to Cart</a></span></div>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>

                <div class="product_desc">
                  <div id="horizontalTab">
                      <ul class="resp-tabs-list">
                          <li>
                              @if(!(Auth::check())) 
                                <p>Bạn vui lòng đăng nhập để nhận xét sản phẩm này</p>
                                <a href="{{ route('users.login') }}">Login</a>
                                <a href="{{ route('users.register') }}">Register</a>
                              @endif
                          </li>
                          
                            @if (session('status'))
                                <div class="alert alert-info" style="color:red">{{session('status')}}</div>
                            @endif
                          <li><h3>Nhận xét {{ $product->name }}</h3></li>
                          <hr>
                              <div class="your-review">
                                  <form action="{{ route('comments.create') }}" method="post">
                                      {{ csrf_field() }}
                                      <input type="hidden" name="product_id" value="{{$product->id}}">
                                      @if(Auth::check())
                                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                      @endif
                                      <div>
                                          <span><label>Tiêu đề<span class="red">*</span></label></span>
                                          <span><input type="text" name="name" placeholder="Nhập tiêu đề ..."></span>
                                      </div>
                                      <div>
                                          <span><label>Nhận xét<span class="red">*</span></label></span>
                                          <span><textarea name="content"></textarea></span>
                                      </div>
                                      <div>
                                          <span><input type="submit" value="Gửi nhận xét"></span>
                                      </div>
                                  </form>
                              </div>
                              <hr><br>
                          <div class="clear"></div>
                      </ul>
                      <div class="resp-tabs-container">
                        <div class="review">
                          <h2>Khách hàng nhận xét</h2>
                            @foreach($comments as $comment)
                              <h4>Bởi:{{ $comment->user->username }}</h4>
                              <p>{{ $comment->content }}</p>
                            @endforeach 
                        </div>
                    </div>
                  </div>
                </div>
                <div class="content_bottom">
                    <div class="heading">
                        <h3>Sản phẩm tương tự</h3>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="section group">
                  @foreach($products as $product)
                    <div class="grid_1_of_4 images_1_of_4">
                      <a href="{{ route('home.product', $product->id) }}">
                        @foreach($product->images as $image)
                        <img src="{{url($image->name)}}" alt="product" height="150px" />
                        @endforeach
                      </a>
                      <h2>{{$product->name}}</h2>
                        <div class="price-details">
                           <div class="price-number">
                                <p><span class="rupees price-red">{{$product->price}}đ</span></p>
                            </div>
                                    <div class="add-cart" id="{{$product->id}}" data-name="{{$product->name}}" data-price="{{$product->price}}">                              
                                        <h4><a href="#">Add to Cart</a></h4>
                                     </div>
                                 <div class="clear"></div>
                        </div>
                         
                    </div>
                  @endforeach
              </div>
              {{ $products->links() }}
            </div>
            <div class="rightsidebar span_3_of_1">
                <h2>CATEGORIES</h2>
                <ul class="side-w3ls">
                    @foreach($categories as $category)
                    <li><a href="{{route('categories.showproduct', $category->id)}}">{{$category->name}}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="rightsidebar span_3_of_1">    
                <h2>Thông số kỹ thuật</h2>
                <ul class="side-w3ls thong-so">
                    <li>Màn hình: {{ $product->screen }}</li>
                    <li>Hệ điều hành: {{ $product->system }}</li>
                    <li>Camera sau: {{ $product->fcamera }}&nbsp;MP</li>
                    <li>Camera trước: {{ $product->bcamera }}&nbsp;MP</li>
                    <li>CPU: {{ $product->cpu }}</li>
                    <li>RAM: {{ $product->ram }}&nbsp;GB</li>
                    <li>Bộ nhớ trong: {{ $product->rom }}&nbsp;GB</li>
                    <li>Thẻ nhớ: {{ $product->smenory }}&nbsp;GB</li>
                    <li>Dung lượng pin: {{ $product->pin }}&nbsp;mAh</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection