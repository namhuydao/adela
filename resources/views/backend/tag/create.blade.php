@extends('backend.layouts.master')
@section('title'){{'Add Tag'}}@endsection
@section('content')
    <div id="layoutSidenav">
        @include('backend.layouts.sideNav')
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Quản lý Tag</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Thêm Tag</li>
                    </ol>
                </div>
                <div style="width: 40%; margin: auto">
                    <form action="{{route('tag.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="tagNameAdd">Tên:</label>
                            <input type="text" name="name" class="form-control" id="tagNameAdd">
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
