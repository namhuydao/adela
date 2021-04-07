<?php

namespace App\Http\Controllers\Site;

use App\Bill;
use App\BillItem;
use App\Customer;
use App\Http\Controllers\Controller;
use App\Product;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
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
        $request->validate([
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'home_number' => 'required',
            'ward' => 'required',
            'district' => 'required',
            'city' => 'required',
            'phone' => 'required',
        ], [
            'firstname.required' => 'Không được để trống',
            'lastname.required' => 'Không được để trống',
            'email.required' => 'Không được để trống',
            'ward.required' => 'Không được để trống',
            'district.required' => 'Không được để trống',
            'city.required' => 'Không được để trống',
            'phone.required' => 'Không được để trống',
            'email.email' => 'Email không đúng định dạng',
            'email.unique' => 'Email đã tồn tại'
        ]);

        $customer = new Customer();
        $customer->firstname = $request->firstname;
        $customer->lastname = $request->lastname;
        $customer->email = $request->email;
        $customer->home_number = $request->home_number;
        $customer->ward = $request->ward;
        $customer->district = $request->district;
        $customer->city = $request->city;
        $customer->phone = $request->phone;
        $customer->save();

        $bill = new Bill();
        $bill->receiver_id = $customer->id;
        $bill->buyer_id = $customer->id;
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

        return redirect()->route('checkout-success');
    }
    public function success()
    {
        $products = Product::all();
        return view('site.checkout.checkout-success', compact('products'));
    }
}
