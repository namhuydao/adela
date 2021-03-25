<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserprofileController extends Controller
{
    public function edit($id){
        $user = User::find($id);
        return view('backend.user.userProfile.edit', compact('user'));
    }
    public function update(Request $request, $id){

        $request->validate([
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'email' => 'required|email|unique:users,email,'. $id
        ], [
            'firstname.required' => 'Không được để trống',
            'lastname.required' => 'Không được để trống',
            'email.required' => 'Không được để trống',
            'email.email' => 'Email không đúng định dạng'
        ]);

        $user = User::find($id);
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->save();

        if ($request->hasFile('fileToUpload')){
            $image_src = uploadFile($_FILES['fileToUpload'], 'user');
            $user->image = $image_src;
            $user->save();
        }
        return redirect()->back()->with('success', 'Thay đổi thành công');
    }

    public function editPassword($id)
    {
        $user = User::find($id);
        return view('backend.user.userProfile.change', compact('user'));
    }

    public function updatePassword(Request $request, $id){
        if (!(Hash::check($request->current, auth()->user()->password))) {
            return redirect()->back()->with("error","Mật khẩu hiện tại không đúng.");
        }

        if(strcmp($request->current, $request->password) == 0){
            return redirect()->back()->with("error","Mật khẩu cũ và mật khẩu mới giống nhau, chọn mật khẩu khác.");
        }

        $request->validate([
            'current' => 'required',
            'password' => 'required|confirmed',
        ], [
            'current.required' => 'Không được để trống',
            'password.required' => 'Không được để trống',
            'password.confirmed' => 'Mật khẩu không khớp'
        ]);

        $user = User::find($id);
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->back()->with("success","Đổi mật khẩu thành công");
    }
}
