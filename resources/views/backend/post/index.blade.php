@extends('backend.layouts.master')
@section('title'){{'Post'}}@endsection
@section('content')
    <div id="layoutSidenav">
        @include('backend.layouts.sideNav')
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Quản lý tin tức</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Quản lý tin tức</li>
                    </ol>
                    <a href="{{route('post.create')}}" class="btn btn-primary addBtn">Thêm tin tức
                    </a>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i>
                            Bảng tin tức
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>Ảnh tin</th>
                                        <th>Tiêu đề</th>
                                        <th>Mô tả</th>
                                        <th>Tác giả</th>
                                        <th>Danh mục</th>
                                        <th>Tags</th>
                                        <th>Hành động</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($posts as $post)
                                        <tr>
                                            <td class="text-center"><img
                                                    src="
                                                @if($post->image)
                                                    {{asset('backend/assets/images').'/'.$post->image}}
                                                    @else
                                                    {{asset('backend/assets/images/post/default.png')}}
                                                    @endif"
                                                    alt="" width="100" height="100"></td>
                                            <td>{{$post->title}}</td>
                                            <td>{{$post->description}}</td>
                                            <td>{{$post->user->firstname . ' ' . $post->user->lastname}}</td>
                                            <td>{{$post->category->name}}</td>
                                            <td>
                                                @foreach($post->tags as $tag)
                                                    {{$tag->name}},
                                                @endforeach
                                            </td>
                                            <td class="d-flex">
                                                <a class="btn btn-primary mr-1"
                                                   href="{{route('post.edit', $post->id)}}">Sửa</a>
                                                <form action="{{route('post.destroy',$post->id)}}"
                                                      method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="delete btn btn-danger">Xóa</button>
                                                </form>

                                            </td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            @include('backend.layouts.footer')
        </div>
    </div>
@endsection
