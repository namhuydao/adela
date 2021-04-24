<?php

namespace App\Http\Controllers\Backend\Banner;

use App\Banner;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::all();
        return view('backend.banner.index', compact('banners'));
    }

    public function create()
    {
        return view('backend.banner.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'collection' => 'required',
            'subtitle' => 'required',
            'title' => 'required',
            'description' => 'required',
        ],
            [
                'name.required' => 'Không được để trống',
                'collection.required' => 'Không được để trống',
                'subtitle.required' => 'Không được để trống',
                'title.required' => 'Không được để trống',
                'description.required' => 'Không được để trống'
            ]);

        $banner = new Banner();
        $banner->name = $request->name;
        $banner->collection = $request->collection;
        $banner->subtitle = $request->subtitle;
        $banner->title = $request->title;
        $banner->description = $request->description;
        $banner->save();
        if ($request->hasFile('fileToUpload')){
            $image_src = saveFile($request->file('fileToUpload'), 'banner/' . date('Y/m/d'));
            $banner->image = $image_src;
            $banner->save();
        }
        saveLog(auth()->user()->id, 'Tạo 1 banner mới');
        return redirect()->route('banner');
    }

    public function edit($id)
    {
        $banner = Banner::find($id);
        return view('backend.banner.edit', compact('banner'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'collection' => 'required',
            'subtitle' => 'required',
            'title' => 'required',
            'description' => 'required',
        ],
            [
                'name.required' => 'Không được để trống',
                'collection.required' => 'Không được để trống',
                'subtitle.required' => 'Không được để trống',
                'title.required' => 'Không được để trống',
                'description.required' => 'Không được để trống'
            ]);

        $banner = Banner::find($id);
        $banner->name = $request->name;
        $banner->collection = $request->collection;
        $banner->subtitle = $request->subtitle;
        $banner->title = $request->title;
        $banner->description = $request->description;
        $banner->save();

        if ($request->hasFile('fileToUpload')){
            $image_src = saveFile($request->file('fileToUpload'), 'banner/' . date('Y/m/d'));
            $banner->image = $image_src;
            $banner->save();
        }
        saveLog(auth()->user()->id, 'Sửa 1 banner');
        return back()->with('success', 'Sửa thành công');
    }

    public function destroy($id)
    {
        Banner::destroy($id);
        saveLog(auth()->user()->id, 'Xóa 1 banner');
        return redirect()->route('banner');
    }
}
