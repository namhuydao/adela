<?php

namespace App\Http\Controllers\Backend\Auth\Password;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ResetController extends Controller
{
    public function create(){
        return view('backend.auth.passwords.reset');
    }
    public function store(Request $request){
        $request->validate([
            'password' => 'required|confirmed',
        ],
            [
                'password.required' => 'Không được để rỗng',
                'password.confirmed' => 'Mật khẩu không giống nhau',
            ]);

        $user = User::where('email', $request->email)->first();
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('login')->with('message', 'Đặt lại mật khẩu thành công');
    }
}
