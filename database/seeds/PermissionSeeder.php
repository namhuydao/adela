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
        $permission->code = 'Sản phẩm';
        $permission->name = '';
        $permission->parent_id = '0';
        $permission->save();

        $permission = new Permission();
        $permission->code = 'Tin tức';
        $permission->name = '';
        $permission->parent_id = '0';
        $permission->save();

        $permission = new Permission();
        $permission->code = 'Người dùng';
        $permission->name = '';
        $permission->parent_id = '0';
        $permission->save();

        $permission = new Permission();
        $permission->code = 'Quyền';
        $permission->name = '';
        $permission->parent_id = '0';
        $permission->save();

        $permission = new Permission();
        $permission->code = 'product_view';
        $permission->name = 'Xem sản phẩm';
        $permission->parent_id = '1';
        $permission->save();

        $permission = new Permission();
        $permission->code = 'product_create';
        $permission->name = 'Thêm sản phẩm';
        $permission->parent_id = '1';
        $permission->save();

        $permission = new Permission();
        $permission->code = 'product_edit';
        $permission->name = 'Sửa sản phẩm';
        $permission->parent_id = '1';
        $permission->save();

        $permission = new Permission();
        $permission->code = 'product_delete';
        $permission->name = 'Xóa sản phẩm';
        $permission->parent_id = '1';
        $permission->save();

        $permission = new Permission();
        $permission->code = 'post_view';
        $permission->name = 'Xem tin tức';
        $permission->parent_id = '2';
        $permission->save();

        $permission = new Permission();
        $permission->code = 'post_create';
        $permission->name = 'Thêm tin tức';
        $permission->parent_id = '2';
        $permission->save();

        $permission = new Permission();
        $permission->code = 'post_edit';
        $permission->name = 'Sửa tin tức';
        $permission->parent_id = '2';
        $permission->save();

        $permission = new Permission();
        $permission->code = 'post_delete';
        $permission->name = 'Xóa tin tức';
        $permission->parent_id = '2';
        $permission->save();

        $permission = new Permission();
        $permission->code = 'user_view';
        $permission->name = 'Xem người dùng';
        $permission->parent_id = '3';
        $permission->save();

        $permission = new Permission();
        $permission->code = 'user_create';
        $permission->name = 'Thêm người dùng';
        $permission->parent_id = '3';
        $permission->save();

        $permission = new Permission();
        $permission->code = 'user_edit';
        $permission->name = 'Sửa người dùng';
        $permission->parent_id = '3';
        $permission->save();

        $permission = new Permission();
        $permission->code = 'user_delete';
        $permission->name = 'Xóa người dùng';
        $permission->parent_id = '3';
        $permission->save();

        $permission = new Permission();
        $permission->code = 'role_view';
        $permission->name = 'Xem người dùng';
        $permission->parent_id = '4';
        $permission->save();

        $permission = new Permission();
        $permission->code = 'role_create';
        $permission->name = 'Thêm người dùng';
        $permission->parent_id = '4';
        $permission->save();

        $permission = new Permission();
        $permission->code = 'role_edit';
        $permission->name = 'Sửa người dùng';
        $permission->parent_id = '4';
        $permission->save();

        $permission = new Permission();
        $permission->code = 'role_delete';
        $permission->name = 'Xóa người dùng';
        $permission->parent_id = '4';
        $permission->save();
    }
}
