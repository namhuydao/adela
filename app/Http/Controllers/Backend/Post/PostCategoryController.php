<?php

namespace App\Http\Controllers\Backend\Post;

use App\Http\Controllers\Controller;

use App\PostCategory;
use Illuminate\Http\Request;

class PostCategoryController extends Controller
{

    public function index()
    {
        $categories = PostCategory::all();
        return view('backend.post.postCategory.index', compact('categories'));
    }

    public function create()
    {
        $html = getPostCategory($parent_id = 0);
        return view('backend.post.postCategory.create', compact('html'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ],
        [
            'name.required' => 'Không được để trống'
        ]);

        $postCategory = new PostCategory();
        $postCategory->name = $request->name;
        $postCategory->parent_id = $request->categories;
        $postCategory->save();
        saveLog(auth()->user()->id, 'Tạo 1 danh mục tin tức mới');
        return redirect()->route('postCategory');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $category = PostCategory::find($id);
        return view('backend.post.postCategory.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required'
        ],
            [
                'name.required' => 'Không được để trống'
            ]);

        $postCategory = PostCategory::find($id);
        $postCategory->name = $request->name;
        $postCategory->save();
        saveLog(auth()->user()->id, 'Sửa 1 danh mục tin tức');
        return back()->with('success', 'Sửa thành công');
    }

    public function destroy($id)
    {
        PostCategory::destroy($id);
        saveLog(auth()->user()->id, 'Xóa 1 danh mục tin tức');
        return redirect()->route('postCategory');
    }
}
