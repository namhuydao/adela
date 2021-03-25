<?php

namespace App\Http\Controllers\Backend\Role;

use App\Http\Controllers\Controller;
use App\Mail\verifyEmail;
use App\Permission;
use App\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        return view('backend.role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parentPermissions = Permission::where('parent_id', 0)->get();
        return view('backend.role.create', compact('parentPermissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required',
            'name' => 'required'
        ],
            [
                'code.required' => 'Không được để trống',
                'name.required' => 'Không được để trống'
            ]);

        $role = new Role();
        $role->code = $request->code;
        $role->name = $request->name;
        $role->save();

        $role->permissions()->sync($request->pers);
        return redirect()->route('role');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $parentPermissions = Permission::where('parent_id', 0)->get();
        $role = Role::find($id);
        return view('backend.role.edit', compact('parentPermissions', 'role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'code' => 'required',
            'name' => 'required'
        ],
            [
                'code.required' => 'Không được để trống',
                'name.required' => 'Không được để trống'
            ]);
        $role = Role::find($id);
        $role->code = $request->code;
        $role->name = $request->name;
        $role->save();

        $role->permissions()->sync($request->pers);
        return redirect()->route('role');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Role::destroy($id);
        return redirect()->route('role');
    }
}
