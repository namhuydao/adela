<?php

namespace App\Http\Controllers\Site;

use App\Bill;
use App\BillItem;
use App\Customer;
use App\Http\Controllers\Controller;
use App\Product;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('site.checkout.checkout',compact('products'));
    }
    public function checkout(Request $request)
    {
        $totalPrice = (float) str_replace(',', '', Cart::subtotal());
        $products = Cart::content();

        $buyer = new Customer();
        $buyer->firstname = $request->buyer_firstname;
        $buyer->lastname = $request->buyer_lastname;
        $buyer->email = $request->buyer_email;
        $buyer->home_number = $request->buyer_home_number;
        $buyer->ward = $request->buyer_ward;
        $buyer->district = $request->buyer_district;
        $buyer->city = $request->buyer_city;
        $buyer->phone = $request->buyer_phone;
        $buyer->save();

        $receiver = new Customer();
        if ($request->has('other_receiver')){
            $receiver->firstname = $request->receiver_firstname;
            $receiver->lastname = $request->receiver_lastname;
            $receiver->email = $request->receiver_email;
            $receiver->home_number = $request->receiver_home_number;
            $receiver->ward = $request->receiver_ward;
            $receiver->district = $request->receiver_district;
            $receiver->city = $request->receiver_city;
            $receiver->phone = $request->receiver_phone;
            $receiver->save();
        }
        $bill = new Bill();
        $bill->receiver_id = $receiver->id ? : $buyer->id;
        $bill->buyer_id = $buyer->id;
        $bill->price = $totalPrice;
        $bill->note = $request->note;
        $bill->status = 0;
        $bill->payment_type = $request->payment_type;
        $bill->save();

        foreach ($products as $product){
            $billItem = new BillItem();
            $billItem->bill_id = $bill->id;
            $billItem->product_id = $product->id;
            $billItem->quantity = $product->qty;
            $billItem->base_price = Product::find($product->id)->base_price;
            $billItem->discount_price = $product->price;
            $billItem->total_price = $product->qty * $product->price;
            $billItem->size = $product->options->size;
            $billItem->save();
        }
        Cart::destroy();
        return redirect()->route('checkout-success');
    }
    public function success()
    {
        $products = Product::all();
        return view('site.checkout.checkout-success', compact('products'));
    }
}
