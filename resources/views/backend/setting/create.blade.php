@extends('backend.layouts.master')
@section('title'){{'Create Setting'}}@endsection
@section('content')
    <div id="layoutSidenav">
        @include('backend.layouts.sideNav')
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Quản lý settings</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Thêm settings</li>
                    </ol>
                </div>
                <div style="width: 40%; margin: auto">
                    <form action="{{route('setting.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="productCategoryNameAdd">Config key:</label>
                            <input value="{{old('key')}}" type="text" name="key" class="form-control @error('key') is-invalid @enderror" id="productCategoryNameAdd">
                            @error('key')
                            <span style="display: block" class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="productCategoryNameAdd">Config value:</label>
                            <textarea rows="5" name="value" class="form-control @error('value') is-invalid @enderror" id="productCategoryNameAdd"></textarea>
                            @error('value')
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
