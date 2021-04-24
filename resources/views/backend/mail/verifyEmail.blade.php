@component('mail::message')
Xin chào **{{$user->firstname}}**,  {{-- use double space for line break --}}
Cảm ơn bạn đã chọn Adela.

Click vào đây để kích hoạt tài khoản của bạn
@component('mail::button', ['url' => URL::to('/admin/verifyEmail/'.$user->verifyUser->token)])
Kích hoạt tài khoản
@endcomponent
Trân trọng,

Adela team.

Nếu bạn gặp vấn đề click vào liên kết, copy và dán link này vào url: {{URL::to('/admin/verifyEmail/'.$user->verifyUser->token)}}
@endcomponent
