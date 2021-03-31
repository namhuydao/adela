@extends('site.layouts.master')
@section('content')
    <body class="cart">
    <!-- page-wrapper start -->
    <div id="page-wrapper">
        <!-- breadcrumbs-area start -->
        <div class="breadcrumbs-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-content text-center">
                            <h2>Giỏ Hàng</h2>
                            <ul>
                                <li><a href="{{ route('home') }}">Trang chủ /</a></li>
                                <li class="active"><a href="#">Giỏ hàng</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumbs-area end -->
        <!-- shop-main-area start -->
        <div class="shop-main-area">
            <!-- cart-main-area start -->
            <div class="cart-main-area">
                <div class="container">
                    <div class="row">
                        <div class="col-12">

                            <div class="table-content table-responsive">
                                <table>
                                    <thead>
                                    <tr>
                                        <th class="product-thumbnail">Ảnh</th>
                                        <th class="product-name">Sản phẩm</th>
                                        <th class="product-price">Giá</th>
                                        <th class="product-size">Size</th>
                                        <th class="product-quantity">số lượng</th>
                                        <th class="product-subtotal">tổng</th>
                                        <th class="product-subtotal">hành động</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach(\Gloudemans\Shoppingcart\Facades\Cart::content() as $product)
                                        <form action="{{route('cartUpdate', $product->id)}}">
                                            <tr>
                                                <td class="product-thumbnail"><a
                                                        href="{{route('shopDetails', $product->id)}}"><img
                                                            src="
                                                        @foreach($products as $prod)
                                                            @if($prod->id == $product->id)
                                                            {{asset('backend/images').'/'.$prod->avatar}}
                                                            @endif
                                                            @endforeach "
                                                            alt="man"/></a></td>
                                                <td class="product-name"><a href="#">{{$product->name}}</a>
                                                </td>
                                                <td class="product-price"><span
                                                        class="amount">{{$product->price}}đ</span>
                                                </td>
                                                <td class="product-size">
                                                    <select name="size" class="form-control">
                                                        @foreach($sizes as $size)
                                                            <option @if($product->options->size == $size->id)
                                                                    selected
                                                                    @endif value="{{$size->id}}">{{$size->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td class="product-quantity"><input name="qty" type="number"
                                                                                    value="{{$product->qty}}"></td>
                                                <td class="product-subtotal">{{$product->price * $product->qty}}đ</td>
                                                <td>
                                                    <button class="btn btn-sm btn-primary">Sửa</button>
                                                <a class="btn btn-primary"
                                                        href="{{route('cartDelete', $product->id)}}">Xóa</a>
                                                </td>
                                            </tr>
                                        </form>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-7">
                            <div class="buttons-cart mb-30 mt-3">
                                <ul>
                                    <li><a href="{{route('shop')}}">tiếp tục mua sắm</a></li>
                                </ul>
                            </div>
                            <div class="coupon">
                                <h3>phiếu giảm giá</h3>
                                <p>Điền mã giảm giá của bạn.</p>
                                <form action="#">
                                    <input type="text" placeholder="Mã giảm giá">
                                    <a href="#">Áp dụng</a>
                                </form>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-5">
                            <div class="cart_totals">
                                <h2>Tổng giỏ hàng</h2>
                                <table>
                                    <tbody>
                                    <tr class="cart-subtotal">
                                        <th>tiền hàng</th>
                                        <td>
                                            <span
                                                class="amount">{{\Gloudemans\Shoppingcart\Facades\Cart::subtotal()}}đ</span>
                                        </td>
                                    </tr>
                                    <tr class="shipping">
                                        <th>vận chuyển</th>
                                        <td>
                                            <ul id="shipping_method">
                                                <li>
                                                    <input name="shipping" type="radio">
                                                    <label>
                                                        Giao nhanh:
                                                        <span class="amount">30,000đ</span>
                                                    </label>
                                                </li>
                                                <li>
                                                    <input name="shipping" type="radio" checked>
                                                    <label> Giao hàng tiêu chuẩn:
                                                        <span class="amount">0đ</span>
                                                    </label>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr class="order-total">
                                        <th>tổng</th>
                                        <td>
                                            <strong>
                                                <span
                                                    class="amount">{{\Gloudemans\Shoppingcart\Facades\Cart::subtotal()}}đ</span>
                                            </strong>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <div class="wc-proceed-to-checkout">
                                    <a href="{{route('checkout')}}">Tiến Hành Thanh Toán</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- cart-main-area end -->
        </div>
        <!-- shop-main-area end -->
    </div>
    <!-- page-wrapper-end -->
@endsection
