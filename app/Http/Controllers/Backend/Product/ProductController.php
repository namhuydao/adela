<?php

namespace App\Http\Controllers\Backend\Product;

use App\Http\Controllers\Controller;
use App\Product;
use App\ProductImages;
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
            'name' => 'required',
            'desc' => 'required',
            'basePrice' => 'required'
        ],
            [
                'name.required' => 'Không được để trống',
                'desc.required' => 'Không được để trống',
                'basePrice.required' => 'Không được để trống',
            ]);


        $product = new Product();

        $product->name = $request->name;
        $product->description = $request->desc;
        $product->seller_id = auth()->user()->id;
        $product->base_price = $request->basePrice;
        $product->discount_price = $request->discountPrice;
        $product->category_id = $request->category;
        $product->save();

        if ($request->hasFile('fileToUpload')){
            $image_src = saveFile($request->file('fileToUpload'), 'product/' . date('Y/m/d'));
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

        return redirect()->route('product');
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
        $tags = Tag::all();
        $html = getProductCategory($product->category_id);
        return view('backend.product.edit', compact('html', 'product', 'tags'));

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
            'name' => 'required',
            'desc' => 'required',
            'basePrice' => 'required'
        ],
            [
                'name.required' => 'Không được để trống',
                'desc.required' => 'Không được để trống',
                'basePrice.required' => 'Không được để trống',
            ]);


        $product = Product::find($id);

        $product->name = $request->name;
        $product->description = $request->desc;
        $product->seller_id = auth()->user()->id;
        $product->base_price = $request->basePrice;
        $product->discount_price = $request->discountPrice;
        $product->category_id = $request->category;
        $product->save();

        if ($request->hasFile('fileToUpload')){
            $image_src = saveFile($request->file('fileToUpload'), 'product/' . date('Y/m/d'));
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

        return back()->with('success', 'Sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->tags()->detach();
        Product::destroy($id);

        return redirect()->route('product');
    }
}
