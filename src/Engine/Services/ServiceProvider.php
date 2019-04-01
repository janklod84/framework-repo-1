<?php 
namespace JanKlod\Services;


use Janklod\Container\ContainerInterface;

/**
 * @package ServiceProvider
**/
abstract class ServiceProvider implements ServiceInterface
{

  
       /**
        * @var \Janlod\Container\ContainerInterface
       */
       protected $app;


       /**
        * ServiceProvider Constructor
        * @param  \Janklod\Container\ContainerInterface $app
       */
       public function __construct(ContainerInterface $app)
       {
             $this->app = $app;
       }

       /**
        * @return mixed
       */
       abstract function register();
}