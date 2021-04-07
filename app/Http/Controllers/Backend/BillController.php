<?php

namespace App\Http\Controllers\Backend;

use App\Bill;
use App\BillItem;
use App\Http\Controllers\Controller;
use App\Product;

class BillController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $bills = Bill::all();
        return view('backend.bill.index', compact('bills','products'));
    }

    public function create(){
        return view('backend.bill.create');
    }

    public function destroy($id){
        Bill::destroy($id);
        BillItem::where('bill_id', $id)->delete();
        return back();
    }
}
