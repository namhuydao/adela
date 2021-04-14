<?php

namespace App\Http\Controllers\Site;

use App\Banner;
use App\Http\Controllers\Controller;
use App\Newsletter;
use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $banners = Banner::all();
        return view('site.index', compact('banners','products'));
    }

    public function newsletter(Request $request){
        $newsletter = new Newsletter();
        $newsletter->email = $request->email;
        $newsletter->save();
        return back()->with('success','Bạn đã đăng ký thành viên thành công');
    }
}
