<!DOCTYPE html>
<!--[if IE]><![endif]-->
<!--[if lt IE 7 ]> <html lang="en" class="ie6">    <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="ie7">    <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="ie8">    <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="ie9">    <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Lavoro | Home </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- Token 7x ajax -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Favicon
        ============================================ -->
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('theme_fontend/img/favicon.ico')}}">
        
        <!-- Fonts
        ============================================ -->
        <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
        
        <!-- CSS  -->
        
        <!-- Bootstrap CSS
        ============================================ -->      
        <link rel="stylesheet" href="{{ asset('theme_fontend/css/bootstrap.min.css') }}">
        
        <!-- owl.carousel CSS
        ============================================ -->      
        <link rel="stylesheet" href="{{ asset('theme_fontend/css/owl.carousel.css') }}">
       
        <!-- owl.theme CSS
        ============================================ -->      
        <link rel="stylesheet" href="{{ asset('theme_fontend/css/owl.theme.css') }}">
            
        <!-- owl.transitions CSS
        ============================================ -->      
        <link rel="stylesheet" href="{{ asset('theme_fontend/css/owl.transitions.css') }}">
        
        <!-- font-awesome.min CSS
        ============================================ -->      
        <link rel="stylesheet" href="{{ asset('theme_fontend/css/font-awesome.min.css') }}">
        
        <!-- font-icon CSS
        ============================================ -->      
        <link rel="stylesheet" href="{{ asset('theme_fontend/fonts/font-icon.css') }}">
        
        <!-- jquery-ui CSS
        ============================================ -->
        <link rel="stylesheet" href="{{ asset('theme_fontend/css/jquery-ui.css') }}">
        
        <!-- mobile menu CSS
        ============================================ -->
        <link rel="stylesheet" href="{{ asset('theme_fontend/css/meanmenu.min.css') }}">
        
        <!-- nivo slider CSS
        ============================================ -->
        <link rel="stylesheet" href="{{ asset('theme_fontend/custom-slider/css/nivo-slider.css') }}" type="text/css" />
        <link rel="stylesheet" href="{{ asset('theme_fontend/custom-slider/css/preview.css') }}" type="text/css" media="screen" />
        
        <!-- animate CSS
        ============================================ -->         
        <link rel="stylesheet" href="{{ asset('theme_fontend/css/animate.css') }}">
        
        <!-- normalize CSS
        ============================================ -->        
        <link rel="stylesheet" href="{{ asset('theme_fontend/css/normalize.css') }}">
   
        <!-- main CSS
        ============================================ -->          
        <link rel="stylesheet" href="{{ asset('theme_fontend/css/main.css') }}">
        
        <!-- style CSS
        ============================================ -->          
        <link rel="stylesheet" href="{{ asset('theme_fontend/style.css') }}">
        
        <!-- responsive CSS
        ============================================ -->          
        <link rel="stylesheet" href="{{ asset('theme_fontend/css/responsive.css') }}">
        
        <script src="{{ asset('theme_fontend/js/vendor/modernizr-2.8.3.min.js') }}"></script>

        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </head>
    <body class="home-one">
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        
        <!-- Add your site or application content here -->
        <!-- header area start -->
        @include('components.header')
        
        <!-- header area end -->
        @if(Auth::check() && get_data_user('web','status') == 0)
        <div class="alert alert-warning alert-dismissible alert_custom2">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Thông Báo !</strong><a href="{{ route('user.dashboard')}}"><b> Tài khoản chưa kích hoạt</b></a>.
        </div>
        @endif
        @if(\Session::has('success'))
            <div class="alert alert-success alert-dismissible col-md-offset-4 alert_custom">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Thành Công !</strong> {{ \Session::get('success')}}
            </div>
        @endif
        @if(\Session::has('warning'))
            <div class="alert alert-warning alert-dismissible alert_custom">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Thông Báo !</strong> {{ \Session::get('warning')}}
            </div>
        @endif
        @if(\Session::has('error'))
            <div class="alert alert-danger alert-dismissible alert_custom">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Thất Bại !</strong> {{ \Session::get('error')}}
            </div>
        @endif
        @yield('content')

        <!-- FOOTER START -->
        @include('components.footer')
        <!-- FOOTER END -->
        
        <!-- JS -->
        
        <!-- jquery-1.11.3.min js
        ============================================ -->         
        <script src="{{ asset('theme_fontend/js/vendor/jquery-1.11.3.min.js') }} "></script>
        
        <!-- bootstrap js
        ============================================ -->         
        <script src="{{ asset('theme_fontend/js/bootstrap.min.js') }} "></script>
        
        <!-- Nivo slider js
        ============================================ -->        
        <script src="{{ asset('theme_fontend/custom-slider/js/jquery.nivo.slider.js') }} " type="text/javascript"></script>
        
        <script src="{{ asset('theme_fontend/custom-slider/home.js') }} " type="text/javascript"></script>
        
        <!-- owl.carousel.min js
        ============================================ -->       
        <script src="{{ asset('theme_fontend/js/owl.carousel.min.js') }} "></script>
        
        <!-- jquery scrollUp js 
        ============================================ -->
        <script src="{{ asset('theme_fontend/js/jquery.scrollUp.min.js') }}"></script>
        
        <!-- price-slider js
        ============================================ --> 
        <script src="{{ asset('theme_fontend/js/price-slider.js') }} "></script>
        
        <!-- elevateZoom js 
        ============================================ -->
        <script src="{{ asset('theme_fontend/js/jquery.elevateZoom-3.0.8.min.js') }} "></script>
        
        <!-- jquery.bxslider.min.js
        ============================================ -->       
        <script src="{{ asset('theme_fontend/js/jquery.bxslider.min.js') }}"></script>
        
        <!-- mobile menu js
        ============================================ -->  
        <script src="{{ asset('theme_fontend/js/jquery.meanmenu.js') }} "></script>   
        
        <!-- wow js
        ============================================ -->       
        <script src="{{ asset('theme_fontend/js/wow.js') }} "></script>
        
        <!-- plugins js
        ============================================ -->         
        <script src="{{ asset('theme_fontend/js/plugins.js') }} "></script>
        
        <!-- main js
        ============================================ -->           
        <script src="{{ asset('theme_fontend/js/main.js') }} "></script>

        <!-- gmap js
        ============================================ -->      
        <script src="{{ asset('theme_fontend/js/gmap.js') }}"></script>
        <!-- format number
        ============================================ -->      
        <script src="{{ asset('theme_fontend/js/simple.money.format.js') }}"></script>
        
        @yield('script')

        @if(\Session::has('success_log'))
            <script>
              swal("Thông Báo !", "{{ \Session::get('success_log')}}", "success");
            </script>
        @endif
        @if(\Session::has('error_log'))
            <script>
              swal("Thông Báo !", "{{ \Session::get('error_log')}}", "error");
            </script>
        @endif
    </body>
</html>