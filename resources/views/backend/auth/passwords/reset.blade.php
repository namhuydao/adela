<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>Adela| Reset Password</title>
    <link href="{{ asset('backend/css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/css/core.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
          integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p"
          crossorigin="anonymous">
</head>

<body class="bg-primary">
<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header">
                                <h3 class="text-center font-weight-light my-4">Đặt lại mật khẩu</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{route('reset')}}" method="POST">
                                    @csrf
                                    <input type="hidden" value="{{$_GET['email']}}" name="email">
                                    <div class="form-group">
                                        <label for="">Mật khẩu mới :</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1">
                            <i class="far fa-lock-alt"></i>
                          </span>
                                            </div>
                                            <input class="form-control" aria-describedby="basic-addon1"
                                                   type="password" name="password"
                                                   id="newPassword">
                                            @error('password')
                                            <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Nhập lại mật khẩu:</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1">
                            <i class="far fa-key-skeleton"></i></span>
                                            </div>
                                            <input class="form-control" aria-describedby="basic-addon1"
                                                   type="password"
                                                   name="password_confirmation" id="confirmPassword">
                                        </div>
                                    </div>
                                    <div class="form-group text-right">
                                        <button class="btn btn-primary " name="resetPassword">Đặt lại mật khẩu
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer text-center">
                                <div class="small"><a href="{{route('register')}}">Chưa có tài khoản? Đăng kí ngay!</a>
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
<script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
<script src="{{asset('backend/js/scripts.js')}}"></script>
</body>

</html>
