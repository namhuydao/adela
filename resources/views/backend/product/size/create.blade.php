@extends('backend.layouts.master')
@section('title'){{'Create Size'}}@endsection
@section('content')
    <div id="layoutSidenav">
        @include('backend.layouts.sideNav')
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Quản lý Size</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Thêm Size</li>
                    </ol>
                </div>
                <div style="width: 40%; margin: auto">
                    <form action="{{route('size.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="productCategoryNameAdd">Tên:</label>
                            <input value="{{old('name')}}" type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="productCategoryNameAdd">
                            @error('name')
                            <span style="display: block" class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <button class="btn btn-primary">Thêm</button>
                    </form>
                </div>
            </main>
            @include('backend.layouts.footer')
        </div>
    </div>
@endsection
