<?php 
namespace JanKlod\Http\Facades;

use JanKlod\Services\ServiceProvider;
use JanKlod\Http\Requests\Request;



/**
 * @package RequestProvider
*/
class RequestProvider extends ServiceProvider
{
       
       /**
        * Registering request provider
        * @return type
       */
       public function register()
       {
       	   $this->app->set('request', function () {
               return new Request();
           });
       }
}
