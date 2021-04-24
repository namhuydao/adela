<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Mail\verifyEmail;
use App\User;
use App\VerifyUser;
use Carbon\Carbon;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Mail;

class VerificationController extends Controller
{

    public function create()
    {
        return view('backend.auth.verify');
    }

    public function resend()
    {
        Mail::to(session('email_resend'))->send(new verifyEmail(User::where('email', session('email_resend'))->first()));
        session()->put('resent', true);
        return redirect()->route('verify_again');
    }

    public function verify_again()
    {
        return view('backend.auth.verify_again');
    }

    public function verifyEmail($token)
    {
        $verified_user = VerifyUser::where('token', $token)->first();

        if ($verified_user) {
            $user = $verified_user->user;

            if (!$user->email_verified_at) {
                $user->email_verified_at = Carbon::now();
                $user->save();
                return redirect()->route('login')->with('success', 'Email của bạn được kích hoạt thành công');
            }
        } else {
            return redirect()->route('login')->with('error', 'Đã có sự cố xảy ra, vui lòng thử lại');
        }
    }
}
