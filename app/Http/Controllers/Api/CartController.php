<?php

namespace App\Http\Controllers\Api;

use App\Bill;
use App\BillItem;
use App\Http\Controllers\Controller;
use App\Product;
use App\ProductImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{

    public function store(Request $request)
    {
        $bill = Bill::where('buyer_id', auth()->user()->id)->where('is_app', 1)->where('status', -1)->first();
        if (!is_object($bill)) {
            $bill = new Bill();
            $bill->buyer_id = auth()->user()->id;
            $bill->is_app = 1;
            $bill->status = -1;
            $bill->save();
        }

        $order = new BillItem();
        $order->product_id = $request->product_id;
        $order->quantity = 1;

        $product = Product::find($request->product_id);
        $order->price = $product->base_price;
        $order->save();

        return response()->json([
            'status' => true,
            'msg' => 'Đã lưu vào giỏ hàng',
            'data' => $bill
        ]);

    }

    public function edit(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'base_price' => 'required'
        ], [
            'name.required' => 'Không được để trống',
            'description.required' => 'Không được để trống',
            'base_price.required' => 'Không được để trống',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'msg' => 'Validate errors',
                'errors' => $validator->errors(),
                'data' => null,
                'code' => 422
            ]);
        } else {
            $product = Product::find($id);

            $product->name = $request->name;
            $product->description = $request->desc;
            $product->seller_id = 2; //lấy use_id ở trong app
            $product->base_price = $request->base_price;
            $product->discount_price = $request->discount_price;
            $product->brand_id = $request->brand;
            $product->category_id = $request->category;
            $product->save();

            if ($request->hasFile('avatar')) {
                $image_src = saveFile($request->file('avatar'), 'product/' . date('Y/m/d'));
                $product->avatar = $image_src;
                $product->save();
            }
            if ($request->hasFile('images')) {
                ProductImages::where('product_id', $product->id)->delete();
                foreach ($request->file('images') as $file) {
                    $img_path = saveFile($file, 'product/' . date('Y/m/d'));
                    $product_images = new ProductImages();
                    $product_images->product_id = $product->id;
                    $product_images->path = $img_path;
                    $product_images->save();
                }
            } else {
                if ($request->get('delete_img') == 1) {
                    ProductImages::where('product_id', $product->id)->delete();
                }
            }

            $product->tags()->sync($request->tags);
            $product->sizes()->sync($request->sizes);

            return $this->detail($product->id);
        }
    }

    public function delete($id)
    {
        Product::where('id', $id)->delete();
        return response()->json([
            'status' => true,
            'msg' => 'xóa sản phẩm thành công',
            'data' => []
        ]);
    }
}
