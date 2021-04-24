<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::all();
        return view('backend.setting.index', compact('settings'));
    }

    public function create()
    {
        return view('backend.setting.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'key' => 'required',
            'value' => 'required',
        ],
            [
                'key.required' => 'Không được để trống',
                'value.required' => 'Không được để trống'
            ]);

        $setting = new Setting();
        $setting->config_key = $request->key;
        $setting->config_value = $request->value;
        $setting->save();
        saveLog(auth()->user()->id, 'Tạo 1 cài đặt mới');
        return redirect()->route('setting');
    }

    public function edit($id)
    {
        $setting = Setting::find($id);
        return view('backend.setting.edit', compact('setting'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'key' => 'required',
            'value' => 'required',
        ],
            [
                'key.required' => 'Không được để trống',
                'value.required' => 'Không được để trống'
            ]);

        $setting = Setting::find($id);
        $setting->config_key = $request->key;
        $setting->config_value = $request->value;
        $setting->save();
        saveLog(auth()->user()->id, 'Sửa 1 cài đặt');
        return back()->with('success', 'Sửa thành công');
    }

    public function destroy($id)
    {
        Setting::destroy($id);
        saveLog(auth()->user()->id, 'Xóa 1 cài đặt');
        return redirect()->route('setting');
    }
}
