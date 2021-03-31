<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Product;
use App\Size;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cart()
    {
        $products = Product::all();
        $sizes = Size::all();
        return view('site.shop.cart', compact('sizes', 'products'));
    }

    public function updateItem(Request $request, $id){
        $products = Cart::content();
        foreach ($products as $product){
            if ($product->id == $id){
                $rowId = $product->rowId;
            }
        }
        Cart::update($rowId, ['qty' => $request->qty ,'options'  => ['size' => $request->size]]);
        return back();
    }

    public function deleteItem($id){
        $products = Cart::content();
        foreach ($products as $product){
            if ($product->id == $id){
                $rowId = $product->rowId;
            }
        }
        Cart::remove($rowId);
        return back();
    }
}
