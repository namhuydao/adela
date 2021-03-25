@component('mail::message')
Xin chào **{{$user->firstname}}**,  {{-- use double space for line break --}}
Chúng tôi nhận được yêu cầu đặt lại mật khẩu từ địa chỉ email này, nếu bạn không gửi yêu cầu thì hãy đổi mật khẩu ngay lập tức.

Click vào đây để đặt lại mật khẩu
@component('mail::button', ['url' => '/adela.test/admin/resetPassword/'.$user->email])
Đặt lại mật khẩu
@endcomponent
Trân trọng,

SuperFood team.

Nếu bạn gặp vấn đề click vào liên kết, copy và dán link này vào url: /adela.test/admin/resetPassword/?email={{$user->email}}
@endcomponent
