@extends('backend.layouts.master')
@section('title'){{'Role'}}@endsection
@section('content')
    <div id="layoutSidenav">
        @include('backend.layouts.sideNav')
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Quản lý vai trò</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Quản lý vai trò</li>
                    </ol>
                        <a href="{{route('role.create')}}" class="btn btn-primary addBtn">Thêm vai trò

                        </a>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Bảng vai trò
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
                                        @foreach($roles as $role)
                                            <tr>
                                                <td>{{$role->id}}</td>
                                                <td>{{$role->name}}</td>
                                                <td class="d-flex">
                                                    <a class="btn btn-primary mr-1"
                                                       href="{{route('role.edit',$role->id)}}">Sửa</a>

                                                    <form action="{{route('role.destroy',$role->id)}}"
                                                          method="POST">
                                                        @csrf
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
