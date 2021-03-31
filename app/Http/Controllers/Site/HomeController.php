<?php

namespace App\Http\Controllers\Site;

use App\Banner;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $banners = Banner::all();
        return view('site.index', compact('banners'));
    }
}
