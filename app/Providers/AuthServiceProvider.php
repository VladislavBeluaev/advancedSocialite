<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\{User,News,Permission};
use App\Policies\NewsPolicy;
class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        News::class => NewsPolicy::class,
        //Permission::class => PermissionPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

    //    Gate::define('show-news', function (User $user) {
    //     return true;
    // });

    //    Gate::define('add-news', function (User $user) {

    //     if($user->email=='beluaev.vladislav@mail.ru') return false;
    //     return true;
    // });

    //    Gate::define('edit-news', function (User $user,News $news) {

    //     if($user->id!=$news->user_id) return false;
    //     return true;
    // });

        foreach ($this->getPermissions() as $permission) {
            Gate::define($permission->name,function(User $user) use($permission){
                return $user->hasRole($permission->roles);
            });
        }
    }

    protected function getPermissions()
    {
        return Permission::with('roles')->get();
    }
}
