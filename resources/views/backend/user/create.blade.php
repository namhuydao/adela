@extends('backend.layouts.master')
@section('title'){{'Create User'}}@endsection
@section('content')
    <div id="layoutSidenav">
        @include('backend.layouts.sideNav')
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Quản lý người dùng</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Thêm người dùng</li>
                    </ol>
                </div>
                <div style="width: 40%; margin: auto">
                    <form action="{{route('user.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group position-relative text-center">
                            <img class="imagesForm" width="100" height="100" src="{{asset('backend/images/user/default.png')}}"/>
                            <label class="formLabel" for="fileToAddUser"><i class="fas fa-pen"></i><input
                                        style="display: none" type="file" id="fileToAddUser" class="imagesAvatar"
                                        name="fileToUpload"></label>
                        </div>
                        <div class="form-group">
                            <label for="userFirstNameAdd">Tên:</label>
                            <input value="{{old('firstname')}}" type="text" name="firstname" class="form-control @error('firstname') is-invalid @enderror" id="userFirstNameAdd">
                            @error('firstname')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="userLastNameAdd">Họ:</label>
                            <input value="{{old('lastname')}}" type="text" name="lastname" class="form-control @error('lastname') is-invalid @enderror" id="userLastNameAdd">
                            @error('lastname')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="userEmailAdd">Email:</label>
                            <input value="{{old('email')}}" type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="userEmailAdd">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="userPasswordAdd">Mật khẩu:</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="userPasswordAdd">
                        </div>
                        <div class="form-group">
                            <label for="userRepasswordAdd">Nhập lại mật khẩu:</label>
                            <input type="password" name="password_confirmation" class="form-control" id="userRepasswordAdd">
                        </div>
                        <div class="form-group">
                            <label for="userRoleAdd">Nhóm quyền:</label>
                            <select name="role_id[]" class="form-control userRoleMultiple" multiple="multiple" id="userRoleAdd">
                                @foreach($roles as $role)
                                    <option value="{{$role->id}}">{{$role->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button class="btn btn-primary">Thêm</button>
                    </form>
                </div>
            </main>
            @include('backend.layouts.footer')
        </div>
    </div>
@endsection
@section('footer_script')
    <script>
        function read(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('.imagesForm').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }

        $(".imagesAvatar").change(function() {
            read(this);
        });
    </script>
@endsection
