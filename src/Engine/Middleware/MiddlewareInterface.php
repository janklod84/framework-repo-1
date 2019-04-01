<?php 
namespace JanKlod\Middleware;

use JanKlod\Container\ContainerInterface;


/**
 * @package \JanKlod\Middleware\MiddlewareInterface
*/
interface MiddlewareInterface
{
       
       /**
        * Handle the middleware
        * 
        * @param \JanKlod\Container\ContainerInterface $app
        * @param string $next
        * @return mixed
       */
       public function handle(ContainerInterface $app, $next);
}