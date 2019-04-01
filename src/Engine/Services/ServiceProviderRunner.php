<?php 
namespace JanKlod\Services;


/**
 * @package JanKlod\Foundation\Services\ServiceProviderRunner 
*/ 
class ServiceProviderRunner extends ServiceRunner
{
       
       /**
        * @var 
       */
	    public $name = 'providers';

       
       /**
        * Initialise service provider
        * @return type
       */
	     public function init()
	     {
	   	    $services = $this->getConfig();
          
	   	    foreach($services as $service)
            {      
                 if(class_exists($service))
                 {
                        $provider = new $service($this->app);
                        $provider->register();
                        $callable = [$provider, 'register'];
                        if(is_callable($callable))
                        {
                             call_user_func_array($callable, []);
                        }

                 }
            }

	     }
}