@extends('site.layouts.master')
@section('content')
<body class="wishlist">
    <!-- page-wrapper start -->
    <div id="page-wrapper">
        <!-- breadcrumbs-area start -->
        <div class="breadcrumbs-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-content text-center">
                            <h2>Sản Phẩm Yêu Thích</h2>
                            <ul>
                                <li><a href="{{route('home')}}">Trang Chủ /</a></li>
                                <li class="active"><a href="#">Sản Phẩm Yêu Thích</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumbs-area end -->
        <!-- shop-main-area start -->
        <div class="shop-main-area">
            <!-- cart-main-area-start -->
            <div class="cart-main-area">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="wishlist-content">
                                <form action="#">
                                    <div class="wishlist-table table-responsive">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th class="product-remove">
                                                        <span class="nobr">Xóa</span>
                                                    </th>
                                                    <th class="product-thumbnail">Ảnh</th>
                                                    <th class="product-name">Tên Sản Phẩm</th>
                                                    <th class="product-price">Giá</th>
                                                    <th class="product-stock-stauts">Tình Trạng</th>
                                                    <th class="product-subtotal">Thêm vào Giỏ Hàng</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="product-remove"><a href="#">×</a></td>
                                                    <td class="product-thumbnail"><a href="#"><img
                                                                src="../../../../public/site/images/cart/1.jpg" alt="man" /></a></td>
                                                    <td class="product-name"><a href="#">Áo len nam</a></td>
                                                    <td class="product-price"><span class="amount">499,000đ</span></td>
                                                    <td class="product-stock-status"><span class="wishlist-in-stock">Còn
                                                            hàng</span>
                                                    </td>
                                                    <td class="product-add-to-cart"><a href="#">Thêm vào Giỏ Hàng</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="product-remove"><a href="#">×</a></td>
                                                    <td class="product-thumbnail"><a href="#"><img
                                                                src="../../../../public/site/images/cart/2.jpg" alt="man" /></a></td>
                                                    <td class="product-name"><a href="#">Áo Len Dài Tay Nữ</a>
                                                    </td>
                                                    <td class="product-price"><span class="amount">499,000đ</span></td>
                                                    <td class="product-stock-status"><span class="wishlist-in-stock">Còn
                                                            hàng</span>
                                                    </td>
                                                    <td class="product-add-to-cart"><a href="#">Thêm vào Giỏ Hàng</a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="6">
                                                        <div class="wishlist-share">
                                                            <h4 class="wishlist-share-title">Chia sẻ:</h4>
                                                            <ul>
                                                                <li><a href="#" class="facebook"><i
                                                                            class="fa fa-facebook"></i></a>
                                                                </li>
                                                                <li><a class="twitter" href="#"><i
                                                                            class="fa fa-twitter"></i></a>
                                                                </li>
                                                                <li><a class="pinterest" href="#"><i
                                                                            class="fa fa-dribbble"></i></a>
                                                                </li>
                                                                <li><a class="googleplus" href="#"><i
                                                                            class="fa fa-linkedin"></i></a></li>
                                                                <li><a class="email" href="#"><i
                                                                            class="fa fa-instagram"></i></a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- cart-main-area-end -->
        </div>
        <!-- shop-main-area end -->
    </div>
    <!-- page-wrapper-end -->
@endsection
