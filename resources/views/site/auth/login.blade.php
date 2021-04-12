@extends('backend.layouts.master')
@section('content')
<body class="login">
    <!-- page-wrapper start -->
    <div id="page-wrapper">
        <!-- header-area start -->
        @include('site.layouts.nav')
        <!-- header-area end -->
        <!-- breadcrumbs-area start -->
        <div class="breadcrumbs-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-content text-center">
                            <h2>Đăng Nhập</h2>
                            <ul>
                                <li><a href="{{route('home')}}">Trang Chủ /</a></li>
                                <li class="active"><a href="#">Đăng Nhập</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumbs-area end -->
        <!-- shop-main-area start -->
        <div class="shop-main-area">
            <!-- user-login-area start -->
            <div class="user-login-area">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-lg-6 offset-lg-3">
                            <div class="login-form">
                                <div class="single-login">
                                    <label>Tên Đăng Nhập hoặc Email<span>*</span></label>
                                    <input type="text" />
                                </div>
                                <div class="single-login">
                                    <label>Mật Khẩu <span>*</span></label>
                                    <input type="password" />
                                </div>
                                <div class="single-login single-login-2">
                                    <a href="#">Đăng Nhập</a>
                                    <input id="rememberme" type="checkbox" name="rememberme" value="forever">
                                    <span>Nhớ Mật Khẩu</span>
                                </div>
                                <a href="#">Quên Tài Khoản?</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- user-login-area end -->
        </div>
        <!-- shop-main-area end -->
        <!-- newsletter-area start -->
        @include('site.layouts.newsletter')
        <!-- newsletter-area end -->
        <!-- footer-area start -->
        @include('site.layouts.footer')
        <!-- footer-area end -->
    </div>
    <!-- page-wrapper-end -->
@endsection
