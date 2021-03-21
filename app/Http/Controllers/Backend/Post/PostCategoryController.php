<?php

namespace App\Http\Controllers\Backend\Post;

use App\Http\Controllers\Controller;

use App\PostCategory;
use Illuminate\Http\Request;

class PostCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = PostCategory::all();
        return view('backend.postCategory.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $html = getPostCategory($parent_id = 0);
        return view('backend.postCategory.create', compact('html'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

        return redirect()->route('postCategory');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = PostCategory::find($id);
        return view('backend.postCategory.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

        return redirect()->route('postCategory');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PostCategory::destroy($id);
        return redirect()->route('postCategory');
    }
}
