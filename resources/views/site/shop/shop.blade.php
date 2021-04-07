@extends('site.layouts.master')
@section('content')
    <body class="shop">
    <!-- page-wrapper start -->
    <div id="page-wrapper">
        <!-- breadcrumbs-area start -->
        <div class="breadcrumbs-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-content text-center">
                            <h2>shop</h2>
                            <ul>
                                <li><a href="{{route('home')}}">Trang chủ /</a></li>
                                <li class="active"><a href="{{route('shop')}}">shop</a></li>
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
                        <!-- page-bar start -->
                        <div class="page-bar">
                            <div class="shop-tab">
                                <!-- tab-menu start -->
                                <div class="tab-menu-3">
                                    <ul>
                                        <li class="active"><a href="#th" data-toggle="tab"><i
                                                    class="fa fa-list"></i></a></li>
                                        <li><a href="#list" data-toggle="tab"><i class="fa fa-th"></i></a></li>
                                    </ul>
                                </div>
                                <!-- tab-menu end -->
                                <!-- toolbar-sort start -->
                                <div class="toolbar-sorter">
                                    <select class="sorter-options" data-role="sorter">
                                        <option selected="selected" value="Lowest">Sắp xếp theo: Mặc Định</option>
                                        <option value="Highest">Sắp xếp theo: Tên (A - Z)</option>
                                        <option value="Product">Sắp xếp theo: Tên (Z - A)</option>
                                    </select>
                                </div>
                                <!-- toolbar-sort end -->
                            </div>
                        </div>
                        <!-- page-bar end -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-9 order-lg-12">
                        <!-- shop-right-area start -->
                        <div class="shop-right-area mb-30">
                            <!-- tab-area start -->
                            <div class="tab-content">
                                <div class="tab-pane active" id="th">
                                @foreach($paginateProducts as $product)
                                    <!-- product-wrapper start -->
                                        <div class="product-wrapper product-wrapper-3 mb-40">
                                            <div class="product-img">
                                                <a href="{{route('shopDetails', $product->id)}}">
                                                    <img src="{{asset('backend/images').'/'.$product->avatar}}"
                                                         alt="product" class="primary">
                                                    <img src="{{asset('backend/images').'/'.$product->avatar}}"
                                                         alt="product" class="secondary">
                                                </a>
                                                @if($product->discount_price)
                                                <span class="sale">sale</span>
                                                @endif
                                                <div class="product-icon">
                                                    <a href="#" data-toggle="tooltip" title="Thêm vào Giỏ Hàng"><i
                                                            class="icon ion-bag"></i></a>
                                                    <a href="#" data-toggle="tooltip" title="So Sánh Sản Phẩm"><i
                                                            class="icon ion-android-options"></i></a>
                                                    <a href="#" data-toggle="modal" data-target="#mymodal"
                                                       title="Xem Nhanh"><i data-item_id = "{{$product->id}}" class="icon ion-android-open"></i></a>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <div class="manufacture-product">
                                                    <a href="#">{{$product->brand->name}}</a>
                                                    <div class="rating">
                                                        <div class="rating-box">
                                                            <div class="rating1">rating</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <h2><a href="{{route('shopDetails', $product->id)}}">{{$product->name}}</a></h2>
                                                <div class="price">
                                                    <ul>
                                                        @if($product->discount_price)
                                                        <li class="old-price">
                                                            <del>{{number_format($product->base_price)}}đ</del>
                                                        </li>
                                                        <li class="new-price">{{number_format($product->discount_price)}}đ</li>
                                                        @else
                                                            <li class="new-price">{{number_format($product->base_price)}}đ</li>
                                                        @endif
                                                    </ul>
                                                </div>
                                                <p>{{$product->description}}</p>
                                            </div>
                                        </div>
                                        <!-- product-wrapper end -->
                                    @endforeach
                                </div>
                                <div class="tab-pane fade" id="list">
                                    <div class="row">
                                        @foreach($paginateProducts as $product)
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <!-- product-wrapper start -->
                                            <div class="product-wrapper mb-40">
                                                <div class="product-img">
                                                    <a href="{{route('shopDetails', $product->id)}}">
                                                        <img src="{{asset('backend/images').'/'.$product->avatar}}"
                                                             alt="product" class="primary">
                                                        <img src="{{asset('backend/images').'/'.$product->avatar}}"
                                                             alt="product" class="secondary">
                                                    </a>
                                                    @if($product->discount_price)
                                                        <span class="sale">sale</span>
                                                    @endif
                                                    <div class="product-icon">
                                                        <a href="#" data-toggle="tooltip" title="Thêm vào Giỏ Hàng"><i
                                                                class="icon ion-bag"></i></a>
                                                        <a href="#" data-toggle="tooltip" title="So Sánh Sản Phẩm"><i
                                                                class="icon ion-android-options"></i></a>
                                                        <a href="#" data-toggle="modal" data-target="#mymodal" class="modalShow" data-value = "{{$product}}"
                                                           title="Xem Nhanh"><i class="icon ion-android-open"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <div class="manufacture-product">
                                                        <a href="#">{{$product->brand->name}}</a>
                                                        <div class="rating">
                                                            <div class="rating-box">
                                                                <div class="rating1">rating</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <h2><a href="{{route('shopDetails', $product->id)}}">{{$product->name}}</a></h2>
                                                    <div class="price">
                                                        <ul>
                                                            @if($product->discount_price)
                                                                <li class="old-price">
                                                                    <del>{{number_format($product->base_price)}}đ</del>
                                                                </li>
                                                                <li class="new-price">{{number_format($product->discount_price)}}đ</li>
                                                            @else
                                                                <li class="new-price">{{number_format($product->base_price)}}đ</li>
                                                            @endif
                                                        </ul>
                                                    </div>
                                                    <p>{{$product->description}}</p>
                                                </div>
                                            </div>
                                            <!-- product-wrapper end -->
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <!-- tab-area end -->
                            <!-- pagination-area start -->
                            <div class="pagination-area">
                                <div class="pagination-number">
                                    {{$paginateProducts->links()}}
                                </div>
                                <div class="product-count">
                                    <p>Hiện 1 - 3 trong {{$products->count()}}</p>
                                </div>
                            </div>
                            <!-- pagination-area end -->
                        </div>
                        <!-- shop-right-area end -->
                    </div>
                    <div class="col-12 col-lg-3">
                        <!-- shop-left-area start -->
                        <div class="shop-left-area">
                            <!-- single-shop start -->
                            <div class="single-shop mb-40">
                                <div class="categories-title">
                                    <h3>Danh Mục Sản Phẩm</h3>
                                </div>
                                <div class="categories-list">
                                    <ul>
                                        @foreach($categories as $category)
                                        <li><a href="#">{{$category->name}}
                                                @php($i = 0)
                                                @foreach($products as $product)
                                                    @if($product->category == $category)
                                                        @php($i++)
                                                    @endif
                                                @endforeach
                                                 ({{$i}})
                                                </a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <!-- single-shop end -->
                            <!-- singl-shop start -->
                            <div class="single-shop mb-40">
                                <div class="categories">
                                    <h3>Lọc Giá</h3>
                                </div>
                                <div id="slider-range"></div>
                                <input type="text" name="text" id="amount"/>
                            </div>
                            <!-- singl-shop end -->
                            <div class="single-shop mb-40">
                                <div class="categories-title">
                                    <h3>Thương Hiệu</h3>
                                </div>
                                <div class="categories-list">
                                    <ul>
                                        @foreach($brands as $brand)
                                        <li><a href="#">{{$brand->name}}@php($i = 0)
                                                @foreach($products as $product)
                                                    @if($product->brand_id == $brand->id)
                                                        @php($i++)
                                                    @endif
                                                @endforeach
                                                ({{$i}})
                                            </a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <!-- single-shop end -->
                            <!-- single-shop start -->
                            <div class="single-shop mb-40">
                                <div class="categories-title">
                                    <h3>Size</h3>
                                </div>
                                <div class="categories-list">
                                    <ul>
                                        @foreach($sizes as $size)
                                        <li><a href="#">{{$size->name}}
                                                @php($i = 0)
                                                @foreach($products as $product)
                                                    @if($product->sizes->contains($size))
                                                        @php($i++)
                                                    @endif
                                                @endforeach
                                                 ({{$i}})</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <!-- single-shop end -->
                        </div>
                        <!-- shop-left-area end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- shop-main-area end -->
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
    @section('footer_script')
        <script>
            $('body').on('click', '.something', function () {

            });
            $('.ion-android-open').click(function () {
                var product_id = $(this).data('item_id');
                $.ajax({
                    url: '{{ route('productPopup') }}',
                    type: 'GET',
                    data: {
                        product_id: product_id,
                        // qulity: $('.item3 input[name=qulity]').val()
                    },
                    success: function (html) {
                        $('#mymodal .modal-body').html(html);
                    },
                    error: function () {
                        console.log('Gửi ajaax xem sản phẩm lôi');
                    }
                });
            });
        </script>
@endsection
