@extends('backend.layouts.master')
@section('title'){{'Create Role'}}@endsection
@section('content')
    <div id="layoutSidenav">
        @include('backend.layouts.sideNav')
        <div id="layoutSidenav_content" style="background: #f2f3f8">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Thêm vai trò</h1>
                    <ol class="breadcrumb mb-4" style="background: white">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Thêm vai trò</li>
                    </ol>
                    <form action="{{route('role.store')}}" method="POST">
                        @csrf
                        <div class="role__content row">
                            <div class="col-md-4">
                                <div class="role__left">
                                    <div class="form-group">
                                        <label for="roleCodeAdd">Code:</label>
                                        <input value="{{old('code')}}" type="text" name="code" class="form-control @error('code') is-invalid @enderror" id="roleCodeAdd">
                                        @error('code')
                                        <span style="display: block" class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="roleNameAdd">Tên:</label>
                                        <input value="{{old('name')}}" type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="roleNameAdd">
                                        @error('name')
                                        <span style="display: block" class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <button type="submit"
                                            class="btn btn-primary addBtn">Lưu
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="role__right">
                                    <label style="margin-top: 30px">
                                        <input
                                            style='margin-right: 5px;' class="perAll"
                                            type='checkbox'> Chọn tất cả
                                    </label>
                                    @foreach($parentPermissions as $parentPermission)
                                        <div class="parentCheck">
                                            <label>
                                                <input
                                                    style='margin-right: 5px; margin-left: 30px' class="perChecked"
                                                    type='checkbox'
                                                    value="{{$parentPermission->id}}">{{$parentPermission->name}}
                                            </label>
                                            @foreach($parentPermission->permissionChildren as $permissionChild)
                                                <label
                                                    style="display: inline-block; width: 100%; margin-left: 60px">
                                                    <input class="childrenCheck" style="margin-right: 5px;"
                                                           name="pers[]"
                                                           type="checkbox"
                                                           value="{{$permissionChild->id}}">{{$permissionChild->name}}
                                                </label>
                                            @endforeach
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </main>
            @include('backend.layouts.footer')
        </div>
    </div>
@endsection
