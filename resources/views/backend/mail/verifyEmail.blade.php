@component('mail::message')
Xin chào **{{$user->firstname}}**,  {{-- use double space for line break --}}
Cảm ơn bạn đã chọn SuperFood.

Click vào đây để kích hoạt tài khoản của bạn
@component('mail::button', ['url' => '/admin/verifyEmail/'.$user->verifyUser->token])
Kích hoạt tài khoản
@endcomponent
Trân trọng,

SuperFood team.

Nếu bạn gặp vấn đề click vào liên kết, copy và dán link này vào url: /superfood.test/admin/verifyEmail/{{$user->verifyUser->token}}
@endcomponent
