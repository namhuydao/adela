<?php

use App\UserRole;
use Illuminate\Database\Seeder;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userRole = new UserRole();
        $userRole->user_id = '1';
        $userRole->role_id = '1';
        $userRole->save();
    }
}
