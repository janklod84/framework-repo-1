<?php 
namespace JanKlod\Validation\Facades;

use JanKlod\Services\ServiceProvider;
use JanKlod\Validation\Validator;


/**
 * @package JanKlod\Template\Facades\ValiadationProvider
*/ 
class ValiadationProvider  extends ServiceProvider
{
        
       public function register()
       {
       	   $this->app->set('validation', function () {
               return new Validator($this->app);
           });
       }
}