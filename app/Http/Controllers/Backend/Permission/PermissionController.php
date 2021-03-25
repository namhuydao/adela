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
        return view('backend.permission.create');
    }

    public function store(Request $request)
    {
        $parentPermission = new Permission();
        $parentPermission->name = $request->module_parent;
        $parentPermission->parent_id = 0;
        $parentPermission->save();

        foreach ($request->module_child as $value){
            $permission = new Permission();
            $permission->name = $value;
            $permission->parent_id = $parentPermission->id;
            $permission->code = $request->module_parent . '_' . $value;
            $permission->save();
        }
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
