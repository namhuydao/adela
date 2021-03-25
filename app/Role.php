<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';

    public function users(){
        return $this->belongsToMany(User::class, 'user_roles', 'role_id');
    }

    public function permissions(){
        return $this->belongsToMany(Permission::class, 'permission_roles', 'role_id');
    }

}
