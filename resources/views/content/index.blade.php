@extends('layouts.frontend')
@section('content')
<div class="header_slide">
<div class="header_bottom_left">                
    <div class="categories">
      <ul>
        <h3>Categories</h3>
          @foreach($categories as $category)
          <li><a href="{{route('categories.showproduct', $category->id)}}">{{$category->name}}</a></li>
          @endforeach
      </ul>
    </div>                  
 </div>
         <div class="header_bottom_right">                   
             <div class="slider">                        
                <div id="slider">
                  <div id="mover">
                    <div id="slide-1" class="slide">                                
                       <div class="slider-img">
                           <a href="preview.html"><img src="{{ url('images/slides/sl1.jpg') }}" alt="learn more" /></a>         
                        </div>                      
                        <div class="clear"></div>             
                    </div>    
                        <div class="slide">
<!--                                             <div class="slider-text">
                             <h1>Clearance<br><span>SALE</span></h1>
                             <h2>UPTo 40% OFF</h2>
                           <div class="features_list">
                            <h4>Get to Know More About Our Memorable Services</h4>                                         
                            </div>
                             <a href="preview.html" class="button">Shop Now</a>
                           </div>  -->      
                             <div class="slider-img">
                             <a href="preview.html"><img src="{{ url('images/slides/sl2.jpg') }}" alt="learn more" /></a>
                          </div>                                                                         
                          <div class="clear"></div>             
                      </div>
                      <div class="slide">                                     
                          <div class="slider-img">
                             <a href="preview.html"><img src="{{ url('images/slides/sl3.jpg') }}" alt="learn more" /></a>
                          </div>
                          <!-- <div class="slider-text">
                             <h1>Clearance<br><span>SALE</span></h1>
                             <h2>UPTo 10% OFF</h2>
                           <div class="features_list">
                            <h4>Get to Know More About Our Memorable Services Lorem Ipsum is simply dummy text</h4>                                        
                            </div>
                             <a href="preview.html" class="button">Shop Now</a>
                           </div>    -->
                          <div class="clear"></div>             
                      </div>                                                
                 </div>     
            </div>
         <div class="clear"></div>                         
     </div>
  </div>
<div class="clear"></div>
</div>
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
          
          
          <li><h3>Nhận xét Samsung Galaxy J6+</h3></li>
          <hr>
              <div class="your-review">
                  <form action="{{ route('comments.create') }}" method="post">
                      {{ csrf_field() }}
                      <input type="hidden" name="product_id" value="1">
                      <input type="hidden" name="user_id" value="5">
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
              <hr>
          <div class="clear"></div>
      </ul>
      <div class="resp-tabs-container">
          <div class="review">
              <h2>Khách hàng nhận xét</h2>
              <hr>
              @foreach($comments as $comment)
                <h4>Bởi:{{ $comment->user->username }}</h4>
                <p>{{ $comment->content }}</p>
                <hr>
              @endforeach  
          </div>
      </div>
  </div>
</div>
<div class="main">
<div class="content">

  <div class="content_top">
      <div class="heading">
      <h3>Điện thoại mới</h3>
      </div>
      <div class="see">
          <p><a href="#">Xem tất cả</a></p>
      </div>
      <div class="clear"></div>
  </div>

<div class="content_top">
    <div class="heading">
    <h3>Điện thoại mới</h3>
    </div>
    <div class="see">
        <p><a href="{{ route('home.showAllProduct') }}">Xem tất cả</a></p>
    </div>
    <div class="clear"></div>
