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
                    @if(session('success'))
                        <div class="alert alert-success">{{session('success')}}</div>
                    @endif
                    <form action="{{route('product.update', $product->id)}}" method="POST"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="form-group position-relative text-center">
                            <img class="imagesForm" width="100" height="100" src="
                            @if($product->avatar)
                            {{asset('backend/images').'/'.$product->avatar}}
                            @else
                            {{asset('backend/images/product/default.png')}}
                            @endif"/>
                            <label class="formLabel" for="fileToAddProduct"><i class="fas fa-pen"></i>
                                <input style="display: none" type="file" id="fileToAddProduct" class="imagesAvatar"
                                       name="fileToUpload"></label>
                        </div>
                        <div class="form-group">
                            <label for="productNameUpdate">Tên:</label>
                            <input value="{{$product->name}}" type="text" name="name"
                                   class="form-control @error('name') is-invalid @enderror"
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
                                   class="form-control @error('desc') is-invalid @enderror" id="productDescUpdate">
                            @error('desc')
                            <span style="display: block" class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="productBasePriceUpdate">Giá gốc:</label>
                            <input value="{{$product->base_price}}" type="number" name="basePrice"
                                   class="form-control @error('basePrice') is-invalid @enderror"
                                   id="productBasePriceUpdate">
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
                        <div class="form-group">
                            <label for="price_product">Album ảnh (tối đa 6 file)</label>
                            <div class="multi-images">
                                <input type="hidden" name="delete_img" value="0">
                                <div class="img-item text-center">
                                    <label class="labelProduct" for="productImages"><i class="fal fa-plus-circle"></i>
                                        <input style="display: none" id="productImages" type='file' class="imgInp imgInp1" multiple name="images[]" />
                                    </label>
                                    <div class="img-list d-flex justify-content-between flex-wrap">
                                        @foreach($product->images as $img)
                                            <img src="{{ asset('backend/images/' . $img->path) }}"/>
                                        @endforeach
                                    </div>
                                    <p class="delete-img">Xóa</p>
                                </div>
                            </div>
                        </div>
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
@section('footer_script')
    <script>
        function read(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('.imagesForm').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }

        $(".imagesAvatar").change(function() {
            read(this);
        });

        function readURL(input, object) {
            if (input.files.length > 6) {
                alert('Tối đa upload 6 file');
                object.parents('.img-item').find('input[type=file]').val('');
                return  false;
            }
            if (input.files && input.files[0]) {
                for (i = 0; i < input.files.length; i++) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        object.parents('.img-item').find('.img-list').append('<img src="'+e.target.result+'" />');
                    }

                    reader.readAsDataURL(input.files[i]); // convert to base64 string
                }
            }
        }

        $(".imgInp").change(function() {
            $(this).parents('.img-item').find('.img-list').html('');
            readURL(this, $(this));
        });

        $('.delete-img').click(function () {
            $('input[name=delete_img]').val('1');
            $(this).parents('.img-item').find('.img-list').html('');
            $(this).parents('.img-item').find('input[type=file]').val('');
        });
    </script>
@endsection
