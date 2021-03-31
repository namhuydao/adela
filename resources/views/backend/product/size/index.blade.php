@extends('backend.layouts.master')
@section('title'){{'Size'}}@endsection
@section('content')
    <div id="layoutSidenav">
        @include('backend.layouts.sideNav')
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Quản lý size</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Quản lý size</li>
                    </ol>
                    @can('size_create')
                        <a href="{{route('size.create')}}" class="btn btn-primary addBtn">Thêm size
                        </a>
                    @endcan
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i>
                            Bảng size
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên</th>
                                        <th>Hành động</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($sizes as $size)
                                        <tr>
                                            <td>{{$size->id}}</td>
                                            <td>{{$size->name}}</td>
                                            <td class="d-flex">
                                                @can('size_edit')
                                                    <a class="btn btn-primary mr-1"
                                                       href="{{route('size.edit',$size->id)}}">Sửa</a>
                                                @endcan
                                                @can('size_delete')
                                                    <form action="{{route('size.destroy',$size->id)}}"
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
