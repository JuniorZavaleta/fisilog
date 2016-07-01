<?php
namespace FisiLog\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
   /**
    * This namespace is applied to the controller routes in your routes file.
    *
    * In addition, it is set as the URL generator's root namespace.
    *
    * @var string
    */
   protected $namespace = 'FisiLog\Http\Controllers';

   /**
    * Define your route model bindings, pattern filters, etc.
    *
    * @param  \Illuminate\Routing\Router  $router
    * @return void
    */
   public function boot(Router $router)
   {
      //

      parent::boot($router);
   }

   /**
    * Define the routes for the application.
    *
    * @param  \Illuminate\Routing\Router  $router
    * @return void
    */
   public function map(Router $router)
   {
      $router->group(['namespace' => $this->namespace], function ($router) {
         require app_path('Http/routes.php');
      });

      $router->model('user', 'FisiLog\Models\User');
      $router->model('facultad', 'FisiLog\Models\Facultad');
      $router->model('eap', 'FisiLog\Models\School');
      $router->model('academic_plan', 'FisiLog\Models\AcademicPlan');
      $router->model('clase', 'FisiLog\Models\Clase');
      $router->model('session_class', 'FisiLog\Models\SessionClass');
   }
}
