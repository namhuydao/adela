@extends('backend.layouts.master')
@section('title'){{'Edit Product'}}@endsection
@section('content')
    <div id="layoutSidenav">
        @include('backend.layouts.sideNav')
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Quản lý sản phẩm</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Sửa sản phẩm</li>
                    </ol>
                </div>
                <div style="width: 40%; margin: auto">
                    <form action="{{route('product.update', $product->id)}}" method="POST"
                          enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        {{--                        <div class="form-group position-relative text-center">--}}
                        {{--                            <img class="imagesForm" width="100" height="100" src=""/>--}}
                        {{--                            <label class="formLabel" for="fileToAddProduct"><i class="fas fa-pen"></i>--}}
                        {{--                                <input style="display: none" type="file" id="fileToAddProduct"--}}
                        {{--                                       name="fileToUpload"></label>--}}
                        {{--                        </div>--}}
                        <div class="form-group">
                            <label for="productNameUpdate">Tên:</label>
                            <input value="{{$product->name}}" type="text" name="name" class="form-control"
                                   id="productNameUpdate">
                            @error('name')
                            <span style="display: block" class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="productDescUpdate">Mô tả:</label>
                            <input value="{{$product->description}}" type="text" name="desc"
                                   class="form-control" id="productDescUpdate">
                            @error('desc')
                            <span style="display: block" class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="productBasePriceUpdate">Giá gốc:</label>
                            <input value="{{$product->base_price}}" type="number" name="basePrice"
                                   class="form-control" id="productBasePriceUpdate">
                            @error('basePrice')
                            <span style="display: block" class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="productDiscountPriceUpdate">Giá ưu đãi:</label>
                            <input value="{{$product->discount_price}}" type="number" name="discountPrice"
                                   class="form-control" id="productDiscountPriceUpdate">
                        </div>
                        {{--                            <label for="productThumbnailsAdd">Thumbnails:</label>--}}
                        {{--                            <div class="form-group position-relative text-center">--}}
                        {{--                                <img class="imagesForm" width="100" height="100" src="/superFood_MVC/backend/assets/images/product/default.png"/>--}}
                        {{--                                <label class="formLabel" for="productThumbnailsUpdate"><i class="fas fa-pen"></i><input--}}
                        {{--                                            style="display: none" type="file" id="productThumbnailsUpdate" multiple="multiple"--}}
                        {{--                                            name="productThumbnailsUpdate[]"></label>--}}
                        {{--                            </div>--}}
                        <div class="form-group">
                            <label for="productCategoryUpdate">Danh mục:</label>
                            <select name="category" id="productCategoryUpdate" class="form-control">
                                {!! $html !!}
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tag:</label>
                            @foreach ($tags as $key => $tag)
                                <label style="display: inline-block; width: 100%;">
                                    <input style="margin-right: 5px" name="tags[]"
                                           @if($product->tags->contains($tag))
                                           checked
                                           @endif
                                           type="checkbox" value="{{$tag->id}}">{{$tag->name}}
                                </label>
                            @endforeach
                        </div>
                        <button class="btn btn-primary">Sửa</button>
                    </form>
                </div>
            </main>
            @include('backend.layouts.footer')
        </div>
    </div>
@endsection
