<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>SuperFood| Login</title>
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
                            <div class="card-header">Kích hoạt tài khoản của bạn</div>
                            <div class="card-body">
                                @if (session('resent'))
                                    <div class="alert alert-success" role="alert">
                                        Link kích hoạt tài khoản đã được gửi đến Email của bạn
                                    </div>
                                @endif

                                <p>Trước khi tiếp tục, hãy kiểm tra Email của bạn</p>
                                <p>Nếu bạn chưa nhận được Email</p>
                                <form class="d-inline" method="POST" action="{{ route('resend') }}">
                                    @csrf
                                    <button type="submit"
                                            class="btn btn-link p-0 m-0 align-baseline">Click vào đây để yêu cầu link mới</button>
                                </form>
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
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="{{asset('backend/js/scripts.js')}}"></script>
