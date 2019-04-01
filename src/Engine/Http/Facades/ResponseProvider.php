<?php 
namespace JanKlod\Http\Facades;

use JanKlod\Services\ServiceProvider;
use JanKlod\Http\Requests\Response;


/**
 * @package RequestProvider
*/
class ResponseProvider extends ServiceProvider
{
       
       public function register()
       {
       	   $this->app->set('response', function () {
               return new Response();
           });
       }
}
