@extends('site.layouts.master')
@section('content')
    <body class="blog-details">
    <!-- page-wrapper start -->
    <div id="page-wrapper">
        <!-- breadcrumbs-area start -->
        <div class="breadcrumbs-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-content text-center">
                            <h2>Chi Tiết Bài Viết</h2>
                            <ul>
                                <li><a href="{{route('home')}}">Trang Chủ /</a></li>
                                <li class="active"><a href="#">Chi Tiết Bài Viết</a></li>
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
                    <div class="col-12 col-lg-8">
                        <!-- blog-details-area start -->
                        <div class="blog-details-area">
                            <div class="blog-details-img">
                                <a href="#"><img src="{{asset('backend/images') . '/'.$blog->image}}" alt="banner"></a>
                            </div>
                            <div class="blog_title text-center py-4">
                                <h2>{{$blog->title}}</h2>
                            </div>
                            <div class="blog-info">
                                {!! $blog->content !!}
                                <div class="user-info">
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <div class="cats-tags-wrap mb-rsp-3">
                                                <i class="fa fa-list-alt"></i>Categories: <a
                                                    href="#">{{$blog->category->name}}</a>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="user-share">
                                                <span>Chia sẻ :</span>
                                                <ul>
                                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                                    <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                                                    <li><a href="#"><i class="fab fa-pinterest"></i></a></li>
                                                    <li><a href="#"><i class="fab fa-tumblr"></i></a></li>
                                                    <li><a href="#"><i class="fab fa-reddit"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="next-prev-area">
                                    @if($previous)
                                        <a href="{{route('blogDetails', $previous->id)}}" class="next"><i
                                                class="fa fa-angle-left"></i>Trang trước</a>
                                    @endif
                                    @if($next)
                                        <a href="{{route('blogDetails', $next->id)}}" class="previews">Trang sau<i
                                                class="fa fa-angle-right"></i></a>
                                    @endif
                                </div>
                            </div>
                            <!-- comments-area start -->
                            <div class="comments-area mt-40">
                                <h3><span> Có 3 thành viên cảm ơn tới Adella cho bài viết này</span></h3>
                                <!-- single-comments start -->
                                <div class="single-comments">
                                    <div class="comment-img">
                                        <img src="../../../../public/site/images/banner/11.jpg" alt="man"/>
                                    </div>
                                    <div class="comment-text">
                                        <a href="#">chị Thanh Nga</a>
                                        <span>August 10, 2019 at 11:09 am</span>
                                        <p>Ăn mặc đẹp không những khiến bạn đẹp hơn mà còn khiến bạn thành công hơn, vì
                                            vậy chúng ta nên mặc đẹp. Thời trang Adella khiến tôi rất hài lòng về kiểu
                                            dáng và chất lượng. Tôi luôn chọn trang phục Adella làm bạn đồng hành.</p>
                                        <div class="reply">
                                            <a href="#">Trả lời</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- single-comments end -->
                                <!-- single-comments start -->
                                <div class="single-comments">
                                    <div class="comment-img">
                                        <img src="../../../../public/site/images/banner/11.jpg" alt="man"/>
                                    </div>
                                    <div class="comment-text">
                                        <a href="#">chị Phạm Nhung</a>
                                        <span>August 10, 2019 at 11:09 am</span>
                                        <p>Chúc Adella càng ngày càng phát triển hơn nữa. Sẽ đồng hành cùng với Adella
                                            dài dài.</p>
                                        <div class="reply">
                                            <a href="#">Trả lời</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- single-comments end -->
                                <!-- single-comments start -->
                                <div class="single-comments single-comments-2">
                                    <div class="comment-img">
                                        <img src="../../../../public/site/images/banner/11.jpg" alt="man"/>
                                    </div>
                                    <div class="comment-text">
                                        <a href="#">chị Mỹ Trần</a>
                                        <span>August 10, 2019 at 11:09 am</span>
                                        <p>Đến với Adella, không chỉ có trang phục công sở, bạn còn có thể lựa chọn
                                            trang phục đi chơi, dự tiệc… rất phong phú để bạn lựa chọn. Tôi còn rất ấn
                                            tượng với Adella ở đường kim mũi chỉ sắc nét và chắc chắn, và chiếc quần âu
                                            hay chiếc áo dạ luôn có đính kèm cúc sơ cua- đó là sự chu đáo mà Adella dành
                                            tới khách hàng của mình.</p>
                                        <div class="reply">
                                            <a href="#">Trả lời</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- single-comments end -->
                            </div>
                            <!-- comment-area end -->
                            <!-- comment-respond-area start -->
                            <div class="comment-respond-area mb-rsp-3">
                                <h3>Ý kiến của bạn </h3>
                                <p>Email của bạn sẽ không được công bố </p>
                                <div class="single-form">
                                    <form action="#">
                                        <textarea name="comment" id="comment" cols="30" rows="10"
                                                  placeholder="Viết bình luận của bạn tại đây"></textarea>
                                    </form>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="single-form">
                                            <form action="#">
                                                <input type="text" placeholder="Tên của bạn *"/>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="single-form">
                                            <form action="#">
                                                <input type="text" placeholder="Email của bạn*"/>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <a href="#">Gửi bình luận</a>
                            </div>
                            <!-- comment-respond-area end -->
                        </div>
                        <!-- blog-details-area end -->
                    </div>
                    <div class="col-12 col-lg-4">
                        <!-- blog-right-area start -->
                        <div class="blog-right-area">
                            <!-- blog-right start -->
                            <div class="blog-right mb-50 mb-rsp-3">
                                <form action="#">
                                    <input type="text" placeholder="Tìm Kiếm"/>
                                    <button type="submit"><i class="fa fa-search"></i></button>
                                </form>
                            </div>
                            <!-- blog-right end -->
                            <!-- blog-right start -->
                            <div class="blog-right mb-50 mb-rsp-3">
                                <h3>Bài Viết Mới Nhất</h3>
                                <div class="sidebar-post">
                                    <!-- single-post start -->
                                    @foreach($blogsLatest as $latest)
                                        <div class="single-post mb-20">
                                            <div class="post-img">
                                                <a href="#"><img src="{{asset('backend/images') . '/'. $latest->image}}"
                                                                 alt="post"></a>
                                            </div>
                                            <div class="post-text">
                                                <h4>
                                                    <a href="{{route('blogDetails', $latest->id)}}">{{$latest->title}}</a>
                                                </h4>
                                                <span>{{\Carbon\Carbon::parse($latest->created_at)->toFormattedDateString()}}</span>
                                            </div>
                                        </div>
                                @endforeach
                                <!-- single-post end -->
                                </div>
                            </div>
                            <!-- blog-right end -->
                            <!-- blog-right start -->
                            <div class="blog-right mb-50 mb-rsp-3">
                                <h3>Bài Viết Xem Nhiều Nhất</h3>
                                <div class="sidebar-post">
                                    <!-- single-post start -->
                                    <div class="single-post mb-20">
                                        <div class="post-img">
                                            <a href="#"><img src="../../../../public/site/images/blog/2.jpg" alt="post"></a>
                                        </div>
                                        <div class="post-text">
                                            <h4><a href="">Các cách chăm sóc Sneaker.</a></h4>
                                            <span>August 10, 2019</span>
                                        </div>
                                    </div>
                                    <!-- single-post end -->
                                </div>
                            </div>
                            <!-- blog-right end -->
                            <!-- blog-right start -->
                            <div class="blog-right mb-50 mb-rsp-3">
                                <h3>Danh mục tin tức</h3>
                                <ul>
                                    @foreach($blogCategories as $category)
                                        <li><a href="#">{{$category->name}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <!-- blog-right end -->
                            <!-- blog-right-start -->
                            <div class="blog-right">
                                <h3>Tags</h3>
                                <div class="tag-area">
                                    @foreach($tags as $tag)
                                        <a href="#">{{$tag->name}}</a>
                                    @endforeach
                                </div>
                            </div>
                            <!-- blog-right-end -->
                        </div>
                        <!-- blog-right-area end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- shop-main-area end -->
    </div>
    <!-- page-wrapper end -->
@endsection
