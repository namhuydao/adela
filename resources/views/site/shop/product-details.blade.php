@extends('site.layouts.master')
@section('content')
    <body class="product-details">
    <!-- page-wrapper start -->
    <div id="page-wrapper">
        <!-- breadcrumbs-area start -->
        <div class="breadcrumbs-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-content text-center">
                            <h2>Chi Tiết Sản Phẩm</h2>
                            <ul>
                                <li><a href="{{route('home')}}">Trang Chủ /</a></li>
                                <li class="active"><a href="#">Chi Tiết Sản Phẩm</a></li>
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
                    <div class="col-12 col-md-6">
                        <!-- zoom-area start -->
                        <div class="zoom-area mb-rsp-3">
                            <img id="zoompro" src="{{asset('backend/images').'/'.$product->avatar}}"
                                 data-zoom-image="{{asset('backend/images').'/'.$product->avatar}}"
                                 alt="zoom"/>
                            <div id="gallery" class="mt-30">
                                @foreach($product->images as $image)
                                    <a href="#" data-image="{{asset('backend/images').'/'.$image->path}}"
                                       data-zoom-image="">
                                        <img src="{{asset('backend/images').'/'.$image->path}}" alt="zoom"/>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                        <!-- zoom-area end -->
                    </div>
                    <div class="col-12 col-md-6">
                        <!-- zoom-product-details start -->
                        <div class="zoom-product-details">
                            <form action="{{route('addCart',$product->id)}}" method="get">
                                <h1>{{$product->name}}</h1>
                                <div class="main-area mtb-30">
                                    <div class="rating">
                                        <div class="rating-box">
                                            <div class="rating5">rating</div>
                                        </div>

                                    </div>
                                    <div class="review-2">
                                        <a href
                                           onclick="$('a[href=\'#Reviews\']').trigger('click'); $('body,html').animate({scrollTop: $('.products-detalis-area .tab-menu').offset().top}, 800); return false;">1
                                            Đánh Giá</a> /
                                        <a href
                                           onclick="$('a[href=\'#Reviews\']').trigger('click'); $('body,html').animate({scrollTop: $('.products-detalis-area .tab-menu').offset().top}, 800); return false;">Viết
                                            Đánh Giá</a>
                                    </div>
                                </div>
                                <div class="price">
                                    <ul>
                                        <li class="new-price">@if($product->discount_price)
                                                {{number_format($product->discount_price)}}đ
                                            @else
                                                {{number_format($product->base_price)}}đ
                                            @endif
                                        </li>
                                    </ul>
                                </div>
                                <div class="list-unstyled">
                                    <ul>
                                        <li>Thương Hiệu: <span>{{$product->brand->name}}</span></li>
                                        <li>Mã: <span>6TW18C008</span></li>
                                        <li>Điểm Thưởng: <span>400</span></li>
                                        <li>Tình Trạng: <span>Còn Hàng</span></li>
                                    </ul>
                                </div>
                                <div class="catagory-select mb-30" style="display: block">
                                    <h3>Size</h3>
                                    <label for="#">Chọn:</label>
                                    <select name="size" class="form-control">
                                        @foreach($sizes as $size)
                                            <option value="{{$size->id}}">{{$size->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="quality-button">
                                    <input name="amount" class="qty" type="text" value="1"/>
                                    <input type="button" value="+" data-max="1000" class="plus"/>
                                    <input type="button" value="-" data-min="1" class="minus"/>
                                </div>
                                <button type="submit">Thêm vào Giỏ Hàng</button>
                                <div class="product-icon">
                                    <a href="#" data-toggle="tooltip" title="Thêm vào Yêu Thích"><i
                                            class="ion-android-favorite-outline"></i></a>
                                    <a href="#" data-toggle="tooltip" title="So Sánh Sản Phẩm"><i
                                            class="icon ion-android-options"></i></a>
                                </div>
                            </form>
                        </div>
                        <!-- zoom-product-details end -->
                    </div>
                </div>
                <div class="row">
                    <!-- products-detalis-area start -->
                    <div class="products-detalis-area pt-80">
                        <div class="col-lg-12">
                            <!-- tab-menu start -->
                            <div class="tab-menu mb-30 text-center">
                                <ul>
                                    <li class="active"><a href="#Description" data-toggle="tab">Mô tả</a></li>
                                    <li><a href="#Reviews" data-toggle="tab">Đánh Giá (0)</a></li>
                                </ul>
                            </div>
                            <!-- tab-menu end -->
                        </div>
                        <!-- tab-content start -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="Description">
                                <div class="col-lg-12">
                                    <div class="tab-description">
                                        <p>{{$product->description}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="Reviews">
                                <div class="col-lg-12">
                                    <div class="reviews-area">
                                        <h3>Đánh Giá</h3>
                                        <p>Hãy là người đầu tiền đánh giá “{{$product->name}}” </p>
                                        <div class="rating-area mb-10">
                                            <h4>Bình Chọn Của Bạn</h4>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                        </div>
                                        <div class="comment-form mb-10">
                                            <label>Đánh Giá Của Bạn</label>
                                            <textarea name="comment" id="comment" cols="20" rows="7"></textarea>
                                        </div>
                                        <div class="comment-form-author mb-10">
                                            <label>Tên</label>
                                            <input type="text"/>
                                        </div>
                                        <div class="comment-form-email mb-10">
                                            <label>email</label>
                                            <input type="text"/>
                                        </div>
                                        <button type="submit">Gửi</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- tab- end -->
                    </div>
                    <!-- products-detalis-area end -->
                </div>
                <!-- product-details-area end -->
            </div>
        </div>
        <!-- shop-main-area end -->
        <!-- arrivals-area start -->
        <div class="arrivals-area ptb-80">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title mb-30 text-center">
                            <h2>Sản phẩm mới nhất </h2>
                        </div>
                    </div>
                </div>
                <!-- tab-area start -->
                <div class="tab-content">
                    <div class="row">
                        <div class="product-active">
                            @foreach($products as $product)
                                <div class="col-12">
                                    <!-- product-wrapper start -->
                                    <div class="product-wrapper">
                                        <div class="product-img">
                                            <a href="{{route('shopDetails', $product->id)}}">
                                                <img src="{{asset('backend/images').'/'.$product->avatar}}"
                                                     alt="product" class="primary"/>
                                                <img src="{{asset('backend/images').'/'.$product->avatar}}"
                                                     alt="product" class="secondary"/>
                                            </a>
                                            <div class="product-icon">
                                                <a href="#" data-toggle="tooltip" title="Thêm vào Giỏ Hàng"><i
                                                        class="icon ion-bag"></i></a>
                                                <a href="#" data-toggle="tooltip" title="So Sánh Sản Phẩm"><i
                                                        class="icon ion-android-options"></i></a>
                                                <a href="#" data-toggle="modal" data-target="#mymodal"
                                                   title="Xem Nhanh"><i
                                                        class="icon ion-android-open"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-content pt-20">
                                            <div class="manufacture-product">
                                                <a href="#">{{$product->brand->name}}</a>
                                                <div class="rating">
                                                    <div class="rating-box">
                                                        <div class="rating2">rating</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <h2><a href="{{route('shopDetails', $product->id)}}">{{$product->name}}</a>
                                            </h2>
                                            <div class="price">
                                                <ul>
                                                    <li class="new-price">@if($product->discount_price)
                                                            {{number_format($product->discount_price)}}đ
                                                        @else
                                                            {{number_format($product->base_price)}}đ
                                                        @endif</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- product-wrapper end -->
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- tab-area end -->
            </div>
        </div>
        <!-- arrivals-area end -->
        <!-- modal-area start -->
        <div class="modal-area">
            <!-- single-modal start -->
            <div class="modal fade" id="mymodal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="modal-img">
                                <div class="single-img">
                                    <a href="product-details.blade.php"><img
                                            src="" alt="product"
                                            class="primary"/></a>
                                </div>
                            </div>
                            <div class="modal-text">
                                <h2><a href="product-details.blade.php">Áo Len Nam</a></h2>
                                <div class="product-rating">
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star-o"></i></a>
                                </div>
                                <div class="price-rate">
                                    <span class="old-price"><del>625,000đ</del></span>
                                    <span class="new-price">499,000đ</span>
                                </div>
                                <div class="short-description mt-20">
                                    <p> Áo len phom dáng Slim Fit ôm gọn gàng, tôn dáng và ấm áp. Thiết kế cổ tròn
                                        basic, bo gấu và tay áo gọn gàng. Mặt trước dệt đan xen tạo điểm nhấn ấn tượng.
                                        Màu sắc trẻ trung kết
                                        hợp hiệu ứng màu melange mang đến diện mạo thu hút cho người mặc. Chất liệu len
                                        Acrylic nhẹ, ấm, hạn chế xù lông. Đặc biệt co giãn, đàn hồi và giữ định hình
                                        tốt. Áo có khả năng kiểm soát ẩm tốt, thoáng, vẫn giữ ấm cơ thể nhưng không bí.
                                    </p>
                                </div>
                                <form action="#">
                                    <input type="number" value="1"/>
                                    <button type="submit">Thêm vào Giỏ Hàng</button>
                                </form>
                                <div class="product-meta">
                                    <span>
                                        Category:
                                        <a href="#">áo len</a>,<a href="#">áo nam</a>
                                    </span>
                                    <span>
                                        Tags:
                                        <a href="#">áo len</a>,<a href="#">áo nam</a>
                                    </span>
                                </div>
                                <!-- social-icon-start -->
                                <div class="social-icon mt-20">
                                    <ul>
                                        <li><a href="#" data-toggle="tooltip" title="Share on Facebook"><i
                                                    class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#" data-toggle="tooltip" title="Share on Twitter"><i
                                                    class="fab fa-twitter"></i></a></li>
                                        <li><a href="#" data-toggle="tooltip" title="Email to a Friend"><i
                                                    class="fas fa-envelope"></i></a></li>
                                        <li><a href="#" data-toggle="tooltip" title="Pin on Pinterest"><i
                                                    class="fab fa-pinterest"></i></a></li>
                                        <li><a href="#" data-toggle="tooltip" title="Share on Instagram"><i
                                                    class="fab fa-instagram"></i></a></li>
                                    </ul>
                                </div>
                                <!-- social-icon-end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- single-modal end -->
        </div>
        <!-- modal-area end -->
    </div>
    <!-- page-wrapper end -->
@endsection
