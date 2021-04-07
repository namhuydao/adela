<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Product;
use App\Setting;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $settings = Setting::all();
        return view('site.contact', compact('settings', 'products'));
    }
}
