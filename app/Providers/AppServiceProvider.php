<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //User
        $this->app->bind('App\Contracts\Services\UserServiceInterface' , 'App\Services\UserService');
        $this->app->bind('App\Contracts\Dao\UserDaoInterface' , 'App\Dao\UserDao');

        //News
        $this->app->bind('App\Contracts\Services\NewsServiceInterface','App\Services\NewsService');
        $this->app->bind('App\Contracts\Dao\NewsDaoInterface', 'App\Dao\NewsDao');

        //Reset
        $this->app->bind('App\Contracts\Services\ResetServiceInterface' , 'App\Services\ResetService');
        $this->app->bind('App\Contracts\Dao\ResetDaoInterface' , 'App\Dao\ResetDao');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
