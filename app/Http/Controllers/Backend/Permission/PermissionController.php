<?php

namespace App\Http\Controllers\Backend\Permission;

use App\Http\Controllers\Controller;
use App\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{

    public function index(){
        $permissions = Permission::all();
        return view('backend.permission.index', compact('permissions'));
    }
    public function create()
    {
        $html = getPermission($parent_id = 0);
        return view('backend.permission.create', compact('html'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ],
            [
                'name.required' => 'Không được để trống'
            ]);

        $permission = new Permission();
        $permission->code = $request->code;
        $permission->name = $request->name;
        $permission->parent_id = $request->permission_parent;
        $permission->save();

        return redirect()->route('permission');
    }

    public function edit($id)
    {
        $permission = Permission::find($id);
        return view('backend.permission.edit', compact('permission'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required'
        ],
            [
                'name.required' => 'Không được để trống'
            ]);

        $permission = Permission::find($id);
        $permission->code = $request->code;
        $permission->name = $request->name;
        $permission->save();

        return back()->with('success', 'Sửa thành công');
    }

    public function destroy($id)
    {
        Permission::destroy($id);
        return  redirect()->route('permission');
    }
}
