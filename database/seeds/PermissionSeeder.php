<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $permission = new Permission();
        $permission->code = '';
        $permission->name = 'user';
        $permission->parent_id = '0';
        $permission->save();

        $permission = new Permission();
        $permission->code = '';
        $permission->name = 'role';
        $permission->parent_id = '0';
        $permission->save();

        $permission = new Permission();
        $permission->code = '';
        $permission->name = 'permission';
        $permission->parent_id = '0';
        $permission->save();

        $permission = new Permission();
        $permission->code = 'user_view';
        $permission->name = 'view user';
        $permission->parent_id = '1';
        $permission->save();

        $permission = new Permission();
        $permission->code = 'user_create';
        $permission->name = 'create user';
        $permission->parent_id = '1';
        $permission->save();

        $permission = new Permission();
        $permission->code = 'user_edit';
        $permission->name = 'edit user';
        $permission->parent_id = '1';
        $permission->save();

        $permission = new Permission();
        $permission->code = 'user_delete';
        $permission->name = 'delete user';
        $permission->parent_id = '1';
        $permission->save();

        $permission = new Permission();
        $permission->code = 'role_view';
        $permission->name = 'view role';
        $permission->parent_id = '2';
        $permission->save();

        $permission = new Permission();
        $permission->code = 'role_create';
        $permission->name = 'create role';
        $permission->parent_id = '2';
        $permission->save();

        $permission = new Permission();
        $permission->code = 'role_edit';
        $permission->name = 'edit role';
        $permission->parent_id = '2';
        $permission->save();

        $permission = new Permission();
        $permission->code = 'role_delete';
        $permission->name = 'delete role';
        $permission->parent_id = '2';
        $permission->save();

        $permission = new Permission();
        $permission->code = 'permission_view';
        $permission->name = 'view permission';
        $permission->parent_id = '3';
        $permission->save();

        $permission = new Permission();
        $permission->code = 'permission_create';
        $permission->name = 'create permission';
        $permission->parent_id = '3';
        $permission->save();

        $permission = new Permission();
        $permission->code = 'permission_edit';
        $permission->name = 'edit permission';
        $permission->parent_id = '3';
        $permission->save();

        $permission = new Permission();
        $permission->code = 'permission_delete';
        $permission->name = 'delete permission';
        $permission->parent_id = '3';
        $permission->save();
    }
}
