<?php

namespace App\Http\Controllers\Backend;

use App\Bill;
use App\BillItem;
use App\Customer;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class BillController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $bills = Bill::all();
        return view('backend.bill.index', compact('bills','products'));
    }

    public function edit($id){
        $bill = Bill::find($id);
        $receiver_id = $bill->receiver_id;
        $buyer_id = $bill->buyer_id;
        $receiver = Customer::where('id', $receiver_id)->first();
        $buyer = Customer::where('id', $buyer_id)->first();
        $bill_items = BillItem::where('bill_id', $id)->get();
        $products = Product::all();
        return view('backend.bill.edit', compact('receiver', 'bill_items', 'bill', 'products', 'buyer'));
    }

    public function update(Request $request, $id){
        $bill = Bill::find($id);
        $receiver_id = $bill->receiver_id;
        $buyer_id = $bill->buyer_id;

        $receiver = Customer::find($receiver_id);
        $receiver->firstname = $request->receiver_firstname;
        $receiver->lastname = $request->receiver_lastname;
        $receiver->email = $request->receiver_email;
        $receiver->district = $request->receiver_district;
        $receiver->city = $request->receiver_city;
        $receiver->phone = $request->receiver_phone;
        $receiver->save();

        if ($buyer_id != $receiver_id) {
            $buyer = Customer::find($buyer_id);
            $buyer->firstname = $request->buyer_firstname;
            $buyer->lastname = $request->buyer_lastname;
            $buyer->email = $request->buyer_email;
            $buyer->district = $request->buyer_district;
            $buyer->city = $request->buyer_city;
            $buyer->phone = $request->buyer_phone;
            $buyer->save();
        }

        $bill->note = $request->note;
        $bill->status = $request->status;
        $bill->payment_type = $request->payment_type;
        $bill->save();

        saveLog(auth()->user()->id, 'Sửa 1 bill');
        return back()->with('success','Bạn đã sửa thành công');
    }

    public function invoice($id){
        $bill = Bill::find($id);
        $buyer_id = $bill->buyer_id;
        $buyer = Customer::where('id', $buyer_id)->first();
        $bill_items = BillItem::where('bill_id', $id)->get();
        $products = Product::all();
        return view('backend.bill.invoice', compact('bill_items', 'bill', 'products', 'buyer'));
    }

    public function destroy($id){
        Bill::destroy($id);
        BillItem::where('bill_id', $id)->delete();
        saveLog(auth()->user()->id, 'Xóa 1 bill');
        return back();
    }
}
