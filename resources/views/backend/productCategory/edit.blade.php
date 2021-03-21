@extends('backend.layouts.master')
@section('title'){{'Edit Product Category'}}@endsection
@section('content')
    <div id="layoutSidenav">
        @include('backend.layouts.sideNav')
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Quản lý danh mục sản phẩm</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Sửa danh mục</li>
                    </ol>
                </div>
                <div style="width: 40%; margin: auto">
                    <form action="{{route('productCategory.update', $category->id)}}" method="POST">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="productCategoryNameUpdate">Tên:</label>
                            <input value="{{$category->name}}" type="text" name="name" class="form-control" id="productCategoryNameUpdate">
                            @error('name')
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
