<?php

namespace App\Http\Controllers\Site;

use App\Cart;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('site.checkout.checkout',compact('products'));
    }

    public function success()
    {
        return view('site.checkout.checkout-success');
    }
}
