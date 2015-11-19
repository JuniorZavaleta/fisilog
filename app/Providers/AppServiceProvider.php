<?php

namespace FisiLog\Providers;

use Illuminate\Support\ServiceProvider;
use FisiLog\DAO\DaoEloquentFactory;
use FisiLog\Services\UserRegisterService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(DaoEloquentFactory::class, function($app){
            return new DaoEloquentFactory;
        });
        $this->app->singleton(UserRegisterService::class, function($app){
            $persistence = $app->make(DaoEloquentFactory::class);
            return new UserRegisterService($persistence);
        });
        $this->app->singleton(AttendanceRegisterService::class, function($app){
            $persistence = $app->make(DaoEloquentFactory::class);
            return new AttendanceRegisterService($persistence);
        });
    }
}
