<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Post;
use App\PostCategory;
use App\Product;
use App\Tag;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Post::latest('id')->paginate(4);
        $tags = Tag::all();
        $blogCategories = PostCategory::all();
        $products = Product::all();
        $blogsLatest = Post::latest('id')->take(2)->get();
        return view('site.blog.blog', compact('products','blogs', 'blogCategories', 'tags', 'blogsLatest'));
    }

    public function show($id){
        $tags = Tag::all();
        $blogCategories = PostCategory::all();
        $products = Product::all();
        $blog = Post::find($id);
        $blogsLatest = Post::latest('id')->take(2)->get();

        $previous = Post::where('id', '<', $blog->id)->orderBy('id','desc')->first();
        $next = Post::where('id', '>', $blog->id)->orderBy('id')->first();
        return view('site.blog.blog-details', compact('blog','products','blogsLatest', 'blogCategories', 'tags', 'next','previous'));
    }


}
