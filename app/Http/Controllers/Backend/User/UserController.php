<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Controller;
use App\Role;
use App\User;
use App\VerifyUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all();
        return view('backend.user.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('backend.user.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|max:50|confirmed',
        ], [
            'firstname.required' => 'Không được để trống',
            'lastname.required' => 'Không được để trống',
            'email.required' => 'Không được để trống',
            'password.required' => 'Không được để trống',
            'password.confirmed' => 'Mật khẩu không khớp',
            'email.email' => 'Email không đúng định dạng',
            'email.unique' => 'Email đã tồn tại'
        ]);

        $user = new User();
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->email_verified_at = now();
        $user->save();

        if ($request->hasFile('fileToUpload')){
            $image_src = saveFile($request->file('fileToUpload'), 'user/' . date('Y/m/d'));
            $user->image = $image_src;
            $user->save();
        }
        $verified_user = new VerifyUser();
        $verified_user->token = Str::random(60);
        $verified_user->user_id = $user->id;
        $verified_user->save();

        $user->roles()->sync($request->role_id);

        return redirect()->route('user');
    }

    public function edit($id)
    {
        $roles = Role::all();
        $user = User::find($id);
        return view('backend.user.edit', compact('user', 'roles'));
    }

    public function update(Request $request, $id)
    {
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
        $user->password = $request->password ? Hash::make($request->password) : $user->password;
        $user->save();

        if ($request->hasFile('fileToUpload')){
            $image_src = saveFile($request->file('fileToUpload'), 'user/' . date('Y/m/d'));
            $user->image = $image_src;
            $user->save();
        }
        $user->roles()->sync($request->role_id);

        return redirect()->route('user');
    }

    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->route('user');
    }
}
