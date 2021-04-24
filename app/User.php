<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;
    protected $table = 'users';

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function products(){
        return $this->hasMany(Product::class);
    }

    public function posts(){
        return $this->hasMany(Post::class);
    }

    public function verifyUser(){
        return $this->hasOne(VerifyUser::class);
    }

    public function roles(){
        return $this->belongsToMany(Role::class, 'user_roles', 'user_id');
    }

    public function checkPermissionAccess($permissionCheck){
        $roles = auth()->user()->roles;
        foreach ($roles as $role){
            $permissions = $role->permissions;
            if($permissions->contains('code', $permissionCheck)){
                return true;
            }
        }
        return false;
    }
}
