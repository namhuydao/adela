@extends('backend.layouts.master')
@section('title'){{'Create Role'}}@endsection
@section('content')
    <div id="layoutSidenav">
        @include('backend.layouts.sideNav')
        <div id="layoutSidenav_content" style="background: #f2f3f8">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Thêm quyền</h1>
                    <ol class="breadcrumb mb-4" style="background: white">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Thêm quyền</li>
                    </ol>
                    <form action="" method="POST">
                        <div class="role__content row">
                            <div class="col-md-4">
                                <div class="role__left">
                                    <div class="form-group">
                                        <label for="roleNameAdd">Tên quyền:</label>
                                        <input type="text" name="roleNameAdd" class="form-control" id="roleNameAdd">
                                    </div>
                                    <button type="submit"
                                            class="btn btn-primary addBtn">Lưu
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="role__right">

                                    <label class='perChecked' style="margin-top: 30px">
                                        <input
                                            style='margin-right: 5px;'
                                            name='inputPers'
                                            type='checkbox' checked
                                            value="">
                                    </label>

                                    <label style="display: inline-block; width: 100%; margin-left: 20px">
                                        <input style="margin-right: 5px;" name="pers[]"
                                               type="checkbox" checked
                                               value="">
                                    </label>
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
