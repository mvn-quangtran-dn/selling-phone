<!DOCTYPE html>
<head>
    <title>Selling Phone</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="{{ url('frontend/css/style.css') }}" rel="stylesheet" type="text/css" media="all"/>
    <link href="{{ url('frontend/css/slider.css') }}" rel="stylesheet" type="text/css" media="all"/>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script> -->
    <!-- <script type="text/javascript" src="{{ url('frontend/js/jquery-1.7.2.min.js') }}"></script>  -->
    <script type="text/javascript" src="{{ url('frontend/js/move-top.js') }}"></script>
    <script type="text/javascript" src="{{ url('frontend/js/easing.js') }}"></script>
    <script type="text/javascript" src="{{ url('frontend/js/startstop-slider.js') }}"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="wrap">
    <div class="header">
        <div class="headertop_desc">
            <div class="call">
                 <p><span>Need help?</span> call us <span class="number">01687-586-213</span></span></p>
            </div>
            <div class="account_desc">
                <ul>
                    @if(Auth::check()) 
                        <li>Xin chào {{ Auth::user()->yourname }}</li>
                        <li><a href="{{ route('users.logout') }}">Logout</a></li>        
                    @else
                        <li><a href="{{ route('users.register') }}">Register</a></li>
                        <li><a href="{{ route('users.login') }}">Login</a></li>
                    @endif  
                </ul>
            </div>
            <div class="clear"></div>
        </div>
        <div class="header_top">
            <div class="logo">
                <a href="{{ route('home.index') }}"><img src="/frontend/images/logo.png" alt="" /></a>
            </div>
              <div id="navbar-cart" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li>
                            <a id="cart-popover" class="btn" data-placement="bottom" title="Shopping Cart">
                                <span class="glyphicon glyphicon-shopping-cart"></span>
                                <span class="badge"></span>
                                <span class="total_price">0.00 đ</span>
                            </a>
                        </li>
                    </ul>
              </div>
              <div id="popover_content_wrapper" style="display: none">
                    <span id="cart_details"></span>
                    <div align="right">
                        <a href="{{route('home.checkorder')}}" class="btn btn-primary" id="check_out_cart">
                            <span class="glyphicon glyphicon-shopping-cart"></span> Check out
                        </a>
                        <a href="#" class="btn btn-default" id="clear_cart">
                            <span class="glyphicon glyphicon-trash"></span> Clear
                        </a>
                    </div>
                </div>
     <div class="clear"></div>
  </div>
    <div class="header_bottom">
            <div class="menu">
                <ul>
                    <li class="active"><a href="{{ route('home.index') }}">Trang chủ</a></li>
                    <li><a href="">Giới thiệu</a></li>
                    <li><a href="{{ route('home.showAllProduct') }}">Danh sách sản phẩm</a></li>
                    <li><a href="">Tin tức</a></li>
                    <li><a href="{{ route('home.contact') }}">Liên hệ</a></li>
                    <div class="clear"></div>
                </ul>
            </div>
            <div class="search_box">
                <form>
                    <input autocomplete="off" type="text" name="country_name" id="search" class="form-control input-lg" placeholder="Tìm kiếm....." />
                     {{ csrf_field() }}
                </form>
                <div id="seacrchList">
                        
                </div>   
            </div>
         </div>   
        @yield('content')
        <div class="copy_right">

            <p>&copy; 2018 Selling Phone. All rights reserved

            <p>&copy; 2018 Selling Phone. All rights reserved | Design by <a href="http://cloudzone.vn/">Hiển và Vân</a></p>

       </div>
    </div>
   <!--  <script type="text/javascript" src="{{ url('frontend/js/search.js') }}"></script>  -->
   
    <script type="text/javascript">
        $(document).ready(function() {          
            $('#search').on('keyup', function() {
                var query = $(this).val();
                if (query != '') {
                console.log(query);
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{route('products.autocomplete')}}",
                    type: 'post',
                    dataType: 'json',
                    data: {query: query, _token: _token},
                    success: function(data) {
                        console.log(data);
                        $('#seacrchList').fadeIn();
                        print_autocomplete(data);
                    }
                })          
                } else {
                    $('#seacrchList').fadeOut();
                }   
            });
            function print_autocomplete(data) {
                var html = '';
                if (data.length > 0) {
                    html += '<ul class="dropdown-menu" style="display:block; position:relative">';
                    $.each(data, function(index, val) {
                        html += "<li><a href=\"product/"+val.id+"\">"+val.name+"</a></li>";
                    });
                    html += '</ul>';
                } 
                $('#seacrchList').html(html);
            }
            $(document).on('click', 'li', function() {
                console.log('da click');
                $('#search').val($(this).text());  
                $('#seacrchList').fadeOut(); 
            });
            $('#cart-popover').popover({
                html : true,
                container: 'body',
                content:function(){
                    return $('#popover_content_wrapper').html();                    
                }
            });
            $(document).on('click', '.add-cart', function(event) {
                event.preventDefault();
                var id = $(this).attr('id');
                console.log(id);
                var action = 'add';
                var qtt = 1;
                $.ajax({
                    url: "{{route('orders.action')}}",
                    type: 'post',
                    dataType: 'json',
                    data: {id: id, action: action,qtt: qtt},
                    success: function(data) {
                        print_shopping(data);
                        alert("Sản phẩm đả được thêm vào giỏ hàng");
                    }
                })                
            });
            print_shopping();
            function print_shopping(data = "") {
                var html = '';
                console.log(data);
                html = '<div class="table-responsive" id="order_table"><table class="table table-bordered table-striped"><tr><th width="40%">Product Name</th><th width="10%">Quantity</th><th width="20%">Price</th><th width="15%">Total</th><th width="5%">Action</th></tr>';
                if (data != null) {
                   $.each(data, function(index, val) {
                        html +='<tr>'
                            + '<td>'+val.name+'</td>'
                            + '<td>'+val.price+'</td>'
                            + '<td>'+val.qty+'</td>'
                            + '<td>'+123+'</td>'
                            + '<td>'
                                + '<button name="delete" class="btn btn-danger btn-xs delete" id="'+val.id+"\">Remove</button></td>"
                        + '</tr>';
                   });
                } else {
                    html += 
                       '<tr>'
                            +'<td colspan="5" align="center">'
                                +'Your Cart is Empty!'
                            +'</td>'
                        +'</tr>';
                }
                $('#cart_details').html(html);
            }
            $(document).on('click', '.delete', function() {
                var id = $(this).attr('id');

                var action = 'remove';
                if (confirm('Bạn có chắc chắn xóa sản phẩm này không')) {
                    $.ajax({
                        url: "{{route('orders.remove')}}",
                        type: 'post',
                        data: {id: id, action: action},
                        success: function(data) {
                            console.log(data);
                            // print_shopping();
                            // $('#cart-popover').popover('hide');
                            alert("Sản phẩm đả được xóa khỏi giỏ hàng");
                        }
                    })                    
                }
            });

        });
    </script>
    <a href="#" id="toTop"><span id="toTopHover"> </span></a>
</body>
</html>

