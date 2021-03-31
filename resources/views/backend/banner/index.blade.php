@extends('backend.layouts.master')
@section('title'){{'Banner'}}@endsection
@section('content')
    <div id="layoutSidenav">
        @include('backend.layouts.sideNav')
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Quản lý Banner</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Quản lý Banner</li>
                    </ol>
                    @can('banner_create')
                        <a href="{{route('banner.create')}}" class="btn btn-primary addBtn">Thêm Banner
                        </a>
                    @endcan
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i>
                            Bảng banner
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>Tên</th>
                                        <th>Collection</th>
                                        <th>Subtitle</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Hành động</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($banners as $banner)
                                        <tr>
                                            <td>{{$banner->name}}</td>
                                            <td>{{$banner->collection}}</td>
                                            <td>{{$banner->subtitle}}</td>
                                            <td>{{$banner->title}}</td>
                                            <td>{{$banner->description}}</td>
                                            <td class="d-flex">
                                                @can('banner_edit')
                                                    <a class="btn btn-primary mr-1"
                                                       href="{{route('banner.edit',$banner->id)}}">Sửa</a>
                                                @endcan
                                                @can('banner_delete')
                                                    <form action="{{route('banner.destroy',$banner->id)}}"
                                                          method="POST">
                                                        @csrf
                                                        <button class="delete btn btn-danger">Xóa</button>
                                                    </form>
                                                @endcan
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
