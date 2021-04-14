<div class="newsletter-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="bt-top ptb-80">
                    <div class="newsletter-content text-center">
                        <h6>Ưu đãi đặc biệt khi đăng ký</h6>
                        <h3>Thành viên giảm giá 10%</h3>
                        <p>Đăng ký để nhận bản tin của chúng tôi ngay bây giờ, cập nhật những bộ sưu tập mới và
                            những ưu đãi dành cho thành viên .
                        </p>
                        @if(session('success'))
                            <div class="alert alert-success">{{session('success')}}</div>
                        @endif
                        <form action="{{route('newsletter')}}" method="POST">
                            @csrf
                            <input type="email" name="email" placeholder="Địa chỉ email của bạn" />
                            <button type="submit">Đăng ký</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