</div>

  <div class="section group">
    @foreach($new_products as $product)
        <div class="grid_1_of_4 images_1_of_4">
          <a href="{{ route('home.product', $product->id) }}">
            @foreach($product->images as $image)
            <img src="{{url($image->name)}}" alt="" height="200px" />
            @endforeach
          </a>
          <h2>{{$product->name}}</h2>
            <div class="price-details">
               <div class="price-number">
                    <p><span class="rupees">{{$product->price}}</span></p>
                </div>
                        <div class="add-cart" id="{{$product->id}}">                              
                            <h4><a href="preview.html">Add to Cart</a></h4>
                         </div>
                     <div class="clear"></div>
            </div>
             
        </div>
    @endforeach
  </div>
    <div class="content_bottom">
      <div class="heading">
      <h3>Điện thoại nổi bật</h3>
      </div>
      <div class="see">
          <p><a href="#">Xem tất cả</a></p>
      </div>
      <div class="clear"></div>
  </div>
    <div class="section group">
        <div class="grid_1_of_4 images_1_of_4">
             <a href="preview.html"><img src="frontend/images/new-pic1.jpg" alt="" /></a>                    
             <h2>Lorem Ipsum is simply </h2>
            <div class="price-details">
               <div class="price-number">
                    <p><span class="rupees">$849.99</span></p>
                </div>
                        <div class="add-cart">                              
                            <h4><a href="preview.html">Add to Cart</a></h4>
                         </div>
                     <div class="clear"></div>
            </div>
        </div>
        <div class="grid_1_of_4 images_1_of_4">
            <a href="preview.html"><img src="frontend/images/new-pic2.jpg" alt="" /></a>
             <h2>Lorem Ipsum is simply </h2>
             <div class="price-details">
               <div class="price-number">
                    <p><span class="rupees">$599.99</span></p>
                </div>
                        <div class="add-cart">                              
                            <h4><a href="preview.html">Add to Cart</a></h4>
                         </div>
                     <div class="clear"></div>
            </div>
        </div>
        <div class="grid_1_of_4 images_1_of_4">
            <a href="preview.html"><img src="frontend/images/new-pic4.jpg" alt="" /></a>
             <h2>Lorem Ipsum is simply </h2>
            <div class="price-details">
               <div class="price-number">
                    <p><span class="rupees">$799.99</span></p>
                </div>
                        <div class="add-cart">                              
                            <h4><a href="preview.html">Add to Cart</a></h4>
                         </div>
                     <div class="clear"></div>
            </div>
        </div>
        <div class="grid_1_of_4 images_1_of_4">
         <a href="preview.html"><img src="frontend/images/new-pic3.jpg" alt="" /></a>
             <h2>Lorem Ipsum is simply </h2>                     
             <div class="price-details">
               <div class="price-number">
                    <p><span class="rupees">$899.99</span></p>
                </div>
                        <div class="add-cart">                              
                            <h4><a href="preview.html">Add to Cart</a></h4>
                         </div>
                     <div class="clear"></div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<div class="footer">
<div class="wrap">    
 <div class="section group">
        <div class="col_1_of_4 span_1_of_4">
                <h4>Information</h4>
                <ul>
                <li><a href="about.html">About Us</a></li>
                <li><a href="contact.html">Customer Service</a></li>
                <li><a href="#">Advanced Search</a></li>
                <li><a href="delivery.html">Orders and Returns</a></li>
                <li><a href="contact.html">Contact Us</a></li>
                </ul>
            </div>
        <div class="col_1_of_4 span_1_of_4">
            <h4>Why buy from us</h4>
                <ul>
                <li><a href="about.html">About Us</a></li>
                <li><a href="contact.html">Customer Service</a></li>
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="contact.html">Site Map</a></li>
                <li><a href="#">Search Terms</a></li>
                </ul>
        </div>
        <div class="col_1_of_4 span_1_of_4">
            <h4>My account</h4>
                <ul>
                    <li><a href="contact.html">Sign In</a></li>
                    <li><a href="index.html">View Cart</a></li>
                    <li><a href="#">My Wishlist</a></li>
                    <li><a href="#">Track My Order</a></li>
                    <li><a href="contact.html">Help</a></li>
                </ul>
        </div>
        <div class="col_1_of_4 span_1_of_4">
            <h4>Contact</h4>
                <ul>
                    <li><span>+91-123-456789</span></li>
                    <li><span>+00-123-000000</span></li>
                </ul>
                <div class="social-icons">
                    <h4>Follow Us</h4>
                      <ul>
                          <li><a href="#" target="_blank"><img src="frontend/images/facebook.png" alt="" /></a></li>
                          <li><a href="#" target="_blank"><img src="frontend/images/twitter.png" alt="" /></a></li>
                          <li><a href="#" target="_blank"><img src="frontend/images/skype.png" alt="" /> </a></li>
                          <li><a href="#" target="_blank"> <img src="frontend/images/dribbble.png" alt="" /></a></li>
                          <li><a href="#" target="_blank"> <img src="frontend/images/linkedin.png" alt="" /></a></li>
                          <div class="clear"></div>
                     </ul>
                </div>
        </div>
    </div>          
</div>
@endsection