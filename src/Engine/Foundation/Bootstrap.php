<?php 
namespace JanKlod\Foundation;


use JanKlod\Container\ContainerInterface;
use JanKlod\Services\ServiceManager;


class Bootstrap 
{
         
         /**
          * @var JanKlod\Container\DI
         */
         private $app;


         /**
          * Constructor
          * @param JanKlod\Container\ContainerInterface $app 
          * @return void
         */
  	     public function __construct(ContainerInterface $app)
  	     {
                 
                 $this->app = $app;
                 
                 # Add params in container
                 $bindings = require_once(__DIR__.'/Binding.php');
                 $this->app->merge($bindings);
                 
                 # Run all services of Application
                 (new ServiceManager($this->app))->add([
                   \JanKlod\Services\ServiceAliasRunner::class, 
                   \JanKlod\Services\ServiceProviderRunner::class
                 ])->load();
                 
                 # Require all routes of application
                 $this->app->file->call('routes/app.php');
  	     }
}