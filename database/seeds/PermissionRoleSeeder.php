<?php

use App\PermissionRole;
use Illuminate\Database\Seeder;

class PermissionRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 5; $i <= 20; $i++) {
            $permissionRole = new PermissionRole();
            $permissionRole->role_id = '1';
            $permissionRole->permission_id = $i;
            $permissionRole->save();
        }
    }
}
