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
                        <div class="price">
                            <p>Price: <span>{{$product->price}}</span></p>
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
                                <p>Bạn vui lòng đăng nhập để nhận xét sản phẩm này</p>
                                <a href="{{ route('users.login') }}">Login</a>
                                <a href="{{ route('users.register') }}">Register</a>
                            </li>
                            
                            
                            <li><h3>Nhận xét {{$product->name}}</h3></li>
                            <hr>
                                <div class="your-review">
                                    <form action="" method="post">
                                        {{ csrf_field() }}
                                        <div>
                                            <span><label>Nhận xét<span class="red">*</span></label></span>
                                            <span><textarea> </textarea></span>
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
                                <h4>Bởi: <a href="#">Finibus Bonorum</a></h4>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- <script type="text/javascript">
                    $(document).ready(function() {
                        $('#horizontalTab').easyResponsiveTabs({
                            type: 'default', //Types: default, vertical, accordion           
                            width: 'auto', //auto or any width like 600px
                            fit: true // 100% fit in a container
                        });
                    });
                </script> -->
                <div class="content_bottom">
                    <div class="heading">
                        <h3>Related Products</h3>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="section group">
                    <div class="grid_1_of_4 images_1_of_4">
                        <a href="#"><img src="images/new-pic1.jpg" alt=""></a>
                        <div class="price" style="border:none">
                            <div class="add-cart" style="float:none">
                                <h4><a href="#">Add to Cart</a></h4>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="grid_1_of_4 images_1_of_4">
                        <a href="#"><img src="images/new-pic2.jpg" alt=""></a>
                        <div class="price" style="border:none">
                            <div class="add-cart" style="float:none">
                                <h4><a href="#">Add to Cart</a></h4>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="grid_1_of_4 images_1_of_4">
                        <a href="#"><img src="images/new-pic4.jpg" alt=""></a>
                        <div class="price" style="border:none">
                            <div class="add-cart" style="float:none">
                                <h4><a href="#">Add to Cart</a></h4>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="grid_1_of_4 images_1_of_4">
                        <img src="images/new-pic3.jpg" alt="">
                        <div class="price" style="border:none">
                            <div class="add-cart" style="float:none">
                                <h4><a href="#">Add to Cart</a></h4>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="rightsidebar span_3_of_1">
                <h2>CATEGORIES</h2>
                <ul class="side-w3ls">
                    @foreach($categories as $category)
                    <li><a href="{{route('categories.showproduct', $category->id)}}">{{$category->name}}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection