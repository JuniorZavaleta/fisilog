<?php
namespace FisiLog\Providers;

use Illuminate\Support\ServiceProvider;
use FisiLog\DAO\DaoEloquentFactory;
use FisiLog\Services\UserRegisterService;
use FisiLog\Services\AttendanceRegisterService;
use FisiLog\Services\UserLoginService;
use FisiLog\Services\NotificationService;

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
      date_default_timezone_set('America/Lima');
      $this->app->singleton(DaoEloquentFactory::class, function($app){
         return new DaoEloquentFactory;
      });

      $this->app->singleton(NotificationService::class, function($app){
         $persistence = $app->make(DaoEloquentFactory::class);
         return new NotificationService($persistence);
      });
    }
}
