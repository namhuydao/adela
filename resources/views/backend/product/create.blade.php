@extends('backend.layouts.master')
@section('title'){{'Create Product'}}@endsection
@section('content')
    <div id="layoutSidenav">
        @include('backend.layouts.sideNav')
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Quản lý sản phẩm</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Thêm sản phẩm</li>
                    </ol>
                </div>
                <div style="width: 40%; margin: auto">
                    <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
{{--                            <div class="form-group position-relative text-center">--}}
                        {{--                                <img class="imagesForm" width="100" height="100" src="/superFood_MVC/backend/assets/images/product/default.png"/>--}}
                        {{--                                <label class="formLabel" for="productAvatar"><i class="fas fa-pen"></i><input--}}
                        {{--                                            style="display: none" type="file" id="productAvatar"--}}
                        {{--                                            name="fileToUpload"></label>--}}
                        {{--                            </div>--}}
                            <div class="form-group">
                                <label for="productNameAdd">Tên:</label>
                                <input value="{{old('name')}}" type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="productNameAdd">
                                @error('name')
                                <span style="display: block" class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="productDescAdd">Mô tả:</label>
                                <input value="{{old('desc')}}" type="text" name="desc" class="form-control @error('desc') is-invalid @enderror" id="productDescAdd">
                                @error('desc')
                                <span style="display: block" class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="productBasePriceAdd">Giá gốc:</label>
                                <input value="{{old('basePrice')}}" type="number" name="basePrice" class="form-control @error('basePrice') is-invalid @enderror" id="productBasePriceAdd">
                                @error('basePrice')
                                <span style="display: block" class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="productDiscountPriceAdd">Giá ưu đãi:</label>
                                <input value="{{old('discountPrice')}}" type="number" name="discountPrice" class="form-control" id="productDiscountPriceAdd">
                            </div>
{{--                            <label for="productThumbnailsAdd">Thumbnails:</label>--}}
{{--                            <div class="form-group position-relative text-center">--}}
{{--                                <img class="imagesForm" width="100" height="100" src="/superFood_MVC/backend/assets/images/product/default.png"/>--}}
{{--                                <label class="formLabel" for="productThumbnailsAdd"><i class="fas fa-pen"></i><input--}}
{{--                                            style="display: none" type="file" id="productThumbnailsAdd" multiple="multiple"--}}
{{--                                            name="productThumbnailsAdd[]"></label>--}}
{{--                            </div>--}}
                            <div class="form-group">
                                <label for="newsCategoryAdd">Danh mục:</label>
                                <select name="category" id="newsCategoryAdd" class="form-control">
                                    {!! $html !!}
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tag:</label>
                                @foreach ($tags as $key => $tag)
                                    <label style="display: inline-block; width: 100%;"><input style="margin-right: 5px" name="tags[]" type="checkbox" value="{{$tag->id}}">{{$tag->name}}</label>
                                @endforeach
                            </div>
                            <button class="btn btn-primary">Thêm</button>
                    </form>
                </div>
            </main>
            @include('backend.layouts.footer')
        </div>
    </div>
@endsection
