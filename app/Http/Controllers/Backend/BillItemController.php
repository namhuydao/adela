<?php

namespace App\Http\Controllers\Backend;

use App\BillItem;
use App\Bill;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BillItemController extends Controller
{
    public function edit($id){
        $billItem = BillItem::find($id);
        return view('backend.bill.billItem.edit', compact('billItem'));
    }

    public function update(Request $request, $id){
        $billItem = BillItem::find($id);
        $bill_id = BillItem::find($id)->bills->id;
        $bill = Bill::find($bill_id);
        $bill_price_without_this_item = $bill->price - $billItem->total_price;
        $billItem->quantity = $request->quantity;
        $billItem->total_price = $billItem->quantity * $billItem->discount_price;
        $billItem->save();

        $bill->price = $bill_price_without_this_item + $billItem->total_price;
        $bill->save();

        saveLog(auth()->user()->id, 'Sửa 1 bill item');
        return back()->with('success', 'Sửa thành công');
    }

    public function destroy($id){
        BillItem::destroy($id);
        saveLog(auth()->user()->id, 'Xóa 1 bill item');
        return back();
    }
}
