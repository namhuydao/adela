<?php

namespace App\Http\Controllers\Backend\Product;

use App\Brand;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        return view('backend.product.brand.index', compact('brands'));
    }

    public function create()
    {
        return view('backend.product.brand.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ],
            [
                'name.required' => 'Không được để trống'
            ]);

        $brands = new Brand();
        $brands->name = $request->name;
        $brands->save();
        saveLog(auth()->user()->id, 'Tạo 1 thương hiệu sản phẩm mới');
        return redirect()->route('brand');
    }

    public function edit($id)
    {
        $brand = Brand::find($id);
        return view('backend.product.brand.edit', compact('brand'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required'
        ],
            [
                'name.required' => 'Không được để trống'
            ]);

        $brand = Brand::find($id);
        $brand->name = $request->name;
        $brand->save();
        saveLog(auth()->user()->id, 'Sửa 1 thương hiệu sản phẩm');
        return back()->with('success', 'Sửa thành công');
    }

    public function destroy($id)
    {
        Brand::destroy($id);
        saveLog(auth()->user()->id, 'Xóa 1 thương hiệu sản phẩm');
        return redirect()->route('brand');
    }
}
