@extends('backend.layouts.master')
@section('title'){{'Edit User'}}@endsection
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
                    @if(session('success'))
                        <div class="alert alert-success">{{session('success')}}</div>
                    @endif
                    <form action="{{route('user.update', $user->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group position-relative text-center">
                            <img class="imagesForm" width="100" height="100" src="
                            @if($user->image)
                            {{asset('backend/images').'/'.$user->image}}
                            @else
                            {{asset('backend/images/user/default.png')}}
                            @endif"/>
                            <label class="formLabel" for="fileToAddUser"><i class="fas fa-pen"></i><input
                                        style="display: none" type="file" id="fileToAddUser" class="imagesAvatar"
                                        name="fileToUpload"></label>
                        </div>
                        <div class="form-group">
                            <label for="userFirstNameUpdate">Tên:</label>
                            <input value="{{$user->firstname}}" type="text" name="firstname" class="form-control @error('firstname') is-invalid @enderror" id="userFirstNameUpdate">
                            @error('firstname')
                            <span style="display: block" class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="userLastNameUpdate">Họ:</label>
                            <input value="{{$user->lastname}}" type="text" name="lastname" class="form-control @error('lastname') is-invalid @enderror" id="userLastNameUpdate">
                            @error('lastname')
                            <span style="display: block" class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="userEmailUpdate">Email:</label>
                            <input value="{{$user->email}}" type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="userEmailUpdate">
                            @error('email')
                            <span style="display: block" class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="userPasswordUpdate">Mật khẩu:</label>
                            <input type="password" name="userPasswordUpdate" class="form-control" id="userPasswordUpdate">
                        </div>
                        <div class="form-group">
                            <label for="userRepasswordUpdate">Nhập lại mật khẩu:</label>
                            <input type="password" name="userRepasswordUpdate" class="form-control" id="userRepasswordUpdate">
                        </div>
                        <div class="form-group">
                            <label for="userRoleUpdate">Nhóm quyền:</label>
                            <select name="role_id[]" class="form-control userRoleMultiple" multiple="multiple" id="userRoleUpdate">
                                @foreach($roles as $role)
                                    <option @if($user->roles->contains($role))
                                            selected
                                            @endif value="{{$role->id}}">{{$role->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button class="btn btn-primary">Sửa</button>
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
