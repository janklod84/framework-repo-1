<?php 
namespace JanKlod\Routing;


/**
 * @package RouteInterface
*/
interface RouteInterface
{
    
       /**
        * Add routes
        * @param ...$args / func_get_args()
       */
       public function map(...$args);
}