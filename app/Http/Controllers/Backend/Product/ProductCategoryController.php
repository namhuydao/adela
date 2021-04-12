<?php

namespace App\Http\Controllers\Backend\Product;

use App\Http\Controllers\Controller;

use App\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductCategoryController extends Controller
{

    public function index()
    {
        $categories = ProductCategory::all();
        return view('backend.product.productCategory.index', compact('categories'));
    }

    public function create()
    {
        $html = getProductCategory($parent_id = 0);
        return view('backend.product.productCategory.create', compact('html'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ],
            [
                'name.required' => 'Không được để trống'
            ]);

        $productCategory = new ProductCategory();
        $productCategory->name = $request->name;
        $productCategory->parent_id = $request->categories;
        $productCategory->slug = Str::slug($productCategory->name, '-');
        $productCategory->save();

        return redirect()->route('productCategory');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $category = ProductCategory::find($id);
        return view('backend.product.productCategory.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required'
        ],
            [
                'name.required' => 'Không được để trống'
            ]);

        $productCategory = ProductCategory::find($id);
        $productCategory->name = $request->name;
        $productCategory->slug = Str::slug($productCategory->name, '-');
        $productCategory->save();

        return back()->with('success', 'Sửa thành công');
    }

    public function destroy($id)
    {
        ProductCategory::destroy($id);
        return redirect()->route('productCategory');
    }
}
