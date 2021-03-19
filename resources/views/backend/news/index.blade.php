@if(!checkPer($_SESSION['user']['id'], 'post_view'))
    @php(header('Location: /superFood/admin/dashboard'))
@endif
@extends('admin.layouts.master')
@section('title'){{'News'}}@endsection
@section('content')
    <div id="layoutSidenav">
        @include('admin.layouts.sideNav')
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Quản lý tin tức</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="/superFood/admin/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active">Quản lý tin tức</li>
                    </ol>
                    @if(checkPer($_SESSION['user']['id'], 'post_add'))
                        <a href="/superFood/admin/news/create" class="btn btn-primary addBtn">Thêm tin tức
                            @endif
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
                                        @foreach($news as $key => $news_item)
                                            <tr>
                                                <td class="text-center"><img
                                                            src="/superFood/backend/assets/images/{{ $news_item->image }}"
                                                            alt="" width="100" height="100"></td>
                                                <td>{{$news_item->title}}</td>
                                                <td>{{$news_item->description}}</td>
                                                <td>{{$news_item->author}}</td>
                                                <td>
                                                    @foreach ($categories as $category)
                                                        @if ($news_item->category_id == $category->id)
                                                            {{$category->name}}
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @foreach ($newsTags as $newsTag)
                                                        @if ($news_item->id == $newsTag->news_id)
                                                            @foreach ($tags as $tag)
                                                                @if($tag->id == $newsTag->tag_id)
                                                                    {{$tag->name . ','}}
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @if(checkPer($_SESSION['user']['id'], 'post_edit'))
                                                        <a class="btn btn-primary"
                                                           href="/superFood/admin/news/edit/{{$news_item->id}}">Sửa</a>
                                                    @endif
                                                    @if(checkPer($_SESSION['user']['id'], 'post_delete'))
                                                        <a class="news_delete btn btn-danger"
                                                           href="/superFood/admin/news/delete/{{$news_item->id}}">Xóa</a>
                                                    @endif
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
            @include('admin.layouts.footer')
        </div>
    </div>
@endsection