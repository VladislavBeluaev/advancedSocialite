<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
	protected $fillable = ['name','label'];
    public function users()
    {
    	return $this->belongsToMany(User::class);
    }

    public function permissions()
    {
    	return $this->belongsToMany(Permission::class);
    }

    public function givePermission($permissions)
    {
    	if(is_string($permissions))
    	{
    		return $this->savePermission($permissions);
    	}
    	foreach ($permissions as $permission) {
    		$this->savePermission($permission);
    	}
    	return true;
    }

    protected function savePermission($permission)
    {
    	$this->permissions()->save(Permission::whereName($permission)->firstORFail());
    }
}
