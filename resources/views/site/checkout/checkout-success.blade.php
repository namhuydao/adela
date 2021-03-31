@extends('site.layouts.master')
@section('content')
<body class="checkout-success">
    <!-- page-wrapper start -->
    <div id="page-wrapper">
        <!-- breadcrumbs-area start -->
        <div class="breadcrumbs-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-content text-center">
                            <h2>Đặt Hàng Thành Công</h2>
                            <ul>
                                <li><a href="{{route('dashboard')}}">Trang chủ /</a></li>
                                <li><a href="{{route('cart')}}">Giỏ hàng /</a></li>
                                <li><a href="{{route('checkout')}}">Thanh toán /</a></li>
                                <li class="active"><a href="#"> Đặt Hàng Thành Công</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumbs-area end -->
        <!-- shop-main-area start -->
        <div class="shop-main-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h1>BẠN ĐÃ ĐẶT HÀNG THÀNH CÔNG!</h1>
                        <p>Đơn hàng của bạn đã được xử lý thành công!</p>
                        <p>Nếu có bất kỳ câu hỏi nào, hãy gửi cho <a href="#" style="color: #292929">cửa hàng</a></p>
                        <p>Cám ơn bạn đã mua sắm tại cửa hàng chúng tôi!</p>
                        <div class="buttons">
                            <div class="pull-right">
                                <a href="{{route('shop')}}" class="btn btn-primary">Tiếp Tục Mua Sắm</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- shop-main-area end -->
    </div>
    <!-- page-wrapper-end -->
@endsection
