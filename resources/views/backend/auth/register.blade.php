<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>Adela| Register</title>
    <link href="{{ asset('backend/css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/css/core.css') }}" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js"
            crossorigin="anonymous"></script>
</head>
<body class="bg-primary">
<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header"><h3 class="text-center font-weight-light my-4">Tạo tài khoản</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{route('register')}}" method="POST">
                                    @csrf
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputFirstName">{{ __('Tên') }}</label>
                                                <input value="{{ old('firstname') }}" name="firstname"
                                                       class="form-control py-4 @error('firstname') is-invalid @enderror"
                                                       id="inputFirstName"
                                                       type="text" placeholder="Nhập tên"/>
                                                @error('firstname')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputLastName">{{ __('Họ') }}</label>
                                                <input value="{{ old('lastname') }}" name="lastname"
                                                       class="form-control py-4 @error('lastname') is-invalid @enderror"
                                                       id="inputLastName"
                                                       type="text" placeholder="Nhập họ"/>
                                                @error('lastname')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputEmailAddress">{{ __('Email') }}</label>
                                        <input value="{{ old('email') }}" name="email"
                                               class="form-control py-4 @error('email') is-invalid @enderror"
                                               id="inputEmailAddress"
                                               type="text" aria-describedby="emailHelp"
                                               placeholder="Nhập Email"/>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="small mb-1"
                                                       for="inputPassword">{{ __('Mật khẩu') }}</label>
                                                <input name="password"
                                                       class="form-control py-4 @error('password') is-invalid @enderror"
                                                       id="inputPassword"
                                                       type="password" placeholder="Nhập mật khẩu"/>
                                            </div>
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="small mb-1"
                                                       for="inputConfirmPassword">{{ __('Xác nhận lại mật khẩu') }}</label>
                                                <input name="password_confirmation" class="form-control py-4"
                                                       id="inputConfirmPassword" type="password"
                                                       placeholder="Xác nhận mật khẩu"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mt-4 mb-0">
                                        <button class="btn btn-primary btn-block">Tạo tài khoản
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer text-center">
                                <div class="small"><a href="{{route('login')}}">Đã có tài khoản? Đăng nhập ngay!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <div id="layoutAuthentication_footer">
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Bản quyền &copy; Website của bạn 2020</div>
                    <div>
                        <a href="#">Chính sách Bảo mật</a>
                        &middot;
                        <a href="#">Điều khoản & Điều kiện</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
<script src="{{asset('backend/js/scripts.js')}}"></script>
</body>
</html>
