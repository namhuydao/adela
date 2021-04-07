<?php

namespace App\Http\Controllers\Site;

use App\Brand;
use App\Http\Controllers\Controller;
use App\Product;
use App\ProductCategory;
use App\Size;
use App\Tag;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        $brands = Brand::all();
        $sizes = Size::all();
        $categories = ProductCategory::all();
        $products = Product::all();

        $paginateProducts = Product::latest('id')->paginate(3);
        return view('site.shop.shop', compact('products','categories', 'sizes','brands', 'paginateProducts','tags'));
    }

    public function show($id){
        $sizes = Size::all();
        $products = Product::latest('id')->get();
        $product = Product::find($id);
        return view('site.shop.product-details', compact('product', 'products','sizes'));
    }

    public function addCart(Request $request, $id){
        $product = Product::find($id);
        $price = $product->discount_price ? $product->discount_price : $product->base_price;
        Cart::add($id, $product->name, $request->amount, $price, 0 , ['size' => $request->size]);
        return redirect()->route('shopDetails',$product->id);
    }

    public function ajaxViewProduct(Request $request) {
        $product_id = $request->product_id;
        $product = Product::find($product_id);
        $tags = Tag::all();
        return view('site.shop.popup.product_info', compact('product', 'tags'));
    }
}
