<?php

namespace App\Http\Controllers\Backend\Auth\Password;

use App\Http\Controllers\Controller;
use App\Mail\resetPassword;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ForgotController extends Controller
{
    public function create()
    {

        return view('backend.auth.passwords.email');
    }

    public function store(Request $request)
    {

        $request->validate([
            'email' => 'required|email|exists:users',
        ],
        [
            'email.required' => 'Không được để rỗng',
            'email.email' => 'Email không đúng định dạng',
            'email.exists' => 'Email không tồn tại',
        ]);

        Mail::to($request->email)->send(new resetPassword(User::where('email', $request->email)->first()));
        session()->put('email_resend', $request->email);
        return back()->with('message', 'Chúng tôi đã gửi link đặt lại mật khẩu cho bạn!');
    }

    public function resend()
    {
        Mail::to(session('email_resend'))->send(new resetPassword(User::where('email', session('email_resend'))->first()));
        return redirect()->back()->with('message', 'Chúng tôi đã gửi link đặt lại mật khẩu cho bạn!');;
    }
}
