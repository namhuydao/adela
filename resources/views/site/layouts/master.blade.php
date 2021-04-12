<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ config('app.name', 'Adela Shop') }}</title>
    <meta name="description"
          content="Mặc mới mỗi ngày với thời trang ADELLA. Hơn 100+ mẫu quần áo & phụ kiện nam, nữ lên kệ hàng ngày. MUA SẮM ONLINE & TẠI CỬA HÀNG!">
    <meta name="keywords" content="thời trang">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('site/images/favicon.png')}}">

    <!-- all css here -->
    <!-- bootstrap v4.3.1 css -->
    <link rel="stylesheet" href="{{asset('site/css/bootstrap.min.css')}}">
    <!-- animate css -->
    <link rel="stylesheet" href="{{asset('site/css/animate.css')}}">
    <!-- jquery-ui.min css -->
    <link rel="stylesheet" href="{{asset('site/css/jquery-ui.min.css')}}">
    <!-- meanmenu css -->
    <link rel="stylesheet" href="{{asset('site/css/meanmenu.min.css')}}">
    <!-- owl.carousel css -->
    <link rel="stylesheet" href="{{asset('site/css/owl.carousel.css')}}">
    <!-- font-awesome css -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
          integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <!-- ionicons.min css -->
    <link href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet">

    <!-- nivo-slider.css -->
    <link rel="stylesheet" href="{{asset('site/css/nivo-slider.css')}}">
    <!-- style css -->
    <link rel="stylesheet" href="{{asset('site/css/style.css')}}">
    <!-- responsive css -->
    <link rel="stylesheet" href="{{asset('site/css/responsive.css')}}">
    <!-- modernizr css -->
    <script src="{{asset('site/js/vendor/modernizr-2.8.3.min.js')}}"></script>
    <!-- jquery latest version -->
    <script src="{{asset('site/js/vendor/jquery-1.12.0.min.js')}}"></script>
</head>

@include('site.layouts.nav')
@yield('content')
@include('site.layouts.newsletter')
@include('site.layouts.footer')

<!-- all js here -->

<!-- bootstrap js -->
<script src="{{asset('site/js/bootstrap.min.js')}}"></script>
<!-- owl.carousel js -->
<script src="{{asset('site/js/owl.carousel.min.js')}}"></script>
<!-- meanmenu js -->
<script src="{{asset('site/js/jquery.meanmenu.js')}}"></script>
<!-- jquery-ui js -->
<script src="{{asset('site/js/jquery-ui.min.js')}}"></script>
<!-- wow js -->
<script src="{{asset('site/js/wow.min.js')}}"></script>
<!-- owl.carousel.min.js -->
<script src="{{asset('site/js/owl.carousel.min.js')}}"></script>
<!-- jquery.nivo.slider.js -->
<script src="{{asset('site/js/jquery.nivo.slider.js')}}"></script>
<!-- jquery.elevateZoom-3.0.8.min.js -->
<script src="{{asset('site/js/jquery.elevateZoom-3.0.8.min.js')}}"></script>
<!-- jquery.parallax-1.1.3.js -->
<script src="{{asset('site/js/jquery.parallax-1.1.3.js')}}"></script>
<!-- jquery.counterup.min.js -->
<script src="{{asset('site/js/jquery.counterup.min.js')}}"></script>
<!-- waypoints.min.js -->
<script src="{{asset('site/js/waypoints.min.js')}}"></script>
<!-- plugins js -->
<script src="{{asset('site/js/plugins.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<!-- main js -->
<script src="{{asset('site/js/main.js')}}"></script>

</body>
@yield('footer_script')
</html>
