<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('site.shop.wishlist', compact('products'));
    }
}
