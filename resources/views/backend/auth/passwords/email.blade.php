<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>superFood_MVC| Reset Password</title>
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
                    <div class="col-lg-5">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header"><h3 class="text-center font-weight-light my-4">Lấy lại mật
                                    khẩu</h3></div>
                            <div class="card-body">
                                @if (session('message'))
                                    <div class="alert alert-success" role="alert">
                                        {{session('message')}}
                                    </div>
                                @endif
                                <div class="small mb-3 text-muted">Nhập Email và chúng tôi sẽ gửi link để lấy lại mật
                                    khẩu
                                </div>
                                <form method="POST" action="{{route('forgot')}}">
                                    @csrf
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputEmailAddress">Email</label>
                                        <input value="{{old('email')}}" name="email"
                                               class="form-control py-4 @error('email') is-invalid @enderror" id="inputEmailAddress"
                                               type="email"
                                               placeholder="Nhập Email"/>
                                        @error('email')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                        <a class="small" href="{{route('login')}}">Trở về Đăng nhập</a>
                                        <button type="submit" name="forgotBtn" class="btn btn-primary">Đặt lại mật
                                            khẩu
                                        </button>
                                    </div>
                                </form>
                                    @if (session('email_resend'))
                                        <p>Nếu bạn chưa nhận được Email</p>
                                        <form class="d-inline" method="POST" action="{{ route('passResend') }}">
                                            @csrf
                                            <button type="submit"
                                                    class="btn btn-link p-0 m-0 align-baseline">Click vào đây để yêu cầu
                                                link mới
                                            </button>
                                        </form>
                                    @endif
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
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
<script src="{{asset('backend/js/scripts.js')}}"></script>
</body>
</html>
