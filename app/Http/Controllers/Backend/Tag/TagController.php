<?php

namespace App\Http\Controllers\Backend\Tag;

use App\Http\Controllers\Controller;

use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{

    public function index()
    {
        $tags = Tag::all();
        return view('backend.tag.index', compact('tags'));
    }

    public function create()
    {
        return view('backend.tag.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ],
            [
                'name.required' => 'Không được để trống'
            ]);

        $tag = new Tag();
        $tag->name = $request->name;
        $tag->save();

        return redirect()->route('tag');
    }

    public function edit($id)
    {
        $tag = Tag::find($id);
        return view('backend.tag.edit', compact('tag'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required'
        ],
            [
                'name.required' => 'Không được để trống'
            ]);

        $tag = Tag::find($id);
        $tag->name = $request->name;
        $tag->save();

        return back()->with('success', 'Sửa thành công');
    }

    public function destroy($id)
    {
        Tag::destroy($id);
        return redirect()->route('tag');
    }
}
