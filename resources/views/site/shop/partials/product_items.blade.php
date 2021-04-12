<!-- shop-right-area start -->
<div class="shop-right-area mb-30">
    <!-- tab-area start -->
    @if(!$paginateProducts->isEmpty())
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
            {{$paginateProducts->appends(Request::all())->links()}}
        </div>
    </div>
    @else
        <h2 class="text-center">Không có sản phẩm nào</h2>
@endif
    <!-- pagination-area end -->
</div>
<!-- shop-right-area end -->
