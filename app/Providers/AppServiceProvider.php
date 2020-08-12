<?php

namespace App\Providers;

use App\ApplicationModel;
use App\Observers\ApplicationObserver;
use App\Observers\UserAppKeyObserver;
use App\UserAppKeyModel;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        ApplicationModel::observe(ApplicationObserver::class);
        UserAppKeyModel::observe(UserAppKeyObserver::class);
    }
}
