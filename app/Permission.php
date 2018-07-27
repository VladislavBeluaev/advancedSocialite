<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
   public function roles()
    {
    	return $this->belongsToMany(Role::class);
    }

    public function getPermissions()
    {
    	return self::with('roles')->get();
    }
}
