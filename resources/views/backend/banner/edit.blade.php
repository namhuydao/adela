@extends('backend.layouts.master')
@section('title'){{'Edit Banner'}}@endsection
@section('content')
    <div id="layoutSidenav">
        @include('backend.layouts.sideNav')
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Quản lý Banner</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Sửa Banner</li>
                    </ol>
                </div>
                <div style="width: 40%; margin: auto">
                    @if(session('success'))
                        <div class="alert alert-success">{{session('success')}}</div>
                    @endif
                    <form action="{{route('banner.update', $banner->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group position-relative text-center">
                            <img class="imagesForm" width="100" height="100"
                                 src="@if($banner->image)
                                 {{asset('backend/images').'/'.$banner->image}}
                                 @else
                                 {{asset('backend/images/product/default.png')}}
                                 @endif"/>
                            <label class="formLabel" for="productAvatar"><i class="fas fa-pen"></i><input
                                    style="display: none" type="file" id="productAvatar" class="imagesAvatar"
                                    name="fileToUpload"></label>
                        </div>
                        <div class="form-group">
                            <label for="productCategoryNameAdd">Tên:</label>
                            <input value="{{$banner->name}}" type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="productCategoryNameAdd">
                            @error('name')
                            <span style="display: block" class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="productCategoryNameAdd">Collection:</label>
                            <input value="{{$banner->collection}}" type="text" name="collection" class="form-control @error('collection') is-invalid @enderror" id="productCategoryNameAdd">
                            @error('collection')
                            <span style="display: block" class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="productCategoryNameAdd">Subtitle:</label>
                            <input value="{{$banner->subtitle}}" type="text" name="subtitle" class="form-control @error('subtitle') is-invalid @enderror" id="productCategoryNameAdd">
                            @error('subtitle')
                            <span style="display: block" class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="productCategoryNameAdd">Title:</label>
                            <input value="{{$banner->title}}" type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="productCategoryNameAdd">
                            @error('title')
                            <span style="display: block" class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="productCategoryNameAdd">Description:</label>
                            <input value="{{$banner->description}}" type="text" name="description" class="form-control @error('description') is-invalid @enderror" id="productCategoryNameAdd">
                            @error('description')
                            <span style="display: block" class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <button class="btn btn-primary">Sửa</button>
                    </form>
                </div>
            </main>
            @include('backend.layouts.footer')
        </div>
    </div>
@endsection
