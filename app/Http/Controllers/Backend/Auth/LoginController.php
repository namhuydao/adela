<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function create()
    {
        session()->forget('email_resend');
        session()->forget('resent');
        return view('backend.auth.login');
    }
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ],
        [
            'email.required' => 'Không được để trống',
            'email.email' => 'Email không đúng định dạng'
        ]);
        $credential = $request->only('email', 'password');

        $remember = $request->has('remember');

        if(auth()->attempt($credential, $remember)){

            if (auth()->user()->email_verified_at === null){
                auth()->logout();
                return redirect()->back()->with('message', 'Vui lòng kích hoạt tài khoản trước khi tiếp tục');
            }
            return redirect()->route('dashboard');
        }
        else{
            return redirect()->back()->with('message', 'Đăng nhập thất bại');
        }
    }
    public function destroy()
    {
        auth()->logout();
        return back();
    }
}
