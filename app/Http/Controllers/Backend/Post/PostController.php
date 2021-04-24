<?php

namespace App\Http\Controllers\Backend\Post;

use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::all();
        return view('backend.post.index', compact('posts'));
    }

    public function create()
    {
        $tags = Tag::all();
        $html = getPostCategory($parent_id = 0);
        return view('backend.post.create', compact('html', 'tags'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'desc' => 'required',
            'content' => 'required',
        ],
            [
                'title.required' => 'Không được để trống',
                'desc.required' => 'Không được để trống',
                'content.required' => 'Không được để trống',
            ]);


        $post = new Post();

        $post->title = $request->title;
        $post->description = $request->desc;
        $post->content = $request->input('content');
        $post->author_id = auth()->user()->id;
        $post->category_id = $request->category;
        $post->save();
        if ($request->hasFile('fileToUpload')){
            $image_src = saveFile($request->file('fileToUpload'), 'post/' . date('Y/m/d'));
            $post->image = $image_src;
            $post->save();
        }
        $post->tags()->sync($request->tags);
        saveLog(auth()->user()->id, 'Tạo 1 tin tức mới');
        return redirect()->route('post');
    }

    public function edit($id)
    {
        $post = Post::find($id);
        $tags = Tag::all();
        $html = getPostCategory($post->category_id);
        return view('backend.post.edit', compact('html', 'tags', 'post'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'desc' => 'required',
            'content' => 'required',
        ],
            [
                'title.required' => 'Không được để trống',
                'desc.required' => 'Không được để trống',
                'content.required' => 'Không được để trống',
            ]);


        $post = Post::find($id);
        $post->title = $request->title;
        $post->description = $request->desc;
        $post->content = $request->input('content');
        $post->category_id = $request->category;
        $post->save();

        if ($request->hasFile('fileToUpload')){
            $image_src = saveFile($request->file('fileToUpload'), 'post/' . date('Y/m/d'));
            $post->image = $image_src;
            $post->save();
        }

        $post->tags()->sync($request->tags);
        saveLog(auth()->user()->id, 'Sửa 1 tin tức');
        return back()->with('success', 'Sửa thành công');
    }

    public function destroy($id)
    {
        Post::find($id)->tags()->detach();
        Post::destroy($id);
        saveLog(auth()->user()->id, 'Xóa 1 tin tức');
        return redirect()->route('post');
    }
}
