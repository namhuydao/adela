<?php

namespace App\Http\Controllers\Api;

use App\Bill;
use App\BillItem;
use App\Customer;
use App\Http\Controllers\Controller;
use App\Product;
use App\ProductImages;
use Illuminate\Http\Request;
use Validator;

class ProductController extends Controller
{
    public function index(Request $r)
    {
        try {
            $limit_default = 20;

            //  Truy vấn những trường cần thiết dựa vào design hoặc yêu cầu
            $products = Product::select('id', 'name', 'avatar', 'base_price', 'discount_price', 'category_id', 'seller_id');

            //  Bọ lọc dựa vào design
            if ($r->has('name') && $r->name != '') {
                $products = $products->where('name', 'like', '%' . $r->name . '%');
            }
            if ($r->has('category_id') && $r->category_id != '') {
                $products = $products->where('category_id', $r->category_id->name);
            }
            if ($r->has('sort') && $r->sort != '') {
                $products = $products->orderByRaw($r->sort);
            }

            //  phân trang bắt buộc có với những bảng dữ liệu có khả năng lưu trữ quá nhiều
            if ($r->has('limit')) {
                $products = $products->paginate($r->limit);
            } else {
                $products = $products->paginate($limit_default);
            }
            $products = $products->appends($r->all());


            //  xử lý dữ liệu đầu ra để phù hợp với design
            foreach ($products as $product) {
                $product->avatar = asset('backend/images/' . $product->avatar);
                $product->saler = $product->user;
                unset($product->user);

                $product->category = $product->category;
            }

            return response()->json([
                'status' => true,
                'msg' => 'Lấy dữ liệu thành công',
                'data' => $products
            ]);
        } catch (\Exception $ex) {
            //  Bắt lỗi xảy ra
            return response()->json([
                'status' => false,
                'msg' => 'Lấy dữ liệu thất bại',
                'errors' => $ex->getMessage()
            ]);
        }
    }

    public function detail($id) {
        $product = Product::find($id);

        //  xử lý dữ liệu cho chuẩn đầu ra
        $product->avatar = asset('backend/images/' . $product->avatar);
        $product->saler = $product->user;
        unset($product->user);

        $product->category = $product->category;

        $product_relate = Product::select('name', 'category_id')->where('category_id', $product->category_id)->limit(6)->get();

        return response()->json([
            'status' => true,
            'msg' => 'Lấy dữ liệu thành công',
            'data' => $product,
            'product_relate' => $product_relate
        ]);
    }

    public function store(Request $request) {

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
            $product = new Product();

            $product->name = $request->name;
            $product->description = $request->description;
            $product->seller_id = 1;
            $product->base_price = $request->base_price;
            $product->discount_price = $request->discountPrice;
            $product->brand_id = $request->brand;
            $product->category_id = $request->category;
            $product->save();

            if ($request->hasFile('avatar')){
                $image_src = saveFile($request->file('avatar'), 'product/' . date('Y/m/d'));
                $product->avatar = $image_src;
                $product->save();
            }
            if ($request->hasFile('images')) {
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

    public function edit(Request $request, $id  ) {

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
            $product->seller_id = 2;
            $product->base_price = $request->base_price;
            $product->discount_price = $request->discount_price;
            $product->brand_id = $request->brand;
            $product->category_id = $request->category;
            $product->save();

            if ($request->hasFile('avatar')){
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

    public function delete($id) {
        Product::where('id', $id)->delete();
        return response()->json([
            'status' => true,
            'msg' => 'xóa sản phẩm thành công',
            'data' => []
        ]);
    }
}
