<?php

namespace App\Http\Controllers\Backend\Auth;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function create()
    {
        return view('backend.auth.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|max:50',
        ], [
            'firstname.required' => 'Không được để trống',
            'lastname.required' => 'Không được để trống',
            'email.required' => 'Không được để trống',
            'email.email' => 'Email không đúng định dạng'
        ]);

        $user = new User();
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->back();

    }
}
