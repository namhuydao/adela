@extends('backend.layouts.master')
@section('title'){{'Edit Tag'}}@endsection
@section('content')
    <div id="layoutSidenav">
        @include('backend.layouts.sideNav')
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Quản lý Tag</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Sửa Tag</li>
                    </ol>
                </div>
                <div style="width: 40%; margin: auto">
                    <form action="{{route('tag.update', $tag->id)}}" method="POST">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="tagNameUpdate">Tên:</label>
                            <input value="{{$tag->name}}" type="text" name="name" class="form-control" id="tagNameUpdate">
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
