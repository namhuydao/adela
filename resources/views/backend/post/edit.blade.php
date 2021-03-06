@extends('backend.layouts.master')
@section('title'){{'Edit Post'}}@endsection
@section('content')
    <div id="layoutSidenav">
        @include('backend.layouts.sideNav')
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Quản lý tin tức</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Sửa tin tức</li>
                    </ol>
                </div>
                <div style="width: 40%; margin: auto">
                    @if(session('success'))
                        <div class="alert alert-success">{{session('success')}}</div>
                    @endif
                    <form action="{{route('post.update',$post->id)}}" method="POST"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="form-group position-relative text-center">
                            <img class="imagesForm" width="100" height="100" src="
                            @if($post->image)
                            {{asset('backend/images').'/'.$post->image}}
                            @else
                            {{asset('backend/images/post/default.png')}}
                            @endif"/>
                            <label class="formLabel" for="fileToAddNews"><i class="fas fa-pen"></i>
                                <input style="display: none" type="file" id="fileToAddNews" class="imagesAvatar"
                                       name="fileToUpload"></label>
                        </div>
                        <div class="form-group">
                            <label for="newsTitleUpdate">Tiêu đề:</label>
                            <input value="{{$post->title}}" type="text" name="title" class="form-control"
                                   id="newsTitleUpdate">
                            @error('title')
                            <span style="display: block" class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="newsDescUpdate">Mô tả:</label>
                            <input value="{{$post->description}}" type="text" name="desc"
                                   class="form-control" id="newsDescUpdate">
                            @error('desc')
                            <span style="display: block" class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="newsContentUpdate">Nội dung:</label>
                            <textarea type="text" name="content" class="form-control"
                                      id="newsContentUpdate">{{$post->content}}</textarea>
                            @error('content')
                            <span style="display: block" class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="newsCategoryUpdate">Danh mục:</label>
                            <select name="category" id="newsCategoryUpdate" class="form-control">
                                {!! $html !!}
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tag:</label>
                            @foreach ($tags as $key => $tag)
                                <label style="display: inline-block; width: 100%;">
                                    <input style="margin-right: 5px" name="tags[]"
                                           @if($post->tags->contains($tag))
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
    </script>
@endsection
