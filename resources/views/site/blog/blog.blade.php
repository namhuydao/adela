@extends('site.layouts.master')
@section('content')
    <body class="blog">
    <!-- page-wrapper start -->
    <div id="page-wrapper">
        <!-- breadcrumbs-area start -->
        <div class="breadcrumbs-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-content text-center">
                            <h2>Tin Tức</h2>
                            <ul>
                                <li><a href="{{route('home')}}">Trang Chủ /</a></li>
                                <li class="active"><a href="#">Tin Tức</a></li>
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
                        <!-- blog-total-area start -->
                        <div class="blog-total-area">
                            <div class="row">
                                @foreach($blogs as $blog)
                                <div class="col-6 col-md-6">
                                    <!-- single-blog-2 start -->
                                        <div class="single-blog single-blog-2 mb-30">
                                            <div class="blog-2-img">
                                                <a href="{{route('blogDetails', $blog->id)}}"><img
                                                        src="{{asset('backend/images') . '/'. $blog->image}}"
                                                        alt="man"></a>
                                            </div>
                                            <div class="blog-2-content blog-content">
                                                <span>{{\Carbon\Carbon::parse($blog->created_at)->toFormattedDateString()}}</span>
                                                <h3><a href="{{route('blogDetails', $blog->id)}}">{{$blog->title}}</a></h3>
                                                <span>By {{$blog->user->firstname}}</span>
                                                <p>{{$blog->description}}</p>
                                                <a href="{{route('blogDetails', $blog->id)}}">Xem thêm ...</a>
                                                <div class="meta">
                                                    <a href="#"><i class="fa fa-heart-o"></i>30 lượt thích</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- single-blog-2 end -->
                                </div>
                                @endforeach
                            </div>
                            <!-- page-numbers start -->
                            <div class="page-numbers mb-rsp-3">
                                {{$blogs->links()}}
{{--                                <ul>--}}
{{--                                    <li class="active"><a href="#">1</a></li>--}}
{{--                                    <li><a href="#">2</a></li>--}}
{{--                                    <li><a href="#"><i class="fa fa-angle-right"></i></a></li>--}}
{{--                                </ul>--}}
                            </div>
                            <!-- page-numbers end -->
                        </div>
                        <!-- blog-total-area end -->
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
                                    @foreach($blogsLatest as $latest)
                                    <!-- single-post start -->
                                    <div class="single-post mb-20">
                                        <div class="post-img">
                                            <a href="#"><img src="{{asset('backend/images') . '/'. $latest->image}}" alt="post"></a>
                                        </div>
                                        <div class="post-text">
                                            <h4><a href="{{route('blogDetails', $latest->id)}}">{{$latest->title}}</a></h4>
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
