<!DOCTYPE html>
<head>
<title>Selling Phone</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="{{ url('frontend/css/style.css') }}" rel="stylesheet" type="text/css" media="all"/>
<link href="{{ url('frontend/css/slider.css') }}" rel="stylesheet" type="text/css" media="all"/>

</head>
<body>
  <div class="wrap">
    <div class="header">
        <div class="headertop_desc">
            <div class="call">
                 <p><span>Need help?</span> call us <span class="number">1-22-3456789</span></span></p>
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
              <div class="cart">
                   <p>Chào mừng bạn đến với Selling Phone Shop! <span>Giỏ hàng:</span><div id="dd" class="wrapper-dropdown-2"> 0 sản phẩm
                    <ul class="dropdown">
                            <li>you have no items in your Shopping cart</li>
                    </ul></div></p>
              </div>
              <script type="text/javascript">
            function DropDown(el) {
                this.dd = el;
                this.initEvents();
            }
            DropDown.prototype = {
                initEvents : function() {
                    var obj = this;

                    obj.dd.on('click', function(event){
                        $(this).toggleClass('active');
                        event.stopPropagation();
                    }); 
                }
            }

            $(function() {

                var dd = new DropDown( $('#dd') );

                $(document).click(function() {
                    // all dropdowns
                    $('.wrapper-dropdown-2').removeClass('active');
                });

            });

        </script>
     <div class="clear"></div>
  </div>
    <div class="header_bottom">
            <div class="menu">
                <ul>
                    <li class="active"><a href="{{ route('home.index') }}">Trang chủ</a></li>
                    <li><a href="">Giới thiệu</a></li>
                    <li><a href="">Danh sách sản phẩm</a></li>
                    <li><a href="">Tin tức</a></li>
                    <li><a href="{{ route('home.contact') }}">Liên hệ</a></li>
                    <div class="clear"></div>
                </ul>
            </div>
            <div class="search_box">
                <form>
                    <input type="text" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}"><input type="submit" value="">
                </form>
            </div>
            <div class="clear"></div>
         </div>      
        @yield('content')
        <div class="copy_right">
            <p>&copy; 2018 Selling Phone. All rights reserved
       </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{ url('frontend/js/jquery-1.7.2.min.js') }}"></script> 
    <script type="text/javascript" src="{{ url('frontend/js/move-top.js') }}"></script>
    <script type="text/javascript" src="{{ url('frontend/js/easing.js') }}"></script>
    <script type="text/javascript" src="{{ url('frontend/js/startstop-slider.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {          
            $().UItoTop({ easingType: 'easeOutQuart' });
            
        });
    </script>
    <a href="#" id="toTop"><span id="toTopHover"> </span></a>
</body>
</html>

