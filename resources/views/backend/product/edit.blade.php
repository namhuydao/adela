@if(!checkPer($_SESSION['user']['id'], 'product_edit'))
    @php(header('Location: /superFood_MVC/admin/dashboard'))
@endif
@extends('admin.layouts.master')
@section('title'){{'Add Product'}}@endsection
@section('content')
    <div id="layoutSidenav">
        @include('admin.layouts.sideNav')
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Quản lý sản phẩm</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="/superFood_MVC/admin/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active">Sửa sản phẩm</li>
                    </ol>
                </div>
                <div style="width: 40%; margin: auto">
                    <form action="/superFood_MVC/admin/product/update/{{$product->id}}" method="POST"
                          enctype="multipart/form-data">
                        <div class="form-group position-relative text-center">
                            <img class="imagesForm" width="100" height="100" src="/superFood_MVC/backend/assets/images/{{$product->avatar}}"/>
                            <label class="formLabel" for="fileToAddProduct"><i class="fas fa-pen"></i>
                                <input style="display: none" type="file" id="fileToAddProduct"
                                       name="fileToUpload"></label>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="productNameUpdate">Tên:</label>
                                <input value="{{$product->name}}" type="text" name="productNameUpdate" class="form-control"
                                       id="productNameUpdate">
                            </div>
                            <div class="form-group">
                                <label for="productDescUpdate">Mô tả:</label>
                                <input value="{{$product->description}}" type="text" name="productDescUpdate"
                                       class="form-control" id="productDescUpdate">
                            </div>
                            <div class="form-group">
                                <label for="productContentUpdate">Nội dung:</label>
                                <textarea type="text" name="productContentUpdate" class="form-control"
                                          id="productContentUpdate">{{$product->content}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="productBasePriceUpdate">Giá gốc:</label>
                                <input value="{{$product->base_price}}" type="number" name="productBasePriceUpdate"
                                       class="form-control" id="productBasePriceUpdate">
                            </div>
                            <div class="form-group">
                                <label for="productDiscountPriceUpdate">Giá ưu đãi:</label>
                                <input value="{{$product->discount_price}}" type="number" name="productDiscountPriceUpdate"
                                       class="form-control" id="productDiscountPriceUpdate">
                            </div>
                            <label for="productThumbnailsAdd">Thumbnails:</label>
                            <div class="form-group position-relative text-center">
                                <img class="imagesForm" width="100" height="100" src="/superFood_MVC/backend/assets/images/product/default.png"/>
                                <label class="formLabel" for="productThumbnailsUpdate"><i class="fas fa-pen"></i><input
                                            style="display: none" type="file" id="productThumbnailsUpdate" multiple="multiple"
                                            name="productThumbnailsUpdate[]"></label>
                            </div>
                            <div class="form-group">
                                <label for="productCategoryUpdate">Danh mục:</label>
                                <select name="productCategoryUpdate" id="productCategoryUpdate" class="form-control">
                                    {!! $html !!}
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tag:</label>
                                @foreach ($tags as $key => $tag)
                                    <label style="display: inline-block; width: 100%;">
                                        <input style="margin-right: 5px" name="tags[]"
                                               @foreach ($productTags as $key => $productTag)
                                               @if ($product->id == $productTag->product_id)
                                               @if($tag->id == $productTag->tag_id)
                                               checked
                                               @endif
                                               @endif
                                               @endforeach
                                               type="checkbox" value="{{$tag->id}}">{{$tag->name}}
                                    </label>
                                @endforeach
                            </div>
                            <button class="btn btn-primary">Sửa</button>
                        </div>
                    </form>
                </div>
            </main>
            @include('admin.layouts.footer')
        </div>
    </div>
@endsection