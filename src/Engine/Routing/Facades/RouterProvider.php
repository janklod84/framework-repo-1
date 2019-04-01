<?php 
namespace JanKlod\Routing\Facades;

use JanKlod\Services\ServiceProvider;
use JanKlod\Routing\Router;



/**
 * @package RouterProvider
*/
class RouterProvider extends ServiceProvider
{
       
       public function register()
       {
       	   $this->app->set('router', function () {
               return new Router($this->app);
           });
       }
}
