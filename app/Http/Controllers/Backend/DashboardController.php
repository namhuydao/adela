<?php

namespace App\Http\Controllers\Backend;

use App\BillItem;
use App\Http\Controllers\Controller;
use App\Log;
use App\Product;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        //Lấy top 3 sản phẩm bán chạy nhất dựa vào số lượng bán ra từ Bill và Bill item
        $item_arr = [];
        foreach (BillItem::all() as $billItem){
            if (array_key_exists($billItem->product_id, $item_arr)){
                $item_arr[$billItem->product_id] += $billItem->quantity;
            }else{
                $item_arr[$billItem->product_id] = $billItem->quantity;
            }
        }
        arsort($item_arr);
        $product_arr = [];
        foreach ($item_arr as $key => $value){
            $product_arr[] = $key;
        }
        $tempStr = implode(',', $product_arr);
        $products = Product::whereIn('id', $product_arr)->orderByRaw(DB::raw("FIELD(id, $tempStr)"))->limit(3)->get();

        // Lấy dữ liệu bảng Log
        $logs = Log::latest('id')->get();
        return view('backend/dashboard', compact('products', 'logs'));
    }
}
