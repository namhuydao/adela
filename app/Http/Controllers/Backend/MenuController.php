<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Menu;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::all();
        return view('backend.menu.index', compact('menus'));
    }

    public function create()
    {
        $html = getMenu($parent_id = 0);
        return view('backend.menu.create', compact('html'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ],
            [
                'name.required' => 'Không được để trống'
            ]);

        $menu = new Menu();
        $menu->name = $request->name;
        $menu->order_number = $request->number;
        $menu->parent_id = $request->categories;
        $menu->slug = Str::slug($menu->name, '-');
        $menu->save();

        return redirect()->route('menu');
    }

    public function edit($id)
    {
        $menu = Menu::find($id);
        return view('backend.menu.edit', compact('menu'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required'
        ],
            [
                'name.required' => 'Không được để trống'
            ]);

        $menu = Menu::find($id);
        $menu->name = $request->name;
        $menu->order_number = $request->number;
        $menu->slug = Str::slug($menu->name, '-');
        $menu->save();

        return back()->with('success', 'Sửa thành công');
    }

    public function destroy($id)
    {
        Menu::destroy($id);
        return redirect()->route('menu');
    }
}
