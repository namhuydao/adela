<?php

namespace App\Http\Controllers\Backend\Post;

use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('backend.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        $html = getPostCategory($parent_id = 0);
        return view('backend.post.create', compact('html', 'tags'));
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


        $post = new Post();

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
        $post = Post::find($id);
        $tags = Tag::all();
        $html = getPostCategory($post->category_id);
        return view('backend.post.edit', compact('html', 'tags', 'post'));
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


        $post = Post::find($id);
        $post->title = $request->title;
        $post->description = $request->desc;
        $post->content = $request->input('content');
        $post->author = $request->author;
        $post->category_id = $request->category;
        $post->save();

        $post->tags()->sync($request->tags);

        return redirect()->route('post');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::find($id)->tags()->detach();
        Post::destroy($id);

        return redirect()->route('post');
    }
}