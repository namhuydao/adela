<div class="modal-img">
    <div class="single-img">
        <a href="{{route('shopDetails', $product->id)}}"><img
                src="{{asset('backend/images').'/'.$product->avatar}}" alt="product"
                class="primary"/></a>
    </div>
</div>
<div class="modal-text">
    <h2><a href="{{route('shopDetails', $product->id)}}">{{$product->name}}</a></h2>
    <div class="rating">
        <div class="rating-box">
            <div class="rating5">rating</div>
        </div>
    </div>
    <div class="price-rate">
        @if($product->discount_price)
            <span class="old-price">
                                            <del>{{$product->base_price}}đ</del>
                                        </span>
            <span class="new-price">{{$product->discount_price}}đ</span>
        @else
            <span class="new-price">{{$product->base_price}}đ</span>
        @endif
    </div>
    <div class="short-description mt-20">
        <p>{{$product->description}}
        </p>
    </div>
    <form action="#">
        <input type="number" value="1"/>
        <button type="submit">Thêm vào Giỏ Hàng</button>
    </form>
    <div class="product-meta">
                                    <span>
                                        Category:
                                        <a href="#">{{$product->category->name}}</a>
                                    </span>
        <span>
                                        Tags:
                                        @foreach($tags as $tag)
                @if($product->tags->contains($tag))
                    <a href="#">{{$tag->name}},</a>
                @endif
            @endforeach
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
