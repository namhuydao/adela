@extends('backend.layouts.master')
@section('title'){{'Create Menu'}}@endsection
@section('content')
    <div id="layoutSidenav">
        @include('backend.layouts.sideNav')
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Quản lý Menu</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Thêm Menu</li>
                    </ol>
                </div>
                <div style="width: 40%; margin: auto">
                <form action="{{route('menu.store')}}" method="POST">
                    @csrf
                        <div class="form-group">
                            <label for="postCategoryNameAdd">Tên:</label>
                            <input type="text" name="name" class="form-control" id="postCategoryNameAdd">
                            @error('name')
                            <span style="display: block" class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <select name="categories" id="postCategoryCategoryAdd" class="form-control">
                                <option value="0"><b>Chọn là Menu cha:</b></option>
                                {!! $html !!}
                            </select>
                        </div>
                    <div class="form-group">
                        <label >Vị trí:</label>
                        <input type="number" name="number" class="form-control">
                        @error('number')
                        <span style="display: block" class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <button class="btn btn-primary">Thêm</button>
                </form>
                </div>
            </main>
            @include('backend.layouts.footer')
        </div>
    </div>
@endsection
