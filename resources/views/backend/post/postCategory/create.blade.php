@extends('backend.layouts.master')
@section('title'){{'Create Post Category'}}@endsection
@section('content')
    <div id="layoutSidenav">
        @include('backend.layouts.sideNav')
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Quản lý danh mục tin tức</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Thêm danh mục</li>
                    </ol>
                </div>
                <div style="width: 40%; margin: auto">
                <form action="{{route('postCategory.store')}}" method="POST">
                    @csrf
                        <div class="form-group">
                            <label for="postCategoryNameAdd">Tên:</label>
                            <input type="text" name="name" class="form-control" id="postCategoryNameAdd">
                            @error('name')
                            <span style="display: block" class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <select name="categories" id="postCategoryCategoryAdd" class="form-control">
                                <option value="0"><b>Chọn là danh mục cha:</b></option>
                                {!! $html !!}
                            </select>
                        </div>
                    <button class="btn btn-primary">Thêm</button>
                </form>
                </div>
            </main>
            @include('backend.layouts.footer')
        </div>
    </div>
@endsection
