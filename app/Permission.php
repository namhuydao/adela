<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'permissions';

    public function roles(){
        return $this->belongsToMany(Role::class, 'permission_roles', 'permission_id');
    }

    public function permissionChildren(){
        return $this->hasMany(Permission::class, 'parent_id');
    }
}
