@extends('backend.layouts.master')
@section('title'){{'Create Post'}}@endsection
@section('content')
    <div id="layoutSidenav">
        @include('backend.layouts.sideNav')
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Quản lý tin tức</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Thêm tin tức</li>
                    </ol>
                </div>
                <div style="width: 40%; margin: auto">
                    <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="form-group position-relative text-center">
                                <img class="imagesForm" width="100" height="100" src="{{asset('backend/assets/images/post/default.png')}}"/>
                                <label class="formLabel" for="fileToAddNews"><i class="fas fa-pen"></i><input
                                            style="display: none" type="file" id="fileToAddNews"
                                            name="fileToUpload"></label>
                            </div>
                            <div class="form-group">
                                <label for="newsTitleAdd">Tiêu đề:</label>
                                <input type="text" name="title" class="form-control" id="newsTitleAdd">
                                @error('title')
                                <span style="display: block" class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="newsDescAdd">Mô tả:</label>
                                <input type="text" name="desc" class="form-control" id="newsDescAdd">
                                @error('desc')
                                <span style="display: block" class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="newsContentAdd">Nội dung:</label>
                                <textarea type="text" name="content" class="form-control"
                                          id="newsContentAdd"></textarea>
                                @error('content')
                                <span style="display: block" class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
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

