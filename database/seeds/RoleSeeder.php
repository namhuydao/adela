<?php

use App\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Role();
        $role->code = 'superadmin';
        $role->name = 'super admin';
        $role->save();

        $role = new Role();
        $role->code = 'writer';
        $role->name = 'người viết tin tức';
        $role->save();

        $role = new Role();
        $role->code = 'seller';
        $role->name = 'người bán hàng';
        $role->save();
    }
}
