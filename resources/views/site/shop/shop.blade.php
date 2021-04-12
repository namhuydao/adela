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
                            <h2>{{ @$category->name }}</h2>
                            <ul>
                                <li><a href="{{route('home')}}">Trang chủ /</a></li>
                                <li class="active"><a href="{{URL::to(@$category->name)}}">{{ @$category->name }}</a></li>
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
                                        <<option selected="selected" value="">Sắp xếp theo: Mặc Định</option>
                                        <option value="name asc" {{ @$_GET['sort'] == 'name asc' ? 'selected' : '' }}>Sắp xếp theo: Tên (A - Z)</option>
                                        <option value="name desc" {{ @$_GET['sort'] == 'name desc' ? 'selected' : '' }}>Sắp xếp theo: Tên (Z - A)</option>
                                        <option value="base_price asc" {{ @$_GET['sort'] == 'base_price asc' ? 'selected' : '' }}>Giá tăng dần</option>
                                        <option value="base_price desc" {{ @$_GET['sort'] == 'base_price desc' ? 'selected' : '' }}>Giá giảm dần</option>
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
                        @include('site.shop.partials.product_items')
                    </div>
                    <div class="col-12 col-lg-3">
                        <!-- shop-left-area start -->
                        <div class="shop-left-area">
                                @include('site.shop.partials.filter_products')
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
                        // quality: $('.item3 input[name=quality]').val()
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
