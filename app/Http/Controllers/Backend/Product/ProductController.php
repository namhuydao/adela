<?php

namespace App\Http\Controllers\Backend\Product;

use App\Http\Controllers\Controller;
use App\Product;
use App\Tag;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('backend.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        $html = getProductCategory($parent_id = 0);
        return view('backend.product.create', compact('html', 'tags'));
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
            'title' => 'required',
            'desc' => 'required',
            'content' => 'required',
            'author' => 'required',
        ],
            [
                'title.required' => 'Không được để trống',
                'desc.required' => 'Không được để trống',
                'content.required' => 'Không được để trống',
                'author.required' => 'Không được để trống',
            ]);


        $product = new Product();

        $post->title = $request->title;
        $post->description = $request->desc;
        $post->content = $request->input('content');
        $post->author = $request->author;
        $post->category_id = $request->category;
        $post->save();

        $tags = [];
        foreach ($request->tags as $tag){
            $tags[] = Tag::find($tag);
        }
        $post->tags()->saveMany($tags);

        return redirect()->route('post');
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
        $product = Product::find($id);
        $html = getPostCategory($product->category_id);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
