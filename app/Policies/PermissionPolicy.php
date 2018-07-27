<?php

namespace App\Policies;

use App\{User,Permission};
use Illuminate\Auth\Access\HandlesAuthorization;

class PermissionPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    public function edit(User $user,Permission $permissions)
    {
        foreach ($permissions->getPermissions() as $permission) {
           
           return $user->hasRole($permission->roles);
        }
    }

    // public function manage_money(User $user,Permission $permissions)
    // {
    //     foreach ($permissions->getPermissions() as $permission) {
           
    //        return $user->hasRole($permission->roles);
    //     }
    // }
}
