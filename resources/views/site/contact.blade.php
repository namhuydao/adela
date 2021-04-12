@extends('site.layouts.master')
@section('content')
    <body class="contact">
    <!-- page-wraper start -->
    <div id="page-wrapper">
        <!-- breadcrumbs-area start -->
        <div class="breadcrumbs-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-content text-center">
                            <h2>Liên Hệ</h2>
                            <ul>
                                <li><a href="{{route('home')}}">Trang Chủ /</a></li>
                                <li class="active"><a href="#">Liên Hệ</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumbs-area end -->
        <!-- shop-main-area start -->
        <div class="shop-main-area">
            <!-- googleMap-area start -->
            <div class="map-area pt-50">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div style="overflow:hidden;width: 100%;position: relative;">
                                <iframe width="100%"
                                        height="410"
                                        src="https://maps.google.com/maps?width=1140&amp;height=410&amp;hl=en&amp;q=48%20T%E1%BB%91%20H%E1%BB%AFu%2C%20Trung%20V%C4%83n%2C%20T%E1%BB%AB%20Li%C3%AAm%2C%20H%C3%A0%20N%E1%BB%99i%2C%20Vi%E1%BB%87t%20Nam+(Title)&amp;ie=UTF8&amp;t=&amp;z=16&amp;iwloc=B&amp;output=embed"
                                        frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                                <div
                                    style="position: absolute;width: 80%;bottom: 10px;left: 0;right: 0;margin-left: auto;margin-right: auto;color: #000;text-align: center;">
                                    <small style="line-height: 1.8;font-size: 2px;background: #fff;">Powered by <a
                                            href="https://embedgooglemaps.com/es/">Embedgooglemaps.com/es/</a> & <a
                                            href="https://lasvegastop10restaurants.embedgooglemaps.com/">top 10 las
                                            vegas restaurants</a></small>
                                </div>
                                <style>
                                    #gmap_canvas img {
                                        max-width: none !important;
                                        background: none !important
                                    }
                                </style>
                            </div>
                            <br/>
                        </div>
                    </div>
                </div>
            </div>
            <!-- googleMap-area end -->
            <!-- contact-area start -->
                <div class="contact-area ptb-80">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="contact-info mb-rsp-3">
                                    <h3>Thông Tin Liên Hệ</h3>
                                    <ul>
                                        <li>
                                            <i class="fa fa-map-marker"></i>
                                            <span>Địa Chỉ</span>
                                            @foreach($settings as $setting)
                                            @if($setting->config_key == 'Địa chỉ')
                                                {{$setting->config_value}}
                                                @endif
                                            @endforeach
                                        </li>
                                        <li>
                                            <i class="fa fa-envelope"></i>
                                            <span>Phone</span>
                                            @foreach($settings as $setting)
                                                @if($setting->config_key == 'Phone')
                                                    {{$setting->config_value}}
                                                @endif
                                            @endforeach
                                        </li>
                                        <li>
                                            <i class="fa fa-mobile"></i>
                                            <span>Email</span>
                                            <a href="#">@foreach($settings as $setting)
                                                    @if($setting->config_key == 'Email')
                                                        {{$setting->config_value}}
                                                    @endif
                                                @endforeach</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="contact-form">
                                    <h3><i class="fa fa-envelope-o"></i>Để Lại Lời Nhắn</h3>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="single-form-3">
                                                <form action="#">
                                                    <input type="text" placeholder="Tên*"/>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="single-form-3">
                                                <form action="#">
                                                    <input type="email" placeholder="Email*"/>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-form-3">
                                        <form action="#">
                                            <input type="text" placeholder="Tiêu Đề"/>
                                        </form>
                                    </div>
                                    <div class="single-form-3">
                                        <form action="#">
                                            <textarea name="massage" placeholder="Nội Dung" cols="30"
                                                      rows="6"></textarea>
                                            <input type="submit" value="Gửi Tin Nhắn">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div
        <!-- contact-area end -->
        </div>
        <!-- shop-main-area end -->
    </div>
    <!-- page-wrapper-end -->
@endsection

