<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new User();
        $admin->firstName = 'admin';
        $admin->lastName = 'admin';
        $admin->email = 'admin@admin.com';
        $admin->email_verified_at = now();
        $admin->password = Hash::make('admin');
        $admin->remember_token = Str::random(10);
        $admin->save();
    }
}
