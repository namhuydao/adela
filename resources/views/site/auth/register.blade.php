@extends('backend.layouts.master')
@section('content')
<body class="register">
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
                            <h2>Đăng Ký</h2>
                            <ul>
                                <li><a href="../index.php">Trang Chủ /</a></li>
                                <li class="active"><a href="#">Đăng Ký</a></li>
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
                        <div class="col-12 col-lg-8 offset-lg-2">
                            <div class="billing-fields">
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="single-register">
                                            <form action="#">
                                                <label>Họ<span>*</span></label>
                                                <input type="text" />
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="single-register">
                                            <form action="#">
                                                <label>Tên<span>*</span></label>
                                                <input type="text" />
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="single-register">
                                            <form action="#">
                                                <label>Email<span>*</span></label>
                                                <input type="text" />
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="single-register">
                                            <form action="#">
                                                <label>Điện Thoại<span>*</span></label>
                                                <input type="text" />
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-register">
                                    <form action="#">
                                        <label>Địa Chỉ<span>*</span></label>
                                        <input type="text" />
                                    </form>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="single-register">
                                            <form action="#">
                                                <label>Xã/ Phường<span>*</span></label>
                                                <input type="text" />
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="single-register">
                                            <form action="#">
                                                <label>Quận/ Huyện<span>*</span></label>
                                                <input type="text" />
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-register">
                                    <form action="#">
                                        <label>Tỉnh/ Thành Phố<span>*</span></label>
                                        <input type="text" />
                                    </form>
                                </div>
                                <div class="single-register">
                                    <form action="#">
                                        <label>Mật khẩu<span>*</span></label>
                                        <input type="password" />
                                    </form>
                                </div>
                                <div class="single-register">
                                    <form action="#">
                                        <label>Xác Nhận Mật Khẩu<span>*</span></label>
                                        <input type="password" />
                                    </form>
                                </div>
                                <div class="single-register single-register-3">
                                    <input id="rememberme" type="checkbox" name="rememberme" value="forever">
                                    <label class="inline">Tôi đồng ý các<a href="#"> Điều Khoản & Quy Định</a></label>
                                </div>
                                <div class="single-register">
                                    <a href="#">Đăng Ký</a>
                                </div>
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
