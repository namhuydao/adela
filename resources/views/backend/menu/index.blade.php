@extends('backend.layouts.master')
@section('title'){{'Menu'}}@endsection
@section('content')
    <div id="layoutSidenav">
        @include('backend.layouts.sideNav')
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Quản lý Menu</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Quản lý Menu</li>
                    </ol>
                    @can('menu_create')
                        <a href="{{route('menu.create')}}" class="btn btn-primary addBtn">Thêm Menu
                        </a>
                    @endcan
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i>
                            Bảng Menu
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên</th>
                                        <th>Slug</th>
                                        <th>Vị trí</th>
                                        <th>Hành động</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($menus as $menu)
                                        <tr>
                                            <td>{{$menu->id}}</td>
                                            <td>{{$menu->name}}</td>
                                            <td>{{$menu->slug}}</td>
                                            <td>{{$menu->order_number}}</td>
                                            <td class="d-flex">
                                                @can('menu_edit')
                                                    <a class="btn btn-primary mr-1"
                                                       href="{{route('menu.edit',$menu->id)}}">Sửa</a>
                                                @endcan
                                                @can('menu_delete')
                                                    <form action="{{route('menu.destroy',$menu->id)}}"
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
