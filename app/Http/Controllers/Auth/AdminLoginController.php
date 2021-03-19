<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminLoginController extends Controller
{
    public function create()
    {
        return view('backend.auth.login');
    }
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $credential = $request->only('email', 'password');

        $remember = $request->has('remember');

        if(auth()->attempt($credential, $remember)){
            return redirect('dashboard');
        }
        else{
            return redirect()->back()->with('message', 'Đăng nhập thất bại');
        }
    }
    public function destroy()
    {
        auth()->logout();
        return redirect()->back();
    }
}
