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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.banner.create');
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
        return redirect()->route('banner');
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
        $banner = Banner::find($id);
        return view('backend.banner.edit', compact('banner'));
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
        Banner::destroy($id);
        return redirect()->route('banner');
    }
}
