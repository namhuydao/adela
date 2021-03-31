@extends('backend.layouts.master')
@section('title'){{'Settings'}}@endsection
@section('content')
    <div id="layoutSidenav">
        @include('backend.layouts.sideNav')
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Quản lý settings</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Quản lý settings</li>
                    </ol>
                    @can('setting_create')
                        <a href="{{route('setting.create')}}" class="btn btn-primary addBtn">Thêm settings
                        </a>
                    @endcan
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i>
                            Bảng settings
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>Config Key</th>
                                        <th>Config Value</th>
                                        <th>Hành động</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($settings as $setting)
                                        <tr>
                                            <td>{{$setting->config_key}}</td>
                                            <td>{{$setting->config_value}}</td>
                                            <td class="d-flex">
                                                @can('setting_edit')
                                                    <a class="btn btn-primary mr-1"
                                                       href="{{route('setting.edit',$setting->id)}}">Sửa</a>
                                                @endcan
                                                @can('setting_delete')
                                                    <form action="{{route('setting.destroy',$setting->id)}}"
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
