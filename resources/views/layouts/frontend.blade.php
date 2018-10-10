<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <!-- Twitter meta-->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:site" content="@pratikborsadiya">
    <meta property="twitter:creator" content="@pratikborsadiya">
    <!-- Open Graph Meta-->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Vali Admin">
    <meta property="og:title" content="Vali - Free Bootstrap 4 admin theme">
    <meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
    <meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
    <meta property="og:description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <title>Selling Phone</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{ url('css/main.css') }}">
    <!-- Style CSS  -->
    <link rel="stylesheet" type="text/css" href="{{ url('css/style.css') }}">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>
    <header>
        <div class="container">
            <div class="float-right login">
                @if(Auth::check())
                    Xin chao{{ Auth::user()->name }}<a href="{{ route('users.logout') }}">Logout</a>
                @else
                    <a href="{{ route('users.login') }}">Login</a>
                    <a href="{{ route('users.logout') }}">Logout</a>
                    <a href="{{ route('users.register') }}">Register</a>
                @endif
            </div>
        </div>          
        <div class="clearfix"></div>
        <nav class="menu">
            <ul>
                <li><a href="{{ route('home.index') }}">Trang chủ</a></li>
                <li><a href="">Điện thoại</a></li>
                <li><a href="">Tin tức</a></li>
                <li><a href="">Liên hệ</a></li>
            </ul>
        </nav>
    </header>
    <main>
      @yield('content')
    </main>
    <footer>
        <p>© 2018. Công ty cổ phần Selling Phone</p>
    </footer>
    <!-- Essential javascripts for application to work-->
    <script src="{{ url('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ url('js/popper.min.js') }}"></script>
    <script src="{{ url('js/bootstrap.min.js') }}"></script>
    <script src="{{ url('js/main.js') }}"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="{{ url('js/plugins/pace.min.js') }}"></script>
    <!-- Page specific javascripts-->
    <script type="text/javascript" src="{{ url('js/plugins/chart.js') }}"></script>
  </body>
</html>