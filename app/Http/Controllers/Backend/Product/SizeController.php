<?php

namespace App\Http\Controllers\Backend\Product;

use App\Http\Controllers\Controller;
use App\Product;
use App\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    public function index()
    {
        $sizes = Size::all();
        return view('backend.product.size.index', compact('sizes'));
    }

    public function create()
    {
        return view('backend.product.size.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ],
            [
                'name.required' => 'Không được để trống'
            ]);

        $size = new Size();
        $size->name = $request->name;
        $size->save();
        saveLog(auth()->user()->id, 'Tạo 1 size sản phẩm mới');
        return redirect()->route('size');
    }

    public function edit($id)
    {
        $size = Size::find($id);
        return view('backend.product.size.edit', compact('size'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required'
        ],
            [
                'name.required' => 'Không được để trống'
            ]);

        $size = Size::find($id);
        $size->name = $request->name;
        $size->save();
        saveLog(auth()->user()->id, 'Sửa 1 size sản phẩm');
        return back()->with('success', 'Sửa thành công');
    }

    public function destroy($id)
    {
        Size::destroy($id);
        saveLog(auth()->user()->id, 'Xóa 1 size sản phẩm');
        return redirect()->route('size');
    }
}
