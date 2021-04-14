<?php

namespace App\Http\Controllers\Site;

use App\Brand;
use App\Http\Controllers\Controller;
use App\Product;
use App\ProductCategory;
use App\ProductSize;
use App\Size;
use App\Tag;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class ShopController extends Controller
{

    public function list(Request $request, $slug)
    {
//        $price = $request->get('price', '-');
//        $price_from = explode('-', $price)[0];
//        $price_from = str_replace('Đ ', '', $price_from);
//        $price_from = (int)str_replace(',', '', $price_from);
//
//        $price_to = explode('-', $price)[1];
//        $price_to = str_replace('Đ', '', $price_to);
//        $price_to = (int)str_replace(',', '', $price_to);


        $category = ProductCategory::where('slug', $slug)->first();
        if (!is_object($category)) {
            abort(404);
        }

        $tags = Tag::all();
        $brands = Brand::all();
        $sizes = Size::all();
        $categories = ProductCategory::all();
        $products = Product::all();

        $paginateProducts = Product::where('category_id', $category->id);
        //  lọc theo thương hiệu
        if ($request->has('brand_ids') && !empty($request->brand_ids)) {
            $paginateProducts = $paginateProducts->whereIn('brand_id', $request->get('brand_ids', []));
        }

        //  lọc theo size
        if ($request->has('sizes') && !empty($request->sizes)) {
            $product_ids = ProductSize::whereIn('size_id', $request->sizes)->pluck('product_id')->toArray();
        }
        if (isset($product_ids) && !empty($product_ids)) {
            $paginateProducts = $paginateProducts->whereIn('id', $product_ids);
        }

        //  Lọc theo danh muc
        if ($request->has('sort') && $request->sort !='') {
            $paginateProducts = $paginateProducts->OrderByRaw($request->sort);
        } else {
            $paginateProducts = $paginateProducts->latest('id');
        }
        $paginateProducts = $paginateProducts->paginate(3);
        return view('site.shop.shop', compact('products', 'categories', 'category', 'sizes', 'brands', 'paginateProducts', 'tags'));
    }

    public function show($id){
        $sizes = Size::all();
        $products = Product::latest('id')->get();
        $product = Product::find($id);
        return view('site.shop.product-details', compact('product', 'products','sizes'));
    }

    public function addCart(Request $request, $id){
        $product = Product::find($id);
        $price = $product->discount_price ? : $product->base_price;
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
