@component('mail::message')
Xin chào **{{$user->firstname}}**,  {{-- use double space for line break --}}
Chúng tôi nhận được yêu cầu đặt lại mật khẩu từ địa chỉ email này, nếu bạn không gửi yêu cầu thì hãy bỏ qua email này.

Click vào đây để đặt lại mật khẩu:
@component('mail::button', ['url' => URL::to('/admin/resetPassword/'.$user->email)])
Đặt lại mật khẩu
@endcomponent
Trân trọng,

Adela team.

Nếu bạn gặp vấn đề click vào liên kết, copy và dán link này vào url: {{URL::to('/admin/resetPassword/'.$user->email)}}
@endcomponent
