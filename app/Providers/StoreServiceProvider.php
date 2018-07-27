<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Contracts\Store;
use App\Store\{StoreUser,StoreNews};
use App\Http\Controllers\{UserController,NewsController,ApiUserController};
class StoreServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->when(UserController::class)
          ->needs(Store::class)->
          give(StoreUser::class);

          $this->app->when(NewsController::class)
          ->needs(Store::class)->
          give(StoreNews::class);

          $this->app->when(ApiUserController::class)
            ->needs(Store::class)
            ->give(StoreUser::class);
       // $this->app->bind(Store::class,StoreUser::class);
    }
}
